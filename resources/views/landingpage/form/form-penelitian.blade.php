<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Form Pendaftaran Penelitian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50">

<section class="max-w-3xl mx-auto bg-white p-8 mt-10 rounded-xl shadow">
    <h1 class="text-3xl text-blue-700 font-bold mb-6 text-center">Form Pendaftaran Penelitian</h1>

    <form action="proses-penelitian.php" method="POST" enctype="multipart/form-data" class="space-y-4">

        <div>
            <label>Nama Lengkap</label>
            <input name="nama" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>NIK</label>
            <input name="nik" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Jenis Kelamin</label>
            <select name="jk" required class="w-full p-3 border rounded-lg">
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <div>
            <label>No Handphone</label>
            <input name="nohp" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Asal Instansi Pendidikan</label>
            <input name="instansi" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Prodi/Jurusan (Jika MHS)</label>
            <input name="prodi" class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Fakultas (Jika MHS)</label>
            <input name="fakultas" class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Nama Dospem (Jika MHS)</label>
            <input name="dospem" class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>No HP Dospem (Jika MHS)</label>
            <input name="hp_dospem" class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Tanggal Penelitian</label>
            <input type="date" name="tanggal_penelitian" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Tujuan Lokasi</label>
            <input name="lokasi" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Upload Surat Pengantar</label>
            <input type="file" name="surat" required class="w-full p-3 border rounded-lg">
        </div>

        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">Kirim Pendaftaran</button>

    </form>
</section>
</body>
</html>
