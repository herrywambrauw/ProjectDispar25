@include('landingpage.components.header')

@php
    $pks = (object)[
        'id' => 1,
        'nama' => 'Universitas Teknologi Digital Indonesia',
        'img' => '/img/pks/utdi-pks.png',
        'keterangan' => 'Perjanjian Kerjasama Antara Pemerintah Kabupaten Bantul Dan Fakultas Teknologi
                        Informasi Universitas Teknologi Digital Indonesia (UTDI) Yogyakarta Tentang
                        Pelaksanaan Tri Dharma Pendidikan Tinggi Dalam Rangka Penembangan Sumberdaya
                        Pariwisata Dan Ekonomi Kreatif Kabupaten Bantul',
        'nopks' => '43/PK/Bt/2025',
        'nosuratpks' => 'L.05.3/103/UTDI/DK/VII/2025',
        'tanggal_mulai' => '31 Juli 2025',
        'tanggal_selesai' => '31 Juli 2030',
        'namapihaksatu' => 'Saryadi',
        'jabatanpihaksatu' => 'Kadispar Kab. Bantul',
        'namapihakdua' => 'Bambang Purnomosidi Dwi Putranto',
        'jabatanpihakdua' => 'Dekan Fakultas Teknologi Informasi UTDI Yogyakarta'
    ];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900">

            <div class="max-w-4xl mx-auto px-6 py-10">

        <!-- Judul Universitas -->
        <h1 class="text-2xl font-bold text-center mb-8">
            {{ $pks->nama }}
        </h1>

        <!-- Logo / Gambar -->
        <div class="flex justify-center mb-8">
            <img src="{{ $pks->img }}" alt="" class="w-64 h-64 object-contain">
        </div>


        <!-- Container Utama -->
        <div class="bg-blue-100 p-8 rounded-2xl shadow-md">

            <div class="flex justify-center mb-6">
                <div class="bg-white py-2 px-6 rounded-lg shadow text-center font-semibold">
                    Perjanjian Kerja Sama
                </div>
            </div>

            <!-- Inner Card -->
            <div class="bg-white rounded-xl px-10 py-8 shadow-md">

                <!-- Text Content -->
                <div class="text-center text-gray-900 leading-relaxed space-y-4">

                    <div>
                        <span class="font-semibold">Keterangan</span><br>
                        {{ $pks->keterangan }}
                    </div>

                    <div>
                        <span class="font-semibold">Nomor PKS</span><br>
                        {{ $pks->nopks }}
                    </div>

                    <div>
                        <span class="font-semibold">Nomor Surat PKS</span><br>
                        {{ $pks->nosuratpks }}
                    </div>

                    <div>
                        <span class="font-semibold">Tanggal Mulai</span><br>
                        {{ \Carbon\Carbon::parse($pks->tanggal_mulai)->format('d F Y') }}
                    </div>

                    <div>
                        <span class="font-semibold">Tanggal Selesai</span><br>
                        {{ \Carbon\Carbon::parse($pks->tanggal_selesai)->format('d F Y') }}
                    </div>

                    <div>
                        <span class="font-semibold">Pihak Satu</span><br>
                        {{ $pks->namapihaksatu }}<br>
                        <span class="text-sm text-gray-600">{{ $pks->jabatanpihaksatu }}</span>
                    </div>

                    <div>
                        <span class="font-semibold">Pihak Dua</span><br>
                        {{ $pks->namapihakdua }}<br>
                        <span class="text-sm text-gray-600">{{ $pks->jabatanpihakdua }}</span>
                    </div>

                </div>
            </div>

        </div>
    </div>

@include('landingpage.components.footer')

</body>
</html>
