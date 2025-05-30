@extends('components.layouts.main-layout')
@section('title', 'Daftar Karyawan')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar Karyawan</h1>
            <a href="{{ route('employees.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Karyawan
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">Usia</th>
                        <th scope="col" class="px-6 py-3">No. Telepon</th>
                        <th scope="col" class="px-6 py-3">ID Kartu</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr
                            class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900 dark:even:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $employee->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->address }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->age }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->phone_number }}
                            <td class="px-6 py-4">
                                @if ($employee->card_id)
                                    <img src="{{ Storage::url($employee->card_id) }}" alt="ID Card"
                                        class="w-16 h-8 object-cover rounded-md">
                                @else
                                    <span class="text-gray-500">Tidak ada ID Card</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('employees.show', $employee->id) }}"
                                    class="text-green-600 hover:underline">Detail</a>
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Yakin ingin menghapus karyawan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data karyawan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection