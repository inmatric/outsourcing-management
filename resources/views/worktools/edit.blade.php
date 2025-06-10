@extends('components.layouts.main-layout')

@section('title', 'Edit WorkTool')

@section('content')
<div style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Edit WorkTool</h1>

    <form action="{{ route('worktools.update', $tool->id) }}" method="POST" enctype="multipart/form-data" style="background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: 600; margin-bottom: 5px;">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $tool->name) }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; font-weight: 600; margin-bottom: 5px;">Description</label>
            <textarea name="description" id="description" rows="4"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">{{ old('description', $tool->description) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="purpose" style="display: block; font-weight: 600; margin-bottom: 5px;">Purpose</label>
            <input type="text" name="purpose" id="purpose" value="{{ old('purpose', $tool->purpose) }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image" style="display: block; font-weight: 600; margin-bottom: 5px;">Image (optional)</label>
            <input type="file" name="image" id="image"
                style="display: block; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @if ($tool->image)
                <img src="{{ asset('storage/' . $tool->image) }}" alt="Current Image" style="height: 80px; margin-top: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @endif
        </div>

        <div style="text-align: right;">
            <button type="submit"
                style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; font-weight: 600; cursor: pointer;">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
