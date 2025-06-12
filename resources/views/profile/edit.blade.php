@extends('components.layouts.main-layout')

@section('title', 'Users')

@section('content')
    <div class="max-w-md mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('profileaction', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            @csrf
            @method('PUT')

            {{-- Email --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 @error('email') border-red-500 @enderror"
                    required>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Username --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2.5 @error('username') border-red-500 @enderror"
                    required>
                @error('username')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address --}}
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                <textarea name="address" rows="3"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2.5 @error('address') border-red-500 @enderror">{{ old('address', $user->address) }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- Role --}}
            {{-- <div>
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
        </div> --}}

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2.5">Update</button>
        </form>
    </div>
@endsection
