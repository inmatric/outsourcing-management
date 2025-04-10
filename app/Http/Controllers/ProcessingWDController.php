<?php

namespace App\Http\Controllers;

use App\Models\ProcessingWD;
use Illuminate\Http\Request;

class ProcessingWDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('processing_wd.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('processing_wd.create');
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
    public function show(ProcessingWD $processingWD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcessingWD $processingWD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProcessingWD $processingWD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcessingWD $processingWD)
    {
        //
    }
}
