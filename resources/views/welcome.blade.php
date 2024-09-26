<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body style="background-image: url('/img/assets/lan2.jpg'); background-size: cover; background-position: center;">
    <!-- Container utama menggunakan flex, items-center, justify-center untuk memusatkan secara vertikal dan horizontal -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-3xl bg-white p-6 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold">Reservasi Ruangan Gedung - B</h1> 
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="form-group">
                    <label for="tanggal" class="block text-gray-700">Tanggal</label>
                    <input type="date" class="w-full p-2 border border-gray-300 rounded mt-1" id="tanggal" name="tanggal" value="2024-09-04">
                </div>
                <div class="form-group">
                    <label for="lantai" class="block text-gray-700">Lantai</label>
                    <select class="w-full p-2 border border-gray-300 rounded mt-1" id="lantai" name="lantai">
                        <option value="1">Lt. 1</option>
                        <option value="2">Lt. 2</option>
                        <option value="3">Lt. 3</option>
                        <option value="4">Lt. 4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ruangan" class="block text-gray-700">Ruangan</label>
                    <select class="w-full p-2 border border-gray-300 rounded mt-1" id="ruangan" name="ruangan">
                        <!-- Opsi ruangan akan diperbarui berdasarkan pilihan lantai -->
                    </select>
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
            
                document.getElementById('lantai').addEventListener('change', function() {
                    const lantaiTerpilih = this.value;
                    const ruanganSelect = document.getElementById('ruangan');
                    ruanganSelect.innerHTML = '';
                    if (ruanganPerLantai[lantaiTerpilih]) {
                        ruanganPerLantai[lantaiTerpilih].forEach(function(ruangan) {
                            const option = document.createElement('option');
                            option.value = ruangan.value;
                            option.text = ruangan.text;
                            ruanganSelect.appendChild(option);
                        });
                    }
                });
            
                document.getElementById('lantai').dispatchEvent(new Event('change'));
            </script>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="form-group">
                    <label for="pukul" class="block text-gray-700">Pukul</label>
                    <select class="w-full p-2 border border-gray-300 rounded mt-1" id="pukul" name="pukul">
                        <option value="09.00-12.00">09.00-12.00</option>
                        <option value="14.00-16.00">14.00-16.00</option>
                        <option value="full_day">Full Day</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pengunjung" class="block text-gray-700">Pengunjung</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" id="pengunjung" name="pengunjung" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="kontak_pengunjung" class="block text-gray-700">Kontak Pengunjung</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" id="kontak_pengunjung" name="kontak_pengunjung" placeholder="...">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>
