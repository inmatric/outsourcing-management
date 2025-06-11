@extends('components.layouts.main-layout')
@section('title', 'Detail Employe')
@section('content')
<div class="max-w-md sm:max-w-lg mx-auto bg-white border border-gray-200 rounded-2xl shadow-xl overflow-hidden mt-6">
    <div class="flex flex-col items-center p-8">
        {{-- Foto di Atas --}}
        <div class="w-40 h-40 sm:w-48 sm:h-48 rounded-full overflow-hidden border-4 border-blue-600 shadow-md mb-6">
            @if($employe->photo)
                <img src="{{ asset('storage/' . $employe->photo) }}" alt="Foto"
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
                    Tidak ada foto
                </div>
            @endif
        </div>

        {{-- Informasi --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $employe->name }}</h2>
        <p class="text-base text-gray-500 mb-4">{{ $employe->skill }}</p>

        <div class="w-full text-base text-gray-700 space-y-4">
            <div class="flex justify-between border-b pb-1">
                <span class="font-semibold">Alamat:</span>
                <span class="text-right">{{ $employe->address }}</span>
            </div>
            <div class="flex justify-between border-b pb-1">
                <span class="font-semibold">Umur:</span>
                <span>{{ $employe->age }}</span>
            </div>
            <div class="flex justify-between border-b pb-1">
                <span class="font-semibold">No HP:</span>
                <span>{{ $employe->phone_number }}</span>
            </div>
        </div>

        {{-- Tombol Kembali --}}
        <a href="{{ route('employes.index') }}"
           class="mt-8 inline-flex items-center px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm transition">
            ← Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
