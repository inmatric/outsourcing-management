@extends('components.layouts.main-layout')
@section('title', 'Edit Cooperation')

@section('content')
<div class="p-6 mt-10">
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-700 dark:text-black">Edit Cooperation</h1>
            <a href="{{ route('cooperations.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                ← Back
            </a>
        </div>

        <form action="{{ route('cooperations.update', $cooperation->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            @method('PUT')
            @include('cooperations._form')

            <div class="mt-6">
                <button type="submit" class="w-full sm:w-auto px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
