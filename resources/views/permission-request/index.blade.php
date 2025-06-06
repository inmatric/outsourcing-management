@extends('components.layouts.main-layout')

@section('title', 'Pending Permission Request Data')

@section('content')

    <div class="p-6 bg-white rounded-lg shadow">
        {{-- User sessions --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- heading --}}
        <h2 class="text-4xl font-bold dark:text-white my-6">Pending Permission Request Data</h2>

        {{-- table header --}}
        <div class=" bg-white shadow-md dark:bg-gray-800 sm:rounded-lg my-4">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form method="GET" action="{{ route('users.index') }}" class="flex items-center relative">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" name="employee_name"
                                value="{{ request('employee_name') }}"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search by employee name...">
                        </div>
                    </form>
                </div>

                <div
                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">

                    @if ($role != 'hrd')
                        <a href="{{ url('/permission-request/create') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Add Permission</a>
                    @endif

                    <div class="flex items-center w-full space-x-3 md:w-auto">
                    </div>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">NO</th>
                        <th class="px-4 py-3">Employee Name</th>
                        <th class="px-4 py-3">Izin Type</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Start Date</th>
                        <th class="px-4 py-3">End Date</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Submitted At</th>
                        <th class="px-4 py-3">Approved By</th>
                        <th class="px-4 py-3">Approved At</th>
                        <th class="px-4 py-3">Attachment</th>
                        @if ($role != 'hrd')
                            <th class="px-4 py-3">Action</th>
                        @endif

                    </tr>
                </thead>
                <tbody>

                    @foreach ($permissions as $item)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $item->employee->name }}</td>
                            <td class="px-4 py-3">{{ $item->izin_type }}</td>
                            <td class="px-4 py-3">{{ $item->description }}</td>
                            <td class="px-4 py-3">{{ $item->start_date }}</td>
                            <td class="px-4 py-3">{{ $item->end_date }}</td>
                            <td class="px-4 py-3">{{ $item->status }}</td>
                            <td class="px-4 py-3">{{ $item->submitted_at }}</td>
                            <td class="px-4 py-3">{{ $item->approver?->role_name ?? '-' }}</td>
                            <td class="px-4 py-3">
                                @if ($role === 'hrd' && $item->status === 'pending')
                                    <form action="{{ url('/permission-request/' . $item->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="approve_action" value="approve">
                                        <button type="submit" class="text-green-600 hover:underline">Terima</button>
                                    </form>
                                    <form action="{{ url('/permission-request/' . $item->id) }}" method="POST"
                                        class="inline ml-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="approve_action" value="reject">
                                        <button type="submit" class="text-red-600 hover:underline">Tolak</button>
                                    </form>
                                @else
                                    {{ $item->approved_at ?? '-' }}
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if ($item->attachment)
                                    <a href="{{ asset('storage/' . $item->attachment) }}" target="_blank"
                                        class="text-blue-500 underline">Lihat File</a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>

                            @if ($role != 'hrd')
                                <td class="px-6 py-4 flex items-center gap-3">
                                    @if ($item->status != 'disetujui')
                                        <a href="{{ url('/permission-request/' . $item->id . '/edit') }}"
                                            class="text-blue-600 hover:text-blue-800">
                                            {{-- Icon edit --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.5H3v-4.5L16.862 3.487z" />
                                            </svg>
                                        </a>
                                    @endif

                                    <form action="{{ url('/permission-request/' . $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            {{-- Icon trash --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
