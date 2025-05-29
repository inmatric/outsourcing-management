@extends('components.layouts.main-layout')

@section('title', 'Location')

@section('content')
    <x-page-header title="Daftar Lokasi" />

    <div class="mb-4 flex gap-2">
        <a href="{{ route('location.create') }}"
            class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah
        </a>
        <a href="{{ route('location.pdf', request()->query()) }}"
            class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 flex items-center gap-2">
            <i class="fas fa-file-pdf"></i> Download PDF
        </a>
    </div>

    {{-- Filter & PerPage --}}
    <form method="GET" action="{{ route('location.index') }}" class="mb-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div class="flex items-center gap-2">
            <label for="perPage" class="text-sm text-gray-700">Tampilkan</label>
            <select name="perPage" id="perPage" onchange="this.form.submit()"
                class="border border-gray-300 rounded-lg text-sm py-2 focus:ring-blue-500 focus:border-blue-500">
                @foreach([5, 10, 25, 50, 100] as $size)
                <option value="{{ $size }}" {{ request('perPage') == $size ? 'selected' : '' }}>
                    {{ $size }}
                </option>
                @endforeach
            </select>
            <span class="text-sm text-gray-700">entri</span>
        </div>

        <div class="flex items-center gap-2">
            <label for="status" class="text-sm text-gray-700">Status</label>
            <select name="status" id="status" onchange="this.form.submit()"
                class="border border-gray-300 rounded-lg text-sm py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Semua</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="flex items-center gap-2 w-full sm:w-auto">
            <input type="text" name="search" placeholder="Cari lokasi, perusahaan, atau tipe lokasi..."
                value="{{ request('search') }}"
                class="w-full sm:w-64 px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                Cari
            </button>
        </div>
    </form>

    {{-- Tabel Lokasi --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Perusahaan</th>
                    <th scope="col" class="px-6 py-3">Kode Lokasi</th>
                    <th scope="col" class="px-6 py-3">Nama Lokasi</th>
                    <th scope="col" class="px-6 py-3">Tipe Lokasi</th>
                    <th scope="col" class="px-6 py-3">Informasi</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($locations as $location)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $location->company }}</td>
                        <td class="px-6 py-4">{{ $location->location_code }}</td>
                        <td class="px-6 py-4">{{ $location->location }}</td>
                        <td class="px-6 py-4">{{ $location->location_type }}</td>
                        <td class="px-6 py-4">{{ $location->information }}</td>
                        <td class="px-6 py-4">{{ $location->status }}</td>
                        <td class="px-6 py-4 flex items-center gap-3">
                            <a href="{{ route('location.edit', $location->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.5H3v-4.5L16.862 3.487z" />
                                </svg>
                            </a>
                            <form action="{{ route('location.destroy', $location->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Data lokasi tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $locations->appends(request()->query())->links() }}
    </div>

    {{-- Daftar Tipe Lokasi --}}
    <div class="mt-12">
        <x-page-header title="Daftar Tipe Lokasi" />
        <a href="{{ route('location-type.create') }}"
            class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah
        </a>

        {{-- Filter & PerPage --}}
        <form method="GET" action="{{ route('location.index') }}" class="mb-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div class="flex items-center gap-2">
                <label for="typePerPage" class="text-sm text-gray-700">Tampilkan</label>
                <select name="typePerPage" id="typePerPage" onchange="this.form.submit()"
                    class="border border-gray-300 rounded-lg text-sm py-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach([5,10, 25, 50, 100] as $size)
                    <option value="{{ $size }}" {{ request('typePerPage') == $size ? 'selected' : '' }}>
                        {{ $size }}
                    </option>
                    @endforeach
                </select>
                <span class="text-sm text-gray-700">entri</span>
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <input type="text" name="search" placeholder="Cari lokasi atau perusahaan..."
                    value="{{ request('search') }}"
                    class="w-full sm:w-64 px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                    Cari
                </button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Deskripsi</th>
                        <th scope="col" class="px-6 py-3">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locationTypes as $type)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $type->location_type }}</td>
                            <td class="px-6 py-4">{{ $type->description }}</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <a href="{{ route('location-type.edit', $type->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.5H3v-4.5L16.862 3.487z" />
                                    </svg>
                                </a>
                                <form action="{{ route('location-type.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tipe lokasi ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Data tipe lokasi tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Font Awesome for icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
@endsection
