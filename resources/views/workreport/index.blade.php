@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')

<div class="flex justify-between items-center mb-6 flex-wrap gap-4">
    <h1 class="text-2xl font-bold text-gray-800">Laporan Pekerjaan</h1>

    <div class="flex items-center space-x-4">
        <form action="{{ route('workreport.index') }}" method="GET" class="relative w-[300px]">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="search" id="search" placeholder="Cari pegawai..." value="{{ request('search') }}"
                       class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                              focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                              dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <button type="submit"
                        class="text-white absolute end-1.5 top-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">
                    Search
                </button>
            </div>
        </form>

        <a href="{{ route('workreport.create')}}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors text-sm font-medium">
            + Tambahkan
        </a>
    </div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">NO</th>
                <th class="px-6 py-3">ID Pegawai</th>
                <th class="px-6 py-3">Nama Pegawai</th>
                <th class="px-6 py-3">Tanggal</th>
                <th class="px-6 py-3">Deskripsi Pekerjaan</th>
                <th class="px-6 py-3">Masalah Ditemukan</th>
                <th class="px-6 py-3">Tindakan</th>
                <th class="px-6 py-3">Foto</th>
                <th class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($workreport as $report)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $report->employee_id }}</td>
                    <td class="px-6 py-4">{{ $report->employee_name }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($report->date)->format('d-m-Y') }}</td>
                    <td class="px-6 py-4">{{ $report->work_description }}</td>
                    <td class="px-6 py-4">{{ $report->problem_found ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $report->action ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if ($report->image)
                        <button type="button" onclick="openImageModal('{{ asset('storage/' . $report->image) }}')" 
                            class="text-blue-600 hover:text-blue-800 cursor-pointer" title="Lihat Gambar">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </button>
                        @else
                        <span class="text-sm text-gray-400 italic">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <form action="{{ route('workreport.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 cursor-pointer" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                                    </svg>
                                </button>
                            </form>
                            <a href="{{ route('workreport.edit', $report->id) }}" class="text-yellow-500 hover:text-yellow-700 cursor-pointer" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 text-gray-500">Belum ada data laporan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal untuk preview gambar -->
<div id="default-modal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg max-w-2xl w-full p-6">
        <div id="modalBody" class="text-center">
            <!-- Isi gambar akan dimasukkan melalui JavaScript -->
        </div>
        <div class="mt-4 text-right">
            <button onclick="closeImageModal()" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
    function openImageModal(imageUrl) {
        const modal = document.getElementById('default-modal');
        const modalBody = document.getElementById('modalBody');
        modalBody.innerHTML = '';

        if (imageUrl) {
            const img = document.createElement('img');
            img.src = imageUrl;
            img.alt = 'Foto Laporan';
            img.className = 'rounded-lg max-h-96 object-contain mx-auto';
            modalBody.appendChild(img);
        } else {
            const noImgText = document.createElement('p');
            noImgText.textContent = 'Tidak ada foto laporan';
            noImgText.className = 'text-gray-600 text-sm text-center my-10';
            modalBody.appendChild(noImgText);
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeImageModal() {
        const modal = document.getElementById('default-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.getElementById('modalBody').innerHTML = '';
    }
</script>

@endsection
