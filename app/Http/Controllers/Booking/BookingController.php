<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ruangans = Ruangan::orderBy('lantai', 'asc')->get();
        return view('booking.booking-add', compact('ruangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi input
    $request->validate([
        'waktu_pemakaian' => 'required',
        
    ]);

    // Pisahkan waktu awal dan akhir
    $waktuPemakaian = explode('-', $request->input('waktu_pemakaian'));
    $waktuPemakaianAwal = $waktuPemakaian[0];
    $waktuPemakaianAkhir = $waktuPemakaian[1];

    // Simpan data ke dalam database
    $booking = new Booking();
    $booking->date = $request->input('date');
    $booking->lantai = $request->input('lantai');
    $booking->nama_ruangan = $request->input('nama_ruangan');
    $booking->pengguna = $request->input('pengguna');
    $booking->kontak_pengguna = $request->input('kontak_pengguna');
    
    // Simpan waktu pemakaian
    $booking->waktu_pemakaian_awal = $waktuPemakaianAwal;
    $booking->waktu_pemakaian_akhir = $waktuPemakaianAkhir;

    // Simpan ke database
    $booking->save();

    return redirect()->route('booking.index')->with('success', 'Reservasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
