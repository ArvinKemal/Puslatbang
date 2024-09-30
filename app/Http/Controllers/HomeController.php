<?php

namespace App\Http\Controllers;

use App\Charts\PemakaianBulananChart;
use App\Charts\PemakaianHarianChart; // Import chart harian
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(PemakaianBulananChart $bulananChart, PemakaianHarianChart $harianChart)
    {
        $bulananChart = $bulananChart->build();
        $harianChart = $harianChart->build(); // Mengambil data dari chart harian
        $users = User::count();
        $bookings = Booking::orderBy('tanggal', 'asc')->get();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget', 'bookings', 'bulananChart', 'harianChart'));
    }
}
