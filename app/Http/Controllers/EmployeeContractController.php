<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeContract;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $search = $request->search;

        $contracts = EmployeeContract::with(['employee', 'location'])
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('employee', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->paginate(5);

        return view('employee-contract.index', compact('contracts', 'search'));
    }



    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $employees = Employee::all();
        $locations = Location::all();
        return view('employee-contract.create', compact('employees', 'locations'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id'     => 'required|exists:employees,id',
            'contract_number' => 'required|string',
            'start_date'      => 'required|date',
            'end_date'        => 'nullable|date|after:start_date',
            'position'        => 'required|string|max:100',
            'location_id'     => 'required|exists:locations,id',
            'working_hours'   => 'required|in:full-time,part-time,shift-based',
            'salary'          => 'required|string|max:255', // sesuai migration
            'status'          => 'required|in:active,inactive,terminated',
            'contract_file'   => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('contract_file')) {
            $filePath = $request->file('contract_file')->store('contracts', 'public');
        } else {
            $filePath = null;
        }

        EmployeeContract::create([
            'employee_id'     => $validated['employee_id'],
            'contract_number' => $validated['contract_number'],
            'start_date'      => $validated['start_date'],
            'end_date'        => $validated['end_date'],
            'position'        => $validated['position'],
            'location_id'     => $validated['location_id'],
            'working_hours'   => $validated['working_hours'],
            'salary'          => $validated['salary'],
            'status'          => $validated['status'],
            'contract_file'   => $filePath,
        ]);

        return redirect()->route('employee-contract.index')->with('success', 'Employee Contract Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeContract $employeeContract)
    {
        return view('employee-contract.show', compact('employeeContract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contract = EmployeeContract::findOrFail($id);
        $employees = Employee::all();
        $locations = Location::all();

        return view('employee-contract.edit', compact('contract', 'employees', 'locations'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contract = EmployeeContract::findOrFail($id);

        $validated = $request->validate([
            'employee_id'     => 'required|exists:employees,id',
            'contract_number' => 'required|string',
            'start_date'      => 'required|date',
            'end_date'        => 'nullable|date|after:start_date',
            'position'        => 'required|string|max:100',
            'location_id'     => 'required|exists:locations,id',
            'working_hours'   => 'required|in:full-time,part-time,shift-based',
            'salary'          => 'required|string|max:255',
            'status'          => 'required|in:active,inactive,terminated',
            'contract_file'   => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('contract_file')) {
            // Optional: Delete old file first if you want
            if ($contract->contract_file && Storage::disk('public')->exists($contract->contract_file)) {
                Storage::disk('public')->delete($contract->contract_file);
            }

            $filePath = $request->file('contract_file')->store('contracts', 'public');
            $contract->contract_file = $filePath;
        }

        $contract->update([
            'employee_id'     => $validated['employee_id'],
            'contract_number' => $validated['contract_number'],
            'start_date'      => $validated['start_date'],
            'end_date'        => $validated['end_date'],
            'position'        => $validated['position'],
            'location_id'     => $validated['location_id'],
            'working_hours'   => $validated['working_hours'],
            'salary'          => $validated['salary'],
            'status'          => $validated['status'],
        ]);

        return redirect()->route('employee-contract.index')->with('success', 'Employee Contract Successfully Updated');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeContract $employeeContract)
    {
        // Hapus file jika ada
        if ($employeeContract->contract_file) {
            Storage::delete($employeeContract->contract_file);
        }

        $employeeContract->delete();

        return redirect()->route('employee-contract.index')
            ->with('success', 'Employee Contract Successfully Deleted.');
    }
}
