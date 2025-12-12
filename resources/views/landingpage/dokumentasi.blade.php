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
    <p class="text-sm mt-2">Kumpulan dokumentasi dari berbagai kegiatan Dinas Pariwisata Kabupaten Bantul</p>
    </div>
</section>

@php
    // ==========================
    //   DATA DUMMY
    // ==========================
    $dokumentasi = [
        ['id' => 1, "img" => "dokumentasi/dok1.jpg", "title" => "Sosialisasi Program Wisata"],
        ['id' => 2, "img" => "dokumentasi/dok2.jpg", "title" => "Pelatihan Pemandu Wisata"],
        ['id' => 3, "img" => "dokumentasi/dok3.jpg", "title" => "Kunjungan Lapangan Mahasiswa"],
        ['id' => 4, "img" => "dokumentasi/dok4.jpg", "title" => "Rapat Koordinasi Kerja Sama"],
        ['id' => 5, "img" => "dokumentasi/dok5.jpg", "title" => "Workshop Peningkatan SDM"],
        ['id' => 6, "img" => "dokumentasi/dok6.jpg", "title" => "Kegiatan Monitoring Lokasi"],
        ['id' => 7, "img" => "dokumentasi/dok1.jpg", "title" => "Penyuluhan Desa Wisata"],
        ['id' => 8, "img" => "dokumentasi/dok2.jpg", "title" => "Pembinaan Kelompok Sadar Wisata"],
        ['id' => 9, "img" => "dokumentasi/dok3.jpg", "title" => "Simulasi Layanan Pariwisata"],
        ['id' => 10, "img" => "dokumentasi/dok4.jpg", "title" => "Pameran Produk Kreatif"],
        ['id' => 11, "img" => "dokumentasi/dok5.jpg", "title" => "FGD Pengembangan Wisata"],
        ['id' => 12, "img" => "dokumentasi/dok6.jpg", "title" => "Kegiatan Survei Lokasi Wisata"],
        ['id' => 13, "img" => "dokumentasi/dok1.jpg", "title" => "Pelatihan Digitalisasi Wisata"],
        ['id' => 14, "img" => "dokumentasi/dok2.jpg", "title" => "Pembekalan Mahasiswa PKL"],
        ['id' => 15, "img" => "dokumentasi/dok3.jpg", "title" => "Kolaborasi Pariwisata Sekolah"],
        ['id' => 16, "img" => "dokumentasi/dok4.jpg", "title" => "Diskusi Pengembangan Kawasan"],
        ['id' => 17, "img" => "dokumentasi/dok5.jpg", "title" => "Workshop Pemandu Wisata Junior"],
        ['id' => 18, "img" => "dokumentasi/dok6.jpg", "title" => "Observasi Lapangan Pariwisata"],
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
    <div class="max-w-6xl mx-auto px-6 py-10">

        <h2 class="text-2xl font-bold md-6 mb-6">
            Semua Dokumentasi
        </h2>

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @foreach ($currentData as $index => $item)
                <a href="{{ route('detail-dokumentasi', $item['id']) }}"
                class="border rounded-xl shadow hover:shadow-lg overflow-hidden transition bg-white block">

                    <!-- Image -->
                    <div class="h-40 flex justify-center items-center">
                        <img src="{{ asset($item['img']) }}"
                            class="w-full h-full object-contain">
                    </div>

                    <div class="bg-[#0D2C54] text-white px-4 py-3 flex justify-between">
                        <div class="truncate text-sm font-medium">
                            {{ $item['title'] }}
                        </div>
                    </div>
                </a>
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
