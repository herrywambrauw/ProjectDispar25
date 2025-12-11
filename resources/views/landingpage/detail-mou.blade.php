@include('landingpage.components.header')

@php
    $mou = (object)[
        'id' => 1,
        'nama' => 'Universitas Teknologi Digital Indonesia',
        'img' => '/img/mou/utdi-mou.png',
        'keterangan' => 'Kesepakatan Bersama Antara Pemerintah
                        Kabupaten Bantul dan Sekolah Tinggi Manajemen Informatika
                        dan Komputeer (STMIK) Akakom Tentang Peningkatan dan pembangunan potensi sumber daya daerah
                        Kabupaten Bantul melalui kerja sama bidang pendidikan Penelitian, dan pengabdian kepada Masyarakat',
        'nomoupihaksatu' => '24/Mou/Bt/2021',
        'nomoupihakdua' => '034/SPK/STMIK AKAKOM-PEMKAB BANTUL/VI?2021',
        'tanggal_mulai' => '29 Juli 2021',
        'tanggal_selesai' => '29 Juli 2026',
        'namapihaksatu' => 'Abdul Halim Muslih',
        'jabatanpihaksatu' => 'Bupati Bantul',
        'namapihakdua' => 'Totok Suprawoto',
        'jabatanpihakdua' => 'Ketua STMIK AKAKOM'
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
            {{ $mou->nama }}
        </h1>

        <!-- Logo / Gambar -->
        <div class="flex justify-center mb-8">
            <img src="{{ $mou->img }}" alt="" class="w-64 h-64 object-contain">
        </div>


        <!-- Container Utama -->
        <div class="bg-blue-100 p-8 rounded-2xl shadow-md">

            <div class="flex justify-center mb-6">
                <div class="bg-white py-2 px-6 rounded-lg shadow text-center font-semibold">
                    Memorandum of Understanding
                </div>
            </div>

            <!-- Inner Card -->
            <div class="bg-white rounded-xl px-10 py-8 shadow-md">

                <!-- Text Content -->
                <div class="text-center text-gray-900 leading-relaxed space-y-4">

                    <div>
                        <span class="font-semibold">Keterangan</span><br>
                        {{ $mou->keterangan }}
                    </div>

                    <div>
                        <span class="font-semibold">Nomor MoU Pihak ke-1</span><br>
                        {{ $mou->nomoupihaksatu }}
                    </div>

                    <div>
                        <span class="font-semibold">Nomor  MoU Pihak ke-2</span><br>
                        {{ $mou->nomoupihakdua }}
                    </div>

                    <div>
                        <span class="font-semibold">Tanggal Mulai</span><br>
                        {{ \Carbon\Carbon::parse($mou->tanggal_mulai)->format('d F Y') }}
                    </div>

                    <div>
                        <span class="font-semibold">Tanggal Selesai</span><br>
                        {{ \Carbon\Carbon::parse($mou->tanggal_selesai)->format('d F Y') }}
                    </div>

                    <div>
                        <span class="font-semibold">Pihak Satu</span><br>
                        {{ $mou->namapihaksatu }}<br>
                        <span class="text-sm text-gray-600">{{ $mou->jabatanpihaksatu }}</span>
                    </div>

                    <div>
                        <span class="font-semibold">Pihak Dua</span><br>
                        {{ $mou->namapihakdua }}<br>
                        <span class="text-sm text-gray-600">{{ $mou->jabatanpihakdua }}</span>
                    </div>

                </div>
            </div>

        </div>
    </div>

@include('landingpage.components.footer')

</body>
</html>
