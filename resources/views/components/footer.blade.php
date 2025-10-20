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
