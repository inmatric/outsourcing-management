@extends('components.layouts.main-layout')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white shadow-xl rounded-2xl p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Tambah Barang Ditemukan</h2>

        <form action="{{ route('itemfound.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-5">
            @csrf

            @if ($errors->any())
                    <div
                        class="p-4 mb-6 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                        <strong class="font-bold">Oops! Something went wrong:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
<div class="flex items-center p-4 mb-8 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800 mt-6"
                        role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">NOTE!</span>
                            <p>Please make sure to fill in all fields in the 'Add
                                Employee Contract' form carefully. Missing or incorrect information may cause delays.</p>
                        </div>
                    </div>
                @endif
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Penemu</label>
                <input type="text" name="find_name" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama Barang</label>
                <input type="text" name="item_name" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
            </div>

              <div>
            <label class="block text-gray-700 font-medium mb-1">Lokasi Temuan</label>
            <select name="find_location" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                <option value="">-- Pilih Lokasi --</option>
                @foreach($locations as $location)
                    <option value="{{ $location->location }}">{{ $location->location }}</option>
                @endforeach
            </select>
        </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Tanggal Ditemukan</label>
                <input type="date" name="find_date" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">No. Telepon</label>
                <input type="text" name="telephone" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Foto Barang</label>
                <input type="file" name="photo" class="w-full border border-gray-300 rounded-xl px-4 py-2 file:bg-gray-100 file:px-3 file:py-2 file:rounded-md file:text-sm file:border-none focus:ring-2 focus:ring-green-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <option value="belum_diambil">Belum Diambil</option>
                    <option value="diambil">Diambil</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required></textarea>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2.5 rounded-xl font-semibold shadow-md transition">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
