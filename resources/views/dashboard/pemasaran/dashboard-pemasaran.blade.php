<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Dashboard</title>
    
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
        
        /* Alpine.js x-cloak */
        [x-cloak] { display: none !important; }
        
        /* Sidebar Minified Styles */
        .sidebar-min { width: 4.5rem !important; }
        .sidebar-min .nav-text, .sidebar-min .logo-text, .sidebar-min .dropdown-arrow { display: none; }
        .sidebar-min .h-20 { padding-left: 0.5rem; padding-right: 0.5rem; justify-content: center; }
        .sidebar-min .logo-container { justify-content: center; }
    </style>
</head>

<body class="bg-[#dbeafe] flex h-screen overflow-hidden text-slate-800" x-data="{ sidebarOpen: true, activeMenu: 'dashboard' }">
    
    {{-- SETUP DATA DUMMY --}}
    @php
        $mouBerjalan = array_fill(0, 4, ['nama' => 'UTDI', 'status' => 'Berjalan']);
        $mouBerakhir = array_fill(0, 4, ['nama' => 'UTDI', 'status' => 'Berakhir']);
        $pksBerjalan = array_fill(0, 4, ['nama' => 'UTDI', 'status' => 'Berjalan']);
        $pksBerakhir = array_fill(0, 4, ['nama' => 'UTDI', 'status' => 'Berakhir']);

    $galeri = [
        [
            'title' => 'Kunjungan Industri',
            'img' => 'https://placehold.co/600x400/1e4275/FFF?text=Foto+1',
            'status' => 'pending'
        ],
        [
            'title' => 'Rapat Koordinasi',
            'img' => 'https://placehold.co/600x400/1e4275/FFF?text=Foto+2',
            'status' => 'disetujui'
        ],
        [
            'title' => 'Promosi Wisata',
            'img' => 'https://placehold.co/600x400/1e4275/FFF?text=Foto+3',
            'status' => 'pending'
        ],
        [
            'title' => 'Event Daerah',
            'img' => 'https://placehold.co/600x400/1e4275/FFF?text=Foto+4',
            'status' => 'disetujui'
        ],
    ];

    $totalPendingGaleri   = collect($galeri)->where('status', 'pending')->count();
    $totalDisetujuiGaleri = collect($galeri)->where('status', 'disetujui')->count();
        $pemasaran = ['nama' => 'Pemasaran', 'desc' => 'Ini adalah Divisi anda di Dinas Pariwisata Kabupaten Bantul'];
    @endphp

    {{-- SIDEBAR --}}
    @include('dashboard.pemasaran.components.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="flex-1 flex flex-col min-w-0">
        
        {{-- HEADER --}}
        @include('dashboard.pemasaran.components.header')

        {{-- DASHBOARD CONTENT --}}
        <div class="flex-1 overflow-y-auto p-6 lg:p-8">
            
            {{-- Grid Container Utama (12 Kolom) --}}
            <div class="grid grid-cols-12 gap-6">
                
                {{-- 1. KOLOM KIRI (Profile, Hari, Jam) --}}
                <div class="col-span-12 xl:col-span-3 flex flex-col gap-6">
                    
                    {{-- Widget Pemasaran --}}
                    <div class="bg-[#4dd0e1] rounded-[2rem] p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform">
                        <div class="flex flex-col h-full justify-between gap-4">
                            <div>
                                <div class="w-10 h-10 mb-2">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold opacity-90">Divisi</h3>
                                <h2 class="text-2xl font-bold mt-1">{{ $pemasaran['nama'] }}</h2>
                            </div>
                            <p class="text-[11px] leading-relaxed opacity-80 border-t border-white/20 pt-2">
                                {{ $pemasaran['desc'] }}
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

                {{-- 2. KOLOM TENGAH (MOU & PKS) --}}
                <div class="col-span-12 xl:col-span-6 flex flex-col gap-6">
                    
                    {{-- ROW 1: GROUP MOU (Horizontal) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        {{-- MOU BERJALAN --}}
                        <div class="bg-[#1b4c85] rounded-[2rem] p-6 text-white shadow-lg h-full">
                            <h3 class="text-xl font-bold mb-4">MOU Berjalan</h3>
                            <div class="bg-[#153a66] rounded-xl p-5 space-y-3">
                                @foreach($mouBerjalan as $item)
                                    <div class="flex justify-between items-center border-b border-white/10 pb-3">
                                        <span class="text-sm">{{ $item['nama'] }}</span>
                                        <span class="bg-green-300 text-green-800 text-[10px] px-4 py-1 rounded-full font-bold">Berjalan</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- PKS BERJALAN --}}
                        <div class="bg-[#1b4c85] rounded-[2rem] p-6 text-white shadow-lg h-full">
                            <h3 class="text-xl font-bold mb-4">PKS Berjalan</h3>
                            <div class="bg-[#153a66] rounded-xl p-5 space-y-3">
                                @foreach($pksBerjalan as $item)
                                    <div class="flex justify-between items-center border-b border-white/10 pb-3">
                                        <span class="text-sm">{{ $item['nama'] }}</span>
                                        <span class="bg-green-300 text-green-800 text-[10px] px-4 py-1 rounded-full font-bold">Berjalan</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- ROW 2: GROUP PKS (Horizontal) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        {{-- MOU BERAKHIR --}}
                        <div class="bg-[#4dd0e1] rounded-[2rem] p-6 text-white shadow-lg h-full">
                            <h3 class="text-xl font-bold mb-4">MOU Berakhir</h3>
                            <div class="bg-[#0d5c6d] rounded-xl p-5 space-y-3">
                                @foreach($mouBerakhir as $item)
                                    <div class="flex justify-between items-center border-b border-white/10 pb-3">
                                        <span class="text-sm">{{ $item['nama'] }}</span>
                                        <span class="bg-red-300 text-red-900 text-[10px] px-4 py-1 rounded-full font-bold">Berakhir</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- PKS BERAKHIR --}}
                        <div class="bg-[#4dd0e1] rounded-[2rem] p-6 text-white shadow-lg h-full">
                            <h3 class="text-xl font-bold mb-4">PKS Berakhir</h3>
                            <div class="bg-[#0d5c6d] rounded-xl p-5 space-y-3">
                                @foreach($pksBerakhir as $item)
                                    <div class="flex justify-between items-center border-b border-white/10 pb-3">
                                        <span class="text-sm">{{ $item['nama'] }}</span>
                                        <span class="bg-red-300 text-red-900 text-[10px] px-4 py-1 rounded-full font-bold">Berakhir</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>

                                {{-- 3. KOLOM KANAN (GALERI) --}}
                <div class="col-span-12 xl:col-span-3 flex flex-col gap-6">

                    {{-- GALERI DISETUJUI (TOTAL) --}}
