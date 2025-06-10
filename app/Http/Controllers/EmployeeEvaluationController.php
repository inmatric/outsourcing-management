<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeEvaluation;
use Illuminate\Http\Request;

class EmployeeEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $employeeEvaluation = EmployeeEvaluation::with(['employee'])
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('employee', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->paginate(5);

        // $employeeEvaluation = EmployeeEvaluation::all();
        return view('employee-evaluation.index', compact('employeeEvaluation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('employee-evaluation.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'evaluation_date' => 'required|date',
            'information' => 'required',
            // 'id_attendance' => 'required|exists:attendances,id',
            // 'id_work' => 'required|exists:works,id',
        ]);
        EmployeeEvaluation::create($request->all());

        return redirect()->route('employee-evaluation.index')->with('success', 'Evaluasi berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(EmployeeEvaluation $employeeEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeEvaluation $employeeEvaluation)
    {
        $employee = Employee::all();
        return view('employee-evaluation.edit', compact('employeeEvaluation', 'employee'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeEvaluation $employeeEvaluation)
    {
        $request->validate([
            // 'id_employee' => 'required',
            'evaluation_date' => 'required|date',
            'information' => 'required',
        ]);

        $employeeEvaluation->update($request->all());

        return redirect()->route('employee-evaluation.index')->with('success', 'Evaluasi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employeeEvaluation = EmployeeEvaluation::findOrFail($id);
        $employeeEvaluation->delete();

        return redirect()->route('employee-evaluation.index')->with('success', 'Data kerja berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if (!empty($search)) {
            $employeeevaluation = EmployeeEvaluation::where('employee_name', 'like', "%{$search}%")
                ->orWhere('evaluation_date', 'like', "%{$search}%")
                ->orWhere('information', 'like', "%{$search}%")
                ->latest()
                ->get();
        } else {
            // Kalau search kosong, ambil semua data
            $employeeevaluation = EmployeeEvaluation::latest()->get();
        }

        return view('employee-evaluation.index', compact('employeeevaluation'));
    }
}
