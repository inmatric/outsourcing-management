@extends('components.layouts.main-layout')

@section('title', 'Users')

@section('content')
<div class="max-w-md mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Email --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 @error('email') border-red-500 @enderror"
                required
            >
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Password (kosongkan jika tidak diubah)</label>
            <input
                type="password"
                name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 @error('password') border-red-500 @enderror"
            >
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Role --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
            <select
                name="role_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 @error('role_name') border-red-500 @enderror"
                required
            >
                <option value="admin" {{ old('role_name', $user->role_name) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role_name', $user->role_name) == 'user' ? 'selected' : '' }}>User</option>
                <option value="hrd" {{ old('role_name', $user->role_name) == 'hrd' ? 'selected' : '' }}>HRD</option>
            </select>
            @error('role_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2.5">Update</button>
    </form>
</div>
@endsection
