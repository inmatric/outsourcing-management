@extends('components.layouts.main-layout')
@section('title', 'Tambah Jenis Lokasi')
@section('content')

<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Jenis Lokasi</h2>

        <form action="{{ route('location-type.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="location_type" class="block mb-2 text-sm font-medium text-gray-700">Nama Jenis Lokasi</label>
                <input type="text" id="location_type" name="location_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Deskripsi</label>
                <input type="text" id="description" name="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <button type="submit"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </div>
</div>

@endsection
