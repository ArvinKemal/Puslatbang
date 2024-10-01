<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruangan</title>
    <link href="{{ asset('img/lanriicon.png') }}" rel="icon" type="image/png">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
            height: 100%;
            /* Memastikan semua kartu memiliki tinggi yang sama */
        }

        .card:hover {
            transform: scale(1.05);
        }

        .room-image {
            width: 100%;
            height: 150px;
            /* Menentukan tinggi gambar agar seragam */
            object-fit: cover;
        }

        .room-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            /* Memastikan isi kartu merentang ke penuh */
        }

        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
        }
    </style>
</head>

<body class="bg-light text-dark py-5">
    <div class="container">
        <h1 class="mb-4 display-4 text-center">Daftar Ruangan</h1>

        @php
            $currentFloor = null;
        @endphp

        @foreach ($ruangans as $ruangan)
            @if ($currentFloor !== $ruangan->lantai)
                @php
                    $currentFloor = $ruangan->lantai;
                @endphp
                <!-- Header Lantai -->
                <div class="floor-header">
                    <h2 class="bg-dark text-white p-2 rounded">Lantai {{ $ruangan->lantai }}</h2>
                </div>
                <div class="row">
            @endif

            <!-- Daftar ruangan dalam grid per lantai -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/ruangan/' . $ruangan->image) }}" class="room-image"
                        alt="{{ $ruangan->nama_ruangan }}">
                    <div class="room-body">
                        <h5 class="card-title">{{ $ruangan->nama_ruangan }}</h5>
                        <p class="card-text text-muted">Kapasitas: {{ $ruangan->kapasitas_ruangan }} orang</p>
                        <a href="" class="btn btn-primary">Go to Booking</a>
                    </div>
                </div>
            </div>

            @if ($loop->last || $ruangans[$loop->index + 1]->lantai !== $ruangan->lantai)
    </div> <!-- Akhiri .row jika lantai berbeda atau terakhir -->
    @endif
    @endforeach
    </div>

    <!-- JS Files -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
