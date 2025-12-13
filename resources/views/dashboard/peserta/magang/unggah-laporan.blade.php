<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Unggah Laporan</title> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
        /* Alpine.js x-cloak untuk menyembunyikan elemen sebelum inisialisasi */
        [x-cloak] { display: none !important; }
        
        /* Style untuk menyesuaikan tampilan seperti Gambar 2 (Unggah Laporan) */
        .status-diterima { background-color: #4ade80; color: #064e3b; } /* bg-green-400, text-green-900 */
        .status-ditinjau { background-color: #fbbf24; color: #78350f; } /* bg-amber-400, text-amber-900 */
        .status-ditolak { background-color: #f87171; color: #7f1d1d; } /* bg-red-400, text-red-900 */

        /* Warna latar belakang dan teks disesuaikan agar mirip gambar Unggah Laporan */
        .main-bg { background-color: #f7f9fc; } /* Latar belakang body disesuaikan */
        .content-bg { background-color: #ffffff; border-radius: 1.5rem; } /* Background konten putih */
        .table-header { color: #374151; } /* Warna teks header tabel abu-abu gelap */
        .table-row-text { color: #6b7280; } /* Warna teks baris abu-abu sedang */
        
        /* Style untuk modal (Mengikuti Gambar Buat Baru) */
        .modal-background { background-color: rgba(0, 0, 0, 0.6); }
        .modal-content { background-color: #1a4d85; border-radius: 2rem; } 
    </style>
</head>
{{-- Tambahkan openModal: false di x-data untuk mengontrol modal --}}
<body class="main-bg flex h-screen overflow-hidden text-slate-800" x-data="{ sidebarOpen: true, activeMenu: 'laporan', openModal: false }">
    
    {{-- SETUP DATA DUMMY (Tidak Berubah) --}}
    @php
        $reports = [
            [
                'date' => 'Wednesday, 10 August 2025', 
                'fileName' => 'Laporan_username_225100832', 
                'type' => 'pdf',
                'status' => 'Diterima', 
            ], 
            [
                'date' => 'Wednesday, 10 August 2025', 
                'fileName' => 'Laporan_username_225100832', 
                'type' => 'pdf',
                'status' => 'Diterima', 
            ], 
            [
                'date' => 'Wednesday, 10 August 2025', 
                'fileName' => 'Laporan_username_225100832', 
                'type' => 'word',
                'status' => 'Ditinjau', 
            ],
            [
                'date' => 'Wednesday, 10 August 2025', 
                'fileName' => 'Laporan_username_225100832', 
                'type' => 'word',
                'status' => 'Diterima', 
            ],
            [
                'date' => 'Wednesday, 10 August 2025', 
                'fileName' => 'Laporan_username_225100832', 
                'type' => 'word',
                'status' => 'Diterima', 
            ],
        ];
    @endphp

    {{-- MEMANGGIL KOMPONEN SIDEBAR (Diasumsikan ada) --}}
    @include('dashboard.peserta.magang.components.sidebar')

    <main class="flex-1 flex flex-col min-w-0">
        
        {{-- MEMANGGIL KOMPONEN HEADER (Diasumsikan ada) --}}
        @include('dashboard.peserta.magang.components.header')

        {{-- KONTEN UTAMA: UNGGAH LAPORAN --}}
        <div class="flex-1 overflow-y-auto p-6 lg:p-10">
        
            {{-- Kontainer Utama --}}
            <div class="content-bg p-8 shadow-2xl">
                
                {{-- Judul Halaman --}}
                <h1 class="text-3xl font-bold mb-6 text-gray-800">Unggah Laporan</h1>

                {{-- Tabel Riwayat Laporan (Konten Tabel tidak berubah) --}}
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-sm font-semibold uppercase tracking-wider table-header">
                                <th class="py-4 px-6 w-[20%]">Hari/Tanggal</th>
                                <th class="py-4 px-6 w-[50%]">File yang diunggah</th>
                                <th class="py-4 px-6 w-[15%]">Status</th>
                                <th class="py-4 px-6 w-[15%] text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $index => $report)
                            <tr class="border-b border-gray-100 hover:bg-gray-50" x-data="{ openMenu: false }">
                                <td class="py-4 px-6 align-middle text-sm font-medium table-row-text whitespace-nowrap">
                                    {{ $report['date'] }}
                                </td>
                                <td class="py-4 px-6 align-middle text-sm font-medium text-gray-700 flex items-center">
                                    @if($report['type'] == 'pdf')
                                        <svg class="w-5 h-5 mr-3 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M10 4H3a1 1 0 00-1 1v14a1 1 0 001 1h14a1 1 0 001-1v-7h-2v7H4V6h6V4zM12.97 10.97l3.03-3.03V10h2V5h-5v2h3.03l-3.03 3.03 1.41 1.41z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 mr-3 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6zm4 18H6V4h7v4h5v12zM12 11h-2v2h2v-2zm-2 4h4v2h-4v-2z"/>
                                        </svg>
                                    @endif
                                    {{ $report['fileName'] }}
                                </td>
                                <td class="py-4 px-6 align-middle">
                                    <span class="text-xs font-bold px-3 py-1 rounded-full shadow-sm whitespace-nowrap
                                        @if($report['status'] == 'Diterima') 
                                            status-diterima
                                        @elseif($report['status'] == 'Ditinjau') 
                                            status-ditinjau
                                        @else
                                            status-ditolak
                                        @endif
                                    ">
                                        {{ $report['status'] }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 align-middle text-center relative">
                                    <div class="inline-block" @click.outside="openMenu = false">
                                        <button @click="openMenu = !openMenu" class="p-1 rounded-full text-gray-500 hover:text-gray-900 transition duration-150">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                            </svg>
                                        </button>
                                        <div x-show="openMenu" x-cloak x-transition:enter="transition ease-out duration-100" 
                                            x-transition:enter-start="transform opacity-0 scale-95" 
                                            x-transition:enter-end="transform opacity-100 scale-100" 
                                            x-transition:leave="transition ease-in duration-75" 
                                            x-transition:leave-start="transform opacity-100 scale-100" 
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            class="absolute right-6 mt-2 w-48 rounded-lg shadow-xl bg-[#2a304e] z-10 p-1"
                                            style="min-width: 120px;">
                                            
                                            @if($report['status'] == 'Ditinjau')
                                                <a href="#" class="flex items-center w-full px-4 py-3 text-sm text-white hover:bg-[#3b436d] rounded-lg transition duration-150">
                                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Edit
                                                </a>
                                            @endif
                                            
                                            <a href="#" class="flex items-center w-full px-4 py-3 text-sm text-white hover:bg-[#3b436d] rounded-lg transition duration-150">
                                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Hapus
                                            </a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Paginasi --}}
                <div class="mt-8 flex justify-center">
                    <div class="flex items-center space-x-2 text-sm">
                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold py-2 px-4 rounded-lg transition duration-200 text-xs shadow-sm">
                            Sebelumnya
                        </button>
                        <span class="bg-blue-600 text-white font-semibold w-8 h-8 flex items-center justify-center rounded-lg text-xs shadow-md">1</span>
                        <span class="text-gray-600 font-semibold w-8 h-8 flex items-center justify-center rounded-lg text-xs hover:bg-gray-100 cursor-pointer">2</span>
                        <span class="text-gray-600 font-semibold w-8 h-8 flex items-center justify-center rounded-lg text-xs hover:bg-gray-100 cursor-pointer">3</span>
                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold py-2 px-4 rounded-lg transition duration-200 text-xs shadow-sm">
                            Selanjutnya
                        </button>
                    </div>
                </div>

                {{-- Tombol Buat Baru (Ditambahkan @click untuk membuka modal) --}}
                <div class="mt-8 flex justify-end">
                    <button @click="openModal = true" class="bg-blue-600 hover:bg-blue-700 text-white text-base font-bold py-3 px-6 rounded-xl shadow-lg transition duration-200">
                        Buat Baru
                    </button>
                </div>

            </div>
        </div>
        {{-- AKHIR KONTEN UNGGAH LAPORAN --}}

    </main>
    
    
    {{-- MODAL UNGGAH LAPORAN (Sesuai Gambar 3) --}}
    <div x-show="openModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto modal-background flex items-center justify-center" 
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0">

        <div @click.outside="openModal = false" class="relative w-full max-w-lg p-8 transform modal-content text-white shadow-2xl"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            
            {{-- Isi Modal --}}
            <h2 class="text-3xl font-bold mb-2">Buat Baru</h2>
            <p class="text-blue-200 mb-10 text-sm">Perbarui rincian Anda untuk menjaga profil Anda tetap up-to-date.</p>

            <h3 class="text-xl font-semibold mb-4">Unggah Laporan</h3>
            
            {{-- Kontainer Input File & Unggah --}}
            <div class="flex items-center space-x-4">
                {{-- Tombol Input File (Desain khusus) --}}
                <label for="file-upload" class="flex-1 bg-blue-700 hover:bg-blue-800 text-blue-100 font-medium py-4 px-6 rounded-xl cursor-pointer transition duration-200 flex items-center shadow-inner">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1v10a2 2 0 002 2h10a2 2 0 002-2V4a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
                    </svg>
                    Masukkan file kamu
                    <input id="file-upload" type="file" class="hidden">
                </label>
                
                {{-- Tombol Unggah --}}
                <button class="bg-blue-700 hover:bg-blue-800 text-white font-medium py-4 px-6 rounded-xl transition duration-200 flex items-center shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Unggah
                </button>
            </div>
            
            <div class="mt-12 flex justify-center space-x-4">
                {{-- Tombol Tutup --}}
                <button @click="openModal = false" class="bg-[#153a66] hover:bg-[#102d4f] text-white font-semibold py-3 px-8 rounded-xl transition duration-200 shadow-lg">
                    Tutup
                </button>
                
                {{-- Tombol Simpan Perubahan --}}
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-xl transition duration-200 shadow-lg">
                    Simpan Perubahan
                </button>
            </div>

        </div>
    </div>
    {{-- AKHIR MODAL --}}

</body>
</html>