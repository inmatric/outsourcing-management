<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funds = Fund::all();
        return view('funds.index', compact('funds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funds.create');
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
    public function show(Fund $fund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fund $fund)
    {
        $fund = Fund::findOrFail($id);
        return view('funds.edit', compact('fund'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fund $fund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fund $fund)
    {
        //
    }
}
