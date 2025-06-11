@extends('components.layouts.main-layout')
@section('title', 'Tambah Laporan Pekerjaan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Laporan</h1>

    <form action="{{ route('workreport.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow space-y-6">
        @csrf

        <div class="space-y-4">

            <!-- No Pegawai -->
            <div>
                <label for="employee_id" class="block text-sm font-medium text-gray-700">No Pegawai</label>
                <input type="text" id="employee_id" name="employee_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Nama Pegawai -->
            <div>
                <label for="employee_name" class="block text-sm font-medium text-gray-700">Nama Pegawai</label>
                <input type="text" id="employee_name" name="employee_name" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

           <!-- Tanggal -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" id="date" name="date" required
                value="{{ old('date', date('Y-m-d')) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>


        <!-- Deskripsi Pekerjaan -->
        <div>
            <label for="work_description" class="block text-sm font-medium text-gray-700">Deskripsi Pekerjaan</label>
            <textarea id="work_description" name="work_description" rows="3" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <!-- Masalah Ditemukan -->
        <div>
            <label for="problem_found" class="block text-sm font-medium text-gray-700">Masalah Ditemukan</label>
            <textarea id="problem_found" name="problem_found" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500"></textarea>
        </div>

        <!-- Tindakan -->
        <div>
            <label for="action" class="block text-sm font-medium text-gray-700">Tindakan</label>
            <textarea id="action" name="action" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
        </div>

        <!-- Foto -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Foto</label>
            <input type="file" id="image" name="image" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <!-- Tombol -->
        <div class="pt-4 flex items-center space-x-3">
            <a href="{{ url('/workreport') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-md transition-colors">
                Kembali
            </a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition-colors cursor-pointer">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
