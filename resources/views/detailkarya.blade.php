@extends('layouts.app')

@section('title', $karya['judul'])

@section('content')

<div class="d-flex justify-content-center my-5">
    <div class="card shadow-sm" style="max-width: 600px; border-radius: 15px;">
        <img src="{{ asset($karya['gambar']) }}" class="card-img-top img-fluid rounded-top" alt="{{ $karya['judul'] }}" style="object-fit: cover; height:350px;">
        <div class="card-body text-center">
            <h3 class="card-title mb-3">{{$karya['judul']}}</h3>
            <p class="card-text mb-1"><strong>Seniman:</strong> {{ $karya['seniman'] }}</p>
            <p class="card-text text-muted mb-3"><small>{{ $karya['jenis'] }} | Tahun {{ $karya['tahun'] }}</small></p>
            <hr>
            <p class="card-text text-justify" style="text-align: justify">{{ $karya['deskripsi'] }}</p>
            <a href="{{ route('pengelolaan') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
