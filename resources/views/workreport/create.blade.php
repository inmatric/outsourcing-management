@extends('components.layouts.main-layout')
@section('title', 'Tambah Laporan Pekerjaan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Add Work Report</h1>

    <form action="{{ route('workreport.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow space-y-6">
        @csrf

        <div class="space-y-4">

            <div>
                <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee Name</label>
                <select id="employee_id" name="employee_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('employee_id') border-red-500 @enderror">
                    <option value="">-- Select Employee --</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                    @endforeach
                </select>
                @error('employee_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" id="date" name="date" required
                    value="{{ old('date', date('Y-m-d')) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('date') border-red-500 @enderror">
                @error('date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="work_description" class="block text-sm font-medium text-gray-700">Work Description</label>
                <textarea id="work_description" name="work_description" rows="3" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('work_description') border-red-500 @enderror">{{ old('work_description') }}</textarea>
                @error('work_description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="problem_found" class="block text-sm font-medium text-gray-700">Problem Found</label>
                <textarea id="problem_found" name="problem_found" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 @error('problem_found') border-red-500 @enderror">{{ old('problem_found') }}</textarea>
                @error('problem_found')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="action" class="block text-sm font-medium text-gray-700">Problem Action</label>
                <textarea id="action" name="action" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 @error('action') border-red-500 @enderror">{{ old('action') }}</textarea>
                @error('action')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 flex items-center space-x-3">
                <a href="{{ url('/workreport') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-md transition-colors">
                    Back
                </a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition-colors cursor-pointer">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
@endsection