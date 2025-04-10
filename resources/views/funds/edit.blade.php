@extends('components.layouts.main-layout')
@section('title', 'Edit fund')
@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <form action="{{ route('fund.update', $fund->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" value="{{ $fund->nama_perusahaan }}" class="w-full px-3 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" value="{{ $fund->tanggal }}" class="w-full px-3 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Dana Yang Diterima</label>
            <input type="number" name="dana" value="{{ $fund->dana }}" class="w-full px-3 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Bukti Terima (Upload Baru jika ingin mengganti)</label>
            <input type="file" name="bukti_terima" accept="image/*" class="w-full px-3 py-2 border rounded">
            @if ($fund->bukti_terima)
                <p class="mt-2 text-sm text-gray-600">File saat ini: <a href="{{ asset('storage/' . $fund->bukti_terima) }}" target="_blank" class="text-blue-500 underline">Lihat Gambar</a></p>
            @endif
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Update</button>
        </div>
    </form>
</div>
@endsection
