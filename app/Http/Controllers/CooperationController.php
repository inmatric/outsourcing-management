<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CooperationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $cooperations = Cooperation::when($search, function ($query, $search) {
                return $query->where('company_name', 'like', '%' . $search . '%')
                             ->orWhere('cooperation_type', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
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
            'cooperation_type' => 'required|array',
            'cooperation_type.*' => 'in:Cleaning Service,Security',
            'contract_file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        // Simpan file
        if ($request->hasFile('contract_file')) {
            $validated['contract_file'] = $request->file('contract_file')->store('contracts', 'public');
        }

        $validated['cooperation_type'] = implode(',', $validated['cooperation_type']);

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
            'cooperation_type' => 'required|array',
            'cooperation_type.*' => 'in:Cleaning Service,Security',
            'contract_file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);
    
        // Hapus file lama & simpan baru
        if ($request->hasFile('contract_file')) {
            if ($cooperation->contract_file && Storage::disk('public')->exists($cooperation->contract_file)) {
                Storage::disk('public')->delete($cooperation->contract_file);
            }
    
            // Simpan file baru
            $validated['contract_file'] = $request->file('contract_file')->store('contracts', 'public');
        }
    
        $validated['cooperation_type'] = implode(',', $validated['cooperation_type']);
    
        $cooperation->update($validated);
    
        return redirect()->route('cooperations.index')->with('success', 'Data kerjasama berhasil diperbarui.');
    }
    
    

    public function destroy($id)
    {
        $cooperation = Cooperation::findOrFail($id);
    
        // Hapus file terkait jika ada
        if ($cooperation->contract_file && Storage::disk('public')->exists($cooperation->contract_file)) {
            Storage::disk('public')->delete($cooperation->contract_file);
        }
    
        $cooperation->delete();
    
        return redirect()->route('cooperations.index')->with('success', 'Data kerjasama berhasil dihapus.');
    }
    
}
