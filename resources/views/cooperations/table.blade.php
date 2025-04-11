@forelse ($cooperations as $cooperation)
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
    <td class="py-4 px-6 text-sm text-gray-900 dark:text-white">{{ $cooperation->company_name }}</td>
    <td class="py-4 px-6 text-sm text-gray-900 dark:text-white">{{ $cooperation->cooperation_type }}</td>
    <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $cooperation->start_date }}</td>
    <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $cooperation->end_date }}</td>
    <td class="py-4 px-6 text-sm">
        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
            {{ $cooperation->status == 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
            {{ ucfirst($cooperation->status) }}
        </span>
    </td>
    <td class="py-4 px-6 text-center">
        <a href="{{ route('cooperations.edit', $cooperation->id) }}" class="text-yellow-600 hover:text-yellow-800 dark:text-yellow-400 dark:hover:text-yellow-300 mr-3">Edit</a>
        <button 
            onclick="openDeleteModal({{ $cooperation->id }}, '{{ $cooperation->company_name }}', '{{ $cooperation->cooperation_type }}')" 
            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
            Hapus
        </button>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="py-4 px-6 text-center text-sm text-gray-500 dark:text-gray-400">
        Data tidak ditemukan untuk pencarian: {{ request('search') }}
    </td>
</tr>
@endforelse
