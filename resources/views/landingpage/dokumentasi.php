<?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Kegiatan - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

<!-- HERO / TITLE -->
<section class="bg-blue-600 py-16 text-center text-white">
    <h1 class="text-3xl md:text-5xl font-bold">Dokumentasi Kegiatan</h1>
    <p class="mt-2 text-blue-100">Kumpulan dokumentasi dari berbagai kegiatan DISPAR Bantul</p>
</section>

<!-- CONTENT -->
<section class="py-16 px-6">
    <div class="max-w-6xl mx-auto">

        <h2 class="text-2xl font-bold text-blue-700 mb-6">Semua Dokumentasi</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php
                // Contoh data dokumentasi (bisa diganti database)
                $dokumentasi = [
                    ["img" => "dokumentasi/dok1.jpg", "title" => "Sosialisasi Program Wisata"],
                    ["img" => "dokumentasi/dok2.jpg", "title" => "Pelatihan Pemandu Wisata"],
                    ["img" => "dokumentasi/dok3.jpg", "title" => "Kunjungan Lapangan Mahasiswa"],
                    ["img" => "dokumentasi/dok4.jpg", "title" => "Rapat Koordinasi Kerja Sama"],
                    ["img" => "dokumentasi/dok5.jpg", "title" => "Workshop Peningkatan SDM"],
                    ["img" => "dokumentasi/dok6.jpg", "title" => "Kegiatan Monitoring Lokasi"],
                ];

                foreach ($dokumentasi as $i => $item):
            ?>

                <a href="detail-dokumentasi.php?id=<?= $i+1 ?>"
                   class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="<?= $item['img'] ?>" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800"><?= $item['title'] ?></h3>
                    </div>
                </a>

            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>
</body>
</html>
