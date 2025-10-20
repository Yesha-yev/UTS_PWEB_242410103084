@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="card mx-auto shadow" style="max-width: 400px;">
    <div class="card-body text-center">
        <img src="{{ $profil['foto'] }}" class="rounded-circle mb-3" width="150" height="150">
        <h4>{{ $profil['nama'] }}</h4>
        <p><strong>Bidang:</strong> {{ $profil['bidang'] }}</p>
        <p><strong>Username:</strong> {{ $profil['username'] }}</p>
        <p><em>{{ $profil['bio'] }}</em></p>
    </div>
</div>
@endsection
