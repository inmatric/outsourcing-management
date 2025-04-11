<?php

namespace App\Http\Controllers;

use App\Models\WorkTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkToolsController extends Controller
{
    
    public function index()
    {
        $workTools = WorkTools::all();  // Ambil semua data WorkTools dari database
        return view('worktools.index', compact('workTools'));  // Kirim ke view index
        
    }

    public function create()
    {
        return view('worktools.create');  // Menampilkan form untuk menambah WorkTool
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'status' => 'required|in:available,unavailable',
        ]);

        // Simpan data WorkTool baru
        WorkTools::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('worktools.index')->with('success', 'WorkTool berhasil ditambahkan!');
    }



    public function edit($id)
    {
        // Find the WorkTool by ID
        $workTool = WorkTools::findOrFail($id);

        // Pass the data to the edit view
        return view('Worktools.edit', compact('workTool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'purpose' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Find the WorkTool by ID
        $workTool = WorkTools::findOrFail($id);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($workTool->image_path && Storage::exists('public/' . $workTool->image_path)) {
                Storage::delete('public/' . $workTool->image_path);
            }

            // Save the new image   
            $workTool->image_path = $request->file('image')->store('worktools', 'public');
        }

        // Update other fields
        $workTool->update([
            'name' => $request->name,
            'description' => $request->description,
            'purpose' => $request->purpose,
        ]);

        // Redirect back with a success message
        return redirect()->route('worktools.index')->with('success', 'WorkTool berhasil diperbarui!');
    }
}