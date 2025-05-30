@extends('components.layouts.main-layout')
@section('title', 'Detail Karyawan')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Detail Karyawan</h1>

        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-white">Nama:</label>
                <p class="text-gray-900 dark:text-gray-200">{{ $employee->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-white">Alamat:</label>
                <p class="text-gray-900 dark:text-gray-200">{{ $employee->address }}</p>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-white">Usia:</label>
                <p class="text-gray-900 dark:text-gray-200">{{ $employee->age }} tahun</p>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-white">Nomor Telepon:</label>
                <p class="text-gray-900 dark:text-gray-200">{{ $employee->phone_number }}</p>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-white">Kartu Identitas:</label><br>
                @if ($employee->card_id)
                    <img src="{{ Storage::url($employee->card_id) }}" alt="Card ID" class="w-64 rounded shadow-md">

                @else
                    <p class="text-gray-500 dark:text-gray-400">Belum ada kartu identitas.</p>
                @endif
            </div>

            <a href="{{ route('employees.index') }}"
                class="mt-6 inline-block bg-gray-300 text-gray-900 px-5 py-2.5 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Kembali
            </a>
        </div>
    </div>
@endsection