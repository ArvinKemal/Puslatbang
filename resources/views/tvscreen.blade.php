{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Penggunaan Ruangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-image: url('img/tampakdepankiri.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            padding: 20px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.85); /* Transparansi latar belakang */
            padding: 20px;
            border-radius: 10px;
            width: 90%; /* Lebar container */
            max-width: 1500px; /* Batas maksimum lebar */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px; /* Sesuaikan ukuran font */
            font-weight: bold;
            color: #000;
            margin: 0;
            text-align: left;
        }

        .logos {
            display: flex;
            justify-content: flex-end;
            gap: 20px; /* Jarak antar logo */
        }

        .logos img {
            width: 100px; /* Ukuran logo */
            height: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: none;
        }

        th {
            background-color: #0033cc; /* Warna latar belakang header tabel */
            color: white;
            font-size: 18px; /* Ukuran font header */
        }

        td {
            font-size: 16px; /* Ukuran font sel */
            color: #333;
        }

        td:first-child {
            text-align: left;
            font-weight: bold;
        }

        .footer {
            display: flex;
            justify-content: space-between; /* Penataan kiri dan kanan */
            font-size: 12px;
            color: #333;
            line-height: 1.5;
        }

        .footer-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>Senin 12 September 2012</h1>
                <div class="logos">
                    <img src="img/picture1.png" alt="USK Logo">
                    <img src="img/lanrinobg.png" alt="LAN RI Logo" style="width: 150px; height: 80px;">
                    <img src="img/HIMATEKKOM 2.png" alt="Himatekom Logo">
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Lokasi</th>
                        <th>Nama Ruangan</th>
                        <th>Waktu Penggunaan</th>
                        <th>Pengguna/PIC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lantai 1</td>
                        <td>Klinik Kesehatan</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Ruang Laktasi</td>
                        <td>Full Day</td>
                        <td>PKN 3/ILHAM</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Restoran Keumamah+VIP</td>
                        <td>09:00-12:00</td>
                        <td>PKN 3/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Ruang Fitnes</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                    <tr>
                        <td>Lantai 2</td>
                        <td>Cut Meutia 1</td>
                        <td>Full Day</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Cut Meutia 2</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Cut Meutia 3</td>
                        <td>Full Day</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Perpustakaan</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td>Lantai 3</td>
                        <td>Cut Nyak Dhien</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teuku Umar 1</td>
                        <td>14:00-16:30</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teuku Umar 2</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teuku Umar 3</td>
                        <td>14:00-16:30</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teuku Umar 4</td>
                        <td>Full Day</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                    <tr>
                        <td>Lantai 4</td>
                        <td>Ruang Studio</td>
                        <td>Full Day</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                </tbody>
            </table>
            <div class="footer">
                <div>Copyright: Tekkom USK 21<br>Ahyar Maulana<br>Arvin Kemal<br>Muhammad Hafifi<br>Taufiqur Rahman</div>
                <div class="footer-right">
                    Mentor/Pembimbing Lapangan:<br>Ilham Khalid<br>Rafika
                </div>
            </div>
        </div>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Penggunaan Ruangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            background-image: url('img/tampakdepankiri.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            overflow: hidden; /* Menghindari scroll */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Gunakan seluruh tinggi layar */
            padding: 20px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.85); /* Transparansi latar belakang */
            padding: 20px;
            border-radius: 10px;
            width: 90%; /* Lebar container */
            max-width: 1500px; /* Batas maksimum lebar */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px; /* Sesuaikan jarak untuk menghemat ruang */
        }

        .header h1 {
            font-size: 22px; /* Sesuaikan ukuran font */
            font-weight: bold;
            color: #000;
            margin: 0;
            text-align: left;
        }

        .logos {
            display: flex;
            justify-content: flex-end;
            gap: 10px; /* Jarak antar logo lebih kecil */
        }

        .logos img {
            width: 80px; /* Ukuran logo lebih kecil */
            height: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px; /* Sesuaikan jarak */
        }

        th, td {
            text-align: center;
            padding: 5px; /* Kurangi padding sel */
            border: none;
        }

        th {
            background-color: #0033cc; /* Warna latar belakang header tabel */
            color: white;
            font-size: 16px; /* Ukuran font header lebih kecil */
        }

        td {
            font-size: 14px; /* Ukuran font sel lebih kecil */
            color: #333;
        }

        td:first-child {
            text-align: left;
            font-weight: bold;
        }

        .footer {
            display: flex;
            justify-content: space-between; /* Penataan kiri dan kanan */
            font-size: 10px; /* Ukuran font lebih kecil */
            color: #333;
            line-height: 1.2;
        }

        .footer-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>Senin 12 September 2012</h1>
                <div class="logos">
                    <img src="img/picture1.png" alt="USK Logo">
                    <img src="img/lanrinobg.png" alt="LAN RI Logo" style="width: 150px; height: 80px;">
                    <img src="img/HIMATEKKOM 2.png" alt="Himatekom Logo">
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Lokasi</th>
                        <th>Nama Ruangan</th>
                        <th>Waktu Penggunaan</th>
                        <th>Pengguna/PIC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lantai 1</td>
                        <td>Klinik Kesehatan</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Ruang Laktasi</td>
                        <td>Full Day</td>
                        <td>PKN 3/ILHAM</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Restoran Keumamah+VIP</td>
                        <td>09:00-12:00</td>
                        <td>PKN 3/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Ruang Fitnes</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                    <tr>
                        <td>Lantai 2</td>
                        <td>Cut Meutia 1</td>
                        <td>Full Day</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Cut Meutia 2</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Cut Meutia 3</td>
                        <td>Full Day</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Perpustakaan</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td>Lantai 3</td>
                        <td>Cut Nyak Dhien</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teuku Umar 1</td>
                        <td>14:00-16:30</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teuku Umar 2</td>
                        <td>09:00-12:00</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teuku Umar 3</td>
                        <td>14:00-16:30</td>
                        <td>PKN 2/FIKA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Teuku Umar 4</td>
                        <td>Full Day</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                    <tr>
                        <td>Lantai 4</td>
                        <td>Ruang Studio</td>
                        <td>Full Day</td>
                        <td>PKN 2/ILHAM</td>
                    </tr>
                </tbody>
            </table>
            <div class="footer">
                <div>Copyright: Tekkom USK 21<br>Ahyar Maulana<br>Arvin Kemal<br>Muhammad Hafifi<br>Taufiqur Rahman</div>
                <div class="footer-right">
                    Mentor/Pembimbing Lapangan:<br>Ilham Khalid<br>Rafika
                </div>
            </div>
        </div>
    </div>
</body>
</html>