<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    // Menampilkan daftar karyawan
    public function index()
    {
        $employees = Employee::all(); // Mengambil semua data karyawan
        return view('employees.index', compact('employees'));
    }

    // Menampilkan form tambah data karyawan
    public function create()
    {
        $employees = Employee::all();
        return view('employees.create', compact('employees'));
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'age' => 'required|numeric|min:18',
            'phone_number' => 'required|string|max:20',
            'card_id' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        // Simpan file ke storage
        if ($request->hasFile('card_id')) {
            $filename = time() . '_' . $request->file('card_id')->getClientOriginalName();
            $path = $request->file('card_id')->storeAs('uploads/card_ids', $filename, 'public');
            $validated['card_id'] = $path;
        }

        // Simpan ke database
        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    // Menampilkan form edit data karyawan
    public function edit($id)
    {
        $employee = Employee::findOrFail($id); // Menemukan karyawan berdasarkan ID
        return view('employees.edit', compact('employee'));
    }

    // Mengupdate data karyawan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'phone_number' => 'required|string|max:15',
            'card_id' => 'nullable|image|mimes:svg,png,jpg,gif|max:2048',
        ]);

        // Temukan karyawan berdasarkan ID
        $employee = Employee::findOrFail($id);

        // Hapus file ID card lama jika ada dan ada file baru
        if ($request->hasFile('card_id')) {
            if ($employee->card_id) {
                Storage::delete('public/' . $employee->card_id); // Hapus file lama
            }
            $path = $request->file('card_id')->store('employee_cards', 'public');
        } else {
            $path = $employee->card_id; // Biarkan file ID card lama jika tidak ada yang di-upload
        }

        // Update data karyawan
        $employee->update([
            'name' => $request->name,
            'address' => $request->address,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'card_id' => $path, // Simpan path ID card jika ada
        ]);

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diubah.');
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        // Hapus file ID card jika ada
        if ($employee->card_id) {
            Storage::delete('public/' . $employee->card_id);
        }

        // Hapus data karyawan
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus.');
    }
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

}

