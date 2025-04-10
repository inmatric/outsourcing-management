<?php
namespace App\Http\Controllers;

use App\Models\LocationType;
use Illuminate\Http\Request;

class LocationTypeController extends Controller
{
   

    public function create()
    {
        return view('location.location-type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location_type' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        LocationType::create($request->all());

        return redirect()->route('location.index')->with('success', 'Location type created successfully.');
    }

    public function edit(LocationType $locationType)
    {
        return view('location.location-type.edit', compact('locationType'));
    }

    public function update(Request $request, LocationType $locationType)
    {
        $request->validate([
            'location_type' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $locationType->update($request->all());

        return redirect()->route('location.index')->with('success', 'Location type updated successfully.');
    }

    public function destroy(LocationType $locationType)
    {
        $locationType->delete();

        return redirect()->route('location.index')->with('success', 'Location type deleted successfully.');
    }
}
