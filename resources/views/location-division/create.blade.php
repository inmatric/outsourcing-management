@extends('components.layouts.main-layout')

@section('title', 'Tambah LocationDivision')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Add New Location Division</h2>

        <form action="{{ route('location-division.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Nama Pegawai -->
            <div class="mb-4">
                <label for="employee_name" class="block text-sm font-medium text-gray-700">Employee Name</label>
                <input type="text" name="employee_name" id="employee_name" value="{{ old('employee_name') }}"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    placeholder="">
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
                    <option value="Politeknik Negeri Cilacap"
                        {{ old('company') == 'Politeknik Negeri Cilacap' ? 'selected' : '' }}>Politeknik Negeri Cilacap
                    </option>
                    <option value="PT Sukses Bersama" {{ old('company') == 'PT Sukses Bersama' ? 'selected' : '' }}>PT
                        Sukses Bersama</option>
                    <option value="PT Maju Jaya" {{ old('company') == 'PT Maju Jaya' ? 'selected' : '' }}>PT Maju Jaya
                    </option>
                    <option value="CV Karya Abadi" {{ old('company') == 'CV Karya Abadi' ? 'selected' : '' }}>CV Karya Abadi
                    </option>
                    <option value="PT Cipta Solusi" {{ old('company') == 'PT Cipta Solusi' ? 'selected' : '' }}>PT Cipta
                        Solusi</option>
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
                    <option value="Lantai 3 Gedung A" {{ old('location') == 'Lantai 3 Gedung A' ? 'selected' : '' }}>Lantai
                        3 Gedung A</option>
                    <option value="Lantai 2 Gedung B" {{ old('location') == 'Lantai 2 Gedung B' ? 'selected' : '' }}>Lantai
                        2 Gedung B</option>
                    <option value="Kantor Pusat" {{ old('location') == 'Kantor Pusat' ? 'selected' : '' }}>Kantor Pusat
                    </option>
                    <option value="Perpustakaan" {{ old('location') == 'Perpustakaan' ? 'selected' : '' }}>Perpustakaan
                    </option>
                    <option value="Ruang Meeting 1" {{ old('location') == 'Ruang Meeting 1' ? 'selected' : '' }}>Ruang
                        Meeting 1</option>
                    <option value="Gedung C Lantai Dasar"
                        {{ old('location') == 'Gedung C Lantai Dasar' ? 'selected' : '' }}>Gedung C Lantai Dasar</option>
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
                    <option value="OB" {{ old('work_type') == 'OB' ? 'selected' : '' }}>OB</option>
                    <option value="Security" {{ old('work_type') == 'Security' ? 'selected' : '' }}>Security</option>
                    <option value="Cleaning Service" {{ old('work_type') == 'Cleaning Service' ? 'selected' : '' }}>
                        Cleaning Service</option>
                    <option value="Teknisi" {{ old('work_type') == 'Teknisi' ? 'selected' : '' }}>Teknisi</option>
                    <option value="Petugas Taman" {{ old('work_type') == 'Petugas Taman' ? 'selected' : '' }}>Petugas Taman
                    </option>
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
                    <option value="Membersihkan kamar mandi"
                        {{ old('work_detail') == 'Membersihkan kamar mandi' ? 'selected' : '' }}>Membersihkan kamar mandi
                    </option>
                    <option value="Menyapu halaman" {{ old('work_detail') == 'Menyapu halaman' ? 'selected' : '' }}>Menyapu
                        halaman</option>
                    <option value="Mengantar dokumen" {{ old('work_detail') == 'Mengantar dokumen' ? 'selected' : '' }}>
                        Mengantar dokumen</option>
                    <option value="Menjaga pintu masuk"
                        {{ old('work_detail') == 'Menjaga pintu masuk' ? 'selected' : '' }}>Menjaga pintu masuk</option>
                    <option value="Memeriksa peralatan listrik"
                        {{ old('work_detail') == 'Memeriksa peralatan listrik' ? 'selected' : '' }}>Memeriksa peralatan
                        listrik</option>
                    <option value="Patroli Keliling"
                        {{ old('work_detail') == 'Patroli Keliling' ? 'selected' : '' }}>Patroli Keliling</option>
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
                    <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end mt-6">
                <a href="{{ route('location-division.index') }}"
                    class="mr-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
@endsection
