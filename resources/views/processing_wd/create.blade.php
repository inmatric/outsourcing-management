@extends('components.layouts.main-layout')
@section('title', 'Add New Task')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Add New Task</h1>

        <form action="#" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow space-y-6">
            {{-- @csrf --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Task Name -->
                <div>
                    <label for="task_name" class="block text-sm font-medium text-gray-700">Task Name</label>
                    <input type="text" id="task_name" name="task_name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Employee -->
                <div>
                    <label for="employee" class="block text-sm font-medium text-gray-700">Employee</label>
                    <input type="text" id="employee" name="employee" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Start Time -->
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                    <input type="datetime-local" id="start_time" name="start_time" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- End Time -->
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                    <input type="datetime-local" id="end_time" name="end_time"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="Pending">Pending</option>
                        <option value="In progress">In progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
            </div>

            <!-- Photo Before -->
            <div>
                <video id="cameraPreview" width="320" height="320" autoplay style="display:none;"></video>
                <canvas id="photoCanvas" width="320" height="240" style="display: none;"></canvas>

                <button id="startCamera">Akses Kamera</button>
                <button id="capturePhoto" style="display: none">Ambil Foto</button>

                <div id="photoResult"></div>
                <input type="hidden" name="photo_data" id="photoData">
            </div>
            
            <div>
                <label for="photo_before" class="block text-sm font-medium text-gray-700">Before Photo</label>
                <input type="file" id="photo_before" name="photo_before" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- Photo After -->
            <div>
                <label for="photo_after" class="block text-sm font-medium text-gray-700">After Photo</label>
                <input type="file" id="photo_after" name="photo_after" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex items-center space-x-3">
                <a href="{{ url('/processing_wd') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-md transition-colors">
                    Kembali
                </a>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition-colors">
                    Save Task
                </button>
            </div>
        </form>
    </div>
@endsection
