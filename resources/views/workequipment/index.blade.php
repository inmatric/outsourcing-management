@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
    {{-- Kiri: Judul --}}
    <h1 class="text-2xl font-bold text-gray-800">Work Equipment Data</h1>

    {{-- Kanan: Tombol Create dan Search --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-2">
        {{-- Tombol Create --}}
        <a href="{{ route('workequipment.create') }}"
            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none 
                  focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 
                  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            + Create Data
        </a>

        {{-- Form Search --}}
        <form method="GET" action="{{ route('workequipment.index') }}" class="flex items-center gap-2">
            <div class="relative w-[250px]">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" name="search" id="default-search" placeholder="Search"
                    class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg 
                               bg-gray-50 focus:ring-blue-500 focus:border-blue-500 
                               dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                               dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ request('search') }}" />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                           focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 
                           dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Search
            </button>
        </form>

        <script>
            const searchInput = document.getElementById('default-search');

            searchInput.addEventListener('input', function() {
                // Jika input dikosongkan
                if (this.value.trim() === '') {
                    // Redirect otomatis ke halaman index (tanpa search query)
                    window.location.href = "{{ route('workequipment.index') }}";
                }
            });
        </script>
    </div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-black bg-blue-100">
        <thead class="text-xs uppercase bg-blue-300 text-black">
            <tr>
                <th scope="col" class="px-6 py-3">Employee ID</th>
                <th scope="col" class="px-6 py-3">Employee Name</th>
                <th scope="col" class="px-6 py-3">Position</th>
                <th scope="col" class="px-6 py-3">Location</th>
                <th scope="col" class="px-6 py-3">Equipment</th>
                <th scope="col" class="px-6 py-3">Condition</th>
                <th scope="col" class="px-6 py-3 text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($workequipments as $item)
            <tr class="bg-blue-50 border-b border-blue-200 hover:bg-blue-200">
                <td class="px-6 py-4">{{ $item->id }}</td>
                <td class="px-6 py-4">{{ $item->employee_name }}</td>
                <td class="px-6 py-4">{{ $item->position }}</td>
                <td class="px-6 py-4">{{ $item->location }}</td>
                <td class="px-6 py-4">{{ $item->equipment }}</td>
                <td class="px-6 py-4">{{ $item->condition }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('workequipment.edit', $item->id) }}"
                        class="text-blue-600 hover:text-blue-800 text-lg" title="Edit">
                        ✏️
                    </a>
                    <form action="{{ route('workequipment.destroy', $item->id) }}" method="POST"
                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete" class="text-red-600 hover:text-red-800 text-lg">
                            🗑️
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada data ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection