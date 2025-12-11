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
<section class="bg-[#0D2C54] py-16 px-6 text-white">
    <div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold">Dokumentasi Kegiatan</h1>
    <p class="text-sm mt-2">Kumpulan dokumentasi dari berbagai kegiatan DISPAR Bantul</p>
    </div>
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

        <h2 class="text-2xl font-bold md-6">
            Semua Dokumentasi
        </h2>

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @foreach ($currentData as $index => $item)
                <div class="border rounded-xl shadow hover:shadow-md overflow-hidden transition bg-white">

                    <!-- Image -->
                    <div class="h-40 flex justify-center items-center">
                        <img src="{{ asset($item['img']) }}"
                             class="w-full h-full object-contain">
                    </div>

                    <div class="bg-[#0D2C54] text-white px-4 py-3 flex justify-between">
                        <div class="truncate text-sm font-medium">
                        {{ $item['title'] }}</div>
                    </div>
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
