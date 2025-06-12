@extends('components.layouts.main-layout')

@section('title', 'Add WorkTool')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Add New WorkTool</h1>

    {{-- Tampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #842029; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('worktools.store') }}" method="POST" enctype="multipart/form-data"
        style="background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: 600; margin-bottom: 5px;">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; font-weight: 600; margin-bottom: 5px;">Description</label>
            <textarea name="description" id="description" rows="3"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>{{ old('description') }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="purpose" style="display: block; font-weight: 600; margin-bottom: 5px;">Purpose</label>
            <input type="text" name="purpose" id="purpose" value="{{ old('purpose') }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; font-weight: 600; margin-bottom: 5px;">Image</label>
            <input type="file" name="image" id="image"
                style="display: block; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="text-align: right;">
            <button type="submit"
                style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
                Save
            </button>
        </div>
    </form>
</div>
@endsection