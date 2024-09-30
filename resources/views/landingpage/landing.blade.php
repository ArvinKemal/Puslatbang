<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS -->

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <style>
    /* Atur seluruh halaman agar menggunakan flexbox */
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    /* Membuat .wrapper agar mengambil seluruh tinggi yang tersedia */
    .wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    /* Konten utama harus memenuhi seluruh ruang kosong */
    .content {
        flex: 1;
    }

    /* Background settings untuk mengisi seluruh halaman kecuali navbar & footer */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('img/assets/lan3.jpg') }}'); /* Gambar background */
        background-size: cover;
        background-position: center;
        filter: blur(5px); /* Menambahkan blur */
        z-index: -1; /* Pastikan background berada di belakang konten */
    }

    /* Container services di depan background */
    .services {
        position: relative;
        z-index: 1;
        padding-top: 100px;
    }

    /* Additional adjustments for positioning */
    .services .container {
        background-color: rgba(255, 255, 255, 0.85); /* Latar belakang semi transparan */
        padding: 20px;
        border-radius: 10px;
    }

    .services .card {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .services .card-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .services .card-text {
        font-size: 1rem;
    }

    .footer {
        background-color: #343a40;
        color: #ffffff;
        padding: 1px 10px; /* Mengurangi padding atas dan bawah */
    }

    .footer .container {
        margin-bottom: 10px; /* Menghilangkan margin di bagian bawah container */
    }
    </style>
</head>
<body>

    <!-- Wrapper untuk seluruh halaman -->
    <div class="wrapper">
        
        <!-- Navbar -->
        <header class="bg-primary">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <div class="logo">
                        <img src="{{ url('img/lanrinobg.png') }}" alt="Lan Logo" class="img-fluid" style="height: 50px;">
                    </div>
                    <nav>
                        <ul class="nav">
                            <li class="nav-item"><a href="#" class="nav-link text-white">Ruangan</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white">Booking</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Section for 4 Booking Now Columns -->
        <section class="services py-5">
            <div class="container">
                <h2 class="text-center mb-1">PUSLATBANG KHAN LAN RI</h2>
                <h2 class="text-center mb-5">BANGGA MELAYANI BANGSA</h2>
                
                <div class="row">
                    <!-- Loop through each service and display in columns -->
                    @foreach($services as $index => $service)
                        <div class="col-md-6 mb-4"> <!-- 2 items per row with mb-4 for spacing -->
                            <div class="card text-center h-100"> <!-- h-100 to ensure equal height -->
                                <img src="{{ asset($service->image) }}" class="card-img-top" alt="{{ $service->title }}"> <!-- Menampilkan gambar -->
                                <div class="card-body">
                                    <h5 class="card-title">{{ $service->title }}</h5>
                                    <p class="card-text">{{ $service->description }}</p>
                                    <a href="{{ url('/booking') }}" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>

    <!-- Footer -->
    <footer class="footer py-1">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-8">
                    <h4 class="text-white">LAN RI</h4>
                    <p class="text-muted">Berorientasi Pelayanan Akuntabel Kompoten Harmonis Loyal Adaptif Kolaboratif</p>
                </div>
            </div>
        </div>

        <!-- Horizontal Line -->
        <hr class="my-2" style="border-top: 4px solid #000000;"> <!-- Mengurangi margin pada garis -->

        <!-- Small Logos Section -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <img src="{{ asset('img/logo1.png') }}" alt="Logo 1" class="img-fluid" style="height: 50px;">
                </div>
                <div class="col-auto">
                    <img src="{{ asset('img/logo2.png') }}" alt="Logo 2" class="img-fluid" style="height: 50px;">
                </div>
                <div class="col-auto">
                    <img src="{{ asset('img/logo3.png') }}" alt="Logo 3" class="img-fluid" style="height: 50px;">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
