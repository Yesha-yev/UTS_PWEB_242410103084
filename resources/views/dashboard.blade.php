@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container text-center mt-5 py-5">
    <h1 class="fw-bold mb-3">Selamat datang di Galeri Seni Indonesia, {{ $username }}! 👋</h1>
    <p class="lead">Cari dan lihatlah karya seni Lukisan dan Patung terbaik dari Indonesia</p>
    <a href="{{ route('pengelolaan') }}" class="btn btn-dark mt-3">Lihat Koleksi</a>
</div>
@endsection
