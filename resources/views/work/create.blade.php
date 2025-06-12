@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')

<div class="max-w-xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Add Work</h2>

    <form action="{{ route('work.store') }}" method="POST">
        @csrf
        {{-- Nama Pekerjaan --}}
        <div class="mb-5">
          <label for="job_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Name</label>
          <input type="text" id="job_name" name="job_name"
              class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base 
              focus:ring-blue-500 focus:border-blue-500 
              dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
              dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>

        {{-- Jenis Tugas --}}
        <div class="mb-5">
          <label for="task_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Type</label>
          <input type="text" name="task_type" id="task_type" 
                 value="{{ old('task_type') }}"
                 class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base 
                        focus:ring-blue-500 focus:border-blue-500 
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                        dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>
          

        {{-- Rincian Tugas --}}
       
<div class="mb-5">
    <label for="task_details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Task Details
    </label>
    <textarea id="task_details" name="task_details" rows="6"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base 
               focus:ring-blue-500 focus:border-blue-500 
               dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
               dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('task_details') }}</textarea>
</div>


       {{-- Gaji Per Orang --}}
<div class="mb-5">
    <label for="salary_per_person" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Salary per Person
    </label>
    <select id="salary_per_person" name="salary_per_person"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
               focus:ring-blue-500 focus:border-blue-500
               block w-full p-2.5
               dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
               dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="500-900 Ribu" {{ old('salary_per_person') == '500-900 Ribu' ? 'selected' : '' }}>500-900 Ribu</option>
        <option value="1-3 Juta" {{ old('salary_per_person') == '1-3 Juta' ? 'selected' : '' }}>1-3 Juta</option>
        <option value="4-7 Juta" {{ old('salary_per_person') == '4-7 Juta' ? 'selected' : '' }}>4-7 Juta</option>
        <option value="8-10 Juta" {{ old('salary_per_person') == '8-10 Juta' ? 'selected' : '' }}>8-10 Juta</option>
    </select>
</div>


          
        {{-- Tombol Aksi --}}
        <div class="flex justify-between items-center mt-6">
            {{-- Tombol Kembali --}}
            <a href="{{ route('work.index') }}" 
                class="px-4 py-2 text-sm font-medium text-blue-700 border border-blue-700 rounded-lg 
                hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 
                dark:text-blue-300 dark:border-blue-300 dark:hover:bg-blue-300 dark:hover:text-gray-900">
                Kembali
            </a>

            {{-- Tombol Submit --}}
        <button type="submit"
          class="px-5 py-2.5 text-sm font-medium text-white bg-blue-500 rounded-lg 
          hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-200 
          dark:bg-blue-400 dark:hover:bg-blue-500 dark:focus:ring-blue-700">
          Submit
       </button>

        </div>
    </form>
</div>

@endsection