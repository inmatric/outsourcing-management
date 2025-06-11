@extends('components.layouts.main-layout')
@section('title', isset($employe) ? 'Edit Employe' : 'Tambah Employe')
@section('content')
<div class="w-full max-w-2xl mx-auto p-6">
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <form action="{{ isset($employe) ? route('employes.update', $employe->id) : route('employes.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">
            @csrf
            @if(isset($employe))
                @method('PUT')
            @endif

            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ isset($employe) ? 'Edit' : 'Tambah' }} Employe</h2>

            {{-- Nama --}}
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $employe->name ?? '') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       required>
            </div>

            {{-- Alamat --}}
            <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                <textarea id="address" name="address" rows="2"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                          required>{{ old('address', $employe->address ?? '') }}</textarea>
            </div>

            {{-- Umur --}}
            <div>
                <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Umur</label>
                <input type="number" id="age" name="age" value="{{ old('age', $employe->age ?? '') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       required>
            </div>

            {{-- No HP --}}
            <div>
                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">No HP</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $employe->phone_number ?? '') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       required>
            </div>

            {{-- Skill --}}
            <div>
                <label for="skill" class="block mb-2 text-sm font-medium text-gray-900">Skill</label>
                <input type="text" id="skill" name="skill" value="{{ old('skill', $employe->skill ?? '') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       required>
            </div>

            {{-- Foto --}}
            <div>
                <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                <input type="file" id="photo" name="photo" accept="image/*"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-between items-center pt-4">
                <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
                    Simpan
                </button>
                <a href="{{ route('employes.index') }}" class="text-sm text-gray-600 hover:underline">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
