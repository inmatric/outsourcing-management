<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $employes = Employee::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return view('employes.index', compact('employes'));
    }

    public function create()
    {
        return view('employes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'age' => 'required|integer',
            'phone_number' => 'required|string|max:20',
            'skill' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Employee::create($data);

        return redirect()->route('employes.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Employee $employe)
    {
        return view('employes.show', compact('employe'));
    }

    public function edit(Employee $employe)
    {
        return view('employes.edit', compact('employe'));
    }

    public function update(Request $request, Employee $employe)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'age' => 'required|integer',
            'phone_number' => 'required|string|max:20',
            'skill' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($employe->photo) {
                Storage::disk('public')->delete($employe->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $employe->update($data);

        return redirect()->route('employes.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Employee $employe)
    {
        if ($employe->photo) {
            Storage::disk('public')->delete($employe->photo);
        }

        $employe->delete();
        return redirect()->route('employes.index')->with('success', 'Data berhasil dihapus.');
    }
}
