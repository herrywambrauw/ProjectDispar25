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
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-[#dbeafe] flex h-screen overflow-hidden text-slate-800" x-data="{ sidebarOpen: true, activeMenu: 'dashboard' }">
    
    {{-- SETUP DATA DUMMY --}}
    @php
        $pemasaran = ['nama' => 'Pemasaran', 'desc' => 'Ini adalah Divisi anda di Dinas Pariwisata Kabupaten Bantul'];

        // --- 1. SETUP DATA KERJASAMA (MoU & PKS) ---
        // Kita tambahkan key 'jenis' untuk membedakan MoU dan PKS
        $listKerjasama = [
            ['instansi' => 'PT. Teknologi Nusantara', 'jenis' => 'MoU', 'tanggal_selesai' => date('Y-m-d', strtotime('+3 weeks'))], 
            ['instansi' => 'Universitas Gadjah Mada', 'jenis' => 'PKS', 'tanggal_selesai' => date('Y-m-d', strtotime('+45 days'))], 
            ['instansi' => 'Dinas Kebudayaan DIY', 'jenis' => 'MoU', 'tanggal_selesai' => date('Y-m-d', strtotime('+5 days'))],    
            ['instansi' => 'Universitas Indonesia', 'jenis' => 'PKS', 'tanggal_selesai' => date('Y-m-d', strtotime('+4 months'))],  
            ['instansi' => 'Sekolah Tinggi Pariwisata', 'jenis' => 'PKS', 'tanggal_selesai' => date('Y-m-d', strtotime('+1 week'))], 
            ['instansi' => 'Institut Seni Indonesia', 'jenis' => 'MoU', 'tanggal_selesai' => date('Y-m-d', strtotime('+1 month'))], 
        ];

        // LOGIKA FILTER: Tanggal selesai < 2 bulan dari hari ini
        $hariIni = date('Y-m-d');
        $batasWaktu = date('Y-m-d', strtotime('+2 months'));

        // Filter data yang mendekati expired
        $kerjasamaMendekati = array_filter($listKerjasama, function($item) use ($hariIni, $batasWaktu) {
            return ($item['tanggal_selesai'] >= $hariIni) && ($item['tanggal_selesai'] <= $batasWaktu);
        });

        // Urutkan berdasarkan tanggal terdekat (untuk tabel)
        usort($kerjasamaMendekati, function($a, $b) {
            return strtotime($a['tanggal_selesai']) - strtotime($b['tanggal_selesai']);
        });

        // --- 2. HITUNG TOTAL UNTUK WIDGET ---
        
        // Hitung MoU yang < 2 bulan
        $totalMoUExpiring = collect($kerjasamaMendekati)->where('jenis', 'MoU')->count();

        // Hitung PKS yang < 2 bulan
        $totalPKSExpiring = collect($kerjasamaMendekati)->where('jenis', 'PKS')->count();

        // --- 3. DATA DOKUMENTASI ---
        $dataDokumentasi = [
            ['kegiatan' => 'Kunjungan Industri', 'status' => 'pending'],
            ['kegiatan' => 'Monitoring Magang', 'status' => 'selesai'],
            ['kegiatan' => 'Rapat Koordinasi', 'status' => 'pending'],
            ['kegiatan' => 'Liputan Event', 'status' => 'pending'],
        ];

        // Hitung Dokumentasi yang pending
        $totalDokumentasiPending = collect($dataDokumentasi)->where('status', 'pending')->count();
    @endphp

    {{-- SIDEBAR --}}
    @include('dashboard.pemasaran.components.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="flex-1 flex flex-col min-w-0">
        
        {{-- HEADER --}}
        @include('components.header-dashboard')

        {{-- DASHBOARD CONTENT --}}
        <div class="flex-1 overflow-y-auto p-6 lg:p-8">
            
            {{-- Grid Container Utama (12 Kolom) --}}
            <div class="grid grid-cols-12 gap-6">
                
                {{-- 1. KOLOM KIRI (Profile, Hari, Jam) --}}
                <div class="col-span-12 xl:col-span-3 flex flex-col gap-6">
                    
                    {{-- Widget Sekretaris --}}
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

                {{-- 2. KOLOM KANAN (DATA STATISTIK & KONTEN) --}}
                <div class="col-span-12 xl:col-span-9 flex flex-col gap-6">
                    
                    {{-- ROW 1: 3 WIDGET UTAMA (MODIFIKASI) --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                        {{-- 1. MoU < 2 BULAN --}}
                        <div class="bg-[#1b4c85] rounded-3xl p-4 text-white shadow-lg flex flex-col relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                            <div class="absolute -right-2 -top-2 w-16 h-16 bg-white/10 rounded-full blur-xl"></div>
                            <div class="flex items-center justify-between mb-2 relative z-10">
                                <span class="text-sm font-semibold opacity-90">MoU</span>
                                <div class="p-1.5 bg-white/20 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-red-300 text-xs font-medium">⚠ Kurang dari 2 Bulan</span>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-3xl font-bold tracking-tight">{{ $totalMoUExpiring }}</span>
                                    <span class="text-sm opacity-80">Berkas</span>
                                </div>
                            </div>
                        </div>

                        {{-- 2. PKS < 2 BULAN --}}
                        <div class="bg-[#0ea5e9] rounded-3xl p-4 text-white shadow-lg flex flex-col relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                            <div class="absolute -right-2 -bottom-2 w-16 h-16 bg-white/20 rounded-full blur-xl"></div>
                            <div class="flex items-center justify-between mb-2 relative z-10">
                                <span class="text-sm font-semibold opacity-90">PKS</span>
                                <div class="p-1.5 bg-white/20 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                </div>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-red-100 text-xs font-medium">⚠ Kurang dari 2 Bulan</span>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-3xl font-bold tracking-tight">{{ $totalPKSExpiring }}</span>
                                    <span class="text-sm opacity-80">Berkas</span>
                                </div>
                            </div>
                        </div>

                        {{-- 3. DOKUMENTASI PENDING --}}
                        <div class="bg-[#6366f1] rounded-3xl p-4 text-white shadow-lg flex flex-col relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                            <div class="absolute -left-2 -bottom-2 w-16 h-16 bg-white/20 rounded-full blur-xl"></div>
                            <div class="flex items-center justify-between mb-2 relative z-10">
                                <span class="text-sm font-semibold opacity-90">Dokumentasi Kegiatan</span>
                                <div class="p-1.5 bg-white/20 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-indigo-200 text-xs font-medium">⚠ Status Pending</span>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-3xl font-bold tracking-tight">{{ $totalDokumentasiPending }}</span>
                                    <span class="text-sm opacity-80">Kegiatan</span>
                                </div>
                            </div>
                        </div>

                    </div> {{-- End Row Statistik --}}

                    {{-- ROW 2: AREA KONTEN UTAMA / TABEL --}}
                    <div class="bg-white/50 border border-white/60 rounded-[2rem] p-6 shadow-sm flex-1 flex flex-col">
                        <div class="flex items-center justify-between mb-6">
                             <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-slate-700">Daftar Kerjasama (MoU & PKS)</h3>
                                <p class="text-xs text-red-500 font-medium mt-1">Yang akan berakhir kurang dari 2 bulan</p>
                             </div>
                        </div>
                        
                        <div class="overflow-hidden rounded-xl border border-slate-200 flex-1">
                            <table class="w-full text-sm text-left text-slate-600">
                                <thead class="text-xs text-slate-700 uppercase bg-slate-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nama Instansi</th>
                                        <th scope="col" class="px-6 py-3 text-right">Tanggal Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kerjasamaMendekati as $kerjasama)
                                    <tr class="bg-white border-b hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4 font-medium text-slate-900">
                                            {{-- Menambahkan Badge Jenis (MoU/PKS) di samping nama --}}
                                            <div class="flex items-center gap-2">
                                                <span class="px-2 py-0.5 rounded text-[10px] font-bold 
                                                    {{ $kerjasama['jenis'] == 'MoU' ? 'bg-blue-100 text-blue-700' : 'bg-sky-100 text-sky-700' }}">
                                                    {{ $kerjasama['jenis'] }}
                                                </span>
                                                {{ $kerjasama['instansi'] }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-semibold bg-red-50 text-red-600 border border-red-100">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                {{ date('d F Y', strtotime($kerjasama['tanggal_selesai'])) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="px-6 py-8 text-center text-slate-400 italic">
                                            Tidak ada kerjasama yang berakhir dalam 2 bulan ke depan.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            
                            @if(count($kerjasamaMendekati) > 0)
                            <div class="bg-white border-t border-slate-100 p-3 text-center">
                                <span class="text-[10px] text-slate-400 italic">Menampilkan {{ count($kerjasamaMendekati) }} data kerjasama prioritas</span>
                            </div>
                            @endif
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