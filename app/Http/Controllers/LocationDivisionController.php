<?php

namespace App\Http\Controllers;

use App\Models\LocationDivision;
use Illuminate\Http\Request;

class LocationDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locationDivision = LocationDivision::all();
        return view('location-division.index', compact('locationDivision'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location-division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required|string|max:100',
            'company'       => 'required|string|max:100',
            'location'      => 'required|string|max:100',
            'work_type'     => 'required|string|max:100',
            'work_detail'   => 'nullable|string',
            'status'        => 'required|in:completed,in_progress',
        ]);

        LocationDivision::create($validated);

        return redirect()->route('location-division.index')
            ->with('success', 'Pembagian lokasi kerja berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $locationDivision = LocationDivision::findOrFail($id);
        return view('location-division.edit', compact('locationDivision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $locationDivision = LocationDivision::findOrFail($id);
    
        $validated = $request->validate([
            'employee_name' => 'required|string|max:100',
            'company'       => 'required|string|max:100',
            'location'      => 'required|string|max:100',
            'work_type'     => 'required|string|max:100',
            'work_detail'   => 'nullable|string',
            'status'        => 'required|in:completed,in_progress',
        ]);
    
        $locationDivision->update($validated);
    
        return redirect()->route('location-division.index')
            ->with('success', 'Pembagian lokasi kerja berhasil diperbarui');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $locationDivision = LocationDivision::findOrFail($id);
        $locationDivision->delete();

        return redirect()->route('location-division.index')
            ->with('success', 'Pembagian lokasi kerja berhasil dihapus');
    }
}
