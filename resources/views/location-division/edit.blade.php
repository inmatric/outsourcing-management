@extends('components.layouts.main-layout')

@section('title', 'Edit LocationDivision')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Location Division</h2>

        <form action="{{ route('location-division.update', $locationDivision->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Nama Pegawai -->
            <div class="mb-4">
                <label for="employee_name" class="block text-sm font-medium text-gray-700">Employee Name</label>
                <input type="text" name="employee_name" id="employee_name" value="{{ old('employee_name', $locationDivision->employee_name) }}"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                @error('employee_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Perusahaan -->
            <div class="mb-4">
                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                <select name="company" id="company"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Select Company --</option>
                    @foreach (['Politeknik Negeri Cilacap', 'PT Sukses Bersama', 'PT Maju Jaya', 'CV Karya Abadi', 'PT Cipta Solusi'] as $company)
                        <option value="{{ $company }}" {{ old('company', $locationDivision->company) == $company ? 'selected' : '' }}>{{ $company }}</option>
                    @endforeach
                </select>
                @error('company')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lokasi -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <select name="location" id="location"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Select Location --</option>
                    @foreach (['Lantai 3 Gedung A', 'Lantai 2 Gedung B', 'Kantor Pusat', 'Perpustakaan', 'Ruang Meeting 1', 'Gedung C Lantai Dasar'] as $location)
                        <option value="{{ $location }}" {{ old('location', $locationDivision->location) == $location ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipe Pekerjaan -->
            <div class="mb-4">
                <label for="work_type" class="block text-sm font-medium text-gray-700">Job Type</label>
                <select name="work_type" id="work_type"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Select Job Type --</option>
                    @foreach (['OB', 'Security', 'Cleaning Service', 'Teknisi', 'Petugas Taman'] as $type)
                        <option value="{{ $type }}" {{ old('work_tipe', $locationDivision->work_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @error('work_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Detail Pekerjaan -->
            <div class="mb-4">
                <label for="work_detail" class="block text-sm font-medium text-gray-700">Job Detail</label>
                <select name="work_detail" id="work_detail"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Select Job Detail --</option>
                    @foreach ([
                        'Membersihkan kamar mandi',
                        'Menyapu halaman',
                        'Mengantar dokumen',
                        'Menjaga pintu masuk',
                        'Memeriksa peralatan listrik',
                        'Patroli Keliling',
                    ] as $detail)
                        <option value="{{ $detail }}" {{ old('work_detail', $locationDivision->work_detail) == $detail ? 'selected' : '' }}>{{ $detail }}</option>
                    @endforeach
                </select>
                @error('work_detail')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="in_progress" {{ old('status', $locationDivision->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $locationDivision->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end mt-6">
                <a href="{{ route('location-division.index') }}"
                    class="mr-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Update</button>
            </div>
        </form>
    </div>
@endsection
