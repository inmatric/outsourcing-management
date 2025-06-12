@extends('components.layouts.main-layout')
@section('title', 'Employee')
@section('content')
    <header class="py-20 px-4 text-center max-w-4xl mx-auto">
        <h1 class="text-3xl sm:text-4xl font-extrabold mb-6  drop-shadow-sm">
            Selamat datang, {{ Auth::user()->username }}!
        </h1>
        <h1 class="text-4xl sm:text-5xl font-extrabold mb-6 text-blue-700 drop-shadow-sm">
            Manajemen Outsourcing
        </h1>
        <p class="max-w-3xl mx-auto text-lg sm:text-xl font-light leading-relaxed text-slate-700">
           kami siap membantu untuk menemukan detail pekerjaan anda!
        </p>
    </header>
@endsection
