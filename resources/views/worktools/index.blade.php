    @extends('components.layouts.main-layout')

    @section('title', 'WorkTools')

    @section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center">List WorkTools</h1>

        @if(session('success'))
            <div class="alert alert-success mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form class="max-w-md mx-auto flex items-center gap-2 mb-6" method="GET" action="{{ route('worktools.index') }}">
    <input
        type="search"
        id="default-search"
        name="search"
        value="{{ request('search') }}"
        class="w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Search tools..."
    />
    <button type="submit"
        class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm font-medium focus:ring-2 focus:ring-blue-300">
        Search
    </button>
</form>


        <!-- Tombol Tambah -->
        <div class="text-center mb-6">
    <a href="{{ route('worktools.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
        Add WorkTool
    </a>
</div>




        <!-- Grid Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($tools as $tool)
                <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
                    <!-- Gambar -->
                    @if ($tool->image)
                        <img src="{{ asset('storage/' . $tool->image) }}" alt="{{ $tool->name }}" class="mx-auto mb-4 w-24 h-24 object-contain">
                    @else
                        <div class="w-24 h-24 mx-auto mb-4 flex items-center justify-center bg-gray-200 rounded">
                            <span class="text-gray-500 text-sm">No Image</span>
                        </div>
                    @endif

                    <!-- Nama -->
                    <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">{{ $tool->name }}</h2>

                    <!-- Deskripsi -->
                    <p class="text-base text-gray-600 mb-4">
                        <strong>SOP:</strong> {{ $tool->description }}
                    </p>

                    <!-- Tujuan -->
                    <p class="text-base text-gray-600 mb-4">
                        <strong>Tujuan:</strong> {{ $tool->purpose }}
                    </p>

                    <!-- Tombol Edit dan Delete -->
                    <div class="mt-6 flex justify-between items-center">
        <!-- Tombol Edit -->
        <a href="{{ route('worktools.edit', $tool->id) }}" class="text-yellow-600 font-medium hover:underline">
            Edit
        </a>

        <!-- Form Delete -->
        <form action="{{ route('worktools.destroy', $tool->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this WorkTool?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 font-medium hover:underline">
                Delete
            </button>
        </form>
    </div>

                </div>
            @empty
                <div class="col-span-3 text-center text-gray-600">
                    No WorkTools available.
                </div>
            @endforelse
        </div>
    </div>
    @endsection
