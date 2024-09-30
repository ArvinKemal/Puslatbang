<?php

namespace App\Charts;

use App\Models\Booking;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PemakaianHarianChart
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
        $dataHarian = []; // Label untuk X-axis (harian)
        $chartData = [];

        // Menghitung 7 hari terakhir
        for ($i = 6; $i >= 0; $i--) {
            $dataHarian[] = date('d-M', strtotime("-$i days")); // Format tanggal (misalnya: 25-Sep)
        }

        $tanggalMulai = date('d-M-Y', strtotime('-6 days'));
        $tanggalAkhir = date('d-M-Y'); // Tanggal hari ini


        // Ambil daftar ruangan unik dari tabel booking
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

            // Loop untuk menghitung pemakaian per hari (7 hari)
            for ($hari = 0; $hari < 7; $hari++) {
                $tanggal = date('Y-m-d', strtotime("-$hari days")); // Tanggal untuk hari tersebut

                // Hitung total pemakaian untuk ruangan tertentu pada tanggal tersebut
                $totalPemakaian = Booking::where('ruangan_id', $booking->ruangan_id)
                    ->whereDate('tanggal', $tanggal) // Filter berdasarkan tanggal
                    ->count();

                // Simpan total pemakaian per ruangan per hari
                $dataTotalPemakaianPerRuangan[] = $totalPemakaian;
            }

            // Tambahkan data pemakaian per ruangan ke dalam chart
            $chartData[] = [
                'name' => $ruanganNama, // Nama ruangan untuk label
                'data' => $dataTotalPemakaianPerRuangan // Data pemakaian per hari untuk ruangan tersebut
            ];
        }

        // Membuat grafik dengan banyak garis (multiple lines)
        $chart = $this->chart->lineChart()
            ->setTitle('Pemakaian Ruangan Mingguan')
            ->setSubtitle("Jumlah Pemakaian dari $tanggalMulai hingga $tanggalAkhir")
            ->setHeight(320)
            ->setXAxis($dataHarian); // Label X-axis (hari)

        // Tambahkan data untuk setiap ruangan ke chart
        foreach ($chartData as $data) {
            $chart->addData($data['name'], $data['data']); // Setiap ruangan punya satu garis
        }

        return $chart;
    }
}
