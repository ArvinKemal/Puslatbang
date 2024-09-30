<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
    <style>
        /* Kontainer untuk logo kiri, tengah, dan kanan di dalam kotak putih */
        .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    
        /* Ukuran maksimal logo */
        .logo {
            max-width: 100px; /* Perbesar logo */
        }
    
        /* Khusus untuk logo tengah */
        .logo-center {
            max-width: 160px; /* Perbesar logo tengah */
        }
    
        /* Tambahkan jarak antar elemen */
        .form-group {
            margin-bottom: 15px;
        }
    
        /* Transparansi untuk latar belakang putih dan ukuran lebih kecil */
        .bg-white-transparent {
            background-color: rgba(255, 255, 255, 0.5); /* Ubah menjadi 0.5 untuk transparansi lebih tinggi */
            padding: 30px;
            max-width: 900px;
            backdrop-filter: blur(3px); /* Kurangi efek blur */
        }
    
        /* Desain lebih halus */
        .rounded-custom {
            border-radius: 12px;
        }
    
        /* Hapus shadow untuk tampilan lebih simpel */
        .no-shadow {
            box-shadow: none;
        }
    
        /* Warna dan bayangan untuk teks agar lebih jelas */
        .text-center h1 {
            color: #000; /* Ubah menjadi hitam agar lebih jelas */
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.7); /* Tambahkan bayangan putih pada teks untuk kontras */
            font-weight: bold; /* Tambahkan ketebalan font */
        }
    
        /* Warna dan bayangan untuk logo agar lebih jelas */
        .logo {
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.3)); /* Bayangan untuk logo */
        }
    
        /* Ukuran font untuk label diperbesar */
        .form-label {
            font-size: 1.1rem;
            color: #000; /* Ubah menjadi hitam agar lebih jelas */
        }
    
        /* Styling tombol submit */
        .btn-primary {
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 8px;
        }
    
        /* Responsif di layar kecil */
        @media (max-width: 768px) {
            .bg-white-transparent {
                max-width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>

<body style="background-image: url('/img/assets/lan2.jpg'); background-size: cover; background-position: center;">
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="w-100 bg-white-transparent rounded-custom no-shadow">
            <!-- Wrapper untuk logo kiri, tengah, dan kanan -->
            <div class="logo-container">
                <!-- Logo di pojok kiri atas -->
                <img src="/img/Picture1.png" class="logo logo-left">
                <!-- Logo di tengah atas -->
                <img src="/img/lanrinobg.png" class="logo logo-center">
                <!-- Logo di pojok kanan atas -->
                <img src="/img/HIMATEKKOM 2.png" class="logo logo-right">
            </div>

            <div class="text-center mb-3">
                <h1 class="h4 font-weight-bold">Reservasi Ruangan Gedung - B</h1>
            </div>

            <div class="row g-2 mb-4">
                <div class="form-group col-md-4">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="form-group col-md-4">
                    <label for="lantai" class="form-label">Lantai</label>
                    <select class="form-control" id="lantai" name="lantai">
                        <option value="1">Lt. 1</option>
                        <option value="2">Lt. 2</option>
                        <option value="3">Lt. 3</option>
                        <option value="4">Lt. 4</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="ruangan" class="form-label">Ruangan</label>
                    <select class="form-control" id="ruangan" name="ruangan">
                        <!-- Opsi ruangan akan diperbarui berdasarkan pilihan lantai -->
                    </select>
                </div>
            </div>

            <script>
                const ruanganPerLantai = {
                    1: [
                        { value: "Klinik_Kesehatan", text: "Klinik Kesehatan" },
                        { value: "Ruang_Laktasi", text: "Ruang Laktasi" },
                        { value: "Restoran_Keumamah+VIP", text: "Restoran Keumamah+VIP" },
                        { value: "Ruang_Fitnes", text: "Ruang Fitnes" },
                    ],
                    2: [
                        { value: "Cut_Meutia_1", text: "Cut Meutia 1" },
                        { value: "Cut_Meutia_2", text: "Cut Meutia 2" },
                        { value: "Cut_Meutia_3", text: "Cut Meutia 3" },
                        { value: "Perpustakaan", text: "Perpustakaan" },
                    ],
                    3: [
                        { value: "Cut_Nyak_Dhien", text: "Cut Nyak Dhien" },
                        { value: "Teuku_Umar_1", text: "Teuku Umar 1" },
                        { value: "Teuku_Umar_2", text: "Teuku Umar 2" },
                        { value: "Teuku_Umar_3", text: "Teuku Umar 3" },
                        { value: "Teuku_Umar_4", text: "Teuku Umar 4" },
                    ],
                    4: [
                        { value: "Ruang_Studio", text: "Ruang Studio" },
                    ]
                };

                document.getElementById('lantai').addEventListener('change', function () {
                    const lantaiTerpilih = this.value;
                    const ruanganSelect = document.getElementById('ruangan');
                    ruanganSelect.innerHTML = '';
                    if (ruanganPerLantai[lantaiTerpilih]) {
                        ruanganPerLantai[lantaiTerpilih].forEach(function (ruangan) {
                            const option = document.createElement('option');
                            option.value = ruangan.value;
                            option.text = ruangan.text;
                            ruanganSelect.appendChild(option);
                        });
                    }
                });

                document.getElementById('lantai').dispatchEvent(new Event('change'));
            </script>

            <div class="row g-2 mb-3">
                <div class="form-group col-md-4">
                    <label for="pukul" class="form-label">Pukul</label>
                    <select class="form-control" id="pukul" name="pukul">
                        <option value="09.00-12.00">09.00-12.00</option>
                        <option value="14.00-16.00">14.00-16.00</option>
                        <option value="full_day">Full Day</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="pengunjung" class="form-label">Pengunjung</label>
                    <input type="text" class="form-control" id="pengunjung" name="pengunjung" placeholder="Jumlah Pengunjung">
                </div>
                <div class="form-group col-md-4">
                    <label for="kontak_pengunjung" class="form-label">Kontak Pengunjung</label>
                    <input type="text" class="form-control" id="kontak_pengunjung" name="kontak_pengunjung" placeholder="Nomor Kontak">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>