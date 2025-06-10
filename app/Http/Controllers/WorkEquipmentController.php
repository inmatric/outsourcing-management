<?php

namespace App\Http\Controllers;

use App\Models\WorkEquipment;
use Illuminate\Http\Request;

class WorkEquipmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $workequipments = WorkEquipment::when($search, function ($query, $search) {
            return $query->where('employee_name', 'like', "%{$search}%")
                ->orWhere('position', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%")
                ->orWhere('equipment', 'like', "%{$search}%")
                ->orWhere('condition', 'like', "%{$search}%");
        })->get();

        return view('workequipment.index', compact('workequipments'));
    }


    public function create()
    {

        return view('workequipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string|max:50',
            'employee_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'equipment' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
        ]);

        WorkEquipment::create($request->only([
            'employee_id',
            'employee_name',
            'position',
            'location',
            'equipment',
            'condition'
        ]));

        return redirect()->route('workequipment.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $workequipment = WorkEquipment::findOrFail($id);
        return view('workequipment.edit', compact('workequipment'));
    }

    public function update(Request $request, $id)
    {
        $product = WorkEquipment::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|string|max:50',
            'employee_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'equipment' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
        ]);

        $product->update($validated);

        return redirect()->route('workequipment.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $product = WorkEquipment::findOrFail($id);
        $product->delete();

        return redirect()->route('workequipment.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
