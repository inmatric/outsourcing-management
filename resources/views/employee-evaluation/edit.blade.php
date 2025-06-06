@extends('components.layouts.main-layout')
@section('title', 'Edit Evaluasi')
@section('content')

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow mt-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Employee Evaluation</h2>

        <form action="{{ route('employee-evaluation.update', $employeeEvaluation->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="mb-5">
                <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee</label>
                <select id="employee_id" name="employee_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    <option disabled>Select Employee</option>
                    @foreach ($employee as $data)
                        <option value="{{ $data->id }}"
                            {{ $employeeEvaluation->employee_id == $data->id ? 'selected' : '' }}>
                            {{ $data->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="block text-gray-700">Evaluation Date</label>
                <input type="date" name="evaluation_date" value="{{ $employeeEvaluation->evaluation_date }}"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
            </div>

            <div class="mb-5">
                <label class="block text-gray-700">Information</label>
                <textarea name="information" rows="4"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>{{ $employeeEvaluation->information }}</textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Submit
                </button>
                <a href="{{ route('employee-evaluation.index') }}"
                    class="text-white bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Cancel
                </a>
            </div>
        </form>

    </div>

@endsection
