<?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

<!-- HERO SECTION -->
<section class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-blue-100 to-white text-center px-4">
    <img src="img/Kerma2.png" alt="Logo" class="w-32 mb-6">
    <h1 class="text-3xl md:text-5xl font-bold text-blue-700 mb-4">
        Dinas Pariwisata Kabupaten Bantul
    </h1>
    <p class="text-gray-600 max-w-2xl">
        Sistem layanan informasi dan pendaftaran kerja sama seperti Penelitian, KKN, Magang, dan Praktek Kerja Lapangan.
    </p>
</section>

<!-- INFORMASI KERJASAMA -->
<section class="py-16 px-6 bg-blue-50">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Informasi Kerja Sama Terbaru</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <?php
            // Data kerjasama + tanggal selesai
            $kerjasama = [
                ["img" => "kerjasama/Kerma1.png", "title" => "PT Maju Jaya",           "tanggal_selesai" => "2025-12-10"],
                ["img" => "kerjasama/Apel.png",  "title" => "CV Kreatif Nusantara",  "tanggal_selesai" => "2025-11-02"],
                ["img" => "kerjasama/Apel.png",  "title" => "Bantul Tekno Indonesia","tanggal_selesai" => "2025-08-19"],
                ["img" => "kerjasama/Apel.png",  "title" => "Bantul Tekno Indonesia","tanggal_selesai" => "2025-06-20"],
            ];

            // Ambil hanya 3 data teratas
            $topKerjasama = array_slice($kerjasama, 0, 3);

            foreach ($topKerjasama as $i => $item): ?>
                <a href="detail-kerjasama.php?id=<?= $i+1 ?>" 
                   class="bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
                    <img src="<?= $item['img'] ?>" class="w-full h-48 object-cover">

                    <div class="p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">
                                <?= $item['title'] ?>
                            </h3>

                            <!-- tanggal selesai -->
                            <span class="text-sm text-gray-500">
                                <?= date("d M Y", strtotime($item['tanggal_selesai'])) ?>
                            </span>
                        </div>
                    </div>
                </a>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-8">
        <a href="kerjasama.php"
           class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Jelajahi Kerja Sama
        </a>
    </div>
</section>
                



<!-- KEGIATAN MELIPUTI -->
<section class="py-16 px-6">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-4">Kegiatan Meliputi</h2>
    <p class="text-center text-gray-600 mb-12">
        Berbagai bentuk kerja sama yang dapat diajukan oleh institusi maupun mahasiswa.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">

        <!-- PENELITIAN -->
        <div class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition text-center">
            <div class="text-blue-600 mb-3">
                <!-- Icon Penelitian -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M9 12l2 2 4-4m1-5H8a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2z" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Penelitian</h3>
            <p class="text-gray-600 text-sm mt-2">Pengajuan riset untuk kebutuhan akademik.</p>
        </div>

        <!-- KKN -->
        <div class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition text-center">
            <div class="text-blue-600 mb-3">
                <!-- Icon KKN -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M12 6l-8 4v1c0 5 3.5 9 8 9s8-4 8-9v-1l-8-4z" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">KKN</h3>
            <p class="text-gray-600 text-sm mt-2">Program pengabdian masyarakat oleh mahasiswa.</p>
        </div>

        <!-- MAGANG -->
        <div class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition text-center">
            <div class="text-blue-600 mb-3">
                <!-- Icon Magang -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Magang</h3>
            <p class="text-gray-600 text-sm mt-2">Pelatihan kerja langsung di lingkungan DISPAR.</p>
        </div>

        <!-- PKL -->
        <div class="bg-white shadow rounded-xl p-6 hover:shadow-lg transition text-center">
            <div class="text-blue-600 mb-3">
                <!-- Icon PKL -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M12 3l8 4-8 4-8-4 8-4zm0 11l8-4m-8 4l-8-4m8 4v7" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">PKL</h3>
            <p class="text-gray-600 text-sm mt-2">Praktek Kerja Lapangan sesuai bidang studi.</p>
        </div>

    </div>
</section>


