@extends('layouts.app')

@section('title', 'Karya Seni')

@section('content')

<style>
    :root{
        --primary-color: #665700;
        --secondary-color: #F7E7CE;
    }
    .card:hover{
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(71, 32, 0, 0.2);
        transition: all 0.3s ease;
    }
    .card-img-top{
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .a.btn.card-btn-primary{
        background-color: var(--primary-color) !important;
        border: none;
        width: 100%;
        padding: 10px 15px;
        color: white;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        border-radius: 25px;
        transition: all 0.3s ease;
    }
    .card-btn-primary:hover{
        background-color: var(--secondary-color)!important;
        transform: translateY(-2px);
    }
    .card-body .card-btn-primary{
        margin-top: auto;
        width: 100%;
        border-radius: 25px;
        padding: 10px;
        text-align: center;
    }
    .card-body{
        display: flex;
        flex-direction: column;
    }
    
</style>
<h3 class="mb-3 text-center">Daftar Karya Seni</h3>
<div class="search-bar-mb3">
    <form method="get" class="d-flex mb-4" action="">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari karya seni..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-dark">Cari</button>
    </form>
</div>

<div class="row">
    @foreach($data as $item)
        <div class="col-md-4 mb-4 d-flex">
            <div class="card flex-fill text-center">
                <img src="{{ $item['gambar'] }}" class="card-img-top" alt="{{ $item['judul'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['judul'] }}</h5>
                    <p class="card-text">Seniman: {{ $item['seniman'] }}</p>
                    <p class="card-text"><small class="text-muted">{{ $item['jenis'] }} | Tahun {{ $item['tahun'] }}</small></p>
                    <a href="{{ route('detailkarya', ['id'=>$item['id']]) }}" class="btn card-btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
