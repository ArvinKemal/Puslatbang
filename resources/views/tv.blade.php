<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tv</title>
    <link href="{{ asset('img/lanriicon.png') }}" rel="icon" type="image/png">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        th,
        td {
            text-align: center;
            padding: 5px;
            /* Kurangi padding sel */
            border: none;
        }

        th {
            background-color: #0033cc;
            /* Warna latar belakang header tabel */
            color: white;
            font-size: 16px;
            /* Ukuran font header lebih kecil */
        }

        
    </style>
</head>

    <body style="background-image: url('img/tampakdepankiri.jpg'); background-size: cover; background-position: center; height: 100vh; overflow: hidden;">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="card w-100" style="max-width: 1500px; background-color: rgba(255, 255, 255, 0.85);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="h4">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h1>
                        <div class="d-flex gap-2">
                            <img src="img/picture1.png" alt="USK Logo" class="img-fluid" style="width: 80px;">
                            <img src="img/lanrinobg.png" alt="LAN RI Logo" class="img-fluid" style="width: 150px; height: 80px;">
                            <img src="img/HIMATEKKOM 2.png" alt="Himatekom Logo" class="img-fluid" style="width: 80px;">
                        </div>
                    </div>
    
                    <table class="table table-bordered text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>Lokasi</th>
                                <th>Nama Ruangan</th>
                                <th>Waktu Penggunaan</th>
                                <th>Pengguna</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>Lantai {{ $booking->ruangan ? $booking->ruangan->lantai : 'Tidak Ada' }}</td>
                                    <td>{{ $booking->ruangan ? $booking->ruangan->nama_ruangan : 'Tidak Ada Ruangan' }}</td>
                                    <td>{{ $booking->waktu_pemakaian_awal }} - {{ $booking->waktu_pemakaian_akhir }}</td>
                                    <td>{{ $booking->nama_pengunjung }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                    <div class="d-flex justify-content-between small text-muted">
                        <span>&copy; Teknik Komputer USK 21</span>
                    </div>
                </div>
            </div>
        </div>
    </body>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</html>
