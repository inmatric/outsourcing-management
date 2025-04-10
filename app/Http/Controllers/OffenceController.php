<?php

namespace App\Http\Controllers;

use App\Models\Offence;
use Illuminate\Http\Request;

class OffenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offences = Offence::all();
        return view('offence.index', compact('offences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offence.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employe_name' => 'required|string|max:100',
            'date' => 'required|date',
            'offence_category' => 'required|string|max:100',
            'offence_description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Simpan gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('offence_images', 'public');
            $validated['image'] = $imagePath;
        }

        Offence::create($validated); // Ganti dengan model yang sesuai

        return redirect()->route('offence.index')
            ->with('success', 'Offence berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Offence $offence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offence $offence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offence $offence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offence $offence)
    {
        //
    }
}
