@extends('components.layouts.main-layout')

@section('title', 'WorkTools')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center">List WorkTools</h1>

        <!-- Pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pencarian -->

        <form class="max-w-md mx-auto">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>



        <!-- Tombol untuk menambah WorkTool baru -->
        <div class="text-center mb-6 mt-10">
            <a href="{  { route('worktools.create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Add WorkTools
            </a>
        </div>

        <!-- Card-based Layout for WorkTools -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Example Data Row 1 -->

            

    <!-- Sapu Lantai -->    

    <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
    <!-- Gambar di atas judul -->
    <img src="public/images/sapu.png" alt="Sapu" class="mx-auto mb-4 w-24 h-24 object-contain">

    <!-- Judul -->
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Sapu Lantai</h2>

    <!-- Deskripsi SOP -->
    <p class="text-base text-gray-600 mb-4">
        <strong>SOP:</strong> Sapu harus digunakan setiap pagi sebelum jam kerja dimulai. Area yang disapu meliputi lantai ruang kelas, lorong, dan lobby kampus. Gunakan sapu kering untuk area dalam ruangan dan sapu lidi untuk halaman luar. Pastikan debu terkumpul di satu titik sebelum diambil menggunakan pengki. Sapu disimpan dalam keadaan bersih, kering, dan digantung di tempat penyimpanan alat kebersihan agar tidak rusak.
    </p>

    <!-- Deskripsi Tujuan Pembersihan -->
    <p class="text-base text-gray-600 mb-4">
        <strong>Tujuan Pembersihan:</strong> Menjaga kebersihan dan kerapian area publik kampus. Pembersihan dilakukan dengan prinsip kerja <em>Resik, Ringkas, Rapi, Rawat, Rajin,</em> dan <em>Teliti.</em> Pengawasan dilakukan oleh koordinator OB setiap hari.
    </p>

<p class="text-base text-gray-600 mb-4">
    <strong>Kondisi Akhir Penggunaan:</strong> Sapu dikembalikan dalam keadaan bersih dan kering, lalu digantung di tempat penyimpanan.
</p>


    <!-- Bagian Tombol Edit dan Delete -->
    <div class="mt-12 flex justify-between items-center">
        <a href="#" class="text-yellow-600 font-medium hover:underline"> Edit</a>
        <form action="#" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 font-medium hover:underline"> Delete</button>
        </form>
    </div>
</div>



  <!-- Pel Lantai -->
<div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
    <!-- Gambar di atas judul -->
    <img src="public/images/pel.png" alt="Pel Lantai" class="mx-auto mb-4 w-24 h-24 object-contain">

    <!-- Judul Pel Lantai -->
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Pel Lantai</h2>

    <!-- Deskripsi SOP -->
    <p class="text-base text-gray-600 mb-4">
        <strong>SOP:</strong> Gunakan pel bersih yang sudah diperas airnya dengan baik. Mulailah mengepel dari sudut paling dalam ruangan ke arah pintu. Gunakan chemical pembersih lantai sesuai standar kebersihan kampus. Hindari lalu lalang ketika lantai masih basah untuk mencegah kecelakaan. Setelah digunakan, pel harus dicuci bersih dan dijemur agar tidak bau atau berjamur.
    </p>

    <!-- Deskripsi Tujuan Pembersihan -->
    <p class="text-base text-gray-600 mb-4 mt-10">
        <strong>Tujuan Pembersihan:</strong>Semua area lantai harus diperiksa kembali setelah pengepelan. Bila ada noda membandel, gunakan pembersih khusus dan laporkan jika memerlukan alat berat seperti mesin scrubber.
    </p>

    <!-- Bagian Tombol Edit dan Delete -->
    <div class="mt-12 flex justify-between items-center">
        <a href="#" class="text-yellow-600 font-medium hover:underline"> Edit</a>
        <form action="#" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 font-medium hover:underline"> Delete</button>
        </form>
    </div>
</div>



  <!-- Vacuum Cleaner -->
<div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
    <!-- Gambar di atas judul -->
    <img src="public/images/vacuum_cleaner.png" alt="Vacuum Cleaner" class="mx-auto mb-4 w-24 h-24 object-contain">

    <!-- Judul Vacuum Cleaner -->
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Vacuum Cleaner</h2>

    <!-- Deskripsi SOP -->
    <p class="text-base text-gray-600 mb-4">
        <strong>SOP:</strong> Gunakan vacuum cleaner setiap pagi sebelum jam kerja dimulai dan sore hari setelah jam kerja berakhir. Pastikan kabel tidak mengganggu lalu lintas orang saat digunakan. Periksa kantong debu secara berkala dan kosongkan jika sudah penuh. Jangan gunakan vacuum cleaner pada lantai basah.
    </p>

    <!-- Deskripsi Tujuan Pembersihan -->
    <p class="text-base text-gray-600 mb-4 mt-15">
        <strong>Tujuan Pembersihan:</strong> Membersihkan debu dan kotoran halus dari karpet, lantai, dan sudut-sudut ruangan untuk menciptakan lingkungan kerja yang bersih dan sehat. OB wajib memastikan semua area bebas debu terutama di area resepsionis dan ruang kerja bersama.
    </p>

    <!-- Bagian Tombol Edit dan Delete -->
    <div class="mt-8 flex justify-between items-center">
        <a href="#" class="text-yellow-600 font-medium hover:underline"> Edit</a>
        <form action="#" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 font-medium hover:underline"> Delete</button>
        </form>
    </div>
</div>






<!-- Pagination -->
<div class="mt-6 flex justify-center space-x-4">

    <!-- Page Number Links -->
    <a href="page-1.html" class="text-black-600 font-medium hover:underline">1</a>
    <a href="page-2.html" class="text-black-600 font-medium hover:underline">2</a>
    <a href="page-3.html" class="text-black-600 font-medium hover:underline">3</a>
    <a href="page-4.html" class="text-black-600 font-medium hover:underline">4</a>
    <a href="page-5.html" class="text-black-600 font-medium hover:underline">5</a>

    <!-- Next Button -->
    <a href="page-2.html" class="text-black-600 font-medium hover:underline">Next</a>
</div>


</div>

        </div>
    </div>
    
@endsection
