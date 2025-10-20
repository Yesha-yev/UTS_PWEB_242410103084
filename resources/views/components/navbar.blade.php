<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
