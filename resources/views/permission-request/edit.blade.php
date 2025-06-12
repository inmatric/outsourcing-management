@extends('components.layouts.main-layout')
@section('title', 'Edit Izin')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4">Edit Permission Request</h2>
        <form action="{{ route('permission-request.update', $permissionRequest->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="gap-6 mb-6 py-4">
                <div class="mb-4">
                    <label for="employee_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee</label>
                    <select id="employee_id" name="employee_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                        <option disabled>Select Employee</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ $permissionRequest->employee_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="izin_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission
                        Type</label>
                    <select id="izin_type" name="izin_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option hidden>Select Permission Type</option>
                        <option value="sick" {{ $permissionRequest->izin_type == 'sick' ? 'selected' : '' }}>Sick
                        </option>
                        <option value="leave" {{ $permissionRequest->izin_type == 'leave' ? 'selected' : '' }}>Leave</option>
                        <option value="personal" {{ $permissionRequest->izin_type == 'personal' ? 'selected' : '' }}>Personal
                        </option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
                        placeholder="Masukkan keterangan disini...">{{ old('description', $permissionRequest->description) }}</textarea>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="mb-4">
                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                            Date</label>
                        <input id="start_date" name="start_date" type="date"
                            value="{{ old('start_date', $permissionRequest->start_date) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                    </div>
                    <div class="mb-4">
                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                            Date</label>
                        <input id="end_date" name="end_date" type="date"
                            value="{{ old('end_date', $permissionRequest->end_date) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                    </div>
                </div>
                <div class="mb-4">
                    <label for="attachment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                        File</label>
                    @if ($permissionRequest->attachment)
                        <p class="mb-2 text-sm text-gray-600">Current File :
                            <a href="{{ asset('storage/' . $permissionRequest->attachment) }}" target="_blank"
                                class="text-blue-500 underline">Show File</a>
                        </p>
                    @endif
                    <input id="attachment" name="attachment" type="file"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" />
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                Save Changes
            </button>
        </form>
    </div>
@endsection
