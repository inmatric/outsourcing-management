<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
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
        // Mengambil semua data kehadiran dengan relasi ke employee
        $attendances = Attendance::with('employee')->get();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua karyawan untuk dropdown selection
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }
    public function creates()
    {
        // Mengambil semua karyawan untuk dropdown selection
        $employees = Employee::all();
        return view('attendances.creates', compact('employees'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'attendance_type' => 'required|string|in:start,end',
            'photo' => 'required|string',
        ]);

        $employeeId = $request->input('employee_id');
        $attendanceType = $request->input('attendance_type');
        $date = now('Asia/Jakarta')->toDateString();
        $now = now('Asia/Jakarta');
        $currentMinutes = $now->hour * 60 + $now->minute;


$photoPath = null;
if ($request->filled('photo')) {
    $base64Image = $request->input('photo');
    // Pisahkan header dari data base64
    $image_parts = explode(";base64,", $base64Image);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);

    // Buat nama file yang unik
    $filename = 'attendance_' . time() . '.' . $image_type;
    
    // Simpan menggunakan Storage Facade
    // Ini akan menyimpan ke storage/app/public/photos/
    Storage::disk('public')->put('photos/' . $filename, $image_base64);

    // Path yang disimpan di database
    $photoPath = 'photos/' . $filename;
}
        

        

        if ($attendanceType === 'end') {
            $existingAttendance = Attendance::where('employee_id', $employeeId)
                ->where('date', $date)
                ->whereNull('end_time')
                ->first();

            if ($existingAttendance) {
                $existingAttendance->end_time = $now;
                if ($photoPath) {
                    $existingAttendance->end_photo = $photoPath;
                }
                if ($existingAttendance->start_time && $existingAttendance->end_time) {
                    $existingAttendance->notes = 'Hadir';
                }
                $existingAttendance->save();
                return redirect()->route('attendances.index')->with('success', 'End time recorded successfully!');
            } else {
                return redirect()->back()->with('error', 'Tidak ditemukan data kehadiran untuk dicocokkan dengan waktu pulang.');
            }
        } elseif ($attendanceType === 'start') {
            $attendance = new Attendance();
            $attendance->employee_id = $employeeId;
            $attendance->date = $date;
            $attendance->start_time = $now;
            if ($photoPath) {
                $attendance->photo = $photoPath;
            }
            $attendance->save();
            return redirect()->route('attendances.index')->with('success', 'Start time recorded successfully!');
        }

        return redirect()->route('attendances.index')->with('info', 'Attendance action completed.');
    }


    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'attendance_type' => 'required|string|in:start,end', // Validasi type
            'photo' => 'nullable|string', // Base64 encoded image data
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->employee_id = $request->input('employee_id');
        $attendance->attendance_type = $request->input('attendance_type');

        // Handle photo upload if present
        if ($request->has('photo')) {
            $base64Image = $request->input('photo');
            $photoPath = $this->saveBase64Image($base64Image, 'photos');
            $attendance->photo = $photoPath;
        }

        $attendance->save();

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully!');
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

    /**
     * Save the base64 image to the public storage.
     */
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

    /**
     * Delete the old photo if exists in storage.
     */
    private function deleteOldPhoto($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
    public function show($id)
    {
        $attendance = Attendance::findOrFail($id); // Ambil data attendance berdasarkan ID
        return view('attendances.show', compact('attendance'));
    }

    public function indexs()
    {
        $attendances = Attendance::with('employee')->get();
        return view('employees_attendances.index', compact('attendances'));
    }
    public function updateStatus($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->status = 'completed';
        $attendance->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }


}
