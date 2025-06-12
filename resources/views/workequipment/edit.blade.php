@extends('components.layouts.main-layout')

@section('title', 'Work Equipment - Edit') {{-- Mengubah title --}}

@section('content')
    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Work Equipment Data</h2>

        <form action="{{ route('workequipment.update', $workequipment->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Employee --}}
            <div>
                <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee Name</label>
                <select name="employee_id" id="employee_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                            focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                    <option value="">-- Select Employee --</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('employee_id', $workequipment->employee_id) == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
                @error('employee_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Location --}}
            <div>
                <label for="location_id" class="block text-sm font-medium text-gray-700">Location</label>
                <select name="location_id" id="location_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                            focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                    <option value="">-- Select Location --</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id', $workequipment->location_id) == $location->id ? 'selected' : '' }}>
                            {{ $location->location }}
                        </option>
                    @endforeach
                </select>
                @error('location_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Work Name --}}
<div>
    <label for="work_id" class="block text-sm font-medium text-gray-700">Work Name</label>
    <select name="work_id" id="work_id"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
        <option value="">-- Select work --</option>
        @foreach ($works as $work)
            <option value="{{ $work->id }}" {{ old('work_id', $workequipment->work_id) == $work->id ? 'selected' : '' }}>
                {{ $work->job_name }}
            </option>
        @endforeach
    </select>
    @error('work_id')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>


            {{-- Equipment --}}
            <div>
                <label for="equipment" class="block text-sm font-medium text-gray-700">Equipment</label>
                <input type="text" name="equipment" id="equipment"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    value="{{ old('equipment', $workequipment->equipment) }}" required>
                @error('equipment')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Condition --}}
            <div>
                <label for="condition" class="block text-sm font-medium text-gray-700">Condition</label>
                <select name="condition" id="condition"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required>
                    <option value="">-- Select Condition --</option>
                    <option value="Good" {{ old('condition', $workequipment->condition) == 'Good' ? 'selected' : '' }}>Good</option>
                    <option value="Damaged" {{ old('condition', $workequipment->condition) == 'Damaged' ? 'selected' : '' }}>Damaged</option>
                </select>
                @error('condition')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('workequipment.index') }}" class="text-gray-700 border border-gray-300 hover:bg-gray-100 font-medium rounded-lg text-sm px-4 py-2">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600 text-white font-medium rounded-lg text-sm px-4 py-2 hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
