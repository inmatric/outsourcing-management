<?php

namespace App\Http\Controllers;

use App\Models\LocationDivision;
use App\Models\Cooperation;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $locationDivision = LocationDivision::with(['cooperations', 'location'])->get();
        $cooperations = Cooperation::all(); // <-- ini penting
    
        return view('location-division.index', compact('locationDivision', 'cooperations'));
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
            // 'employee_id'    => 'required|exists:employees,id',
            'cooperation_id' => 'required|exists:cooperations,id',
            'location_id' => 'required|exists:locations,id',
            // 'work_id'        => 'required|exists:works,id',
            'work_detail' => 'nullable|string',
        ]);

        // Set default status
        $validated['status'] = 'in_progress';

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
        // $employees = Employee::all();
        $cooperations = Cooperation::all();
        $locations = Location::all();
        // $works = Work::all();

        return view('location-division.edit', compact(
            'locationDivision',
            'employees',
            'cooperations',
            'locations',
            'works'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $locationDivision = LocationDivision::findOrFail($id);

        $validated = $request->validate([
            // 'employee_id' => 'required|exists:employees,id',
            'cooperation_id' => 'required|exists:cooperations,id',
            'location_id' => 'required|exists:locations,id',
            // 'work_id' => 'required|exists:works,id',
            'work_detail' => 'nullable|string',
            'status' => 'required|in:completed,in_progress',
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
