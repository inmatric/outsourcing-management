@extends('components.layouts.main-layout')

@section('title', 'Location Division')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Location Division</h2>

        <!-- Data Location Division -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($data as $location)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="font-semibold text-lg text-gray-800">{{ $location->employee->name }}</h3>
                    <p class="text-sm text-gray-600">Company : {{ $location->cooperation->company_name }}</p>
                    <p class="text-sm text-gray-600">Location : {{ $location->location->location }}</p>
                    <p class="text-sm text-gray-600">Work Type : {{ $location->work->work_type }}</p>
                    <p class="text-sm text-gray-600">Detail Work : {{ $location->detail_work }}</p>

                    <!-- Status Section -->
                    <form action="{{ route('location-division.update-status', $location->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col">
                            <label for="status" class="text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 p-2 border rounded-md">
                                <option value="in_progress" {{ $location->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $location->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded-md">Update Status</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </div>
@endsection
