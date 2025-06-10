@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')
<div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Work Equipment Data</h2>

    <form action="{{ route('workequipment.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Employee ID --}}
        <div>
            <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee ID</label>
            <input type="text" name="employee_id" id="employee_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                          focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
        </div>

        {{-- Employee Name --}}
        <div>
            <label for="employee_name" class="block text-sm font-medium text-gray-700">Employee Name</label>
            <input type="text" name="employee_name" id="employee_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                          focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
        </div>

        {{-- Position --}}
        <div>
            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
            <input type="text" name="position" id="position"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                          focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
        </div>

        {{-- Location --}}
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                          focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
        </div>

        {{-- Equipment --}}
        <div>
            <label for="equipment" class="block text-sm font-medium text-gray-700">Equipment</label>
            <input type="text" name="equipment" id="equipment"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                          focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
        </div>

        {{-- Condition --}}
        <div>
            <label for="condition" class="block text-sm font-medium text-gray-700">Condition</label>
            <select name="condition" id="condition"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                           focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                <option value="">-- Select Condition --</option>
                <option value="Good">Good</option>
                <option value="Damaged">Damaged</option>
            </select>
        </div>

        {{-- Buttons --}}
        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('workequipment.index') }}"
                class="text-gray-700 border border-gray-300 hover:bg-gray-100 font-medium 
                      rounded-lg text-sm px-4 py-2">
                Cancel
            </a>
            <button type="submit"
                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none 
                           focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">
                Save
            </button>
        </div>
    </form>
</div>

@endsection