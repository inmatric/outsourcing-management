@extends('components.layouts.main-layout')
@section('title', 'Employee Evaluation')
@section('content')

<div class="max-w-6xl mx-auto p-6 mt-6 bg-white rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Employee Evaluations</h2>
    </div>

    <div class="flex justify-between items-center mb-6">
        <!-- Form Search -->
        <form action="{{ route('employeeevaluation.search') }}" method="GET"
            class="flex items-center space-x-2 w-full max-w-md">
            <div class="relative w-full">
                <input type="text" id="search" name="search" value="{{ request('search') }}"
                    class="block w-full p-2.5 pr-20 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search ">
                <button type="submit"
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    Search
                </button>
            </div>
        </form>

        <a href="{{ route('employeeevaluation.create') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ml-4">
            + Tambah Evaluation
        </a>
    </div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Employee Name</th>
                <th class="px-6 py-3">Evaluation Date</th>
                <th class="px-6 py-3">Information</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employeeevaluation as $index => $data)
            <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} border-b">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4">{{ $data->employee_name }}</td>
                <td class="px-6 py-4">{{ $data->evaluation_date }}</td>
                <td class="px-6 py-4">{{ $data->information }}</td>
                <td class="px-6 py-4 flex flex-wrap gap-2">
                    <a href="{{ route('employeeevaluation.edit', $data->id) }}">
                        <button type="button"
                            class="text-white bg-yellow-500 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2">
                            Edit
                        </button>
                    </a>
                    <form action="{{ route('employeeevaluation.destroy', $data->id) }}" method="POST"
                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                            Hapus
                        </button>
                    </form>
                    {{--
                            <a href="{{ route('employee.absences', $data->id) }}">
                    <button type="button"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                        Lihat Absensi
                    </button>
                    </a>
                    <a href="{{ route('employee.works', $data->id) }}">
                        <button type="button"
                            class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2">
                            Lihat Kerja
                        </button>
                    </a>
                    --}}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data evaluasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
