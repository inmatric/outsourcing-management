@extends('components.layouts.main-layout')
@section('title', 'Processing Work Data')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Work Progress Tracking</h1>
            <a href="{{ route('processing_wd.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                + Add New Task
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-gray-700 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Task ID</th>
                            <th scope="col" class="px-6 py-3">Task Name</th>
                            <th scope="col" class="px-6 py-3">Employee</th>
                            <th scope="col" class="px-6 py-3">Start Time</th>
                            <th scope="col" class="px-6 py-3">End Time</th>
                            <th scope="col" class="px-6 py-3">Duration</th>
                            <th scope="col" class="px-6 py-3">Before Photo</th>
                            <th scope="col" class="px-6 py-3">After Photo</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Notes</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#1</td>
                            <td class="px-6 py-4">Pel Ruangan</td>
                            <td class="px-6 py-4">Enndas</td>
                            <td class="px-6 py-4">Apr 01, 2025 09:00</td>
                            <td class="px-6 py-4">Apr 01, 2025 11:30</td>
                            <td class="px-6 py-4">02:30:00</td>
                            <td class="px-6 py-4">
                                <button onclick="viewPhotos('/images/before1.jpg', '/images/after1.jpg')"
                                    class="text-sm text-blue-600 hover:underline">
                                    View
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <button onclick="viewPhotos('/images/before1.jpg', '/images/after1.jpg')"
                                    class="text-sm text-blue-600 hover:underline">
                                    View
                                </button>
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                    Completed
                                </span>
                            </td>

                            <td class="px-6 py-4">Ruangan Lab Sistem Informasi sudah bersih</td>

                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700" title="View Details">
                                        <!-- Eye icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">#2</td>
                            <td class="px-6 py-4">Sapu Tangga</td>
                            <td class="px-6 py-4">Faradis</td>
                            <td class="px-6 py-4">Apr 02, 2025 10:15</td>
                            <td class="px-6 py-4">Apr 02, 2025 12:00</td>
                            <td class="px-6 py-4">01:45:00</td>
                            <td class="px-6 py-4">
                                <button onclick="viewPhotos('/images/before1.jpg', '/images/after1.jpg')"
                                    class="text-sm text-blue-600 hover:underline">
                                    View
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <button onclick="viewPhotos('/images/before1.jpg', '/images/after1.jpg')"
                                    class="text-sm text-blue-600 hover:underline">
                                    View
                                </button>
                            </td>

                            
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">
                                    In progress
                                </span>
                            </td>

                            <td class="px-6 py-4">Tangga darurat sudah disapu</td>

                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700" title="View Details">
                                        <!-- Eye icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                        <!-- Pencil icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium"></span>
                            to
                            <span class="font-medium"></span>
                            of
                            <span class="font-medium"></span>
                            results
                        </p>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Photo Preview Modal -->
        <div id="photoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white rounded-lg p-6 max-w-2xl w-full">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Task Documentation</h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 mb-2">Before Photo</h4>
                        <img id="beforePhoto" src="" alt="Before work"
                            class="w-full h-48 object-cover rounded border border-gray-200">
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 mb-2">After Photo</h4>
                        <img id="afterPhoto" src="" alt="After work"
                            class="w-full h-48 object-cover rounded border border-gray-200">
                    </div>
                </div>
                <div class="mt-4">
                    <button onclick="closeModal()"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewPhotos(beforeUrl, afterUrl) {
            document.getElementById('beforePhoto').src = beforeUrl;
            document.getElementById('afterPhoto').src = afterUrl;
            document.getElementById('photoModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('photoModal').classList.add('hidden');
        }
    </script>

@endsection
