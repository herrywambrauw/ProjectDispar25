<!-- FULL REBUILD SESUAI DESAIN GAMBAR -->
<!-- Tailwind + Alpine.js Required -->
<!DOCTYPE html>
<html lang="id" x-data="{ sidebar:false, unggah:false }">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#d4e6f5] flex">

<!-- SIDEBAR -->
<aside :class="sidebar ? 'w-20' : 'w-64'" class="bg-[#0f4c81] text-white transition-all duration-300 ease-in-out h-screen p-6 relative">

    <!-- LOGO -->
    <div class="flex justify-center mb-10">
        <img src="https:/img.icons8.com/?size=100&id=23241&format=png&color=FFFFFF" 
             :class="sidebar ? 'w-10' : 'w-28'" class="transition-all duration-300" />
    </div>

    <!-- MENU -->
    <nav class="space-y-5 mt-10">

        <!-- DASHBOARD -->
        <a href="/dashboard" class="flex items-center space-x-4 hover:bg-[#1b5f99] p-3 rounded-xl transition">
            <img src="https://img.icons8.com/?size=100&id=32240&format=png&color=FFFFFF" class="w-6" />
            <span x-show="!sidebar" class="text-sm">Dashboard</span>
        </a>

        <!-- UNGGAH DROPDOWN -->
        <div>
            <button @click="unggah = !unggah" class="flex items-center justify-between w-full hover:bg-[#1b5f99] p-3 rounded-xl">
                <div class="flex items-center space-x-4">
                    <img src="https://img.icons8.com/?size=100&id=59817&format=png&color=FFFFFF" class="w-6" />
                    <span x-show="!sidebar" class="text-sm">Unggah</span>
                </div>
                <span x-show="!sidebar">&#9662;</span>
            </button>

            <!-- DROPDOWN -->
            <div x-show="unggah && !sidebar" class="ml-12 mt-2 space-y-2 text-sm">
                <a href="/unggah-laporan" class="block hover:underline">Unggah Laporan</a>
                <a href="/unggah-kegiatan" class="block hover:underline">Unggah Kegiatan</a>
            </div>
        </div>

        <!-- LOG ACTIVITY -->
        <a href="/log-activity" class="flex items-center space-x-4 hover:bg-[#1b5f99] p-3 rounded-xl">
            <img src="https://img.icons8.com/?size=100&id=98964&format=png&color=FFFFFF" class="w-6" />
            <span x-show="!sidebar" class="text-sm">Log Activity</span>
        </a>

        <!-- CALENDAR -->
        <a href="/calendar" class="flex items-center space-x-4 hover:bg-[#1b5f99] p-3 rounded-xl">
            <img src="https://img.icons8.com/?size=100&id=85476&format=png&color=FFFFFF" class="w-6" />
            <span x-show="!sidebar" class="text-sm">Calendar</span>
        </a>
    </nav>
</aside>

<!-- MAIN CONTENT -->
<div class="flex-1">

    <!-- HEADER -->
    <header class="bg-[#0f4c81] text-white flex justify-between items-center p-4">

        <!-- HAMBURGER -->
        <button @click="sidebar = !sidebar" class="p-2 bg-[#1b5f99] rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- PROFILE -->
        <div x-data="{ open:false }" class="relative">
            <button @click="open=!open" class="flex items-center space-x-3">
                <img src="https://img.icons8.com/?size=100&id=23241&format=png" class="w-10 rounded-full" />
                <span>Riski</span>
                <span>&#9662;</span>
            </button>

            <!-- DROPDOWN -->
            <div x-show="open" class="absolute right-0 mt-3 bg-white text-black py-2 w-40 shadow-lg rounded-xl">
                <a href="/profil" class="block px-4 py-2 hover:bg-gray-200">Profil User</a>
                <a href="/logout" class="block px-4 py-2 hover:bg-gray-200">Keluar</a>
            </div>
        </div>

    </header>

    </div>
</div>
</body>
</html>
