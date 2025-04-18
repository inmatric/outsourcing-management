<?php

namespace App\Http\Controllers;

use App\Models\EmployeeContract;
use Illuminate\Http\Request;

class EmployeeContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee-contract.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee-contract.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeContract $employeeContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeContract $employeeContract)
    {
        return view('employee-contract.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeContract $employeeContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeContract $employeeContract)
    {
        //
    }
}
