# UTS_PWEB_242410103084

Sistem sederhana tentang galeri seni, berisi 2 jenis karya seni yaitu Lukisan dan juga Patung. Tujuan sistem ini adalah untuk mengenalkan karya karya milik Indonesia yang mendunia ke warga lokal tanpa harus mengahadiri acara pameran seni. Memudahkan kolektor karya seni yang ingin mencari informasi, serta memudahkan para pencinta karya seni untuk melihat karya yang mereka kagumi. Membantu para seniman untuk mengenalkan karya mereka yang lainnya.

UTS Praktikum Pemrograman Berbasis Website
Projek Laravel sederhana yang memuat sistem login, dashboard, profil, dan halaman pengelolaan.

Fitur Utama
Login: menggunakan username & password.
Dashboard: Menyambut user setelah login.
Profile: Menampilkan info user yang sedang login.
Pengelolaan: Menampilkan daftar karya seni dari controller dalam bentuk card.
Blade Component: Navbar & Footer.
Struktur Folder
/routes
└── web.php

/app/Http/Controllers
└── PageController.php

/resources/views
├── layouts/
│   └── app.blade.php
├── components/
│   ├── navbar.blade.php
│   └── footer.blade.php
├── login.blade.php
├── dashboard.blade.php
├── profile.blade.php
├── detailkarya.blade.php
└── pengelolaan.blade.php

Routing (routes/web.php)
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login'])->name('login');
Route::post('/login', [PageController::class, 'doLogin'])->name('doLogin');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/logout', [PageController::class,'logout'])->name('logout');
Route::get('/detailkarya/{id}', [PageController::class,'detailkarya'])->name('detailkarya');

Controller: PageController.php
Semua halaman diproses melalui controller PageController.
Login dilakukan dengan mencocokkan input dari user terhadap array user.
Contoh struktur array user:
private $akun = [
            'admin' => [
                'username'=> 'admin',
                'password'=> '123',
                'nama'=> 'ADMIN TERCINTA',
                'bidang' => 'Operator',
                'bio'=> 'SAYA ADMIN',
                'foto'=> 'images/me1.jpg'
            ],
            'faiz' => [
                'username'=> 'faiz',
                'password'=> 'rasa',
                'nama'=> 'Faiz Ulfia Sasmita',
                'bidang' => 'Lukisan dan Patung',
                'bio'=> 'Seniman muda yang mengekspresikan emosi lewat warna, bentuk, serta rasa.',
                'foto'=> 'images/me1.jpg'
            ]
            ];
Halaman View
1. login.blade.php
Form login dengan input username dan password.

<form method="POST" action="{{ route('doLogin') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-dark w-100">Login</button>
            </form>
2. dashboard.blade.php
Menampilkan:
<div class="container text-center mt-5 py-5">
    <h1 class="fw-bold mb-3">Selamat datang di Galeri Seni Indonesia, {{ $username }}! 👋</h1>
    <p class="lead">Cari dan lihatlah karya seni Lukisan dan Patung terbaik dari Indonesia</p>
    <a href="{{ route('pengelolaan') }}" class="btn btn-dark mt-3">Lihat Koleksi</a>
</div>
3. profile.blade.php
Tampilkan detail lengkap user:
<div class="card mx-auto shadow" style="max-width: 400px;">
    <div class="card-body text-center">
        <img src="{{ $profil['foto'] }}" class="rounded-circle mb-3" width="150" height="150">
        <h4>{{ $profil['nama'] }}</h4>
        <p><strong>Bidang:</strong> {{ $profil['bidang'] }}</p>
        <p><strong>Username:</strong> {{ $profil['username'] }}</p>
        <p><em>{{ $profil['bio'] }}</em></p>
    </div>
</div>
4. pengelolaan.blade.php
Loop dan tampilkan card karya seni:
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
@endforeach
Halaman Layouts dan Components
1. app.blade.php
<body class="d-flex flex-column min-vh-100">

    <img src="{{ asset('images/palet.jpg') }}" alt="Palet" class="palet-awan">
    <img src="{{ asset('images/bb.jpg') }}" alt="Black flower" class="bb-awan">
    <img src="{{ asset('images/b.jpg') }}" alt="blackflower" class="b-awan">
    <img src="{{ asset('images/pr.jpg') }}" alt="pitamerah" class="pr-awan">
    <img src="{{ asset('images/br.png') }}" alt="brush red" class="br-awan">
    <img src="{{ asset('images/fw.png') }}" alt="bunag putih" class="fw-awan">
    <img src="{{ asset('images/q.png')}}" alt="tanya" class="q-awan">
    <img src="{{ asset('images/pp.png')}}" alt="pita pink" class="pp-awan">
    <img src="{{ asset('images/p1.png') }}" alt="brush pink" class="p-awan">
    @include('components.navbar')

    <div class="container mb-5 mt-4 flex-grow-1">
        @yield('content')
    </div>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
2. navbar.blade.php
Menampilkan Navbar atau header: 
<nav class="navbar navbar-expand-lg shadow-sm py-3">
  <div class="container">
    <a class="navbar-brand" href="{{ route('pengelolaan') }}"><span class="bg-gradient-logo me-2 rounded-circle d-flex justify-content-center align-items-center" style="width:35px; height:35px;">🎨🎭👩🏻‍🎨</span><span class="fw-semibold text-dark">Galeri<span class="text-accent">Seni</span></span></a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><i class="fa-solid fa-bars fa-lg text-dark"></i></button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            @if(session('username'))
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pengelolaan') }}">Karya Seni</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
            @else
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pengelolaan') }}">Karya Seni</a></li>
        @endif
        </ul>
    </div>
  </div>
</nav>
3. footer.blade.php
Menampilkan Foooter dibawah: 
<footer class="footer-modern position-relative">
    <img src="{{ asset('images/mine.png') }}" alt="mine" class="footer-art">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>Galeri Seni</h5>
                <p >Karya Lukisan dan Patung Terbaik di Indonesia</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('pengelolaan') }}">Karya Seni</a></li>
                    <li><a href="{{ route('profile') }}">Profil</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Hubungi Admin</h5>
                <p><i class="bi bi-geo-alt"></i>Jl.Kalisungai No.123</p>
                <p><i class="bi bi-envelope"></i>galeriseni@cantik.com</p>
                <p><i class="bi bi-phone"></i>+62 812-3455-6789</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Galeri Seni. All rights reserved.</p>
        </div>
    </div>
</footer>
