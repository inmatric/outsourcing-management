@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')

<div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6 text-center">Add Offence</h2>

    {{-- Bagian ini akan menampilkan semua error validasi secara umum --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops! Ada masalah dengan input Anda:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('offence.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Employee
            </label>
            <select id="employee_id" name="employee_id"
                class="bg-gray-50 border {{ $errors->has('employee_id') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <option selected disabled>Select Employee</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}"
                        {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}
                    </option>
                @endforeach
            </select>
            {{-- Pesan error spesifik untuk employee_id --}}
            @error('employee_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Date
            </label>
            <input type="date" name="date" id="date"
                class="block w-full p-3 text-gray-900 border {{ $errors->has('date') ? 'border-red-500' : 'border-gray-300' }} rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                value="{{ old('date') }}" {{-- Tambahkan old() untuk mempertahankan input --}}
                required>
            {{-- Pesan error spesifik untuk date --}}
            @error('date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="offence_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Offence Category
            </label>
            <select name="offence_category" id="offence_category"
                class="block w-full p-3 text-gray-900 border {{ $errors->has('offence_category') ? 'border-red-500' : 'border-gray-300' }} rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                required>
                <option value="" disabled {{ !old('offence_category') ? 'selected' : '' }}>Select offence category</option> {{-- Perbaiki selected --}}
                <option value="Light" {{ old('offence_category') == 'Light' ? 'selected' : '' }}>Light</option>
                <option value="Medium" {{ old('offence_category') == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Heavy" {{ old('offence_category') == 'Heavy' ? 'selected' : '' }}>Heavy</option>
            </select>
            {{-- Pesan error spesifik untuk offence_category --}}
            @error('offence_category')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="offence_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Offence Description
            </label>
            <textarea name="offence_description" id="offence_description" rows="3"
                class="block w-full p-3 text-sm text-gray-900 border {{ $errors->has('offence_description') ? 'border-red-500' : 'border-gray-300' }} rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Describe the offence..." required>{{ old('offence_description') }}</textarea> {{-- Pertahankan input --}}
            {{-- Pesan error spesifik untuk offence_description --}}
            @error('offence_description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Upload Image (optional)
            </label>
            <input type="file" name="image" id="image"
                class="block w-full text-sm text-gray-900 border {{ $errors->has('image') ? 'border-red-500' : 'border-gray-300' }} rounded-lg cursor-pointer bg-gray-50 dark:text-white dark:bg-gray-700 dark:border-gray-600">
            {{-- Pesan error spesifik untuk image --}}
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ url('/offences') }}">
                <button type="button"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Back
                </button>
            </a>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                Submit
            </button>
        </div>
    </form>
</div>

@endsection