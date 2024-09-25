<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Ruangan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Container utama menggunakan d-flex, align-items-center, justify-content-center untuk memusatkan secara vertikal dan horizontal -->
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Reservasi Ruangan Gedung - B</h1>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="2024-09-04">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lantai">Lantai</label>
                        <select class="form-control" id="lantai" name="lantai">
                            <option value="1">Lt. 1</option>
                            <option value="2">Lt. 2</option>
                            <option value="3">Lt. 3</option>
                            <option value="4">Lt. 4</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <select class="form-control" id="ruangan" name="ruangan">
                            <!-- Opsi ruangan akan diperbarui berdasarkan pilihan lantai -->
                        </select>
                    </div>
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
            
                // Event listener untuk dropdown lantai
                document.getElementById('lantai').addEventListener('change', function() {
                    const lantaiTerpilih = this.value;
                    const ruanganSelect = document.getElementById('ruangan');
            
                    // Kosongkan opsi ruangan yang ada
                    ruanganSelect.innerHTML = '';
            
                    // Tambahkan opsi ruangan yang sesuai dengan lantai terpilih
                    if (ruanganPerLantai[lantaiTerpilih]) {
                        ruanganPerLantai[lantaiTerpilih].forEach(function(ruangan) {
                            const option = document.createElement('option');
                            option.value = ruangan.value;
                            option.text = ruangan.text;
                            ruanganSelect.appendChild(option);
                        });
                    }
                });
            
                // Set ruangan default ketika halaman pertama kali dibuka
                document.getElementById('lantai').dispatchEvent(new Event('change'));
            </script>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pukul">Pukul</label>
                        <select class="form-control" id="pukul" name="pukul">
                            <option value="09.00-12.00">09.00-12.00</option>
                            <option value="14.00-16.00">14.00-16.00</option>
                            <option value="full_day">Full Day</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pengguna">Pengguna</label>
                        <input type="text" class="form-control" id="pengguna" name="pengguna" placeholder="...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pic">PIC</label>
                        <input type="text" class="form-control" id="pic" name="pic" placeholder="...">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
