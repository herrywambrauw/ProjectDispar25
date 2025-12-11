@include('landingpage.components.header')

@php
use Carbon\Carbon;

$today = Carbon::today();

// Dummy Data
$mouList = [
    (object)[
        'id' => 1,
        'nama' => 'Universitas Teknologi Digital Indonesia',
        'img' => '/img/mou/utdi.png',
        'tanggal_selesai' => '2026-07-29',
    ],
    (object)[
        'id' => 2,
        'nama' => 'Universitas Gadjah Mada',
        'img' => '/img/mou/ugm.png',
        'tanggal_selesai' => '2027-10-27',
    ],
    (object)[
        'id' => 3,
        'nama' => 'Institut Seni Indonesia Yogyakarta',
        'img' => '/img/mou/isi.png',
        'tanggal_selesai' => '2030-03-03',
    ],
    (object)[
        'id' => 4,
        'nama' => 'Politeknik Negeri Yogyakarta',
        'img' => '/img/mou/pny.png',
        'tanggal_selesai' => '2025-12-20',
    ],
    (object)[
        'id' => 5,
        'nama' => 'Universitas Negeri Yogyakarta',
        'img' => '/img/mou/uny.png',
        'tanggal_selesai' => '2025-02-15',
    ],
];

// Filter dari request
$filter = request('filter');

// Proses Filter
$filtered = collect($mouList)->filter(function($item) use ($today, $filter) {
    $end = Carbon::parse($item->tanggal_selesai);

    if ($filter === 'berjalan') {
        return $end >= $today;
    }

    if ($filter === 'duabulan') {
        return $end > $today && $end <= $today->copy()->addDays(60);
    }

    if ($filter === 'selesai') {
        return $end < $today;
    }

    return true;
});

// Dummy Data
$pksList = [
    (object)[
        'id' => 1,
        'nama' => 'Universitas Teknologi Digital Indonesia',
        'img' => '/img/pks/utdi.png',
        'tanggal_selesai' => '2026-07-29',
    ],
    (object)[
        'id' => 2,
        'nama' => 'Universitas Gadjah Mada',
        'img' => '/img/pks/ugm.png',
        'tanggal_selesai' => '2027-10-27',
    ],
    (object)[
        'id' => 3,
        'nama' => 'Institut Seni Indonesia Yogyakarta',
        'img' => '/img/pks/isi.png',
        'tanggal_selesai' => '2030-03-03',
    ],
    (object)[
        'id' => 4,
        'nama' => 'Politeknik Negeri Yogyakarta',
        'img' => '/img/pks/pny.png',
        'tanggal_selesai' => '2025-12-20',
    ],
    (object)[
        'id' => 5,
        'nama' => 'Universitas Negeri Yogyakarta',
        'img' => '/img/pks/uny.png',
        'tanggal_selesai' => '2025-02-15',
    ],
];

// Filter dari request
$filter = request('filter');

// Proses Filter
$filtered = collect($pksList)->filter(function($item) use ($today, $filter) {
    $end = Carbon::parse($item->tanggal_selesai);

    if ($filter === 'berjalan') {
        return $end >= $today;
    }

    if ($filter === 'duabulan') {
        return $end > $today && $end <= $today->copy()->addDays(60);
    }

    if ($filter === 'selesai') {
        return $end < $today;
    }

    return true;
});

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

    $currentData = collect($dokumentasi)->take(3);
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Kegiatan - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

<!-- HEADER SECTION -->
    <section
    class="relative w-full h-[420px] bg-cover bg-center flex items-center "
    style="background-image: url('/img/header-bg.jpg');">

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Content -->
    <div class="relative max-w-6xl mx-48 px-6 py-10 text-white">
        <h1 class="text-3xl md:text-4xl font-bold leading-tight">
            Dinas Pariwisata Kabupaten Bantul
        </h1>

        <h2 class="text-2xl md:text-3xl font-extrabold mt-2">
            Selamat Datang Di Website Si MONE KE PARIS
        </h2>

        <!-- Divider -->
        <div class="w-126 h-[2px] bg-white mt-4 mb-4"></div>

        <p class="text-sm md:text-base leading-relaxed max-w-xl">
            Sistem Informasi Monitoring dan Evaluasi Kerja Sama Pariwisata
            {{-- dan pendaftaran kerja sama seperti Penelitian,
            KKN, Magang, dan Praktek Kerja Lapangan. --}}
        </p>
    </div>
</section>


