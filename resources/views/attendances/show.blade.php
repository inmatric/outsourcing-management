@extends('components.layouts.main-layout')
@section('title', 'Attendance Detail')
@section('content')

    <p class="max-w-lg text-3xl font-semibold leading-loose text-gray-900 dark:text-white text-center">Attendance Detail</p>

    <div class="max-w-md mx-auto mt-8 space-y-4 p-6 bg-white rounded-md shadow-md dark:bg-gray-800 dark:text-white">
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Name:</label>
            <p class="mt-1">{{ $attendance->name ?? '-' }}</p>
        </div>
        <div>
            <label for="date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Date:</label>
            <p class="mt-1">{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</p>
        </div>
        <div>
            <label for="start_time" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Start Time:</label>
            <p class="mt-1">
                {{ $attendance->start_time ? \Carbon\Carbon::parse($attendance->start_time)->format('H:i:s') : '-' }}</p>
        </div>
        <div>
            <label for="end_time" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">End Time:</label>
            <p class="mt-1">
                {{ $attendance->end_time ? \Carbon\Carbon::parse($attendance->end_time)->format('H:i:s') : '-' }}</p>
        </div>
        <div>
            <label for="start_photo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Start
                Photo:</label>
            @if ($attendance->photo)
                <img src="{{ asset('storage/' . $attendance->photo) }}" alt="Start Photo"
                    class="mt-2 w-32 h-32 rounded-md object-cover">
            @else
                <p class="mt-1">-</p>
            @endif
        </div>
        <div>
            <label for="end_photo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">End Photo:</label>
            @if ($attendance->end_photo)
                <img src="{{ asset('storage/' . $attendance->end_photo) }}" alt="End Photo"
                    class="mt-2 w-32 h-32 rounded-md object-cover">
            @else
                <p class="mt-1">-</p>
            @endif
        </div>
        <div>
            <label for="keterangan" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Keterangan:</label>
            <p class="mt-1">{{ $attendance->keterangan ?? '-' }}</p>
        </div>
        <div class="mt-6">
            <a href="{{ route('attendances.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back
                to List</a>
        </div>
    </div>

@endsection