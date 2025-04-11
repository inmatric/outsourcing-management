@extends('components.layouts.main-layout')

@section('title', 'Add New WorkTool')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Add New WorkTool</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('worktools.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- WorkTool Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">WorkTool Name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Contoh: Sapu, Vacuum Cleaner, dsb"
                    value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- SOP Description -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">SOP Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none resize-none"
                    placeholder="Contoh: Gunakan alat sesuai SOP, lalu bersihkan dan simpan kembali di tempat penyimpanan. Jelaskan kondisi akhir penggunaan alat." required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cleaning Purpose -->
            <div>
                <label for="purpose" class="block text-sm font-semibold text-gray-700 mb-1">Cleaning Purpose</label>
                <textarea id="purpose" name="purpose" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none resize-none"
                    placeholder="Contoh: Membersihkan debu di area ruang kelas, lobby, dan toilet." required>{{ old('purpose') }}</textarea>
                @error('purpose')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Image -->
            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Upload Gambar Alat</label>
                <input type="file" id="image" name="image"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition duration-300 shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Save WorkTool
                </button>
            </div>
        </form>
    </div>
@endsection
