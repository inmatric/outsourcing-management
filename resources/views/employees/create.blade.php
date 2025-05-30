@extends('components.layouts.main-layout')
@section('title', 'Tambah Karyawan')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Tambah Karyawan Baru</h1>

        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
            @csrf

            <!-- Name -->
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Karyawan</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                    required />
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-5">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                    required />
                @error('address')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Age -->
            <div class="mb-5">
                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                    required />
                @error('age')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-5">
                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                    Telepon</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                    required />
                @error('phone_number')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Card ID (File Upload) -->
            <div class="mb-5">
                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id
                    Card</label>
                <input accept=".svg,.png,.jpg,.jpeg,.gif"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" id="file_input" type="file" name="card_id" required />

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                    Format file: SVG, PNG, JPG, JPEG, atau GIF. Maksimal 2MB.
                </p>

                @error('card_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror


            </div>


            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Simpan Data Karyawan
            </button>
            <!-- Back Button -->
            <a href="{{ route('employees.index') }}"
                class="mt-4 inline-block text-center w-full bg-gray-300 text-gray-900 px-5 py-2.5 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Kembali
            </a>
        </form>
    </div>
@endsection