<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use Illuminate\Http\Request;

class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $cooperations = Cooperation::when($search, function ($query, $search) {
                return $query->where('company_name', 'like', '%' . $search . '%')
                             ->orWhere('cooperation_type', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc') // urut berdasarkan terbaru
            ->get();

        return view('cooperations.index', compact('cooperations', 'search'));
        if ($request->ajax()) {
            return response()->view('cooperations.partials.table', compact('cooperations'));
        }

    }

    public function create()
    {
        return view('cooperations.create');
    }

    public function store(Request $request)
    {
         $validated = $request->validate([
            'company_name' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
            'cooperation_type' => 'required|string|in:Cleaning Service,Security',
        ]);

        Cooperation::create($validated);

        return redirect()->route('cooperations.index')->with('success', 'Data kerjasama berhasil ditambahkan.');
    }

    public function show(Cooperation $cooperation)
    {
        //
    }

    public function edit($id)
    {
        $cooperation = Cooperation::findOrFail($id);
        return view('cooperations.edit', compact('cooperation'));
    }

    public function update(Request $request, Cooperation $cooperation)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
            'cooperation_type' => 'required|string|in:Cleaning Service,Security',
        ]);

        $cooperation->update($validated);

        return redirect()->route('cooperations.index')->with('success', 'Data kerjasama berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cooperation::findOrFail($id)->delete();
        return redirect()->route('cooperations.index')->with('success', 'Data kerjasama berhasil dihapus.');
    }
}
