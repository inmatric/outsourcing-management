@extends('components.layouts.main-layout')
@section('title', 'Edit Employee Contract')
@section('content')

    <div class="">
        {{-- breadcrumb --}}
        <nav class="flex my-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Employee</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ url('/employee-contract') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Employee
                            Contract</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                            Edit Employee Contract</span>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- heading --}}
        <h2 class="text-3xl font-bold dark:text-white my-6">Employee Contract</h2>

        {{-- forms --}}
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg p-6 mx-auto w-full">

            <form id="contractForm" class="max-w-3xl mx-auto"
                action="{{ route('employee-contract.update', $contract->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- heading --}}
                <h3 class="text-2xl font-semibold dark:text-white my-6 mx-auto justify-center flex">Edit Employee Contract
                    Data</h3>

                <!-- Alert -->
                @if ($errors->any())
                    <div
                        class="p-4 mb-6 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
                        <strong class="font-bold">Oops! Something went wrong:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="flex items-center p-4 mb-8 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800 mt-6"
                        role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div>
                            <span class="font-medium">NOTE!</span>
                            <p>Update the employee contract data carefully. Incorrect changes may affect employment records.
                            </p>
                        </div>
                    </div>
                @endif

                <!-- Employee -->
                <div class="flex flex-col gap-6 mb-6 md:flex-row">
                    <div class="w-full">
                        <label for="employee_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee</label>
                        <select id="employee_id" name="employee_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                            <option disabled>Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ $contract->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Contract Number -->
                <div class="mb-5">
                    <label for="contract_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contract Number</label>
                    <input type="text" id="contract_number" name="contract_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                        required value="{{ $contract->contract_number }}" />
                    @error('contract_number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dates -->
                <div class="flex flex-col gap-6 mb-6 md:flex-row">
                    <div class="md:w-1/2">
                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                            Date</label>
                        <input type="date" id="start_date" name="start_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                            required value="{{ $contract->start_date }}" />
                        @error('start_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:w-1/2">
                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                            Date</label>
                        <input type="date" id="end_date" name="end_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                            required value="{{ $contract->end_date }}" />
                        @error('end_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Position -->
                <div class="mb-5">
                    <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your
                        Position</label>
                    <select id="position" name="position"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                        <option disabled hidden>Position</option>
                        <option value="Cleaning Service"
                            {{ $contract->position == 'Cleaning Service' ? 'selected' : '' }}>
                            Cleaning Service</option>
                        <option value="Security" {{ $contract->position == 'Security' ? 'selected' : '' }}>Security
                        </option>
                    </select>
                </div>

                <!-- Location -->
                <div class="mb-5">
                    <label for="location_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <select id="location_id" name="location_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                        <option disabled>Select Location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}"
                                {{ $contract->location_id == $location->id ? 'selected' : '' }}>
                                {{ $location->location }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Working Hours -->
                <div class="mb-5">
                    <label for="working_hours" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        Working Hours</label>
                    <select id="working_hours" name="working_hours"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                        <option disabled hidden>Working Hours</option>
                        <option value="full-time" {{ $contract->working_hours == 'full-time' ? 'selected' : '' }}>
                            Full-time</option>
                        <option value="part-time" {{ $contract->working_hours == 'part-time' ? 'selected' : '' }}>
                            Part-time</option>
                        <option value="shift-based" {{ $contract->working_hours == 'shift-based' ? 'selected' : '' }}>
                            Shift-based</option>
                    </select>
                </div>

                <!-- Salary -->
                <div class="mb-5">
                    <label for="salary"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salary</label>
                    <input type="text" id="salary" name="salary"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                        required value="{{ $contract->salary }}" />
                </div>

                <!-- Status -->
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <div class="flex">
                        <div class="flex items-center me-4">
                            <input id="status-active" type="radio" value="active" name="status"
                                {{ $contract->status == 'active' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="status-active"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="status-inactive" type="radio" value="inactive" name="status"
                                {{ $contract->status == 'inactive' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="status-inactive"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input id="status-terminated" type="radio" value="terminated" name="status"
                                {{ $contract->status == 'terminated' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                            <label for="status-terminated"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Terminated</label>
                        </div>
                    </div>
                </div>

                <!-- Contract File -->
                <div class="mb-5">
                    <label for="contract_file"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contract File</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600"
                        id="contract_file" name="contract_file" type="file">
                    @if ($contract->contract_file)
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Current file: <a
                                href="{{ asset('storage/' . $contract->contract_file) }}" target="_blank"
                                class="text-blue-600 underline">View file</a></p>
                    @endif
                    @error('contract_file')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">Update</button>
                </div>
            </form>



        </div>
    </div>

@endsection
