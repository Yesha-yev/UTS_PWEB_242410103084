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

Username
Password
Login

2. dashboard.blade.php
Menampilkan:

Selamat datang di Galeri Seni Indonesia, {{ $username }}! 👋
Cari dan lihatlah karya seni Lukisan dan Patung terbaik dari Indonesia

4. pengelolaan.blade.php
Loop dan tampilkan card karya seni:

Menampilkan beberaopa card berisi judul, tahun, dan seniman.

Halaman Layouts dan Components
1. app.blade.php

Membuat kerangka utama
<body class="d-flex flex-column min-vh-100">

    @include('components.navbar')

    <div class="container mb-5 mt-4 flex-grow-1">
        @yield('content')
    </div>

    @include('components.footer')

</body>

2. navbar.blade.php
Menampilkan Navbar atau header: 
- Login
- Karya Seni
- Dashboard
- Profile
- Logout

3. footer.blade.php
Menampilkan Foooter dibawah: 
- Alamat galeriseni
- Deskripsi singkat
- Fitur
