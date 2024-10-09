<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<input type="hidden" id="ruangan_hidden" name="ruangan" value="">
<input type="hidden" id="lantai_hidden" name="lantai" value="">

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/lanriicon.png') }}" rel="icon" type="image/png">

    <!-- Custom Styles -->
    <style>
        .logo-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo-lanri img {
            width: 130px;
            height: auto;
        }

        .logo-usk-himatekom img {
            width: 80px;
            height: auto;
        }

        .bg-white-transparent {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 30px;
            max-width: 900px;
            backdrop-filter: blur(2px);
        }

        .rounded-custom {
            border-radius: 12px;
        }

        .no-shadow {
            box-shadow: none;
        }

        .text-center h1 {
            color: #000;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.7);
            font-weight: bold;
            font-size: 25px;
        }

        .form-label {
            font-size: 1.1rem;
            color: #000;
        }

        .btn-primary {
            padding: 12px 24px;
            font-size: 1.1rem;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .bg-white-transparent {
                max-width: 100%;
                padding: 20px;
            }

            .logo-lanri img {
                width: 120px;
            }

            .logo-usk-himatekom img {
                width: 60px;
            }
        }
    </style>
</head>

<body style="background-image: url('/img/assets/lan2.jpg'); background-size: cover; background-position: center;">
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="w-100 bg-white-transparent rounded-custom no-shadow">
            <div class="d-flex justify-content-between align-items-center logo-container">
                <div class="logo-lanri">
                    <img src="/img/lanrinobg.png" alt="LAN RI Logo">
                </div>
                <div class="d-flex gap-3 logo-usk-himatekom">
                    <img src="/img/Picture1.png" alt="USK Logo">
                    <img src="/img/HIMATEKKOM 2.png" alt="Himatekom Logo">
                </div>
            </div>

            @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
            <div class="text-center mb-3">
                <h1 class="h4 font-weight-bold">Reservasi Ruangan Gedung - B</h1>
            </div>

            <!-- Mulai form reservasi -->
            <form action="{{ route('booking-user.store') }}" method="POST">
                @csrf
                <div class="col-lg order-lg-1">
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="tanggal" style="font-size: 16px; font-weight:700;">Tanggal</label>
                                <input type="date" id="tanggal" class="form-control" name="tanggal" style="height: 50px;" placeholder="Select tanggal">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="lantai" style="font-size: 16px; font-weight:700;">Lantai</label>
                                <input type="text" id="lantai_input" class="form-control" name="lantai" readonly style="height: 50px;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="ruangan_id" style="font-size: 16px; font-weight:700;">Ruangan</label>
                                <select id="nama_ruangan" class="form-control" name="ruangan_id" style="height: 50px;" onchange="updateFields(this)">
                                    <option value="">Pilih Ruangan</option>
                                    @foreach ($ruangans as $ruangan)
                                        <option value="{{ $ruangan->id }}" data-lantai="{{ $ruangan->lantai }}">
                                            {{ $ruangan->nama_ruangan }} ( {{ $ruangan->kapasitas_ruangan }} orang )
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="waktu_pemakaian" style="font-size: 16px; font-weight:700;">Waktu</label>
                                <select id="waktu_pemakaian" class="form-control" name="waktu_pemakaian" style="height: 50px;">
                                    <option value="">Pilih waktu</option>
                                    @php
                                        use App\Models\Booking; // Impor namespace lengkap model Booking

                                        $ruanganId = old('ruangan_id'); // Ambil ID ruangan yang dipilih jika ada
                                        $tanggal = old('tanggal'); // Ambil tanggal jika ada
                                        // Ambil data booking untuk ruangan dan tanggal yang sama
                                        $existingBookings = Booking::where('ruangan_id', $ruanganId)
                                            ->where('tanggal', $tanggal)
                                            ->get();
                                        $usedTimes = [];

                                        foreach ($existingBookings as $booking) {
                                            $usedTimes[] =
                                                $booking->waktu_pemakaian_awal . '-' . $booking->waktu_pemakaian_akhir;
                                        }
                                    @endphp
                                    <option value="09:00-12:00" {{ in_array('09:00-12:00', $usedTimes) ? 'disabled style=color:red;' : '' }}>09:00-12:00</option>
                                    <option value="14:00-16:00" {{ in_array('14:00-16:00', $usedTimes) ? 'disabled style=color:red;' : '' }}>14:00-16:00</option>
                                    <option value="09:00-16:00" {{ in_array('09:00-16:00', $usedTimes) ? 'disabled style=color:red;' : '' }}>Full Day</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused ">
                                <label class="form-control-label" for="nama_pengunjung"
                                    style="font-size: 16px; font-weight:700;">Nama Pengunjung</label>
                                <input type="text" id="nama_pengunjung" class="form-control"
                                    name="nama_pengunjung" style="height: 50px;" placeholder="Masukkan pengunjung">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused ">
                                <label class="form-control-label" for="kontak_pengunjung"
                                    style="font-size: 16px; font-weight:700;">Kontak Pengunjung</label>
                                <input type="text" id="kontak_pengunjung" class="form-control"
                                    name="kontak_pengunjung" style="height: 50px;" placeholder="Masukkan Kontak">
                            </div>
                        </div>
                        <div class="col-lg-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('lantai').addEventListener('change', function() {
                        var selectedLantai = this.value;
                        var ruanganOptions = document.getElementById('nama_ruangan').options;

                        // Loop through ruangan options and display only those that match the selected lantai
                        for (var i = 0; i < ruanganOptions.length; i++) {
                            var option = ruanganOptions[i];
                            var ruanganLantai = option.getAttribute('data-lantai');

                            if (ruanganLantai === selectedLantai || selectedLantai === "") {
                                option.style.display = ''; // Show option
                            } else {
                                option.style.display = 'none'; // Hide option
                            }
                        }
                    });


                    document.getElementById('tanggal').addEventListener('change', updateWaktuPemakaian);
                    document.getElementById('nama_ruangan').addEventListener('change', updateWaktuPemakaian);


                    function updateWaktuPemakaian() {
                        var tanggal = document.getElementById('tanggal').value;
                        var ruanganId = document.getElementById('nama_ruangan').value;

                        // Hanya fetch data jika tanggal dan ruangan dipilih
                        if (tanggal && ruanganId) {
                            fetch(`/check-booking?ruangan_id=${ruanganId}&tanggal=${tanggal}`)
                                .then(response => response.json())
                                .then(data => {
                                    var waktuPemakaianSelect = document.getElementById('waktu_pemakaian');
                                    waktuPemakaianSelect.innerHTML = ''; // Kosongkan pilihan yang ada

                                    var timeSlot = '09:00:00-16:00:00'; // Misal hanya ada satu slot waktu

                                    // Cek apakah waktu tersebut sudah digunakan
                                    if (data.usedTimes.includes(timeSlot)) {
                                        // Jika slot sudah penuh, tampilkan teks "Hari ini sudah dibooking"
                                        var messageOption = document.createElement('option');
                                        messageOption.text = 'Hari ini sudah dibooking';
                                        messageOption.disabled = true; // Tidak bisa dipilih
                                        messageOption.style.color = 'red'; // Beri warna merah pada teks
                                        waktuPemakaianSelect.appendChild(messageOption);

                                        // Disable select dan tombol submit
                                        // waktuPemakaianSelect.disabled = true;
                                        // submitButton.disabled = true;
                                    } else {
                                        // Jika slot masih tersedia, tambahkan opsi waktu ke select
                                        var option = document.createElement('option');
                                        option.value = timeSlot;
                                        option.text = timeSlot;
                                        waktuPemakaianSelect.appendChild(option);

                                        // Enable select dan tombol submit
                                        waktuPemakaianSelect.disabled = false;
                                        submitButton.disabled = false;
                                    }
                                })
                                .catch(error => console.error('Error fetching booking data:', error));
                        }
                    }
                </script>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- End form reservasi -->
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ruanganSelect = document.getElementById('nama_ruangan');
            const lantaiHidden = document.getElementById('lantai_hidden');
            const ruanganHidden = document.getElementById('ruangan_hidden');
    
            ruanganSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const lantai = selectedOption.getAttribute('data-lantai');
                const ruangan = selectedOption.text;
    
                // Mengisi nilai ke input tersembunyi
                lantaiHidden.value = lantai;
                ruanganHidden.value = ruangan;
    
                // Tampilkan nilai di console (untuk debug, bisa dihapus nanti)
                console.log('Lantai: ' + lantai);
                console.log('Ruangan: ' + ruangan);
            });
        });
    </script>
    
</body>

</html