<!-- SECTION MOU -->
<section class="max-w-6xl mx-auto px-6 py-10">
    <h2 class="text-center text-[#0D2C54] text-5xl font-bold mb-12 tracking-wide">KERJA SAMA</h2>
    <h3 class="text-center text-[#0D2C54] text-2xl font-bold mb-6">Memorandum of Understanding</h3>

    <!-- GRID LIST -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @forelse ($filtered->take(3) as $mou)
            <a href="/mou/{{ $mou->id }}">
                <div class="border rounded-xl shadow hover:shadow-md overflow-hidden transition bg-white">

                    <!-- Image -->
                    <div class="h-40 flex justify-center items-center">
                        <img src="{{ $mou->img }}" class="h-32 object-contain" alt="">
                    </div>

                    <!-- Footer -->
                    <div class="bg-[#0D2C54] text-white px-4 py-3 flex justify-between">
                        <div class="truncate text-sm font-medium">
                            {{ Str::limit($mou->nama, 18) }}
                        </div>

                        <div class="text-sm">
                            {{ \Carbon\Carbon::parse($mou->tanggal_selesai)->translatedFormat('d F Y') }}
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-center col-span-3 text-gray-500">Tidak ada data MOU.</p>
        @endforelse

    </div>

    <div class="flex justify-center mt-6">
        <a href="/mou" class="bg-[#0D2C54] text-white px-6 py-2 rounded-lg hover:bg-[#143B77] transition">
            Jelajahi MOU
        </a>
    </div>
</section>

