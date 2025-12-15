<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Daftar Kegiatan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }

        .main-bg { background-color: #dbeafe; }
        .content-bg { background-color: #1b4c85; border-radius: 2rem; }
        .card-item-bg { background-color: #153a66; }
    </style>
</head>

<body
class="main-bg flex h-screen overflow-hidden"
x-data="{
    sidebarOpen: true,
    activeMenu: 'kegiatan',
    filterStatus: 'all',
    search: '',

    perPage: 10,
    currentPage: 1,

    activities: [
        {
            title: 'Rapat yang sangat Rapat',
            date: '25 Desember 2025',
            description: 'Melakukan rapat yang sangat rapat',
            status: 'pending',
            username: 'hanung.damar'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Diskusi Strategi Marketing Digital',
            date: '26 Desember 2025',
            description: 'Menganalisis performa kampanye bulan lalu.',
            status: 'setuju',
            username: 'admin.pemasaran'
        },
        {
            title: 'Briefing Proyek Desain UI/UX Baru',
            date: '27 Desember 2025',
            description: 'Memahami scope dan target audiens proyek.',
            status: 'setuju',
            username: 'tim.desain'
        }
    ],

    get filteredActivities() {
        let result = this.activities;

        // 1. Filter berdasarkan Status dulu
        if (this.filterStatus !== 'all') {
            result = result.filter(a => a.status === this.filterStatus);
        }

        // 2. Filter berdasarkan Pencarian (Search)
        if (this.search !== '') {
            const lowerSearch = this.search.toLowerCase();
            
            result = result.filter(a => 
                // Cari di Judul
                a.title.toLowerCase().includes(lowerSearch) || 
                // Cari di Deskripsi
                a.description.toLowerCase().includes(lowerSearch) ||
                // Cari di Username
                a.username.toLowerCase().includes(lowerSearch)
            );
        }

        return result;
    },

    get paginatedActivities() {
        const start = (this.currentPage - 1) * this.perPage;
        return this.filteredActivities.slice(start, start + this.perPage);
    },

    updateStatus(activity, status) {
        activity.status = status;
    },

    deleteActivity(index) {
        if (confirm('Yakin ingin menghapus kegiatan ini?')) {
            this.activities.splice(index, 1);
        }
    }
}"
>

<!-- SIDEBAR -->
@include('dashboard.pemasaran.components.sidebar')

<main class="flex-1 flex flex-col min-w-0">

<!-- HEADER -->
@include('dashboard.pemasaran.components.header')

<div class="flex-1 overflow-y-auto p-6">

<div class="content-bg p-8 text-white shadow-2xl">

<!-- HEADER + FILTER -->
<div class="flex flex-col xl:flex-row xl:justify-between xl:items-center gap-4 mb-8">
    <h2 class="text-3xl font-bold">Daftar Kegiatan</h2>

    <div class="flex items-center gap-4">

        <!-- SEARCH -->
        <input
            type="text"
            x-model="search"
            @input="currentPage = 1"
            placeholder="Cari kegiatan..."
            class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none placeholder:text-blue-300"
        >

        <!-- JUMLAH DATA -->
        <select
            x-model="perPage"
            @change="currentPage = 1"
            class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none">
            <option value="10">10 Data</option>
            <option value="20">20 Data</option>
            <option value="30">30 Data</option>
            <option value="40">40 Data</option>
            <option value="50">50 Data</option>
        </select>

        <!-- FILTER STATUS -->
        <select
            x-model="filterStatus"
            @change="currentPage = 1"
            class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none">
            <option value="all">Filter</option>
            <option value="setuju">Setuju</option>
            <option value="pending">Pending</option>
        </select>
    </div>
</div>

<!-- LIST KEGIATAN -->
<div class="space-y-6">

<template x-for="(activity, index) in paginatedActivities" :key="index">
<div class="card-item-bg p-6 rounded-xl shadow-lg flex items-center gap-6 border border-white/10">

    <img
        src="https://via.placeholder.com/128x80"
        class="w-32 h-20 object-cover rounded-lg">

    <div class="flex-1">

        <!-- BADGE STATUS -->
        <span
            class="inline-block mb-2 px-3 py-1 text-xs font-semibold rounded-full"
            :class="activity.status === 'setuju'
                ? 'bg-green-600 text-white'
                : 'bg-yellow-400 text-slate-900'">
            <span x-text="activity.status.charAt(0).toUpperCase() + activity.status.slice(1)"></span>
        </span>

        <p class="text-xs text-blue-300 mb-2">
            Dikirim oleh:
            <span class="font-medium text-white" x-text="activity.username"></span>
        </p>

        <h3 class="text-lg font-semibold" x-text="activity.title"></h3>
        <p class="text-sm text-blue-200" x-text="activity.date"></p>
        <p class="text-sm mt-1" x-text="activity.description"></p>
    </div>

    <!-- MENU AKSI -->
    <div x-data="{ open: false }" class="relative">
        <button
            @click="open = !open"
            class="p-2 rounded-full hover:bg-white/10 transition text-xl">
            ⋮
        </button>

        <div
            x-show="open"
            @click.outside="open = false"
            x-transition
            x-cloak
            class="absolute right-0 mt-2 w-44 bg-[#102d4f] rounded-xl shadow-xl overflow-hidden text-sm z-50">

            <button
                @click="updateStatus(activity, 'setuju'); open=false"
                class="w-full text-left px-4 py-2 hover:bg-green-600/80">
                Setujui
            </button>

            <button
                @click="updateStatus(activity, 'pending'); open=false"
                class="w-full text-left px-4 py-2 hover:bg-yellow-500/80 text-white">
                Pending
            </button>

            <button
                @click="deleteActivity(index); open=false"
                class="w-full text-left px-4 py-2 hover:bg-red-600/80 text-white">
                Hapus
            </button>
        </div>
    </div>

</div>
</template>

</div>

<!-- EMPTY STATE -->
<p
    x-show="filteredActivities.length === 0"
    x-cloak
    class="text-center text-blue-200 py-10">
    Data tidak ditemukan
</p>

<!-- INFO JUMLAH DATA -->
<p class="text-sm text-blue-200 mt-6">
    Menampilkan
    <span x-text="paginatedActivities.length"></span>
    dari
    <span x-text="filteredActivities.length"></span>
    data
</p>

</div>
</div>
</main>

</body>
</html>
