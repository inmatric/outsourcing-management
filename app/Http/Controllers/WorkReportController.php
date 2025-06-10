<?php

namespace App\Http\Controllers;

use App\Models\WorkReport;
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
    $query = WorkReport::query();

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('employee_id', 'like', '%' . $search . '%')
              ->orWhere('employee_name', 'like', '%' . $search . '%');
        });
    }

    $workreport = $query->latest()->get();

    return view('workreport.index', compact('workreport'));
}


    /**
     * Menampilkan form tambah laporan.
     */
    public function create()
    {
        return view('workreport.create');
    }

    /**
     * Menyimpan data laporan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer',
            'employee_name' => 'required|string|max:200',
            'date' => 'required|date',
            'work_description' => 'required|string',
            'problem_found' => 'nullable|string',
            'action' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('workreport', 'public');
            $validated['image'] = $imagePath;
        }

        DB::table('work_report')->insert($validated);

        return redirect()->route('workreport.index')->with('success', 'Laporan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit laporan.
     */
    public function edit($id)
    {
        $report = WorkReport::findOrFail($id);
        return view('workreport.edit', compact('report'));
    }

    /**
     * Menyimpan pembaruan data laporan.
     */
    public function update(Request $request, $id)
    {
        $report = WorkReport::findOrFail($id);

        $validated = $request->validate([
            'date' => 'required|date',
            'work_description' => 'required|string',
            'problem_found' => 'nullable|string',
            'action' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($report->image && Storage::exists('public/' . $report->image)) {
                Storage::delete('public/' . $report->image);
            }

            $validated['image'] = $request->file('image')->store('workreport', 'public');
        }

        $report->update($validated);

        return redirect()->route('workreport.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Menghapus laporan.
     */
    public function destroy($id)
    {
        $report = WorkReport::findOrFail($id);

        if ($report->image && Storage::exists('public/' . $report->image)) {
            Storage::delete('public/' . $report->image);
        }

        $report->delete();

        return redirect()->route('workreport.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