<!-- KEUNTUNGAN MAGANG -->
<section class="py-16 px-6 bg-blue-50">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Keuntungan Magang di DISPAR</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

        <!-- PENGEMBANGAN -->
        <div class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
            <div class="text-blue-600 mb-3">
                <!-- Icon Pengembangan -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M12 3v18m9-9H3" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Pengembangan</h3>
            <p class="text-gray-600 text-sm mt-2">Pengembangan skill dan wawasan di bidang pariwisata.</p>
        </div>

        <!-- PENGALAMAN -->
        <div class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
            <div class="text-blue-600 mb-3">
                <!-- Icon Pengalaman -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M12 6l8 4-8 4-8-4 8-4z" />
                    <path stroke-width="1.5" d="M4 14l8 4 8-4" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Pengalaman</h3>
            <p class="text-gray-600 text-sm mt-2">Pengalaman kerja nyata di instansi pemerintah.</p>
        </div>

        <!-- SERTIFIKAT -->
        <div class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
            <div class="text-blue-600 mb-3">
                <!-- Icon Sertifikat -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M7 3h10v14H7z" />
                    <path stroke-width="1.5" d="M9 17l3 4 3-4" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Sertifikat</h3>
            <p class="text-gray-600 text-sm mt-2">Mendapatkan sertifikat resmi dari DISPAR Bantul.</p>
        </div>

    </div>
</section>


<!-- PANDUAN PENDAFTARAN -->
<section class="py-16 px-6">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Panduan dan Proses Pendaftaran</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 max-w-6xl mx-auto">

        <!-- REGISTRASI AKUN -->
        <div class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
            <div class="text-blue-600 mb-4">
                <!-- Icon Registrasi -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M12 14a4 4 0 100-8 4 4 0 000 8z" />
                    <path stroke-width="1.5" d="M4 21c0-4 4-7 8-7s8 3 8 7" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Registrasi Akun</h3>
            <p class="text-gray-600 text-sm mt-2">Buat akun baru untuk memulai pengajuan.</p>
        </div>

        <!-- PILIH JENIS KERJA SAMA -->
        <div class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
            <div class="text-blue-600 mb-4">
                <!-- Icon Pilih Kerja Sama -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M5 12h14M5 6h14M5 18h14" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Pilih Jenis Kerja Sama</h3>
            <p class="text-gray-600 text-sm mt-2">Tentukan jenis kegiatan yang ingin diajukan.</p>
        </div>

        <!-- LENGKAPI DOKUMEN -->
        <div class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
            <div class="text-blue-600 mb-4">
                <!-- Icon Dokumen -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M7 3h8l4 4v12a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
                    <path stroke-width="1.5" d="M9 9h6M9 13h6M9 17h4" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Lengkapi Dokumen</h3>
            <p class="text-gray-600 text-sm mt-2">Unggah dokumen sesuai persyaratan.</p>
        </div>

        <!-- PENGAJUAN & VERIFIKASI -->
        <div class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
            <div class="text-blue-600 mb-4">
                <!-- Icon Verifikasi -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.5" d="M9 12l2 2 4-4" />
                    <path stroke-width="1.5" d="M12 4a8 8 0 100 16 8 8 0 000-16z" />
                </svg>
            </div>
            <h3 class="font-semibold text-lg">Pengajuan & Verifikasi</h3>
            <p class="text-gray-600 text-sm mt-2">Proses verifikasi oleh DISPAR Bantul.</p>
        </div>

    </div>

    <div class="text-center mt-10">
        <a href="daftar.php"
           class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Daftar Program
        </a>
    </div>
</section>


<!-- GALERI KEGIATAN -->
<section class="py-16 px-6 bg-blue-50">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Galeri Kegiatan</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <?php
            $galeri = [
                ["img" => "kerjasama/Apel.png", "title" => "Kegiatan Pelatihan"],
                ["img" => "kerjasama/Apel.png", "title" => "Kunjungan Lapangan"],
                ["img" => "kerjasama/Apel.png", "title" => "Workshop Pariwisata"],
                ["img" => "kerjasama/Apel.png", "title" => "Bantul Tekno Indonesia"],
            ];

            // Ambil hanya 3 data teratas
            $topGaleri = array_slice($galeri, 0, 3);

            foreach ($topGaleri as $i => $item): ?>
                <a href="detail-galeri.php?id=<?= $i+1 ?>"
                   class="bg-white shadow rounded-xl overflow-hidden hover:shadow-lg transition">
                    <img src="<?= $item['img'] ?>" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold"><?= $item['title'] ?></h3>
                    </div>
                </a>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-8">
        <a href="dokumentasi.php"
           class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Lihat Selengkapnya
        </a>
    </div>
</section>


<?php include 'components/footer.php'; ?>
</body>
</html>
