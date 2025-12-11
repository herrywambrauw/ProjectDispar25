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
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#dbeafe] flex h-screen overflow-hidden text-slate-800">

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

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-[#1b4c85] text-white flex flex-col flex-shrink-0 transition-all duration-300 relative z-20">
        <div class="h-24 flex items-center px-6 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="bg-white text-[#1b4c85] p-1 rounded font-bold text-xl leading-none tracking-tighter">
                    SME
                </div>
                <div class="font-bold text-2xl tracking-wide">SIMONE</div>
            </div>
        </div>

        <div class="p-4 overflow-y-auto flex-1">
            <p class="text-xs text-blue-200 mb-4 font-medium px-4">Menu</p>
            <nav class="space-y-2">
                
                {{-- Menu: Dashboard --}}
                <a href="#" class="flex items-center gap-4 px-4 py-3 bg-[#163e6e] rounded-xl text-white shadow-inner relative group">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-blue-400 rounded-r-md"></div>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>
                
                {{-- Menu: Log Activity --}}
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-blue-100 hover:bg-white/5 rounded-xl transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-sm">Log Activity</span>
                </a>

                {{-- Menu: Upload (Dropdown style) --}}
                <a href="#" class="flex items-center justify-between px-4 py-3 text-blue-100 hover:bg-white/5 rounded-xl transition group">
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        <span class="font-medium text-sm">Upload</span>
                    </div>
                    <svg class="w-4 h-4 transform transition group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
                
                {{-- Menu: Calender --}}
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-blue-100 hover:bg-white/5 rounded-xl transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="font-medium text-sm">Calender</span>
                </a>
            </nav>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 flex flex-col min-w-0 bg-[#dbeafe]">
        
        <header class="h-20 bg-[#1b4c85] px-8 flex justify-between items-center shadow-md z-10">
            <button class="p-2 rounded-lg bg-[#2d5d9b] text-white hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>

            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full border-2 border-white/20 overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=Riski&background=random" alt="Profile" class="w-full h-full object-cover">
                </div>
                <div class="text-white hidden sm:block">
                    <div class="text-sm font-semibold">Riski</div>
                </div>
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
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
                            <h2 class="text-3xl font-bold mt-1">Senin</h2> 
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
                                        <span class="bg-[#858d9d] text-white text-[10px] font-bold px-4 py-1 rounded-full shadow-sm">Ditinjau</span>
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
                                    <span class="bg-[#858d9d] text-white text-[10px] font-bold px-3 py-1 rounded-full">Ditinjau</span>
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
            const ampm = hours >= 12 ? 'PM' : 'AM'; // Format AM/PM jika diinginkan, atau hapus untuk 24 jam
            
            // Format 24 jam ala Indonesia (WIB) biasanya tidak pakai AM/PM, tapi di desain ada 'WIB'
            // Kita pakai format 24 jam saja agar rapi
            // hours = hours % 12; hours = hours ? hours : 12; // Uncomment untuk format 12 jam
            
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            
            const timeString = hours + ' : ' + minutes + ' WIB';
            document.getElementById('realtime-clock').textContent = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock(); 
    </script>
</body>
</html>