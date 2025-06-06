<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PermissionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // test debugging
        $user = Auth::user();
        $role = $user->role_name;

        $search = $request->search;

        $permissions = PermissionRequest::with(['employee'])
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('employee', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->paginate(5);

        return view('permission-request.index', compact('permissions', 'user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('permission-request.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'izin_type' => 'required|in:sakit,cuti,pribadi',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
        } else {
            $filePath = null;
        }


        // Simpan data ke database
        PermissionRequest::create([
            'employee_id' => $validated['employee_id'],
            'izin_type' => $validated['izin_type'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'submitted_at' => now(),
            'status' => 'pending', // status default
            'attachment' => $filePath,
        ]);

        // Redirect dengan pesan sukses
        return redirect('/permission-request')->with('success', 'Pengajuan izin berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PermissionRequest $permissionRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permissionRequest = PermissionRequest::findOrFail($id);
        $employees = Employee::all();
        return view('permission-request.edit', compact('permissionRequest', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $permissionRequest = PermissionRequest::findOrFail($id);

        // Cek jika update ini datang dari hrd untuk approve/reject
        if (Auth::user()->role_name === 'hrd' && $request->has('approve_action')) {
            if ($request->approve_action === 'approve') {
                $permissionRequest->status = 'disetujui';
            } elseif ($request->approve_action === 'reject') {
                $permissionRequest->status = 'ditolak';
            }

            $permissionRequest->approved_by = Auth::id();
            $permissionRequest->approved_at = now();
            $permissionRequest->save();

            return redirect('/permission-request')->with('success', 'Status permintaan izin berhasil diperbarui.');
        }

        // Validasi input update normal (dari employee/user biasa)
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'izin_type' => 'required|in:sakit,cuti,pribadi',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
        } else {
            $filePath = $permissionRequest->attachment;
        }

        // Update data
        $permissionRequest->update([
            'employee_id' => $validated['employee_id'],
            'izin_type' => $validated['izin_type'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'status' => 'pending', // status default
            'attachment' => $filePath,
        ]);

        return redirect('/permission-request')->with('success', 'Pengajuan izin berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PermissionRequest::destroy($id);
        return redirect('/permission-request')->with('success', 'Izin berhasil dihapus.');
    }
}