<div class="bg-[#1b4c85] rounded-[2rem] p-6 text-white shadow-lg h-full">
    <h3 class="text-xl font-bold mb-4">Galeri Disetujui</h3>

    <div class="bg-[#153a66] rounded-xl p-6 flex items-center justify-between">
        <span class="text-sm opacity-90">Jumlah Galeri</span>
        <span class="text-3xl font-extrabold text-green-300">
            {{ $totalDisetujuiGaleri }}
        </span>
    </div>
</div>



{{-- GALERI PENDING (TOTAL) --}}
<div class="bg-[#4dd0e1] rounded-[2rem] p-6 text-white shadow-lg h-full">
    <h3 class="text-xl font-bold mb-4">Galeri Pending</h3>

    <div class="bg-[#0d5c6d] rounded-xl p-6 flex items-center justify-between">
        <span class="text-sm opacity-90">Jumlah Galeri</span>
        <span class="text-3xl font-extrabold text-yellow-300">
            {{ $totalPendingGaleri }}
        </span>
    </div>
</div>


                </div>


            </div> {{-- End Grid Container --}}
        </div>
    </main>

    {{-- SCRIPT JAM REALTIME --}}
    <script>
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }).replace('.', ':') + ' WIB';
            const clockElement = document.getElementById('realtime-clock');
            if (clockElement) clockElement.textContent = timeString;

            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const dayName = days[now.getDay()];
            const dayElement = document.getElementById('realtime-day');
            if (dayElement) dayElement.textContent = dayName;
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>
</html>