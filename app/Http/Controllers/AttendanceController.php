<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $attendances = Attendance::all();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendances.create');
    }
    public function creates()
    {
        return view('attendances.creates');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|string', // Base64 encoded image data
            'attendance_type' => 'required|string|in:start,end', // Validasi type
        ]);

        $name = $request->input('name');
        $date = now('Asia/Jakarta')->toDateString();
        $attendanceType = $request->input('attendance_type');

        // Handle photo upload (akan digunakan untuk start atau end)
        $base64Image = $request->input('photo');
        $photoPath = null;
        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
            $image = substr($base64Image, strpos($base64Image, ',') + 1);
            $type = strtolower($type[1]);

            if (in_array($type, ['jpg', 'jpeg', 'png'])) {
                $image = str_replace(' ', '+', $image);
                $image = base64_decode($image);

                if ($image !== false) {
                    $filename = 'attendance_' . time() . '.' . $type;
                    Storage::disk('public')->put('photos/' . $filename, $image);
                    $photoPath = 'photos/' . $filename;
                }
            }
        }

        if ($attendanceType === 'end') {
            // Cari data kehadiran yang sesuai dan end_time-nya masih kosong
            $existingAttendance = Attendance::where('name', $name)
                ->where('date', $date)
                ->whereNull('end_time')
                ->first();

            if ($existingAttendance) {
                $existingAttendance->end_time = now('Asia/Jakarta');
                if ($photoPath) {
                    $existingAttendance->end_photo = $photoPath; // Simpan foto ke end_photo
                }
                $existingAttendance->save();
                return redirect()->route('attendances.index')->with('success', 'End time recorded successfully!');
            } else {
                return redirect()->back()->with('error', 'No matching start attendance found to record end time.');
            }
        } elseif ($attendanceType === 'start') {
            // Buat data kehadiran baru untuk start time
            $attendance = new Attendance();
            $attendance->name = $name;
            $attendance->date = $date;
            $attendance->start_time = now('Asia/Jakarta');
            if ($photoPath) {
                $attendance->photo = $photoPath; // Simpan foto ke kolom 'photo' (untuk start)
            }
            $attendance->save();
            return redirect()->route('attendances.index')->with('success', 'Start time recorded successfully!');
        }

        return redirect()->route('attendances.index')->with('info', 'Attendance action completed.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendances.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $attendance->name = $request->name;
        $attendance->date = $request->date;
        $attendance->start_time = $request->date . ' ' . $request->start_time;
        $attendance->end_time = $request->date . ' ' . $request->end_time;
        $attendance->keterangan = $request->keterangan;

        // Handle penghapusan foto start time
        if ($request->has('remove_photo')) {
            if ($attendance->photo) {
                \Storage::delete('public/' . $attendance->photo);
                $attendance->photo = null;
            }
        }

        // Handle upload foto start time baru (dari kamera atau file)
        if ($request->has('photo')) { // Data URL dari kamera
            // Proses penyimpanan data URL sebagai file (Anda perlu implementasi ini)
            $path = $this->saveBase64Image($request->photo, 'attendances');
            $attendance->photo = $path;
        } elseif ($request->hasFile('new_photo')) { // File yang diunggah
            // Hapus foto lama jika ada
            if ($attendance->photo) {
                \Storage::delete('public/' . $attendance->photo);
            }
            $path = $request->file('new_photo')->store('attendances', 'public');
            $attendance->photo = $path;
        }

        // Lakukan logika serupa untuk end_photo
        if ($request->has('remove_end_photo')) {
            if ($attendance->end_photo) {
                \Storage::delete('public/' . $attendance->end_photo);
                $attendance->end_photo = null;
            }
        }

        if ($request->has('end_photo')) {
            $path = $this->saveBase64Image($request->end_photo, 'attendances');
            $attendance->end_photo = $path;
        } elseif ($request->hasFile('new_end_photo')) {
            if ($attendance->end_photo) {
                \Storage::delete('public/' . $attendance->end_photo);
            }
            $path = $request->file('new_end_photo')->store('attendances', 'public');
            $attendance->end_photo = $path;
        }

        $attendance->save();

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully!');
    }
    private function saveBase64Image($base64Image, $folder)
    {
        $imageParts = explode(";base64,", $base64Image);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1];
        $imageData = base64_decode($imageParts[1]);
        $imageName = uniqid() . '.' . $imageType;
        $path = Storage::disk('public')->put($folder . '/' . $imageName, $imageData);
        return $folder . '/' . $imageName;
    }

    private function deleteOldPhoto($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendances.index')->with('success', 'Data berhasil dihapus.');
    }
}
