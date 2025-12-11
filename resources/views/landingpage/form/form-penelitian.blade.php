@include('landingpage.components.header')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Magang - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

<section class="py-16 px-6">
    <div class="max-w-5xl mx-auto bg-blue-100 p-10 rounded-xl shadow-lg">

        <h1 class="text-center text-3xl font-bold text-blue-900 mb-10">
            Formulir Pendaftaran Penelitian
        </h1>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Bagian Kiri -->
                <div class="bg-white p-6 rounded-xl shadow">

                    <div class="text-center bg-[#0D2C54] text-white py-2 rounded-lg mb-6 font-semibold">
                        Lengkapi Data Diri Anda
                    </div>

                    <!-- Nama -->
                    <label class="block font-semibold mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="Nama Lengkap">

                    <!-- Email -->
                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="Email">

                    <!-- NIM / NIS -->
                    <label class="block font-semibold mb-1">NIM / NIS</label>
                    <input type="text" name="nim" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="NIM / NIS">

                    <!-- Jenis Kelamin -->
                    <label class="block font-semibold mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border rounded-lg px-3 py-2 mb-4">
                        <option>Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>

                    <!-- No HP -->
                    <label class="block font-semibold mb-1">No Handphone</label>
                    <input type="text" name="nohp" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="No Handphone">

                </div>

                <!-- Bagian Kanan -->
                <div class="bg-white p-6 rounded-xl shadow">

                    <div class="text-center bg-[#0D2C54] text-white py-2 rounded-lg mb-6 font-semibold">
                        Lengkapi Data Diri Instansi Anda
                    </div>

                    <!-- Asal Instansi -->
                    <label class="block font-semibold mb-1">Asal Instansi (Jika Mahasiswa)</label>
                    <input type="text" name="instansi" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="Asal Instansi">

                    <!-- Prodi -->
                    <label class="block font-semibold mb-1">Prodi / Jurusan (Jika Mahasiswa)</label>
                    <input type="text" name="prodi" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="Prodi / Jurusan">

                    <!-- Fakultas -->
                    <label class="block font-semibold mb-1">Fakultas (Jika Mahasiswa)</label>
                    <input type="text" name="fakultas" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="Fakultas">

                    <!-- Nama Dosen / Pembimbing -->
                    <label class="block font-semibold mb-1">Nama Dosen Pembimbing (Jika Mahasiswa)</label>
                    <input type="text" name="pembimbing" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="Nama Dosen / Guru Pembimbing">

                    <!-- No HP Dosen -->
                    <label class="block font-semibold mb-1">No. Handphone Dosen Pembimbing (Jika Mahasiswa)</label>
                    <input type="text" name="nohp_pembimbing" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="No. HP Pembimbing">

                    <!-- Tanggal Mulai -->
                    <label class="block font-semibold mb-1">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="w-full border rounded-lg px-3 py-2 mb-4">

                    <!-- Lokasi Tujuan KKN -->
                    <label class="block font-semibold mb-1">Lokasi Tujuan Penelitian</label>
                    <input type="text" name="lokasi_tujuan" class="w-full border rounded-lg px-3 py-2 mb-4" placeholder="Lokasi Tujuan Penelitian">

                    <!-- Upload Surat -->
                    <label class="block font-semibold mb-1">Unggah Surat Pengantar Penelitian (PDF)</label>
                    <input type="file" name="surat" accept="application/pdf"
                           class="w-full border rounded-lg px-3 py-2 mb-4 bg-white">

                </div>
            </div>

            <div class="flex justify-between mt-10">
                <a href="/pendaftaran" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                    Kembali
                </a>

                <button type="submit" class="px-6 py-2 bg-[#0D2C54] text-white rounded-lg hover:bg-blue-800">
                    Daftar
                </button>
            </div>

        </form>

    </div>
</section>

@include('landingpage.components.footer')

</body>
</html>
