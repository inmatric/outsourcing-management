@extends('components.layouts.main-layout')
@section('title', 'Add Cooperation')

@section('content')
<div class="p-6 mt-10">
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-700 dark:text-black">Add Cooperation</h1>
            <a href="{{ route('cooperations.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                ← Back
            </a>
        </div>

        @if ($errors->any())
        <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700">
            <strong>Oops! Something went wrong:</strong>
            <ul class="list-disc pl-5 mt-2 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    

        <form action="{{ route('cooperations.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            @include('cooperations._form')

            <div class="mt-6">
                <button type="submit" class="w-full sm:w-auto px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
