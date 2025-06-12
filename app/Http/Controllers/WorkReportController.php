<?php

namespace App\Http\Controllers;

use App\Models\WorkReport;
use App\Models\Employee; // Pastikan model Employee di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WorkReportController extends Controller
{
    /**
     * Menampilkan daftar laporan pekerjaan.
     */
    
    public function index(Request $request)
    {
        $search = $request->search;

        $workreport = WorkReport::with(['employee'])
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('employee', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->paginate(5);

        return view('workreport.index', compact('workreport', 'search'));
    }

    /**
     * Menampilkan form tambah laporan.
     */
    public function create()
    {
        $employees = Employee::all(); // Mengambil semua data pegawai
        return view('workreport.create', compact('employees'));
    }

    /**
     * Menyimpan data laporan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'work_description' => 'required|string',
            'problem_found' => 'nullable|string',
            'action' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Validasi untuk gambar
        ]);

        // Mengambil nama pegawai berdasarkan employee_id untuk disimpan di kolom employee_name
        // Ini opsional, Anda bisa menghapus kolom employee_name di database jika selalu ingin
        // mengandalkan relasi `employee()` untuk mendapatkan nama.
        $employee = Employee::findOrFail($validated['employee_id']);
        $validated['employee_name'] = $employee->name;

        // Penanganan upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('workreport_images', 'public'); // Simpan di folder 'workreport_images'
            $validated['image'] = $imagePath;
        }

        // Menggunakan model Eloquent untuk membuat record baru
        WorkReport::create($validated);

        return redirect()->route('workreport.index')->with('success', 'Laporan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit laporan.
     */
    public function edit($id)
    {
        $report = WorkReport::with('employee')->findOrFail($id); // Muat relasi employee
        $employees = Employee::all();
        return view('workreport.edit', compact('report', 'employees'));
    }

    /**
     * Menyimpan pembaruan data laporan.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'work_description' => 'required|string',
            'problem_found' => 'nullable|string',
            'action' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $report = WorkReport::findOrFail($id);

        $employee = Employee::findOrFail($validated['employee_id']);
        $validated['employee_name'] = $employee->name; // Sesuaikan jika tidak diperlukan lagi

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($report->image && Storage::disk('public')->exists($report->image)) {
                Storage::disk('public')->delete($report->image);
            }
            $imagePath = $request->file('image')->store('workreport_images', 'public');
            $validated['image'] = $imagePath;
        }

        $report->update($validated); // Gunakan update pada model Eloquent

        return redirect()->route('workreport.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    /**
     * Menghapus laporan.
     */
    public function destroy($id)
    {
        $report = WorkReport::findOrFail($id);

        if ($report->image && Storage::disk('public')->exists($report->image)) {
            Storage::delete('public/' . $report->image);
        }

        $report->delete();

        return redirect()->route('workreport.index')->with('success', 'Laporan berhasil dihapus.');
    }
}