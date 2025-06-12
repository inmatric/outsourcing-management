<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|min:6',
        ]);

        $data = [
            'username' => $validated['username'],
            'email' => $validated['email'],
            'address' => $validated['address'] ?? $user->address, // pakai yang lama jika kosong
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }
        // dd($data);

        $user->update($data);

return redirect()->route('profileform', ['id' => $user->id])
                 ->with('success', 'Profile berhasil diperbarui.');
    }
}
