<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work.create');
        // return view(view: 'work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_name' => 'required|string|max:255',
            'task_type' => 'required|string|max:255',
            'task_details' => 'required|string|max:255',
            'salary_per_person' => 'required|string|max:255',
        ]);

        Work::create($validated);

        return redirect()->route('work.index')
            ->with('success', 'Data kerja berhasil ditambahkan');
    }

    //     public function store(Request $request)
    // {
    //     return back()->with('success', 'Data berhasil disubmit (dummy).');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $work = Work::findOrFail($id);
        return view('work.edit', compact('work'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
        $validated = $request->validate([
            'job_name' => 'required|string|max:255',
            'task_type' => 'required|string|max:255',
            'task_details' => 'required|string|max:255',
            'salary_per_person' => 'required|string|max:255',
        ]);

        $work = Work::findOrFail($id);
        // Update data pekerjaan
        $work->update([
            'job_name' => $validated['job_name'],
            'task_type' => $validated['task_type'],
            'task_details' => $validated['task_details'],
            'salary_per_person' => $validated['salary_per_person'],
        ]);
    

        return redirect()->route('work.index')->with('success', 'Data kerja berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $work = Work::findOrFail($id);
    //     $work->delete();

    //     return redirect()->route('work.index')->with('success', 'Data kerja berhasil dihapus');
    // }

    public function destroy(Request $request, $id)
{
    $work = Work::findOrFail($id);
    $work->delete();

    $search = $request->input('search');

    if ($search) {
        return redirect()->route('work.search', ['search' => $search])
            ->with('success', 'Data kerja berhasil dihapus');
    }

    return redirect()->route('work.index')
        ->with('success', 'Data kerja berhasil dihapus');
}


    public function index(Request $request)
{
    $search = $request->input('search');

    $work = Work::when($search, function ($query, $search) {
        $query->where('job_name', 'like', "%{$search}%")
              ->orWhere('task_type', 'like', "%{$search}%")
              ->orWhere('task_details', 'like', "%{$search}%")
              ->orWhere('salary_per_person', 'like', "%{$search}%");
    })->latest()->get();

    // (opsional) Tambahkan salary_range seperti yang sudah kamu lakukan

    return view('work.index', compact('work'));
}

public function search(Request $request)
{
    $search = $request->input('search');

    $work = Work::when($search, function ($query, $search) {
        return $query->where('job_name', 'like', "%{$search}%")
                     ->orWhere('task_type', 'like', "%{$search}%")
                     ->orWhere('task_details', 'like', "%{$search}%")
                     ->orWhere('salary_per_person', 'like', "%{$search}%");
    })->get();

    return view('work.index', compact('work'));
}

//     public function search(Request $request)
// {
//     $search = $request->input('search');

//     $work = Work::where('employee_name', 'like', "%{$search}%")
//         ->orWhere('work_type', 'like', "%{$search}%")
//         ->orWhere('taks', 'like', "%{$search}%")
//         ->orWhere('work_detail', 'like', "%{$search}%")
//         ->latest()
//         ->get();

//     if ($work->isEmpty()) {
//         return redirect()->route('work.index')
//             ->with('info', 'Tidak ada data yang ditemukan untuk pencarian tersebut.');
//     }

//     return view('work.index', compact('work'));
// }

}
