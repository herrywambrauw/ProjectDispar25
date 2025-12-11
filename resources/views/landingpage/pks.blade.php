@include('landingpage.components.header')

@php
use Carbon\Carbon;

$today = Carbon::today();

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
    <div class="bg-[#0D2C54] py-16 px-6 text-white">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold">Daftar Kerja Sama</h1>
            <p class="text-sm mt-2">
                Informasi lengkap mengenai seluruh kerja sama dengan Dinas Pariwisata Bantul
            </p>
        </div>
    </div>


    <!-- CONTENT -->
    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- SECTION TITLE & FILTER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold md-6">Perjanjian Kerja Sama</h2>

            <form method="GET">
                <select name="filter" onchange="this.form.submit()"
                    class="border border-gray-300 rounded px-3 py-1 text-sm">
                    <option value="">Filter Tanggal</option>
                    <option value="berjalan" {{ $filter === 'berjalan' ? 'selected' : '' }}>
                        Sedang Berjalan
                    </option>
                    <option value="duabulan" {{ $filter === 'duabulan' ? 'selected' : '' }}>
                        Kurang dari 2 Bulan
                    </option>
                    <option value="selesai" {{ $filter === 'selesai' ? 'selected' : '' }}>
                        Sudah Selesai
                    </option>
                </select>
            </form>
        </div>


        <!-- GRID LIST -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            @forelse ($filtered as $pks)
                <a href="/pks/{{ $pks->id }}">
                    <div class="border rounded-xl shadow hover:shadow-md overflow-hidden transition bg-white">

                        <!-- Image -->
                        <div class="h-40 flex justify-center items-center">
                            <img src="{{ $pks->img }}" class="h-32 object-contain" alt="">
                        </div>

                        <!-- Footer -->
                        <div class="bg-[#0D2C54] text-white px-4 py-3 flex justify-between">
                            <div class="truncate text-sm font-medium">
                                {{ Str::limit($pks->nama, 18) }}
                            </div>

                            <div class="text-sm">
                                {{ \Carbon\Carbon::parse($pks->tanggal_selesai)->translatedFormat('d F Y') }}
                            </div>
                        </div>

                    </div>
                </a>
            @empty

                <div class="col-span-3 text-center text-gray-500 py-20">
                    Tidak ada data PKS sesuai filter.
                </div>

            @endforelse

        </div>

    </div>

@include('landingpage.components.footer')
</body>
</html>
