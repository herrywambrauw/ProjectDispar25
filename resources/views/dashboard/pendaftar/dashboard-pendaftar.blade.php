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
        /* Alpine.js x-cloak untuk menyembunyikan elemen sebelum inisialisasi */
        [x-cloak] { display: none !important; }

        /* Tambahkan style untuk sidebar yang diperkecil */
        .sidebar-min { width: 4.5rem !important; }
        .sidebar-min .nav-text, .sidebar-min .logo-text, .sidebar-min .dropdown-arrow { display: none; }
        .sidebar-min .h-20 { padding-left: 0.5rem; padding-right: 0.5rem; justify-content: center; }
        .sidebar-min .logo-container { justify-content: center; }
    </style>
</head>
<body class="bg-[#dbeafe] flex h-screen overflow-hidden text-slate-800" x-data="{ sidebarOpen: true, activeMenu: 'dashboard' }">

    {{-- SETUP DATA DUMMY DIPINDAHKAN KE SINI (Atau di Controller/View Composer jika di Laravel) --}}
    @php

    @endphp

    {{-- MEMANGGIL KOMPONEN SIDEBAR DARI FOLDER 'components'
    @include('components.sidebar') --}}

    <main class="flex-1 flex flex-col min-w-0">

        {{-- MEMANGGIL KOMPONEN HEADER DARI FOLDER 'components' --}}
       @include('components.header-dashboard')

        <div class="flex-1 overflow-y-auto p-6 lg:p-8">

            {{-- Konten Utama (Dashboard Widgets) --}}
            <div class="grid grid-cols-12 gap-6">

                {{-- KOLOM KIRI (Widgets Pembimbing, Hari, Jam) --}}
                <div class="col-span-12 xl:col-span-3 flex flex-col gap-6">

                    {{-- Widget --}}
                    <div class="bg-[#4dd0e1] rounded-[2rem] p-6 text-white shadow-lg relative overflow-hidden group hover:scale-[1.02] transition-transform">
                        <div class="flex flex-col h-full justify-between gap-4">
                            <div>
                                <div class="w-10 h-10 mb-2">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold opacity-90">Divisi</h3>
                                <h2 class="text-2xl font-bold mt-1">{{ auth()->user()->role }}</h2>
                            </div>
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

                {{-- KOLOM TENGAH ) --}}
                <div class="col-span-12 xl:col-span-5 flex flex-col gap-6">




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
            if (clockElement) { clockElement.textContent = timeString; }
        }
        function updateDay() {
            const now = new Date();
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const dayName = days[now.getDay()];

            const dayElement = document.getElementById('realtime-day');
            if (dayElement) { dayElement.textContent = dayName; }
        }

        setInterval(updateClock, 1000);
        updateClock();
        updateDay();
    </script>
</body>
</html>
