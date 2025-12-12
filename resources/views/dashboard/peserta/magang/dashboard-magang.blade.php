<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- PASTIKAN ALPINE.JS DAN ALPINE COLLAPSE DIMUAT --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    {{-- END ALPINE SCRIPTS --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
        /* Alpine.js x-cloak untuk menyembunyikan elemen sebelum inisialisasi */
        [x-cloak] { display: none !important; }
        
        /* Tambahkan style untuk sidebar yang diperkecil */
        .sidebar-min { width: 4.5rem !important; } /* Sekitar 72px */
        .sidebar-min .nav-text, .sidebar-min .logo-text, .sidebar-min .nav-icon-expanded, .sidebar-min .dropdown-arrow { display: none; }
        .sidebar-min .nav-icon-min { display: block !important; }
        .sidebar-min .p-6 { padding-left: 0.5rem; padding-right: 0.5rem; }
        .sidebar-min .h-20 { padding-left: 0.5rem; padding-right: 0.5rem; justify-content: center; }
        .sidebar-min .flex-shrink-0 { flex-shrink: 0; }
        .sidebar-min .logo-container { justify-content: center; }
    </style>
</head>
<body class="bg-[#dbeafe] flex h-screen overflow-hidden text-slate-800" x-data="{ sidebarOpen: true }">
{{-- SETUP DATA DUMMY (SIMULASI DATABASE) --}}
    @php
        // Data Dummy Pembimbing
        $pembimbing = [
            'nama' => 'Riski S.Pd',
            'desc' => 'Yang akan membimbing anda selama di Dinas Pariwisata Kabupaten Bantul'
        ];

        // Data Dummy Unggahan Aktivitas (File_YangDiUpload.PDF)
        $unggahanAktivitas = [
            ['file' => 'File_YangDiUpload.PDF', 'status' => 'Diterima'],
            ['file' => 'File_YangDiUpload.PDF', 'status' => 'Diterima'],
            ['file' => 'File_YangDiUpload.PDF', 'status' => 'Diterima'],
            ['file' => 'File_YangDiUpload.PDF', 'status' => 'Ditinjau'],
        ];

        // Data Dummy Unggahan Laporan
        $unggahanLaporan = [
            ['file' => 'Laporan_Mingguan.PDF', 'status' => 'Diterima'],
            ['file' => 'Laporan_Akhir.PDF', 'status' => 'Diterima'],
            ['file' => 'Laporan_Kegiatan.PDF', 'status' => 'Diterima'],
            ['file' => 'Revisi_Laporan.PDF', 'status' => 'Ditinjau'],
        ];

        // Data Dummy Log Activity (Riwayat)
        $logActivity = [
            ['date' => 'Wednesday, 10 August 2025', 'status' => 'Diterima'],
            ['date' => 'Wednesday, 11 August 2025', 'status' => 'Diterima'],
            ['date' => 'Wednesday, 12 August 2025', 'status' => 'Ditinjau'],
        ];
    @endphp

    <aside 
        class="bg-[#1b4c85] text-white flex flex-col flex-shrink-0 transition-all duration-300" 
        :class="sidebarOpen ? 'w-72' : 'sidebar-min'"
        x-data="{ 
            openUnggah: false, 
            activeMenu: 'dashboard' 
        }"
    >
    <div class="h-20 flex items-center px-8 border-b border-white/10" :class="!sidebarOpen && 'justify-center px-2'">
        <div class="flex items-center gap-2 logo-container">
            <div class="font-bold text-3xl tracking-wide italic logo-text" x-show="sidebarOpen">SIMONE</div>
            <div x-show="!sidebarOpen" class="font-bold text-2xl tracking-wide italic">S</div> 
        </div> 
    </div>

    <div class="p-6 overflow-y-auto flex-1" :class="!sidebarOpen && 'px-2'">
        <p class="text-xs text-blue-200 mb-4 font-medium nav-text" x-show="sidebarOpen">Menu</p>
        <nav class="space-y-2">

            <a href="#" @click.prevent="activeMenu = 'dashboard'"
                class="flex items-center gap-4 px-4 py-3 rounded-xl shadow-sm border-l-4 transition"
                :class="activeMenu === 'dashboard' ? 'bg-white/10 text-white border-blue-300' : 'text-blue-100 hover:bg-white/5 border-transparent'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <span class="font-medium nav-text" x-show="sidebarOpen">Dashboard</span>
            </a>

            <a href="#log-activity" @click.prevent="activeMenu = 'log'" 
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition"
                :class="activeMenu === 'log' ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="nav-text" x-show="sidebarOpen">Log Activity</span>
            </a>
            
            <div>
                <button 
                    @click="openUnggah = !openUnggah; activeMenu = 'unggah'"
                    :aria-expanded="openUnggah"
                    class="flex items-center justify-between px-4 py-3 rounded-xl transition group w-full"
                    :class="activeMenu.includes('unggah') ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
                >
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        <span class="nav-text" x-show="sidebarOpen">Unggah</span>
                    </div>
                    {{-- Icon panah berputar --}}
                    <svg class="w-4 h-4 transform transition dropdown-arrow"
                            :class="openUnggah ? 'rotate-180' : ''" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="sidebarOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div 
                    x-show="openUnggah && sidebarOpen" 
                    x-collapse 
                    x-cloak 
                    class="ml-12 mt-2 flex flex-col space-y-2 text-blue-100"
                >
                    <a href="#unggah-laporan" @click.prevent="activeMenu = 'unggah-laporan'" 
                        :class="activeMenu === 'unggah-laporan' ? 'bg-white/10 font-medium text-white' : 'hover:bg-white/10'"
                        class="px-3 py-2 rounded-lg block">
                        Unggah Laporan
                    </a>
                    <a href="#unggah-kegiatan" @click.prevent="activeMenu = 'unggah-kegiatan'" 
                        :class="activeMenu === 'unggah-kegiatan' ? 'bg-white/10 font-medium text-white' : 'hover:bg-white/10'"
                        class="px-3 py-2 rounded-lg block">
                        Unggah Kegiatan
                    </a>
                </div>
            </div>
            
            <a href="#kalender" @click.prevent="activeMenu = 'kalender'" 
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition"
                :class="activeMenu === 'kalender' ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="nav-text" x-show="sidebarOpen">Kalender</span>
            </a>

        </nav>
    </div>
</aside>
    <main class="flex-1 flex flex-col min-w-0">
        
        {{-- HEADER YANG TELAH DIPERBARUI DENGAN DROPDOWN BARU --}}
        <header class="h-20 bg-[#1b4c85] px-8 flex justify-between items-center shadow-md z-20">
            {{-- Tombol Toggle Sidebar --}}
            <button class="p-2 rounded-lg border border-blue-400/30 text-white hover:bg-white/10 transition"
                    @click="sidebarOpen = !sidebarOpen">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>

            {{-- Dropdown Profil BARU --}}
            <div class="relative" x-data="{ profileOpen: false }">
                <button class="flex items-center gap-4 p-2 rounded-full hover:bg-white/10 transition"
                        @click="profileOpen = !profileOpen"
                        :aria-expanded="profileOpen">
                    <div class="w-10 h-10 rounded-full border-2 border-blue-300 overflow-hidden bg-gray-200 flex-shrink-0">
                        <img src="https://ui-avatars.com/api/?name=Riski&background=0D8ABC&color=fff" alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <div class="text-right text-white hidden sm:block">
                        <div class="text-sm font-semibold whitespace-nowrap">Riski</div>
                    </div>
                    <svg class="w-5 h-5 text-blue-200 transform transition-transform" 
                          :class="{ 'rotate-180': profileOpen }"
                          fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>

                {{-- Konten Dropdown (Seperti di gambar) --}}
                <div x-show="profileOpen" x-transition.opacity.duration.300
                      @click.outside="profileOpen = false" {{-- Menambahkan klik di luar untuk menutup --}}
                      x-cloak
                      class="absolute right-0 mt-2 w-72 bg-[#1b4c85] rounded-xl shadow-2xl overflow-hidden z-30 border border-white/10">
                    <div class="p-5 text-white">
                        {{-- Data User --}}
                        <div class="mb-4">
                            <p class="text-sm font-semibold">Riski</p>
                            <p class="text-sm text-blue-200">ikiooooo@gmail.com</p>
                        </div>
                        
                        {{-- Menu Profil --}}
                        <a href="/profile" class="flex items-center gap-4 px-4 py-3 text-white hover:bg-white/10 rounded-xl transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <span>Profil Pengguna</span>
                        </a>

                        {{-- Tombol Keluar --}}
                         <a href="/profile" class="flex items-center gap-4 px-4 py-3 text-white hover:bg-white/10 rounded-xl transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3v-10a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span class="font-semibold">Keluar</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>


        <div class="flex-1 overflow-y-auto p-6 lg:p-8">
            
            {{-- Grid Layout Utama (3 Kolom: Kiri Widgets, Tengah Uploads, Kanan Log) --}}
            <div class="grid grid-cols-12 gap-6">
                
                {{-- KOLOM KIRI (Widgets Pembimbing, Hari, Jam) --}}
                <div class="col-span-12 xl:col-span-3 flex flex-col gap-6">
                    
                    {{-- Widget Pembimbing --}}
                    <div class="bg-[#4dd0e1] rounded-[2rem] p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform">
                        <div class="flex flex-col h-full justify-between gap-4">
                            <div>
                                <div class="w-10 h-10 mb-2">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold opacity-90">Pembimbing</h3>
                                <h2 class="text-2xl font-bold mt-1">{{ $pembimbing['nama'] }}</h2>
                            </div>
                            <p class="text-[11px] leading-relaxed opacity-80 border-t border-white/20 pt-2">
                                {{ $pembimbing['desc'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Widget Hari --}}
                    <div class="bg-[#1b4c85] rounded-[2rem] p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform h-48 flex flex-col justify-center">
                        <div class="relative z-10">
                            <div class="mb-2">
                                <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                            </div>
                            <p class="text-sm font-medium opacity-80">Hari</p>
                            <h2 class="text-3xl font-bold mt-1" id="realtime-day">Senin</h2> 
                            <p class="text-[10px] mt-2 opacity-60">Semangat berkegiatan di Dinas Pariwisata Kabupaten Bantul</p>
                        </div>
                    </div>

                    {{-- Widget Jam --}}
                    <div class="bg-[#4dd0e1] rounded-[2rem] p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform h-48 flex flex-col justify-center">
                        <div class="relative z-10">
                             <div class="mb-2">
                                <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <p class="text-sm font-medium opacity-80">Jam</p>
                            <h2 class="text-3xl font-bold mt-1" id="realtime-clock">-- : --</h2>
                            <p class="text-[10px] mt-2 opacity-80">Jangan Lupa Istirahat Yah!</p>
                        </div>
                    </div>

                </div>

                {{-- KOLOM TENGAH (Unggahan Aktivitas & Laporan) --}}
                <div class="col-span-12 xl:col-span-5 flex flex-col gap-6">
                    
                    {{-- Card: Baru Saja Diunggah (Aktivitas) --}}
                    <div class="bg-[#1b4c85] rounded-[2rem] p-6 text-white shadow-lg flex-1">
                        <h3 class="text-xl font-bold mb-4 ml-1">Baru saja diunggah</h3>
                        
                        <div class="bg-[#153a66] rounded-xl p-5 shadow-inner">
                            <h4 class="text-sm text-blue-200 mb-3 font-medium">Unggah Aktivitas</h4>
                            <div class="space-y-3">
                                @foreach($unggahanAktivitas as $ua)
                                <div class="flex justify-between items-center group cursor-pointer">
                                    <span class="text-sm font-light text-blue-50 group-hover:text-white transition">{{ $ua['file'] }}</span>
                                    @if($ua['status'] == 'Diterima')
                                        <span class="bg-[#4ade80] text-[#064e3b] text-[10px] font-bold px-4 py-1 rounded-full shadow-sm">Diterima</span>
                                    @else
                                        <span class="bg-[#fbbf24] text-[#78350f] text-[10px] font-bold px-4 py-1 rounded-full shadow-sm">Ditinjau</span>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Card: Baru Saja Diunggah (Laporan) --}}
                    <div class="bg-[#1b4c85] rounded-[2rem] p-6 text-white shadow-lg flex-1">
                        <h3 class="text-xl font-bold mb-4 ml-1">Baru saja diunggah</h3>
                        
                        <div class="bg-[#153a66] rounded-xl p-5 shadow-inner">
                            <h4 class="text-sm text-blue-200 mb-3 font-medium">Unggah Laporan</h4>
                            <div class="space-y-3">
                                @foreach($unggahanLaporan as $ul)
                                <div class="flex justify-between items-center group cursor-pointer">
                                    <span class="text-sm font-light text-blue-50 group-hover:text-white transition">{{ $ul['file'] }}</span>
                                    @if($ul['status'] == 'Diterima')
                                        <span class="bg-[#4ade80] text-[#064e3b] text-[10px] font-bold px-4 py-1 rounded-full shadow-sm">Diterima</span>
                                    @else
                                        <span class="bg-[#fbbf24] text-[#78350f] text-[10px] font-bold px-4 py-1 rounded-full shadow-sm">Ditinjau</span>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                {{-- KOLOM KANAN (Log Activity) --}}
                <div class="col-span-12 xl:col-span-4 h-fit">
                    <div class="bg-[#1b4c85] rounded-[2rem] p-6 text-white shadow-lg min-h-[300px]">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold">Log Activity</h3>
                            <p class="text-xs text-blue-200 mt-1">Riwayat Aktivitas Terbaru Anda</p>
                        </div>

                        <div class="space-y-6">
                            @foreach($logActivity as $log)
                            <div class="flex items-center justify-between border-b border-blue-400/20 pb-4 last:border-0">
                                <span class="text-xs text-blue-100 font-light tracking-wide">{{ $log['date'] }}</span>
                                @if($log['status'] == 'Diterima')
                                    <span class="bg-[#4ade80] text-[#064e3b] text-[10px] font-bold px-3 py-1 rounded-full">Diterima</span>
                                @else
                                    <span class="bg-[#fbbf24] text-[#78350f] text-[10px] font-bold px-4 py-1 rounded-full shadow-sm">Ditinjau</span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </main>

    {{-- SCRIPT JAM REALTIME --}}
    <script>
        function updateClock() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            
            const timeString = hours + ' : ' + minutes + ' WIB';
            
            const clockElement = document.getElementById('realtime-clock');
            if (clockElement) {
                clockElement.textContent = timeString;
            }
        }
        // Ganti nama hari sesuai hari yang sebenarnya saat ini di zona waktu WIB
        function updateDay() {
            const now = new Date();
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const dayName = days[now.getDay()];
            
            const dayElement = document.getElementById('realtime-day');
            if (dayElement) {
                dayElement.textContent = dayName;
            }
        }

        setInterval(updateClock, 1000);
        updateClock(); 
        updateDay(); // Panggil sekali saat dimuat
    </script>
</body>
</html>