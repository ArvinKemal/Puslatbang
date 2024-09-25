    @extends('layouts.admin')

    @section('main-content')
        <!-- Page Heading -->
        <h1 class="h3 mb-4  text-gray-800" style="font-size: 28px; font-weight:600;">{{ __('Reservasi Ruangan Gedung - B') }}</h1>

        @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger border-left-danger" role="alert">
                <ul class="pl-4 my-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="col-lg order-lg-1">

            <div class="card shadow mb-4">

            <div class="row">
                <div class="card-body">

                <form method="POST" action="{{ route('booking.store') }}" autocomplete="off">
                    @csrf
                    <h6 class="heading-small text-muted mb-4">Informasi BOOKING</h6>

                <div class="col-lg order-lg-1">
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-lg-6">
                            <div class="row"></div>
                            <div class="form-group focused ">
                                <label class="form-control-label" for="date" style="font-size: 24px; font-weight:400;">Tanggal</label>
                                <input type="date" id="date" class="form-control" name="date" style="height: 50px;" placeholder="Select date">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused ">
                                <label class="form-control-label" for="lantai" style="font-size: 24px; font-weight:400;">Lantai</label>
                                <select id="lantai" class="form-control" name="lantai" style="height: 50px;">
                                    <option value="">Pilih lantai</option>
                                    <option value="1">Lantai 1</option>
                                    <option value="2">Lantai 2</option>
                                    <option value="3">Lantai 3</option>
                                    <option value="4">Lantai 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused ">
                                <label class="form-control-label" for="nama_ruangan" style="font-size: 24px; font-weight:400;">Ruangan</label>
                                <select id="nama_ruangan" class="form-control" name="nama_ruangan" style="height: 50px;">
                                    <option value="">Pilih Ruangan</option>
                                    @foreach($ruangans as $ruangan)
                                    <option value="{{ $ruangan->id }}" data-lantai="{{ $ruangan->lantai }}">
                                        {{ $ruangan->nama_ruangan }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused ">
                                <label class="form-control-label" for="waktu_pemakaian" style="font-size: 24px; font-weight:400;">Waktu</label>
                                <select id="waktu_pemakaian" class="form-control" name="waktu_pemakaian" style="height: 50px;">
                                    <option value="">Pilih waktu</option>
                                    <option value="09:00-12:00">09:00-12:00</option>
                                    <option value="14:00-16:00">14:00-16:00</option>
                                    <option value="09:00-16:00">Full Day</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused ">
                                <label class="form-control-label" for="pengguna" style="font-size: 24px; font-weight:400;">Pengunjung</label>
                                <input type="text" id="pengguna" class="form-control" name="pengguna" style="height: 50px;" placeholder="Masukkan pengguna">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused ">
                                <label class="form-control-label" for="pengguna" style="font-size: 24px; font-weight:400;">Kontak Pengunjung</label>
                                <input type="text" id="pengguna" class="form-control" name="pengguna" style="height: 50px;" placeholder="Masukkan Kontak">
                            </div>
                        </div>
                    </div>
                                    

                            <!-- Button -->
                            <div class="pl-lg-4" style="margin-top: 30px">
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script>
                            document.getElementById('lantai').addEventListener('change', function () {
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
                        </script>
                    </div>
                    </div>
                </div>
            </div>
        </div>  
    @endsection
