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
    
    {{-- SETUP DATA DUMMY & LOGIKA --}}
    @php
        $sekretaris = ['nama' => 'Sekretaris', 'desc' => 'Ini adalah Divisi anda di Dinas Pariwisata Kabupaten Bantul'];

        // 1. DATA MENTAH (Simulasi Database)
        // Kita tambahkan 'waktu' untuk simulasi sorting berdasarkan "terdekat/terbaru"
        $rawData = [
            ['nama' => 'Ahmad (Univ A)', 'kategori' => 'Magang', 'status' => 'pending', 'waktu' => now()->subDays(2)],
            ['nama' => 'Budi (Univ B)', 'kategori' => 'PKL', 'status' => 'pending', 'waktu' => now()->subHours(5)],
            ['nama' => 'Siti (Univ C)', 'kategori' => 'KKN', 'status' => 'pending', 'waktu' => now()->subDays(1)],
            ['nama' => 'Dewi (Univ A)', 'kategori' => 'Penelitian', 'status' => 'pending', 'waktu' => now()->subHours(12)],
            ['nama' => 'Eko (SMK 1)', 'kategori' => 'PKL', 'status' => 'disetujui', 'waktu' => now()->subDays(3)],
            // Fajar mengirim data 10 menit yang lalu (Paling Baru)
            ['nama' => 'Fajar (Univ D)', 'kategori' => 'Magang', 'status' => 'pending', 'waktu' => now()->subMinutes(10)], 
            ['nama' => 'Gita (Univ E)', 'kategori' => 'Penelitian', 'status' => 'pending', 'waktu' => now()->subMinutes(30)], 
             ['nama' => 'Gita (Univ E)', 'kategori' => 'Penelitian', 'status' => 'pending', 'waktu' => now()->subMinutes(40)],
        ];

        // 2. PROSES SORTING (Mengambil data berdasarkan waktu terdekat)
        // Mengubah array menjadi Collection Laravel, lalu sort Descending berdasarkan waktu
        $dataPendaftar = collect($rawData)->sortByDesc('waktu')->values()->all();

        // 3. PROSES HITUNG JUMLAH (Diambil REAL dari $dataPendaftar)
        $collection = collect($dataPendaftar);
        
        $pendingMagang = $collection->where('status', 'pending')->where('kategori', 'Magang')->count();
        $pendingPKL    = $collection->where('status', 'pending')->where('kategori', 'PKL')->count();
        $pendingKKN    = $collection->where('status', 'pending')->where('kategori', 'KKN')->count();
        $pendingPenelitian = $collection->where('status', 'pending')->where('kategori', 'Penelitian')->count();
    @endphp

    {{-- SIDEBAR --}}
    @include('dashboard.sekretaris.components.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="flex-1 flex flex-col min-w-0">
        
        {{-- HEADER --}}
        @include('components.header-dashboard')

        {{-- DASHBOARD CONTENT --}}
        <div class="flex-1 overflow-y-auto p-6 lg:p-8">
            
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
                                <h2 class="text-2xl font-bold mt-1">{{ $sekretaris['nama'] }}</h2>
                            </div>
                            <p class="text-[11px] leading-relaxed opacity-80 border-t border-white/20 pt-2">
                                {{ $sekretaris['desc'] }}
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
                    
                    {{-- ROW 1: 4 KATEGORI PENDING --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                        {{-- 1. PENDING MAGANG --}}
                        <div class="bg-[#1b4c85] rounded-3xl p-4 text-white shadow-lg flex flex-col relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                            <div class="absolute -right-2 -top-2 w-16 h-16 bg-white/10 rounded-full blur-xl"></div>
                            <div class="flex items-center justify-between mb-2 relative z-10">
                                <span class="text-sm font-semibold opacity-90">Magang</span>
                                <div class="p-1.5 bg-white/20 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-xs opacity-70 block">Menunggu</span>
                                <span class="text-3xl font-bold tracking-tight">{{ $pendingMagang }}</span>
                            </div>
                        </div>

                        {{-- 2. PENDING PKL --}}
                        <div class="bg-[#0ea5e9] rounded-3xl p-4 text-white shadow-lg flex flex-col relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                            <div class="absolute -right-2 -bottom-2 w-16 h-16 bg-white/20 rounded-full blur-xl"></div>
                            <div class="flex items-center justify-between mb-2 relative z-10">
                                <span class="text-sm font-semibold opacity-90">PKL</span>
                                <div class="p-1.5 bg-white/20 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .883-.393 1.627-1 2.156A4.012 4.012 0 0112 8c-.607 0-1.177-.146-1.68-.397A2.993 2.993 0 0010 6z"/></svg>
                                </div>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-xs opacity-70 block">Menunggu</span>
                                <span class="text-3xl font-bold tracking-tight">{{ $pendingPKL }}</span>
                            </div>
                        </div>

                        {{-- 3. PENDING KKN --}}
                        <div class="bg-[#6366f1] rounded-3xl p-4 text-white shadow-lg flex flex-col relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                            <div class="absolute -left-2 -bottom-2 w-16 h-16 bg-white/20 rounded-full blur-xl"></div>
                            <div class="flex items-center justify-between mb-2 relative z-10">
                                <span class="text-sm font-semibold opacity-90">KKN</span>
                                <div class="p-1.5 bg-white/20 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-xs opacity-70 block">Menunggu</span>
                                <span class="text-3xl font-bold tracking-tight">{{ $pendingKKN }}</span>
                            </div>
                        </div>

                        {{-- 4. PENDING PENELITIAN --}}
                        <div class="bg-[#0d9488] rounded-3xl p-4 text-white shadow-lg flex flex-col relative overflow-hidden group hover:-translate-y-1 transition duration-300">
                            <div class="absolute -right-2 top-8 w-16 h-16 bg-white/10 rounded-full blur-xl"></div>
                            <div class="flex items-center justify-between mb-2 relative z-10">
                                <span class="text-sm font-semibold opacity-90">Penelitian</span>
                                <div class="p-1.5 bg-white/20 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </div>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-xs opacity-70 block">Menunggu</span>
                                <span class="text-3xl font-bold tracking-tight">{{ $pendingPenelitian }}</span>
                            </div>
                        </div>

                    </div>

                    {{-- ROW 2: AREA KONTEN UTAMA / TABEL --}}
                    <div class="bg-white/50 border border-white/60 rounded-[2rem] p-6 shadow-sm flex-1 flex flex-col">
                        <div class="flex items-center justify-between mb-6">
                             <h3 class="text-lg font-bold text-slate-700">Daftar Pendaftar Terbaru</h3>
                        </div>
                        
                        <div class="overflow-hidden rounded-xl border border-slate-200 flex-1">
                            <table class="w-full text-sm text-left text-slate-600">
                                <thead class="text-xs text-slate-700 uppercase bg-slate-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">Kategori</th>
                                        <th scope="col" class="px-6 py-3">Waktu Masuk</th> {{-- Kolom Baru --}}
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Mengambil 5 data teratas, yang sudah di-SORTING sebelumnya --}}
                                    @foreach(array_slice($dataPendaftar, 0, 5) as $pendaftar)
                                    <tr class="bg-white border-b hover:bg-slate-50">
                                        <td class="px-6 py-4 font-medium text-slate-900">{{ $pendaftar['nama'] }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 text-xs font-medium rounded-lg 
                                                {{ $pendaftar['kategori'] == 'Magang' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $pendaftar['kategori'] == 'PKL' ? 'bg-sky-100 text-sky-800' : '' }}
                                                {{ $pendaftar['kategori'] == 'KKN' ? 'bg-indigo-100 text-indigo-800' : '' }}
                                                {{ $pendaftar['kategori'] == 'Penelitian' ? 'bg-teal-100 text-teal-800' : '' }}
                                            ">
                                                {{ $pendaftar['kategori'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-xs text-slate-500">
                                            {{-- Menampilkan Waktu Relative (misal: 10 menit yang lalu) --}}
                                            {{ \Carbon\Carbon::parse($pendaftar['waktu'])->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($pendaftar['status'] == 'disetujui')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Disetujui</span>
                                            @else
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="font-medium text-blue-600 hover:underline">Detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="h-full bg-white flex items-center justify-center text-slate-400 text-xs italic p-4">
                                Menampilkan pendaftar terkini berdasarkan waktu pengiriman
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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