<!-- SECTION PKS -->
<section class="max-w-6xl mx-auto px-6 py-10">
    <h3 class="text-center text-[#0D2C54] text-2xl font-bold mb-6">Perjanjian Kerja Sama</h3>

    <!-- GRID LIST -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @forelse ($filtered->take(3) as $item)
            <a href="/pks/{{ $item->id }}">
                <div class="border rounded-xl shadow hover:shadow-md overflow-hidden transition bg-white">

                    <!-- Image -->
                    <div class="h-40 flex justify-center items-center">
                        <img src="{{ $item->img }}" class="h-32 object-contain" alt="">
                    </div>

                    <!-- Footer -->
                    <div class="bg-[#0D2C54] text-white px-4 py-3 flex justify-between">
                        <div class="truncate text-sm font-medium">
                            {{ Str::limit($item->nama, 18) }}
                        </div>

                        <div class="text-sm">
                            {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d F Y') }}
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-center col-span-3 text-gray-500">Tidak ada data PKS.</p>
        @endforelse

    </div>

    <div class="flex justify-center mt-6">
        <a href="/pks" class="bg-[#0D2C54] text-white px-6 py-2 rounded-lg hover:bg-[#143B77] transition">
            Jelajahi PKS
        </a>
    </div>
</section>

<!-- Kegiatan Meliputi -->
<section class="bg-[#CDE6FF] py-14">
    <div class="max-w-5xl mx-auto text-center px-6">

        <h2 class="text-[#0D2C54] text-2xl md:text-3xl font-bold mb-2">
            Kegiatan Meliputi
        </h2>

        <p class="text-[#0D2C54] mb-10">
            Berbagai bentuk kerja sama yang dapat diajukan oleh institusi maupun mahasiswa.
        </p>

        <!-- GRID ICON -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            <!-- PENELITIAN -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4">
                    <!-- Search Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                    </svg>
                </div>
                <p class="font-semibold text-[#0D2C54]">PENELITIAN</p>
            </div>

            <!-- KKN -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4">
                    <!-- Group Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20v-2a4 4 0 0 0-3-3.87M7 20v-2a4 4 0 0 1 3-3.87M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                    </svg>
                </div>
                <p class="font-semibold text-[#0D2C54]">KKN</p>
            </div>

            <!-- MAGANG -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4">
                    <!-- ID Card Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="16" rx="2" ry="2"></rect>
                        <path d="M7 8h2M7 12h6M7 16h6" stroke-linecap="round"></path>
                    </svg>
                </div>
                <p class="font-semibold text-[#0D2C54]">MAGANG</p>
            </div>

            <!-- PKL -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4">
                    <!-- Document Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 2h10l3 4v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                        <path d="M9 12h6M9 16h6" stroke-linecap="round"></path>
                    </svg>
                </div>
                <p class="font-semibold text-[#0D2C54]">PKL</p>
            </div>

        </div>
    </div>
</section>



<!-- Keuntungan Magang -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto text-center px-6">

        <h2 class="text-[#0D2C54] text-2xl md:text-3xl font-bold mb-2">
            Keuntungan Magang di Dinas Pariwisata
        </h2>

        <p class="text-gray-600 mb-12">
            ada beberapa keuntungan saat magang di dinas pariwisata kabupaten bantul, antara lain yaitu
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">

            <!-- PENGEMBANGAN -->
            <div class="bg-[#F4F4F4] rounded-xl shadow p-6 text-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4 mx-auto w-fit">
                    <!-- Plus Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="[#0D2C54]" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4v16M4 12h16" />
                    </svg>
                </div>
                <h3 class="font-bold text-[#0D2C54] mb-2">PENGEMBANGAN</h3>
                <p class="text-gray-600 text-sm">Pengembangan skill dan wawasan di bidang pariwisata.</p>
            </div>

            <!-- PENGALAMAN -->
            <div class="bg-[#F4F4F4] rounded-xl shadow p-6 text-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4 mx-auto w-fit">
                    <!-- Experience Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 4h16v12H4zM4 20h16M8 8h4" />
                    </svg>
                </div>
                <h3 class="font-bold text-[#0D2C54] mb-2">PENGALAMAN</h3>
                <p class="text-gray-600 text-sm">Pengalaman kerja nyata di instansi pemerintah.</p>
            </div>

            <!-- SERTIFIKAT -->
            <div class="bg-[#F4F4F4] rounded-xl shadow p-6 text-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4 mx-auto w-fit">
                    <!-- Certificate Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 2l3 7h7l-5.5 4.5L18 22l-6-3.5L6 22l1.5-8.5L2 9h7z" />
                    </svg>
                </div>
                <h3 class="font-bold text-[#0D2C54] mb-2">SERTIFIKAT</h3>
                <p class="text-gray-600 text-sm">Mendapatkan Surat keterangan selesai kegiatan resmi dari Dinas Pariwisata Bantul.</p>
            </div>

        </div>
    </div>
</section>

<!-- PANDUAN DAN PROSES PENDAFTARAN -->
<section class="bg-[#CDE6FF] py-14">
    <div class="max-w-6xl mx-auto text-center px-6">

        <h2 class="text-[#0D2C54] text-2xl md:text-3xl font-bold mb-10">
            Panduan dan Proses Pendaftaran
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 justify-items-center">

            <!-- Registrasi Akun -->
            <div class="bg-white rounded-xl shadow p-6 w-48 flex flex-col items-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4">
                    <!-- User Group Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm6 8v-2a4 4 0 0 0-3-3.87M6 20v-2a4 4 0 0 1 3-3.87" />
                    </svg>
                </div>

                <h3 class="font-semibold text-[#0D2C54] mb-1">Registrasi Akun</h3>
                <p class="text-gray-600 text-sm text-center">
                    Buat akun baru untuk memulai pengajuan.
                </p>
            </div>

            <!-- Pilih Jenis Kerja Sama -->
            <div class="bg-white rounded-xl shadow p-6 w-48 flex flex-col items-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4">
                    <!-- Grid Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 4h7v7H4zm9 0h7v7h-7zM4 13h7v7H4zm9 0h7v7h-7z" />
                    </svg>
                </div>

                <h3 class="font-semibold text-[#0D2C54] mb-1">Pilih Jenis Kerja Sama</h3>
                <p class="text-gray-600 text-sm">
                    Tentukan jenis kegiatan yang ingin diajukan.
                </p>
            </div>

            <!-- Lengkapi Dokumen -->
            <div class="bg-white rounded-xl shadow p-6 w-48 flex flex-col items-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4">
                    <!-- Document Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 2h10l3 4v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                        <path d="M9 12h6M9 16h6" stroke-linecap="round"></path>
                    </svg>
                </div>

                <h3 class="font-semibold text-[#0D2C54] mb-1">Lengkapi Dokumen</h3>
                <p class="text-gray-600 text-sm">
                    Unggah dokumen sesuai persyaratan.
                </p>
            </div>

            <!-- Pengajuan & Verifikasi -->
            <div class="bg-white rounded-xl shadow p-6 w-48 flex flex-col items-center">
                <div class="bg-gray-200 rounded-full p-4 mb-4">
                    <!-- Check Circle Icon -->
                    <svg class="w-8 h-8 text-[#0D2C54]" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m6 2a10 10 0 1 1-10-10 10 10 0 0 1 10 10z" />
                    </svg>
                </div>

                <h3 class="font-semibold text-[#0D2C54] mb-1">Pengajuan & Verifikasi</h3>
                <p class="text-gray-600 text-sm">
                    Proses verifikasi oleh DISPAR Bantul.
                </p>
            </div>

        </div>

        <!-- Button -->
        <div class="mt-10">
            <a href="/register"
               class="inline-block bg-[#0D2C54] text-white px-8 py-3 rounded-full shadow hover:bg-[#0b2446] transition">
                Daftar Sekarang
            </a>
        </div>

    </div>
</section>



<!-- GALERI KEGIATAN -->
<section class="py-14 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <h2 class="text-[#0D2C54] text-2xl md:text-3xl font-bold mb-8">
            Galeri Kegiatan
        </h2>

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

    @foreach ($currentData as $item)
        <div class="border rounded-xl shadow hover:shadow-md overflow-hidden transition bg-white">

            <!-- Image -->
            <div class="h-40 flex justify-center items-center">
                <img src="{{ asset($item['img']) }}"
                    class="w-full h-full object-cover">
            </div>

            <!-- Title -->
            <div class="bg-[#0D2C54] text-white px-4 py-3">
                <div class="truncate text-sm font-medium">
                    {{ $item['title'] }}
                </div>
            </div>

        </div>
    @endforeach

</div>

        <!-- Button -->
        <div class="mt-10">
            <a href="/galeri"
               class="inline-block bg-[#0D2C54] text-white px-8 py-3 rounded-full shadow hover:bg-[#0b2446] transition">
                Lihat Selengkapnya
            </a>
        </div>

    </div>
</section>


@include('landingpage.components.footer')
</body>
</html>
