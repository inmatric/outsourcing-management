<?php

namespace App\Http\Controllers;

use App\Models\WorkEquipment;
use App\Models\Employee; // Import model Employee
use App\Models\Location; // Import model Location
use App\Models\Work;
use Illuminate\Http\Request;

class WorkEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Eager load 'employee' dan 'location' untuk mengambil data terkait
        $workequipments = WorkEquipment::with(['employee', 'location'])
            ->when($search, function ($query, $search) {
                return $query->where('equipment', 'like', "%{$search}%")
                    ->orWhere('condition', 'like', "%{$search}%")
                    // Cari berdasarkan nama karyawan melalui relasi
                    ->orWhereHas('employee', function ($q) use ($search) {
                        $q->where('employee_id', 'like', "%{$search}%");
                    })
                    // Cari berdasarkan nama lokasi melalui relasi
                    ->orWhereHas('location', function ($q) use ($search) {
                        $q->where('location_id', 'like', "%{$search}%");
                    })
                    // Cari berdasarkan nama lokasi melalui relasi
                    ->orWhereHas('work', function ($q) use ($search) {
                        $q->where('work_id', 'like', "%{$search}%");
                    });
                    
            })
            ->get(); // Anda mungkin ingin menggunakan paginate() di sini untuk data yang banyak

        return view('workequipment.index', compact('workequipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua karyawan dan lokasi untuk dropdown di form
        $employees = Employee::all();
        $locations = Location::all();
        $works = Work::all();
        return view('workequipment.create', compact('employees', 'locations','works'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id', // Validasi foreign key employee
            'location_id' => 'required|exists:locations,id', // Validasi foreign key location
            'work_id' => 'required|exists:works,id', // Validasi foreign key location
            'equipment' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
        ]);

        WorkEquipment::create($request->only([
            'employee_id',
            'location_id',
            'work_id',
            'equipment',
            'condition'
        ]));

        return redirect()->route('workequipment.index')->with('success', 'Data peralatan kerja berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Load relasi employee dan location saat menampilkan detail
        $workequipment = WorkEquipment::with(['employee', 'location'])->findOrFail($id);
        return view('workequipment.show', compact('workequipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $workequipment = WorkEquipment::findOrFail($id);
        // Ambil semua karyawan dan lokasi untuk dropdown di form edit
        $employees = Employee::all();
        $locations = Location::all();
        $works = Work::all();
        return view('workequipment.edit', compact('workequipment', 'employees', 'locations', 'works'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $workequipment = WorkEquipment::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id', // Validasi foreign key employee
            'location_id' => 'required|exists:locations,id', // Validasi foreign key location
            'work_id' => 'required|exists:works,id', // Validasi foreign key location
            'equipment' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
        ]);

        $workequipment->update($validated);

        return redirect()->route('workequipment.index')
            ->with('success', 'Data peralatan kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $workequipment = WorkEquipment::findOrFail($id);
        $workequipment->delete();

        return redirect()->route('workequipment.index')
            ->with('success', 'Data peralatan kerja berhasil dihapus.');
    }
}
