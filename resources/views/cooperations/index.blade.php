@extends('components.layouts.main-layout')
@section('title', 'Cooperation')

@section('content')
<div class="p-6 mt-10">
    <div class="container mx-auto">
        @if(session('success'))
            <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 space-y-4 sm:space-y-0">
         <h1 class="text-2xl font-semibold text-gray-700 dark:text-Black">Cooperation</h1>
     
         <div class="flex items-center space-x-3">
             <!-- Form Search -->
             <form method="GET" action="{{ route('cooperations.index') }}" id="searchForm" class="flex">
                 <input 
                     type="text" 
                     id="searchInput"
                     name="search"
                     value="{{ request('search') }}"
                     placeholder="Search company or type..." 
                     class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring focus:ring-blue-300"
                 />
             </form>
     
             <!-- Tombol Tambah -->
             <a href="{{ route('cooperations.create') }}" 
                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                 + Add Cooperation
             </a>
         </div>
     </div>
     

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Company Name</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Company Type</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Start Date</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">End Date</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Status</th>
                        <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="divide-y divide-gray-200 dark:divide-gray-700">
                  @forelse ($cooperations as $cooperation)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="py-4 px-6 text-sm text-gray-900 dark:text-white">{{ $cooperation->company_name }}</td>
                            <td class="py-4 px-6 text-sm text-gray-900 dark:text-white">@foreach(explode(',', $cooperation->cooperation_type) as $type)
                                <span class="inline-block px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">{{ $type }}</span>
                            @endforeach
                            </td>                            </td>
                            <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $cooperation->start_date }}</td>
                            <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $cooperation->end_date }}</td>
                            <td class="py-4 px-6 text-sm">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $cooperation->status == 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                    {{ ucfirst($cooperation->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center space-x-2">
                                @if ($cooperation->contract_file)
                                <a href="{{ asset('storage/' . $cooperation->contract_file) }}" target="_blank"
                                   class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mr-3">
                                    Show
                                </a>
                            @endif
                            
                            
                                <a href="{{ route('cooperations.edit', $cooperation->id) }}"
                                   class="text-yellow-600 hover:text-yellow-800 dark:text-yellow-400 dark:hover:text-yellow-300 mr-3">
                                    Edit
                                </a>
                            
                                <button 
                                    onclick="openDeleteModal({{ $cooperation->id }}, '{{ $cooperation->company_name }}', '{{ $cooperation->cooperation_type }}')" 
                                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                                    Delete
                                </button>
                            </td>
                            
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-4 px-6 text-center text-sm text-gray-500 dark:text-gray-400">
                                {{ request('search') ? 'Data tidak ditemukan untuk pencarian: ' . request('search') : 'Belum ada data kerja sama.' }}
                            </td>
                        </tr>
                        @endforelse
                        
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
   <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-full max-w-md shadow-lg">
       <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Delete Confirmation</h2>
       <p class="text-gray-600 dark:text-gray-300 mb-2">Are you sure you want to delete the following cooperation data??</p>
       <div class="bg-gray-100 dark:bg-gray-700 rounded-md p-3 text-sm mb-4">
           <p><strong class="text-gray-700 dark:text-gray-200">Company Name:</strong> <span id="modalCompanyName" class="text-gray-800 dark:text-white"></span></p>
           <p><strong class="text-gray-700 dark:text-gray-200">Cooperation Type:</strong> <span id="modalCooperationType" class="text-gray-800 dark:text-white"></span></p>
       </div>
       <form id="deleteForm" method="POST">
           @csrf
           @method('DELETE')
           <div class="flex justify-end space-x-3">
               <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-800 dark:text-white">
                   Cancel
               </button>
               <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                   Delete
               </button>
           </div>
       </form>
   </div>
</div>


<script>
   function openDeleteModal(id, companyName, cooperationType) {
       const modal = document.getElementById('deleteModal');
       const form = document.getElementById('deleteForm');

       document.getElementById('modalCompanyName').innerText = companyName;
       document.getElementById('modalCooperationType').innerText = cooperationType;

       form.action = `/cooperations/${id}`;
       modal.classList.remove('hidden');
   }

   function closeDeleteModal() {
       document.getElementById('deleteModal').classList.add('hidden');
   }

    let timeout = null;
 
    document.getElementById('searchInput').addEventListener('input', function () {
        clearTimeout(timeout);
        const keyword = this.value;
 
        timeout = setTimeout(() => {
            fetch(`{{ route('cooperations.index') }}?search=${encodeURIComponent(keyword)}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
                // Ambil isi tbody dari hasil render ulang
                const parser = new DOMParser();
                const html = parser.parseFromString(data, 'text/html');
                const newTbody = html.querySelector('#tableBody');
                document.getElementById('tableBody').innerHTML = newTbody.innerHTML;
            });
        }, 300); // delay biar gak terlalu cepat
    });
 </script>
 


@endsection
