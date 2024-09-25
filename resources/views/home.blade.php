@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

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

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-8 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Booking</h6>
                </div>
                <div class="row">   
                    <div class="col-lg order-lg-1">
                        <div class="card shadow mb-4">
                            <div class="card-body"> 
                                    
                                    <div class="card">
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            
                                                            <th>Tanggal</th>
                                                            <th>Nama Ruangan</th>
                                                            <th>Lantai</th>
                                                            <th>Nama Pengunjung</th>
                                                            <th>Waktu Pemakaian</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @foreach($ruangans as $ruangan)
                                                            <tr>
                                                                <td>{{ $ruangan->nama_ruangan }}</td>
                                                                <td>{{ $ruangan->lantai }}</td>
                                                                <td>{{ $ruangan->kapasitas_ruangan }} Orang</td>
                                                                <td>
                                                                    @php
                                                                        // Mencari nama PIC berdasarkan ID
                                                                        $picName = '';
                                                                        foreach ($pics as $pic) {
                                                                            if ($pic->id === $ruangan->pic) {
                                                                                $picName = $pic->nama_pic;
                                                                                break;
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    {{ $picName ?: 'Tidak ada PIC' }} <!-- Menampilkan nama PIC atau teks jika tidak ada -->
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('ruangan.edit', $ruangan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                                    <form action="{{ route('ruangan.destroy', $pic->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');"> --}}
            
                                                                        {{-- @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Color System -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('img/svg/undraw_editable_dywm.svg') }}" alt="">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw →</a>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>

        </div>
    </div>
@endsection
