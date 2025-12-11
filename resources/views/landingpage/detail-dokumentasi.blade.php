@include('landingpage.components.header')

@php
    // Data dummy yang akan tampil tanpa perlu login
    $dokumentasi = (object)[
        'id' => 1,
        'judul' => 'Presentasi Project Website dari Mahasiswa Magang UTDI',
        'img' => '/img/dokumentasi/magang1.jpg',
        'keterangan' => 'Presentasi project website dari mahasiswa magang UTDI sebagai bentuk laporan kemajuan sekaligus penjelasan terkait fitur dan implementasi sistem yang telah dirancang. Kegiatan ini menjadi kesempatan bagi mahasiswa untuk menunjukkan hasil belajar, kreativitas, serta kontribusi nyata selama menjalani program magang.',
        'tanggal_unggah' => '2025-01-10',
        'status' => 'publish',
        'user' => (object)[ 'name' => 'Raihan Riko' ]
    ];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dokumentasi->judul }} - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900">

    <div class="max-w-5xl mx-auto py-12 px-6">

        <!-- Judul -->
        <h1 class="text-3xl font-bold text-gray-900 mb-4 leading-snug">
            {{ $dokumentasi->judul }}
        </h1>

        <!-- Info User & Tanggal -->
        <div class="flex items-center gap-6 text-sm text-gray-600 mb-8">

            <div class="flex items-center gap-2">
                <!-- Icon User -->
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Di buat oleh {{ $dokumentasi->user->name }}</span>
            </div>

            <div class="flex items-center gap-2">
                <!-- Icon Calendar -->
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>
                    Di unggah pada
                    {{ \Carbon\Carbon::parse($dokumentasi->tanggal_unggah)->translatedFormat('d F Y') }}
                </span>
            </div>

        </div>

        <!-- Foto Dokumentasi -->
        <div class="flex justify-center mb-10">
            <img src="{{ $dokumentasi->img }}"
                class="rounded-xl shadow-lg w-full max-w-3xl object-cover" alt="Foto Dokumentasi">
        </div>

        <!-- Keterangan -->
        <div class="bg-gray-100 rounded-xl p-6 text-gray-700 leading-relaxed text-justify">
            {{ $dokumentasi->keterangan }}
        </div>

    </div>

@include('landingpage.components.footer')

</body>
</html>
