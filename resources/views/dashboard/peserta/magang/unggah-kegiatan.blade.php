<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Unggah Kegiatan</title>
    {{-- Memuat Tailwind CSS dan Alpine.js --}}
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

        /* WARNA DISESUAIKAN DENGAN SKEMA BIRU TUA/NAVY */
        .main-bg { background-color: #dbeafe; } /* Latar belakang halaman luar sidebar (Biru Sangat Muda) */
        .content-bg { background-color: #1b4c85; border-radius: 2rem; } /* Biru Tua/Navy Gelap (Kontainer utama) */
        .card-item-bg { background-color: #153a66; } /* Warna card kegiatan */
        
        /* Paginasi */
        .active-pagination-bg { background-color: #102d4f; }
        .inactive-pagination-text { color: #bfdbfe; }
        .pagination-btn-bg { background-color: #153a66; }
        .pagination-btn-hover { background-color: #102d4f; }

        /* Style untuk Tombol Buat Baru */
        .btn-buat-baru { background-color: #3b82f6; }
        .btn-buat-baru:hover { background-color: #2563eb; }
        
        /* Style untuk Modal */
        .modal-background { background-color: rgba(0, 0, 0, 0.6); }
        .modal-content { background-color: #1b4c85; border-radius: 2rem; }
        
        /* Input dan Button di Modal */
        .modal-input-bg { background-color: #102d4f; border-color: #60a5fa; }
        .modal-input-bg:focus { border-color: #3b82f6; }

        /* Style untuk Tombol Batal di Modal */
        .btn-batal-modal { background-color: #153a66; }
        .btn-batal-modal:hover { background-color: #102d4f; }
    </style>
</head>
<body class="main-bg flex h-screen overflow-hidden text-slate-800" 
    x-data="{ 
        sidebarOpen: true, 
        activeMenu: 'kegiatan', 
        openModal: false,
        editModal: false, 
        editingActivity: null,
        
        // Fungsi untuk membuka modal edit
        openEditModal(activity) {
            this.editingActivity = {
                title: activity.title,
                date: activity.date, // Format tampilan
                raw_date: activity.raw_date, // Format YYYY-MM-DD untuk input date
                description: activity.description,
                image_url: activity.image_url
            };
            this.editModal = true;
        }
    }">

    {{-- SETUP DATA DUMMY KEGIATAN --}}
    @php
        $activities = [
            [
                'title' => 'Rapat yang sangat Rapat',
                'date' => '25 Desember 2025',
                'raw_date' => '2025-12-25',
                'description' => 'Melakukan rapat yang sangat rapat',
                'image_url' => 'placeholder_activity_1.png',
            ],
            [
                'title' => 'Diskusi Strategi Marketing Digital',
                'date' => '26 Desember 2025',
                'raw_date' => '2025-12-26',
                'description' => 'Menganalisis performa kampanye bulan lalu.',
                'image_url' => 'placeholder_activity_2.png',
            ],
            [
                'title' => 'Briefing Proyek Desain UI/UX Baru',
                'date' => '27 Desember 2025',
                'raw_date' => '2025-12-27',
                'description' => 'Memahami scope dan target audiens proyek.',
                'image_url' => 'placeholder_activity_3.png',
            ],
        ];
    @endphp

    {{-- MEMANGGIL KOMPONEN SIDEBAR (Ganti placeholder nama) --}}
    @include('dashboard.peserta.magang.components.sidebar') 

    <main class="flex-1 flex flex-col min-w-0">

        {{-- MEMANGGIL KOMPONEN HEADER (Ganti placeholder nama) --}}
        @include('dashboard.peserta.magang.components.header') 

        {{-- KONTEN UTAMA: UNGGAH KEGIATAN --}}
        <div class="flex-1 overflow-y-auto pt-6 px-6 lg:pt-8 lg:px-8 bg-main-bg">
            
            {{-- Kontainer Utama: Warna Biru Tua/Navy Gelap (content-bg) --}}
            <div class="content-bg p-6 lg:p-8 shadow-2xl text-white min-h-[calc(100vh-6rem-4rem)]">
                
                {{-- Judul Halaman --}}
                <h1 class="text-2xl lg:text-3xl font-bold mb-8">Unggah Kegiatan</h1>

                {{-- Daftar Kegiatan (Card View) --}}
                <div class="space-y-6">
                    @foreach($activities as $index => $activity)
                    {{-- Card untuk setiap kegiatan menggunakan card-item-bg --}}
                    <div class="card-item-bg p-4 lg:p-6 rounded-xl shadow-lg flex items-center space-x-4 border border-white/10">
                        
                        {{-- Placeholder Gambar --}}
                        <div class="flex-shrink-0 w-24 h-24 lg:w-32 lg:h-20 overflow-hidden rounded-lg">
                            <img src="https://via.placeholder.com/128x80/000000/FFFFFF?text=Activity {{ $index + 1 }}" alt="Gambar Kegiatan" class="w-full h-full object-cover">
                        </div>

                        {{-- Detail Kegiatan --}}
                        <div class="flex-grow">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-1 gap-x-4 text-sm">
                                <div class="col-span-1 text-blue-300 font-light whitespace-nowrap">Judul Kegiatan:</div>
                                <div class="col-span-2 font-medium text-white">{{ $activity['title'] }}</div>

                                <div class="col-span-1 text-blue-300 font-light whitespace-nowrap">Tanggal:</div>
                                <div class="col-span-2 font-medium text-white">{{ $activity['date'] }}</div>

                                <div class="col-span-1 text-blue-300 font-light whitespace-nowrap">Keterangan Singkat:</div>
                                <div class="col-span-2 font-medium text-white">{{ $activity['description'] }}</div>
                            </div>
                        </div>

                        {{-- Tombol Aksi (Titik Tiga Vertikal) --}}
                        <div class="relative flex-shrink-0" x-data="{ openMenu: false }" @click.outside="openMenu = false">
                            <button @click="openMenu = !openMenu" class="p-1 rounded-full text-blue-300 hover:text-white transition duration-150">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                </svg>
                            </button>
                            
                            {{-- Dropdown Menu (SUDAH DISAMAKAN DENGAN IKON) --}}
                            <div x-show="openMenu" x-cloak class="absolute right-0 mt-2 w-40 rounded-lg shadow-xl bg-[#102d4f] z-10 p-1" style="min-width: 120px;">
                                
                                {{-- Tombol Edit (DENGAN IKON PENSIL) --}}
                                <a href="#" @click.prevent="openEditModal({{ json_encode($activity) }}); openMenu = false" 
                                    class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-[#153a66] rounded-lg transition duration-150">
                                    {{-- Ikon Pensil --}}
                                    <svg class="w-5 h-5 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                                
                                {{-- Tombol Hapus (DENGAN IKON TONG SAMPAH DAN WARNA MERAH) --}}
                                <a href="#" 
                                    class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-[#153a66] rounded-lg transition duration-150">
                                    {{-- Ikon Tong Sampah (Warna Merah) --}}
                                    <svg class="w-5 h-5 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Hapus
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Paginasi --}}
                <div class="mt-8 flex justify-center">
                    <div class="flex items-center space-x-2 text-sm">
                        <button class="pagination-btn-bg hover:pagination-btn-hover text-blue-200 font-semibold py-2 px-4 rounded-xl transition duration-200 text-xs shadow-sm">
                            Sebelumnya
                        </button>
                        <span class="active-pagination-bg text-white font-semibold w-8 h-8 flex items-center justify-center rounded-xl text-xs shadow-md border border-blue-400">1</span>
                        <span class="inactive-pagination-text font-semibold w-8 h-8 flex items-center justify-center rounded-xl text-xs hover:pagination-btn-bg cursor-pointer">2</span>
                        <span class="inactive-pagination-text font-semibold w-8 h-8 flex items-center justify-center rounded-xl text-xs hover:pagination-btn-bg cursor-pointer">3</span>
                        <button class="pagination-btn-bg hover:pagination-btn-hover text-blue-200 font-semibold py-2 px-4 rounded-xl transition duration-200 text-xs shadow-sm">
                            Selanjutnya
                        </button>
                    </div>
                </div>

                {{-- Tombol Buat Baru --}}
                <div class="mt-8 flex justify-end">
                    <button @click="openModal = true" class="btn-buat-baru text-white text-base font-bold py-3 px-6 rounded-xl shadow-lg transition duration-200">
                        Buat Baru
                    </button>
                </div>
                
            </div>
        </div>
        {{-- AKHIR KONTEN UNGGAH KEGIATAN --}}

    </main>


    {{-- MODAL UNGGAH KEGIATAN (Buat Baru) --}}
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

            {{-- Isi Modal (Buat Baru) --}}
            <h2 class="text-3xl font-bold mb-2">Buat Baru Kegiatan</h2>
            <p class="text-blue-200 mb-6 text-sm">Masukkan rincian kegiatan baru Anda.</p>

            <form action="#" method="POST">
                {{-- @csrf --}}
                <div class="space-y-4">
                    <div>
                        <label for="judul_kegiatan" class="block text-sm font-medium text-blue-200 mb-1">Judul Kegiatan</label>
                        <input type="text" id="judul_kegiatan" name="judul_kegiatan" placeholder="Masukkan judul kegiatan"
                               class="w-full modal-input-bg border text-white rounded-xl p-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-blue-200 mb-1">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" 
                               class="w-full modal-input-bg border text-white rounded-xl p-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-blue-200 mb-1">Keterangan Singkat</label>
                        <textarea id="keterangan" name="keterangan" rows="3" placeholder="Deskripsi singkat kegiatan"
                                 class="w-full modal-input-bg border text-white rounded-xl p-3 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    
                    {{-- Input File Gambar --}}
                    <div>
                        <label for="file_gambar" class="block text-sm font-medium text-blue-200 mb-1">Unggah Gambar (Opsional)</label>
                        <input type="file" id="file_gambar" name="file_gambar" accept="image/*"
                               class="w-full text-sm text-blue-200 
                                            file:mr-4 file:py-2 file:px-4 
                                            file:rounded-xl file:border-0 
                                            file:text-sm file:font-semibold 
                                            file:bg-blue-600 file:text-white 
                                            hover:file:bg-blue-700">
                    </div>
                </div>

                <div class="mt-10 flex justify-end space-x-4">
                    <button type="button" @click="openModal = false" class="btn-batal-modal hover:btn-batal-modal/80 text-white font-semibold py-3 px-8 rounded-xl transition duration-200 shadow-lg">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-xl transition duration-200 shadow-lg">
                        Simpan Kegiatan
                    </button>
                </div>
            </form>

        </div>
    </div>
    {{-- AKHIR MODAL BUAT BARU --}}
    
    
    {{-- MODAL EDIT KEGIATAN --}}
    <div x-show="editModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto modal-background flex items-center justify-center"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        <div @click.outside="editModal = false" class="relative w-full max-w-lg p-8 transform modal-content text-white shadow-2xl"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-show="editingActivity"
            {{-- Tambahkan :key untuk memaksa re-render jika data berubah --}}
            :key="editingActivity ? editingActivity.title : 'edit-modal'">

            {{-- Isi Modal Edit Kegiatan --}}
            <h2 class="text-3xl font-bold mb-2">Edit Kegiatan</h2>
            <p class="text-blue-200 mb-6 text-sm">Ubah rincian kegiatan yang telah ada.</p>

            <form action="#" method="POST" x-data="{ 
                {{-- Pastikan ini aman dari null check --}}
                localTitle: editingActivity ? editingActivity.title : '', 
                localDate: editingActivity ? editingActivity.raw_date : '', 
                localDescription: editingActivity ? editingActivity.description : '' 
            }">
                {{-- @csrf --}}
                <div class="space-y-4">
                    <div>
                        <label for="edit_judul_kegiatan" class="block text-sm font-medium text-blue-200 mb-1">Judul Kegiatan</label>
                        <input type="text" id="edit_judul_kegiatan" name="judul_kegiatan" placeholder="Masukkan judul kegiatan"
                               x-model="localTitle"
                               class="w-full modal-input-bg border text-white rounded-xl p-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="edit_tanggal" class="block text-sm font-medium text-blue-200 mb-1">Tanggal</label>
                        <input type="date" id="edit_tanggal" name="tanggal" 
                               x-model="localDate"
                               class="w-full modal-input-bg border text-white rounded-xl p-3 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="edit_keterangan" class="block text-sm font-medium text-blue-200 mb-1">Keterangan Singkat</label>
                        <textarea id="edit_keterangan" name="keterangan" rows="3" placeholder="Deskripsi singkat kegiatan"
                                 x-model="localDescription"
                                 class="w-full modal-input-bg border text-white rounded-xl p-3 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    
                    {{-- Input File Gambar (opsional) --}}
                    <div>
                        <label for="edit_file_gambar" class="block text-sm font-medium text-blue-200 mb-1">Ubah Gambar (Opsional)</label>
                        <input type="file" id="edit_file_gambar" name="file_gambar" accept="image/*"
                               class="w-full text-sm text-blue-200 
                                            file:mr-4 file:py-2 file:px-4 
                                            file:rounded-xl file:border-0 
                                            file:text-sm file:font-semibold 
                                            file:bg-blue-600 file:text-white 
                                            hover:file:bg-blue-700">
                        {{-- Gunakan optional chaining untuk memastikan tidak error jika editingActivity null --}}
                        <p class="text-xs text-blue-300 mt-2">Gambar saat ini: <span x-text="editingActivity ? editingActivity.image_url : ''"></span></p>
                    </div>
                </div>

                <div class="mt-10 flex justify-end space-x-4">
                    <button type="button" @click="editModal = false" class="btn-batal-modal hover:btn-batal-modal/80 text-white font-semibold py-3 px-8 rounded-xl transition duration-200 shadow-lg">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-xl transition duration-200 shadow-lg">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
    {{-- AKHIR MODAL EDIT KEGIATAN --}}

</body>
</html>