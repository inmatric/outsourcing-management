@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')

<h2 class="text-2xl font-extrabold text-gray-800 dark:text-white mb-2">
    Offence Table
</h2>

<!-- Search + Add Button Row -->
<div class="flex justify-between items-center mb-4">
    <!-- Search bar -->
    <form class="w-full max-w-md">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search employee..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    <a href="{{ route('offence.create') }}" class="ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Add Offence
    </a>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">No.</th>
                <th scope="col" class="px-6 py-3">Employee Name</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Offence Category</th>
                <th scope="col" class="px-6 py-3">Offence Description</th>
                <th scope="col" class="px-6 py-3">Image</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($offences as $index => $offence)
                <tr class="{{ $index % 2 == 0 ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }} border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $offence->employe_name }}</td>
                    <td class="px-6 py-4">{{ $offence->date }}</td>
                    <td class="px-6 py-4">{{ $offence->offence_category }}</td>
                    <td class="px-6 py-4">{{ $offence->offence_description }}</td>
                    <td class="px-6 py-4">
                        @if ($offence->image)
                            <img src="{{ asset('storage/' . $offence->image) }}" alt="Offence Image" class="w-20 h-auto rounded shadow">
                        @else
                            <span class="text-gray-400 italic">No image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <!-- Delete Button -->
                        <form action="{{ route('offence.destroy', $offence->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this offence?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>

                        <!-- Edit Button -->
                        <a href="{{ route('offence.edit', $offence->id) }}" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 dark:focus:ring-yellow-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5h2M4 20h16M14.828 3.172a4 4 0 115.656 5.656L8.586 20H4v-4.586l10.828-10.828z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500 dark:text-gray-400 italic">
                        No offence data found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
