@extends('components.layouts.main-layout')

@section('title', 'Add LocationDivision')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Add New Location Division</h2>

        <form action="{{ route('location-division.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Nama Pegawai -->
            {{-- <div class="mb-4">
                <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee Name</label>
                <select name="employee_id" id="employee_id"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Select Employee --</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
                @error('employee_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            <!-- Nama Perusahaan -->
            <div class="mb-4">
                <label for="cooperation_id" class="block text-sm font-medium text-gray-700">Company</label>
                <select name="cooperation_id" id="cooperation_id"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Select Company --</option>
                    @foreach ($cooperations as $cooperation)
                        <option value="{{ $cooperation->id }}"
                            {{ old('cooperation_id') == $cooperation->id ? 'selected' : '' }}>
                            {{ $cooperation->company_name }}
                        </option>
                    @endforeach
                </select>
                @error('cooperation_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lokasi -->
            <div class="mb-4">
                <label for="location_id" class="block text-sm font-medium text-gray-700">Location</label>
                <select name="location_id" id="location_id"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Select Location --</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                            {{ $location->location }}
                        </option>
                    @endforeach
                </select>
                @error('location_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jenis Pekerjaan -->
            {{-- <div class="mb-4">
                <label for="work_id" class="block text-sm font-medium text-gray-700">Work Type</label>
                <select name="work_id" id="work_id"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"> required
                    <option value="">-- Select Work Type --</option>
                    @foreach ($works as $work)
                        <option value="{{ $work->id }}" {{ old('work_id') == $work->id ? 'selected' : '' }}>
                            {{ $work->work_type }}
                        </option>
                    @endforeach
                </select>
                @error('work_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            <!-- Detail Pekerjaan -->
            {{-- <div class="mb-4">
                <label for="work_detail" class="block text-sm font-medium text-gray-700">Work Detail</label>
                <select name="work_detail" id="work_detail"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"required>
                    <option value="">-- Select Work Detail --</option>
                    @foreach ($works as $work)
                        <option value="{{ $work->work_detail }}"
                            {{ old('work_detail') == $work->work_detail ? 'selected' : '' }}>
                            {{ $work->work_detail }}
                        </option>
                    @endforeach
                </select>
                @error('work_detail')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            <!-- Status (hidden - default: in_progress) -->
            <input type="hidden" name="status" value="in_progress">

            <!-- Tombol Aksi -->
            <div class="flex justify-end mt-6">
                <a href="{{ route('location-division.index') }}"
                    class="mr-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
@endsection
