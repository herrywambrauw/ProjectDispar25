@include('landingpage.components.header')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Kegiatan - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

<!-- HERO -->
<section class="bg-blue-900 py-16 text-center text-white">
    <h1 class="text-3xl md:text-5xl font-bold">Dokumentasi Kegiatan</h1>
    <p class="mt-2 text-blue-200">Kumpulan dokumentasi dari berbagai kegiatan DISPAR Bantul</p>
</section>

@php
    // ==========================
    //   DATA DUMMY
    // ==========================
    $dokumentasi = [
        ["img" => "dokumentasi/dok1.jpg", "title" => "Sosialisasi Program Wisata"],
        ["img" => "dokumentasi/dok2.jpg", "title" => "Pelatihan Pemandu Wisata"],
        ["img" => "dokumentasi/dok3.jpg", "title" => "Kunjungan Lapangan Mahasiswa"],
        ["img" => "dokumentasi/dok4.jpg", "title" => "Rapat Koordinasi Kerja Sama"],
        ["img" => "dokumentasi/dok5.jpg", "title" => "Workshop Peningkatan SDM"],
        ["img" => "dokumentasi/dok6.jpg", "title" => "Kegiatan Monitoring Lokasi"],
        ["img" => "dokumentasi/dok1.jpg", "title" => "Penyuluhan Desa Wisata"],
        ["img" => "dokumentasi/dok2.jpg", "title" => "Pembinaan Kelompok Sadar Wisata"],
        ["img" => "dokumentasi/dok3.jpg", "title" => "Simulasi Layanan Pariwisata"],
        ["img" => "dokumentasi/dok4.jpg", "title" => "Pameran Produk Kreatif"],
        ["img" => "dokumentasi/dok5.jpg", "title" => "FGD Pengembangan Wisata"],
        ["img" => "dokumentasi/dok6.jpg", "title" => "Kegiatan Survei Lokasi Wisata"],
        ["img" => "dokumentasi/dok1.jpg", "title" => "Pelatihan Digitalisasi Wisata"],
        ["img" => "dokumentasi/dok2.jpg", "title" => "Pembekalan Mahasiswa PKL"],
        ["img" => "dokumentasi/dok3.jpg", "title" => "Kolaborasi Pariwisata Sekolah"],
        ["img" => "dokumentasi/dok4.jpg", "title" => "Diskusi Pengembangan Kawasan"],
        ["img" => "dokumentasi/dok5.jpg", "title" => "Workshop Pemandu Wisata Junior"],
        ["img" => "dokumentasi/dok6.jpg", "title" => "Observasi Lapangan Pariwisata"],
    ];

    // ==========================
    //   PAGINATION MANUAL
    // ==========================
    $perPage = 9;
    $total = count($dokumentasi);
    $totalPages = ceil($total / $perPage);
    $page = request()->get('page', 1);

    // Batasi page
    if ($page < 1) $page = 1;
    if ($page > $totalPages) $page = $totalPages;

    $start = ($page - 1) * $perPage;
    $currentData = array_slice($dokumentasi, $start, $perPage);
@endphp

<!-- CONTENT -->
<section class="py-16 px-6">
    <div class="max-w-7xl mx-auto">

        <h2 class="text-2xl font-bold text-blue-900 mb-6">
            Semua Dokumentasi
        </h2>

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            @foreach ($currentData as $index => $item)
                <div class="bg-blue-100 text-blue-900 p-4 rounded-xl shadow-lg hover:shadow-xl transition block">

                    <!-- Image -->
                    <div class="rounded-lg overflow-hidden mb-4">
                        <img src="{{ asset($item['img']) }}"
                             class="w-full h-48 object-cover hover:scale-105 transition duration-300">
                    </div>

                    <h3 class="text-lg font-bold">{{ $item['title'] }}</h3>

                </div>
            @endforeach

        </div>

        <!-- PAGINATION -->
        <div class="mt-10 flex justify-center space-x-2">
            @for ($i = 1; $i <= $totalPages; $i++)
                <a href="?page={{ $i }}"
                   class="px-3 py-1 rounded border
                   {{ $page == $i ? 'bg-blue-900 text-white border-blue-900' : 'bg-white text-blue-900 border-blue-900 hover:bg-blue-100' }}">
                    {{ $i }}
                </a>
            @endfor
        </div>

    </div>
</section>

@include('landingpage.components.footer')
</body>
</html>
