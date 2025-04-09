@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <h1>Daftar User</h1>
    <a href="{{ url('/users/create') }}">Tambah User</a>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->email }} - {{ $user->role_name }}</li>
        @endforeach
    </ul>
@endsection
