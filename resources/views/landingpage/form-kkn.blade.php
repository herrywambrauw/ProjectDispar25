<?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Form Pendaftaran KKN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50">

<section class="max-w-3xl mx-auto bg-white p-8 mt-10 rounded-xl shadow">
    <h1 class="text-3xl text-blue-700 font-bold mb-6 text-center">Form Pendaftaran KKN</h1>

    <form action="proses-kkn.php" method="POST" enctype="multipart/form-data" class="space-y-4">

        <div>
            <label>Nama Lengkap</label>
            <input name="nama" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Tanggal Lahir</label>
            <input type="date" name="ttl" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>NIM</label>
            <input name="nim" required class="w-full p-3 border rounded-lg">
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
            <label>Prodi/Jurusan</label>
            <input name="prodi" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Fakultas</label>
            <input name="fakultas" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Nama Dospem</label>
            <input name="dospem" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>No HP Dospem</label>
            <input name="hp_dospem" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label>Tanggal KKN</label>
            <input type="date" name="tanggal_kkn" required class="w-full p-3 border rounded-lg">
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

<?php include 'components/footer.php'; ?>
</body>
</html>
