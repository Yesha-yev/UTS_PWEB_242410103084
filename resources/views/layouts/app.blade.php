<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Galeri Seni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{
        --primary-color: #ffffff !important;
        --text-color: #222222;
        --accent-color: #947e00;
        }
        body{
            background-color: var(--primary-color) !important;
            font-family: 'poppins', sans-serif;
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }
        .navbar{
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 1rem 2rem;
        }
        .navbar-brand{
            font-weight: 700;
            letter-spacing: 1px;
            color:var(--text-color);
        }
        .navbar-nav .nav-link{
            color: var(--text-color);
            margin: 0 10px;
            position: relative;       
            font-weight: 500;
            transition: color 0.3s ease;
        }
        /* .navbar-nav .nav-link::after{
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        } */
        .navbar-toggler{
            border: 0;
            outline: none;
            background: transparent;
        }
        .navbar-nav .nav-link:hover{
            color: var(--accent-color);
        }
        .navbar-nav .nav-link:hover::after{
            width: 100%;
        }
        .footer-modern{
            background-color: #ffffff;
            color: #333;
            padding: 3rem 0 5rem;
            border-top: 1px solid #eaeaea;
            position:relative;
            overflow: hidden;
        }
        .footer-modern h5{
            margin-bottom: 1rem;
            font-weight:600;
            color:#000;
        }
        .footer-modern ul {
            list-style: none;
            padding: 0;
        }
        .footer-modern ul li{
            margin-bottom: 8px;
        }
        .footer-modern a{
            color:#555;
            text-decoration: none;
        }
        .footer-modern a:hover{
            color: var(--accent-color);
        }
        .footer-bottom{
            border-top: 1px solid #eaeaea;
            text-align: center;
            padding-top: 1rem;
            margin-top:2rem;
            font-size: 0.9rem;
            color:#888;

        }
        .footer-art{
            width: 270px;
            height: auto;
            position: absolute;
            bottom:-10px;
            left:-5px;
            z-index:1;
            opacity: 0;
            animation: fadeInFloat 10s ease-in-out infinite;
            filter: drop-shadow(0 6px 8px rgba(0,0,0,0.3));
        }
        @keyframes fadeInFloat{
            0%{
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            } 
            10%{
                opacity: 1;
                transform: translateY(0) scale(1);
            }
            50%{
                transform: translateY(-12px) rotate(-2deg);
            }
            80%{
                transform: translateY(5px) rotate(1deg);
            }
            100%{
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .palet-awan{
            position: fixed;
            bottom: 50px;
            right: 20px;
            width: 200px;
            height: auto;
            opacity: 0.8;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 6s ease-in-out infinite;
        }
        .bb-awan{
            position: fixed;
            top: 20px;
            left: 30px;
            width: 150px;
            height: auto;
            opacity: 0.7;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 7s ease-in-out infinite;
        }
        .b-awan{
            position: fixed;
            top: 100px;
            right: 100px;
            width: 120px;
            height: auto;
            opacity: 0.6;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 5s ease-in-out infinite;
        }
        .pr-awan{
            position: fixed;
            bottom: 150px;
            left: 80px;
            width: 130px;
            height: auto;
            opacity: 0.7;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 6s ease-in-out infinite;
        }
        .br-awan{
            position: fixed;
            top: 200px;
            left: 200px;
            width: 140px;
            height: auto;
            opacity: 0.6;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 8s ease-in-out infinite;
        }
        .fw-awan{
            position: fixed;
            bottom: 300px;
            right: 250px;
            width: 110px;
            height: auto;
            opacity: 0.7;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 7s ease-in-out infinite;
        }
        .q-awan{
            position: fixed;
            top: 50px;
            right: 300px;
            width: 100px;
            height: auto;
            opacity: 0.6;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 5s ease-in-out infinite;
        }
        .pp-awan{
            position: fixed;
            bottom: 300px;
            left: 300px;
            width: 120px;
            height: auto;
            opacity: 0.7;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 6s ease-in-out infinite;
        }
        .p-awan{
            position: fixed;
            top: 300px;
            left: 400px;
            width: 130px;
            height: auto;
            opacity: 0.6;
            z-index: -1;
            pointer-events: none;
            animation: floatPalet 8s ease-in-out infinite;
        }
        @keyframes floatPalet{
            0%{
                transform: translateY(0px) rotate(0deg);
            } 
            50%{
                transform: translateY(-20px) rotate(3deg);
            }
            100%{
                transform: translateY(0) rotate(0deg);
            }
        }
        .card{
            background-color:rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: none;
        }
    </style>
</head>
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
</html>
