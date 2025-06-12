<?php

namespace App\Http\Controllers;

use App\Models\WorkTool;
use Illuminate\Http\Request;

class WorkToolsController extends Controller
{
    // Menampilkan daftar worktools
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $tools = WorkTool::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%")
                             ->orWhere('purpose', 'like', "%{$search}%");
            })
            ->get();
    
        return view('worktools.index', compact('tools'));
    }
    

    // Menampilkan form untuk membuat worktool baru
    public function create()
    {
        return view('worktools.create');
    }

    // Menyimpan worktool baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'purpose' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        // Menyimpan data image jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        // Membuat data worktool baru
        WorkTool::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('worktools.index')->with('success', 'WorkTool created successfully.');
    }

    // Menampilkan form untuk mengedit worktool
    public function edit($id)
    {
        // Mengambil data worktool yang akan diedit
        $tool = WorkTool::findOrFail($id);
        return view('worktools.edit', compact('tool'));
    }

    // Mengupdate data worktool yang sudah ada
    public function update(Request $request, $id)
    {
        // Mengambil data worktool yang akan diupdate
        $tool = WorkTool::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'purpose' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        // Menyimpan data image baru jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        // Mengupdate data worktool
        $tool->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('worktools.index')->with('success', 'WorkTool updated successfully.');
    }

    // Menghapus data worktool
    public function destroy($id)
    {
        // Menghapus data worktool
        WorkTool::destroy($id);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('worktools.index')->with('success', 'WorkTool deleted successfully.');
    }
}