<?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran Magang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50">

<section class="max-w-3xl mx-auto bg-white p-8 mt-10 rounded-xl shadow">
    <h1 class="text-3xl text-blue-700 font-bold mb-6 text-center">Form Pendaftaran Magang</h1>

    <form action="proses-magang.php" method="POST" enctype="multipart/form-data" class="space-y-4">

        <div>
            <label class="font-semibold">Nama Lengkap</label>
            <input name="nama" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Tanggal Lahir</label>
            <input type="date" name="ttl" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">NIM/NIS</label>
            <input name="nim" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Email</label>
            <input type="email" name="email" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Jenis Kelamin</label>
            <select name="jk" required class="w-full p-3 border rounded-lg">
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <div>
            <label class="font-semibold">No Handphone</label>
            <input name="nohp" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Asal Instansi Pendidikan</label>
            <input name="instansi" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Prodi/Jurusan</label>
            <input name="prodi" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Fakultas</label>
            <input name="fakultas" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Nama Dospem/Guru</label>
            <input name="dospem" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">No HP Dospem/Guru</label>
            <input name="nohp_dospem" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Tanggal Magang</label>
            <input type="date" name="tanggal_magang" required class="w-full p-3 border rounded-lg">
        </div>

        <div>
            <label class="font-semibold">Upload Surat Pengantar</label>
            <input type="file" name="surat" required class="w-full p-3 border rounded-lg">
        </div>

        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
            Kirim Pendaftaran
        </button>

    </form>
</section>

<?php include 'components/footer.php'; ?>
</body>
</html>
