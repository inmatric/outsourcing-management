@extends('components.layouts.main-layout')
@section('title', 'Attendance')
@section('content')

    <p class="max-w-lg text-3xl font-semibold leading-loose text-gray-900 dark:text-white">Attendance Table</p>
    <div class="flex items-center space-x-4 w-full">

        <!-- <form class="max-w-md mb-6 w-full ">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search." required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form> -->

        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">Add <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="{{ route('attendances.create', ['type' => 'start']) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        Start Time
                    </a>
                </li>
                <li>
                    <a href="{{ route('attendances.creates', ['type' => 'end']) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        End Time
                    </a>
                </li>

            </ul>
        </div>

    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Name
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Date
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Start Time
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            End Time
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            start photo
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            end photo
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <!-- <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Keterangan
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M8.57 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                                </svg></a>
                                        </div>
                                    </th> -->
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Action
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $attendance)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 text-gray-900 dark:text-white">
                                {{ $attendance->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($attendance->start_time)
                                                @php
                                                    $startTime = \Carbon\Carbon::parse($attendance->start_time);
                                                    $earliestStartTime = \Carbon\Carbon::parse('07:00:00');
                                                    $latestStartTime = \Carbon\Carbon::parse('09:00:00');
                                                    $isLateStart = $startTime->gt($latestStartTime);
                                                    $backgroundColorStart = $isLateStart ? 'bg-red-200' : 'bg-green-200';
                                                @endphp
                                                <span class="{{ $backgroundColorStart }} px-2 py-1 rounded">
                                                    {{ $startTime->format('H:i:s') }}
                                                </span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($attendance->end_time)
                                                @php
                                                    $endTime = \Carbon\Carbon::parse($attendance->end_time);
                                                    $earliestEndTime = \Carbon\Carbon::parse('13:00:00');
                                                    $latestEndTime = \Carbon\Carbon::parse('20:00:00');
                                                    $isInvalidEnd = $endTime->lt($earliestEndTime) || $endTime->gt($latestEndTime);
                                                    $backgroundColorEnd = $isInvalidEnd ? 'bg-red-200' : 'bg-green-200';
                                                @endphp
                                                <span class="{{ $backgroundColorEnd }} px-2 py-1 rounded">
                                                    {{ $endTime->format('H:i:s') }}
                                                </span>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($attendance->photo)
                                    <a href="{{ asset('storage/' . $attendance->photo) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $attendance->photo) }}" alt="Photo"
                                            class="w-12 h-12 rounded-md object-cover">
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($attendance->end_photo)
                                    <a href="{{ asset('storage/' . $attendance->end_photo) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $attendance->end_photo) }}" alt="Photo"
                                            class="w-12 h-12 rounded-md object-cover">
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <!-- <td class="px-6 py-4">
                                                                                {{ $attendance->keterangan ?? '-' }}
                                                                            </td> -->
                            <td class="px-6 py-4 text-right flex space-x-4">
                                <!-- <a href="{{ route('attendances.edit', $attendance->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> -->
                                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau hapus data ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">No data available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection