<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('email') && $request->email != '') {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $users = $query->orderBy('email')->get();

        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_name' => 'required|in:admin,user,hrd',
        ]);

        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_name' => $validated['role_name'],
        ]);

        return redirect('/users')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_name' => 'required|in:admin,user,hrd',
        ]);

        $data = [
            'email' => $validated['email'],
            'role_name' => $validated['role_name'],
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/users')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users')->with('success', 'User berhasil dihapus.');
    }
}
