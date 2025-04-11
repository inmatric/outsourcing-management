<div class="mb-4">
    <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Name</label>
    <input type="text" name="company_name" id="company_name"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
        value="{{ old('company_name', $cooperation->company_name ?? '') }}">
</div>

@php
    $types = ['Cleaning Service', 'Security'];
    $selectedTypes = old('cooperation_type', explode(',', $cooperation->cooperation_type ?? ''));
@endphp

<div x-data="{ open: false, selected: @js($selectedTypes) }" class="relative mb-4">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cooperation Type</label>

    <button type="button"
        @click="open = !open"
        class="mt-1 w-full rounded-md border border-gray-300 bg-white px-4 py-2 text-left shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600">
        Pilih Cooperation Type
    </button>

    <div x-show="open" @click.away="open = false"
        class="absolute z-10 mt-2 w-full rounded-md bg-white shadow-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-600">
        <div class="p-2 max-h-48 overflow-y-auto">
            @foreach ($types as $type)
                <label class="flex items-center space-x-2 p-1">
                    <input type="checkbox" name="cooperation_type[]"
                        value="{{ $type }}"
                        x-model="selected"
                        class="text-blue-600 rounded border-gray-300 dark:bg-gray-700 dark:border-gray-500">
                    <span class="text-gray-700 dark:text-gray-200">{{ $type }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <div class="mt-2">
        <template x-for="item in selected" :key="item">
            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mr-2 mb-1">
                <span x-text="item"></span>
            </span>
        </template>
    </div>
</div>

<div class="mb-4">
    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
    <input type="date" name="start_date" id="start_date"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
        value="{{ old('start_date', $cooperation->start_date ?? '') }}">
</div>

<div class="mb-4">
    <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
    <input type="date" name="end_date" id="end_date"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
        value="{{ old('end_date', $cooperation->end_date ?? '') }}">
</div>

<div class="mb-4">
    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
    <select name="status" id="status"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <option value="">-- Select Status --</option>
        <option value="active" {{ (old('status', $cooperation->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ (old('status', $cooperation->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
    </select>
</div>

<div class="mb-6">
    <label for="contract_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Contract File</label>
    <input type="file" name="contract_file" id="contract_file"
        class="mt-1 block w-full text-sm text-gray-700 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-white">
</div>

<script src="//unpkg.com/alpinejs" defer></script>
