<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='img/assets/lan-login.png' rel ='shortcut icon'>
    <style>
        /* Menambahkan gambar sebagai background */
        body {
            background-image: url('img/assets/lan1.jpg'); /* Ubah 'background.jpg' dengan URL atau path gambar Anda */
            background-size: cover; /* Mengatur agar gambar menutupi seluruh halaman */
            background-position: center; /* Mengatur posisi gambar agar di tengah */
            background-repeat: no-repeat; /* Mencegah pengulangan gambar */
            padding: 150px;
            font-family: Arial, sans-serif;
        }

        /* Tampilan untuk tombol Reserve */
        .btn-reserve {
            background-color: #00c4cc;
            color: white;
            font-weight: bold;
            border: none;
        }
        .btn-reserve:hover {
            background-color: #009a9e;
        }

        /* Warna harga */
        .price {
            color: green;
        }

        /* Styling untuk card */
        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Memberikan sedikit transparansi pada kartu */
            border-radius: 10px;
            padding: 10px;
        }
        h1 {
            color: rgb(0, 0, 0); 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Preview Ruangan</h1>

        <div class="card mb-3 shadow">
            <div class="row g-0">
                <!-- Gambar ruangan -->
                <div class="col-md-4">
                    <img src="/img/assets/1.jpeg" class="img-fluid rounded-start" alt="Ruangan Standard">
                </div>
                <!-- Konten deskripsi ruangan -->
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Lantai 1</h5>
                        <p class="price">Cut Meutia</p>
                        <!-- Tombol reserve -->
                        <a href="#" class="btn btn-reserve">Next Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
