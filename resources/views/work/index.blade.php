@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Work Table</h1>
    
    {{-- form search --}}
<div class="flex justify-start mb-4">
    <form method="GET" action="{{ route('work.index') }}" class="w-full max-w-sm">
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <!-- Icon SVG -->
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="search" name="search" placeholder="Find Workers..." required
                    value="{{ request('search') }}"
                   class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                   focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                   dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <button type="submit"
                    class="text-white absolute end-1.5 top-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                    focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700
                    dark:focus:ring-blue-800">
                Search
            </button>
        </div>
    </form>
    

    <!-- Tombol Tambah -->
    <a href="{{ route('work.create') }}" class="ml-6 mt-2"> {{-- <-- tambahkan jarak di sini --}}
    <button type="button"
        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium
        rounded-lg text-sm px-2 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700
        focus:outline-none dark:focus:ring-blue-800">
        + Add Work
    </button>
</div>

    
    <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        {{-- bagian navbar --}}
        <thead class="text-xs text-gray-800 uppercase bg-blue-100 dark:bg-blue-900"> 
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Job Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Task Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Task Details
                </th>
                <th scope="col" class="px-6 py-3">
                    Salary per Person
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody id="search-results">
    @forelse ($work as $index => $work)

            <tr class="{{ $index % 2 == 0 ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }} border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $index + 1 }}
                </th>
                <td class="px-6 py-4">
                    {{ $work->job_name }}
                </td>
                <td class="px-6 py-4">
                    {{ $work->task_type }}
                </td>
                <td class="px-6 py-4">
                    {{ $work->task_details }}
                </td>
                <td class="px-6 py-4">
                    {{ $work->salary_range }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('work.edit', ['id' => $work->id]) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:focus:ring-yellow-900">
                            Edit
                        </a>
                        <form action="{{ route('work.destroy', $work->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
                
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada data pekerjaan.</td>
            </tr>
            @endforelse
        </tbody>
        
    </table>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const resultsContainer = document.getElementById('search-results');

    searchInput.addEventListener('input', function () {
        const query = this.value;

        fetch(`?search=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newRows = doc.querySelector('#search-results').innerHTML;
                resultsContainer.innerHTML = newRows;
            });
    });
});
</script>

</div>

@endsection