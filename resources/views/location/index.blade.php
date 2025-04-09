@extends('components.layouts.main-layout')
@section('title', 'Location')
@section('content')

<div class="container mx-auto px-4 py-6">
    <!-- Judul Halaman dan Tombol Tambah -->
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Daftar Lokasi</h1>
        <a href="{{ route('location.create') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
            <i class="fas fa-plus mr-2"></i>Tambah
        </a>
    </div>

    <!-- Tabel -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-100 text-gray-600">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">Perusahaan</th>
                    <th scope="col" class="px-6 py-3 text-center">Lokasi</th>
                    <th scope="col" class="px-6 py-3 text-center">Informasi</th>
                    <th scope="col" class="px-6 py-3 text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-center font-medium text-gray-900">
                        {{ $location->company }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $location->location }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $location->information }}
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <!-- Tombol Edit -->
                        <a href="{{ route('location.edit', $location->id) }}"
                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:ring-2 focus:outline-none focus:ring-blue-300">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>

                        <!-- Tombol Delete -->
                        <form action="{{ route('location.destroy', $location->id) }}"
                            method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')"
                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
                                <i class="fas fa-trash mr-1"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Script edit -->


<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

@endsection