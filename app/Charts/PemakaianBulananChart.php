<?php

namespace App\Charts;

use App\Models\Booking;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PemakaianBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }


    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        $dataMingguan = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']; // Label untuk X-axis (mingguan)
        $chartData = [];

        // Ambil nama bulan untuk subtitle
        $namaBulan = date('F', mktime(0, 0, 0, $bulan, 10)); // Mengambil nama bulan

        // Ambil daftar ruangan unik dari tabel booking dan join dengan tabel ruangan untuk mendapatkan nama ruangan
        $ruanganList = Booking::select('ruangan_id') // Ambil ruangan_id dari tabel booking
            ->distinct()
            ->with('ruangan')
            ->where('status', 'booked')
            ->whereYear('tanggal', $tahun) // Filter untuk tahun yang sesuai
            ->whereMonth('tanggal', $bulan) // Filter untuk bulan yang sesuai
            ->get();

        // Loop untuk setiap ruangan
        foreach ($ruanganList as $booking) {
            $ruanganNama = $booking->ruangan->nama_ruangan; // Ambil nama ruangan melalui relasi
            $dataTotalPemakaianPerRuangan = [];

            // Loop untuk menghitung pemakaian per minggu (4 minggu)
            for ($minggu = 1; $minggu <= 4; $minggu++) {
                // Tentukan rentang tanggal untuk setiap minggu
                $startDay = ($minggu - 1) * 7 + 1; // Hari awal minggu (1, 8, 15, 22)
                $endDay = $minggu * 7; // Hari akhir minggu (7, 14, 21, 28)

                // Gunakan whereBetween untuk memastikan filter tanggal lebih tepat
                $totalPemakaian = Booking::where('ruangan_id', $booking->ruangan_id)
                    ->whereYear('tanggal', $tahun)
                    ->whereMonth('tanggal', $bulan)
                    ->whereBetween('tanggal', ["$tahun-$bulan-$startDay", "$tahun-$bulan-$endDay"]) // Filter rentang tanggal
                    ->count();

                // Simpan total pemakaian per ruangan per minggu
                $dataTotalPemakaianPerRuangan[] = $totalPemakaian;
            }

            // Tambahkan data pemakaian per ruangan ke dalam chart
            $chartData[] = [
                'name' => $ruanganNama, // Nama ruangan untuk label
                'data' => $dataTotalPemakaianPerRuangan // Data pemakaian per minggu untuk ruangan tersebut
            ];
        }

        // Membuat grafik dengan banyak garis (multiple lines)
        $chart = $this->chart->lineChart()
            ->setTitle('Pemakaian Ruangan Bulanan')
            ->setSubtitle('Jumlah Pemakaian Bulan ' . $namaBulan . ' ' . $tahun) // Subtitle dengan nama bulan
            ->setHeight(320)
            ->setXAxis($dataMingguan); // Label X-axis (minggu 1-4)

        // Tambahkan data untuk setiap ruangan ke chart
        foreach ($chartData as $data) {
            $chart->addData($data['name'], $data['data']); // Setiap ruangan punya satu garis
        }

        return $chart;
    }
}
