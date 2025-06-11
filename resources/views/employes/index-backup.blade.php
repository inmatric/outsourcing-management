@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Employe</h1>
        <div class="flex gap-2">
            <form method="GET" action="{{ route('employes.index') }}">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" class="block w-64 pl-10 pr-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Cari nama employe...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/></svg>
                    </div>
                </div>
            </form>
            <a href="{{ route('employes.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">+ Tambah Employe</a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-100">{{ session('success') }}</div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-gray-100 uppercase bg-gray-500">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">User ID</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Address</th>
                    <th class="px-6 py-3">Age</th>
                    <th class="px-6 py-3">Phone</th>
                    <th class="px-6 py-3">Skill</th>
                    <th class="px-6 py-3">Photo</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employes as $employe)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $employe->id }}</td>
                    <td class="px-6 py-4">{{ $employe->user_id ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $employe->name }}</td>
                    <td class="px-6 py-4">{{ $employe->address }}</td>
                    <td class="px-6 py-4">{{ $employe->age }}</td>
                    <td class="px-6 py-4">{{ $employe->phone_number }}</td>
                    <td class="px-6 py-4">{{ $employe->skill }}</td>
                    <td class="px-6 py-4">
                        @if($employe->photo)
                            <img src="{{ asset('storage/' . $employe->photo) }}" class="w-12 h-12 object-cover rounded-full">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('employes.show', $employe->id) }}" class="text-green-600 hover:underline">Detail</a>
                            <a href="{{ route('employes.edit', $employe->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('employes.destroy', $employe->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline" type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
