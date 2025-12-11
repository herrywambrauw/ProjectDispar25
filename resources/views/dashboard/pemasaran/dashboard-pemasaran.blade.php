<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* Custom Scrollbar agar rapi */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#dbeafe] flex h-screen overflow-hidden text-slate-800">

    {{-- SETUP DATA DUMMY (PHP DI DALAM BLADE) --}}
    @php
        // Data Dummy MoU
        $mouBerjalan = array_fill(0, 5, ['nama' => 'UTDI', 'status' => 'Berjalan']);
        $mouBerakhir = array_fill(0, 5, ['nama' => 'UTDI', 'status' => 'Berjalan']); // Di gambar status textnya tetap 'Berjalan' walau judulnya berakhir, kita samakan dulu

        // Data Dummy PKS
        $pksBerjalan = array_fill(0, 5, ['nama' => 'UTDI', 'status' => 'Berjalan']);
        $pksBerakhir = array_fill(0, 5, ['nama' => 'UTDI', 'status' => 'Berjalan']);

        // Data Dummy Galeri (Placeholder Image)
        $galeri = [
            ['title' => 'Kunjungan Industri', 'img' => 'https://placehold.co/600x400/1e4275/FFF?text=Foto+1'],
            ['title' => 'Rapat Koordinasi', 'img' => 'https://placehold.co/600x400/0d47a1/FFF?text=Foto+2'],
            ['title' => 'Penandatanganan', 'img' => 'https://placehold.co/600x400/4fc3f7/FFF?text=Foto+3'],
        ];
    @endphp

    <aside class="w-72 bg-[#1b4c85] text-white flex flex-col flex-shrink-0 transition-all duration-300">
        <div class="h-20 flex items-center px-8 border-b border-white/10">
            <div class="flex items-center gap-2">
                <div class="font-bold text-3xl tracking-wide italic">SIMONE</div>
            </div>
        </div>

        <div class="p-6">
            <p class="text-xs text-blue-200 mb-4 font-medium">Menu</p>
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-4 px-4 py-3 bg-white/10 rounded-xl text-white shadow-sm border-l-4 border-blue-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-blue-100 hover:bg-white/5 rounded-xl transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>Manajemen Kegiatan</span>
                </a>

                <a href="#" class="flex items-center justify-between px-4 py-3 text-blue-100 hover:bg-white/5 rounded-xl transition group">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span>Manajemen Kerjasama</span>
                    </div>
                    <svg class="w-4 h-4 transform group-hover:rotate-180 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-blue-100 hover:bg-white/5 rounded-xl transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Kalender</span>
                </a>
            </nav>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0">
        
        <header class="h-20 bg-[#1b4c85] px-8 flex justify-between items-center shadow-md z-10">
            <button class="p-2 rounded-lg border border-blue-400/30 text-white hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>

            <div class="flex items-center gap-4">
                <div class="text-right text-white hidden sm:block">
                    <div class="text-sm font-semibold">Hanung</div>
                </div>
                <div class="w-10 h-10 rounded-full border-2 border-blue-300 overflow-hidden bg-gray-200">
                    <img src="https://ui-avatars.com/api/?name=Hanung&background=0D8ABC&color=fff" alt="Profile" class="w-full h-full object-cover">
                </div>
                <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 lg:p-8">
            
            <div class="grid grid-cols-12 gap-6 h-full">
                
                <div class="col-span-12 xl:col-span-3 bg-white rounded-[2rem] p-4 flex flex-col gap-4 shadow-sm h-fit xl:h-auto">
                    
                    <div class="bg-[#4fc3f7] rounded-[2rem] p-6 text-white relative overflow-hidden h-44 flex flex-col justify-center shadow-md group hover:scale-[1.02] transition-transform">
                        <div class="absolute top-4 left-4 opacity-40">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        </div>
                        <div class="relative z-10 pl-2">
                            <p class="text-lg font-medium opacity-90">Divisi</p>
                            <h2 class="text-3xl font-bold mt-1">Pemasaran</h2>
                        </div>
                    </div>

                    <div class="bg-[#1b4c85] rounded-[2rem] p-6 text-white relative overflow-hidden h-44 flex flex-col justify-center shadow-md group hover:scale-[1.02] transition-transform">
                        <div class="absolute top-4 left-4 opacity-40">
                             <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                        </div>
                        <div class="relative z-10 pl-2">
                            <p class="text-lg font-medium opacity-90">Hari</p>
                            <h2 class="text-3xl font-bold mt-1">Senin</h2> 
                            <p class="text-[10px] mt-2 leading-tight opacity-70 max-w-[150px]">Semangat berkegiatan di Dinas Pariwisata Kabupaten Bantul</p>
                        </div>
                    </div>

                    <div class="bg-[#4fc3f7] rounded-[2rem] p-6 text-white relative overflow-hidden h-44 flex flex-col justify-center shadow-md group hover:scale-[1.02] transition-transform">
                         <div class="absolute top-4 left-4 opacity-40">
                             <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="relative z-10 pl-2">
                            <p class="text-lg font-medium opacity-90">Jam</p>
                            <h2 class="text-3xl font-bold mt-1" id="realtime-clock">-- : -- --</h2>
                            <p class="text-[10px] mt-2 opacity-70">Jangan Lupa Istirahat Yah!</p>
                        </div>
                    </div>

                </div>

                <div class="col-span-12 xl:col-span-6 flex flex-col gap-6">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="bg-[#1b4c85] rounded-3xl p-5 text-white shadow-lg flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-4 opacity-80">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <h3 class="text-xl font-bold">MoU Berjalan</h3>
                            </div>
                            <div class="space-y-2 flex-1">
                                @foreach($mouBerjalan as $item)
                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2 flex justify-between items-center hover:bg-white/30 transition">
                                    <span class="text-sm font-semibold tracking-wide">{{ $item['nama'] }}</span>
                                    <span class="bg-green-500 text-[10px] font-bold px-3 py-1 rounded-full text-white shadow-sm uppercase">{{ $item['status'] }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-[#2d5d9b] rounded-3xl p-5 text-white shadow-lg flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-4 opacity-80">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <h3 class="text-xl font-bold">MoU Berakhir</h3>
                            </div>
                            <div class="space-y-2 flex-1">
                                @foreach($mouBerakhir as $item)
                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2 flex justify-between items-center hover:bg-white/30 transition">
                                    <span class="text-sm font-semibold tracking-wide">{{ $item['nama'] }}</span>
                                    <span class="bg-red-500 text-[10px] font-bold px-3 py-1 rounded-full text-white shadow-sm uppercase">Berjalan</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 flex-1">
                        
                         <div class="bg-[#4fc3f7] rounded-3xl p-5 text-white shadow-lg flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-4 opacity-80">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                                <h3 class="text-xl font-bold">PKS Berjalan</h3>
                            </div>
                            <div class="space-y-2 flex-1">
                                @foreach($pksBerjalan as $item)
                                <div class="bg-white/30 backdrop-blur-sm rounded-lg px-4 py-2 flex justify-between items-center hover:bg-white/40 transition">
                                    <span class="text-sm font-semibold tracking-wide">{{ $item['nama'] }}</span>
                                    <span class="bg-green-500 text-[10px] font-bold px-3 py-1 rounded-full text-white shadow-sm uppercase">{{ $item['status'] }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                         <div class="bg-[#4fc3f7] rounded-3xl p-5 text-white shadow-lg flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-4 opacity-80">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                                <h3 class="text-xl font-bold">PKS Berakhir</h3>
                            </div>
                            <div class="space-y-2 flex-1">
                                @foreach($pksBerakhir as $item)
                                <div class="bg-white/30 backdrop-blur-sm rounded-lg px-4 py-2 flex justify-between items-center hover:bg-white/40 transition">
                                    <span class="text-sm font-semibold tracking-wide">{{ $item['nama'] }}</span>
                                    <span class="bg-red-500 text-[10px] font-bold px-3 py-1 rounded-full text-white shadow-sm uppercase">Berjalan</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-span-12 xl:col-span-3 h-full">
                    <div class="bg-[#4fc3f7] rounded-3xl p-6 text-white shadow-lg h-full flex flex-col">
                        <div class="flex items-start gap-4 mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <div>
                                <h3 class="text-2xl font-bold leading-tight">Galeri <br>Kegiatan</h3>
                            </div>
                        </div>
                        
                        <div class="flex-1 space-y-4 overflow-y-auto pr-1">
                            @foreach($galeri as $g)
                            <div class="group relative rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
                                <img src="{{ $g['img'] }}" alt="Gallery" class="w-full h-32 object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute bottom-0 w-full bg-black/40 backdrop-blur-sm p-2 text-center">
                                    <p class="text-xs font-medium">{{ $g['title'] }}</p>
                                </div>
                            </div>
                            @endforeach
                            <div class="group relative rounded-2xl overflow-hidden shadow-sm">
                                <div class="w-full h-32 bg-white/20 flex items-center justify-center border-2 border-white/50 border-dashed">
                                    <span class="text-xs opacity-80">More...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        function updateClock() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            
            hours = hours % 12;
            hours = hours ? hours : 12; 
            minutes = minutes < 10 ? '0' + minutes : minutes;
            
            const timeString = hours + ' : ' + minutes + ' ' + ampm;
            document.getElementById('realtime-clock').textContent = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock(); // Run immediately
    </script>
</body>
</html>