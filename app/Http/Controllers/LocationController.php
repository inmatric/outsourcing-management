<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use App\Models\Location;
use App\Models\LocationType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $locationTypes = LocationType::all(); 

        $query = Location::query();
    
        // Filter berdasarkan pencarian (lokasi, perusahaan, atau tipe lokasi)
        if ($request->has('search') && $request->search !== null) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('location', 'like', '%' . $search . '%')
                  ->orWhere('company', 'like', '%' . $search . '%')
                  ->orWhere('location_type', 'like', '%' . $search . '%');
            });
        }
    
        $queryType = LocationType::query();
    
        // Filter berdasarkan pencarian (lokasi, perusahaan, atau tipe lokasi)
        if ($request->has('search') && $request->search !== null) {
            $search = $request->search;
            $queryType->where(function ($q) use ($search) {
                $q->where('description', 'like', '%' . $search . '%')
                  ->orWhere('location_type', 'like', '%' . $search . '%');
            });
        }
    
        // Ambil jumlah entri per halaman, default ke 10 jika tidak ada
        $perPage = $request->input('perPage', 5);
        $typePerPage = $request->input('typePerPage', 5);
    
        // Paginate hasil lokasi
        $locations = $query->paginate($perPage)->appends($request->query());
        $locationTypes = $queryType->paginate($typePerPage)->appends($request->query());
    
        return view('location.index', compact('locations','locationTypes'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cooperations = Cooperation::all();
        $locationTypes = LocationType::all();

        return view('location.create', compact('cooperations','locationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'company' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'information' => 'nullable|string',
        'location_type' => 'nullable|array',
    ]);

    $cooperation = Cooperation::where('company_name', $request->company)->first();

    if (!$cooperation) {
        return redirect()->back()->withErrors(['company' => 'Perusahaan tidak ditemukan dalam data kerja sama.']);
    }

    do {
        $code = strtoupper(substr($request->company, 0, 1)) . rand(100, 999);
    } while (Location::where('location_code', $code)->exists());

    Location::create([
        'company' => $request->company,
        'location' => $request->location,
        'information' => $request->information,
        'location_code' => $code,
        'location_type' => is_array($request->location_type) ? implode(',', $request->location_type) : null,
        'status' => $cooperation->status, 
    ]);

    return redirect()->route('location.index')->with('success', 'Data lokasi berhasil ditambahkan.');
}




    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return view('location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $location = Location::findOrFail($id);
    $cooperations = Cooperation::all();
    $locationTypes = LocationType::all();
    $selectedTypes = $location->location_type ? explode(',', $location->location_type) : [];

    return view('location.edit', compact('location', 'cooperations', 'locationTypes','selectedTypes'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
{
    $request->validate([
        'company' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'information' => 'nullable|string',
        'location_type' => 'nullable|array',
        'status' => 'nullable|array',
    ]);

    // Hanya update location_code kalau company berubah
    if ($request->company !== $location->company) {
        do {
            $code = strtoupper(substr($request->company, 0, 1)) . rand(100, 999);
        } while (Location::where('location_code', $code)->exists());
        $location->location_code = $code;
    }

    $location->update([
        'company' => $request->company,
        'location' => $request->location,
        'information' => $request->information,
        'location_type' => is_array($request->location_type) ? implode(',', $request->location_type) : null,
        'status' => $request->status,
    ]);

    return redirect()->route('location.index')->with('success', 'Data lokasi berhasil diperbarui.');
}

    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')->with('success', 'Data lokasi berhasil dihapus.');
    }
    public function downloadPDF(Request $request)
    {
        $locations = Location::all();

        // $query = Location::query();
    
        // if ($request->filled('search')) {
        //     $query->where(function ($q) use ($request) {
        //         $q->where('location', 'like', '%' . $request->search . '%')
        //           ->orWhere('company', 'like', '%' . $request->search . '%')
        //           ->orWhere('location_type', 'like', '%' . $request->search . '%');
        //     });
        // }
    
        // $locations = $query->get();
        $pdf = Pdf::loadView('location.pdf', compact('locations'));
        return $pdf->download('daftar_lokasi.pdf');
    }
    
}
