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
        { title: 'Rapat yang sangat Rapat', date: '25 Desember 2025', description: 'Melakukan rapat yang sangat rapat', status: 'pending', username: 'hanung.damar' },
        { title: 'Diskusi Strategi Marketing Digital', date: '26 Desember 2025', description: 'Menganalisis performa kampanye bulan lalu.', status: 'setuju', username: 'admin.pemasaran' },
        { title: 'Evaluasi Anggaran Tahunan', date: '26 Desember 2025', description: 'Review budget Q4.', status: 'setuju', username: 'finance.dept' },
        { title: 'Brainstorming Konten TikTok', date: '26 Desember 2025', description: 'Ide konten viral.', status: 'setuju', username: 'creative.lead' },
        { title: 'Meeting Vendor IT', date: '26 Desember 2025', description: 'Pembahasan server.', status: 'pending', username: 'it.support' },
        { title: 'Rekap Absensi Karyawan', date: '26 Desember 2025', description: 'Cek kehadiran.', status: 'setuju', username: 'hrd.staff' },
        { title: 'Pelatihan Customer Service', date: '26 Desember 2025', description: 'Training modul baru.', status: 'setuju', username: 'spv.cs' },
        { title: 'Audit Internal Gudang', date: '26 Desember 2025', description: 'Stok opname.', status: 'pending', username: 'logistik' },
        { title: 'Persiapan Rapat Pemegang Saham', date: '26 Desember 2025', description: 'Siapkan materi presentasi.', status: 'setuju', username: 'sekretaris' },
        { title: 'Maintenance Website', date: '26 Desember 2025', description: 'Update plugin dan security.', status: 'setuju', username: 'web.dev' },
        { title: 'Desain Banner Promo', date: '26 Desember 2025', description: 'Promo tahun baru.', status: 'pending', username: 'designer' },
        { title: 'Analisis Kompetitor', date: '26 Desember 2025', description: 'Cek harga pasar.', status: 'setuju', username: 'marketing' },
        { title: 'Briefing Proyek Desain UI/UX Baru', date: '27 Desember 2025', description: 'Memahami scope dan target audiens proyek.', status: 'setuju', username: 'tim.desain' }
    ],

    get filteredActivities() {
        let result = this.activities;

        if (this.filterStatus !== 'all') {
            result = result.filter(a => a.status === this.filterStatus);
        }

        if (this.search !== '') {
            const lowerSearch = this.search.toLowerCase();
            result = result.filter(a => 
                a.title.toLowerCase().includes(lowerSearch) || 
                a.description.toLowerCase().includes(lowerSearch) ||
                a.username.toLowerCase().includes(lowerSearch)
            );
        }
        return result;
    },

    get paginatedActivities() {
        const start = (this.currentPage - 1) * this.perPage;
        return this.filteredActivities.slice(start, start + parseInt(this.perPage));
    },

    // --- TAMBAHAN LOGIKA PAGINATION ---
    get totalPages() {
        return Math.ceil(this.filteredActivities.length / this.perPage);
    },

    nextPage() {
        if (this.currentPage < this.totalPages) {
            this.currentPage++;
        }
    },

    prevPage() {
        if (this.currentPage > 1) {
            this.currentPage--;
        }
    },
    // ----------------------------------

    updateStatus(activity, status) {
        activity.status = status;
    },

    deleteActivity(activity) {
        if (confirm('Yakin ingin menghapus kegiatan ini?')) {
            // Fix: Hapus berdasarkan object, bukan index loop pagination
            const index = this.activities.indexOf(activity);
            if (index > -1) {
                this.activities.splice(index, 1);
                // Jika halaman kosong setelah hapus, mundur 1 halaman
                if (this.paginatedActivities.length === 0 && this.currentPage > 1) {
                    this.currentPage--;
                }
            }
        }
    }
}"
>

{{-- SIDEBAR --}}
    @include('dashboard.pemasaran.components.sidebar')

    <main class="flex-1 flex flex-col min-w-0">

         {{-- HEADER --}}
        @include('components.header-dashboard')

        <div class="flex-1 overflow-y-auto p-6">

            <div class="content-bg p-8 text-white shadow-2xl">

                <div class="flex flex-col xl:flex-row xl:justify-between xl:items-center gap-4 mb-8">
                    <h2 class="text-3xl font-bold">Daftar Kegiatan</h2>

                    <div class="flex items-center gap-4">

                        <input 
                            type="text" 
                            x-model="search"
                            @input="currentPage = 1"
                            placeholder="Cari kegiatan..." 
                            class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none placeholder:text-blue-300"
                        >

                        <select 
                            x-model="perPage"
                            @change="currentPage = 1"
                            class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none">
                            <option value="5">5 Data</option>
                            <option value="10">10 Data</option>
                            <option value="20">20 Data</option>
                        </select>

                        <select 
                            x-model="filterStatus" 
                            @change="currentPage = 1"
                            class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none">
                            <option value="all">Semua Status</option>
                            <option value="setuju">Setuju</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-6">

                    <template x-for="(activity, index) in paginatedActivities" :key="index">
                        <div class="card-item-bg p-6 rounded-xl shadow-lg flex items-center gap-6 border border-white/10">
                            
                            <img 
                                src="https://via.placeholder.com/128x80" 
                                class="w-32 h-20 object-cover rounded-lg">

                            <div class="flex-1">
                                
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
                                    class="absolute right-0 mt-2 w-44 bg-[#102d4f] rounded-xl shadow-xl overflow-hidden text-sm z-50 border border-blue-400">
                                    
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
                                        @click="deleteActivity(activity); open=false"
                                        class="w-full text-left px-4 py-2 hover:bg-red-600/80 text-white">
                                        Hapus
                                    </button>
                                </div>
                            </div>

                        </div>
                    </template>

                </div>

                <p 
                    x-show="filteredActivities.length === 0" 
                    x-cloak
                    class="text-center text-blue-200 py-10">
                    Data tidak ditemukan
                </p>

                <div class="mt-8 flex flex-col md:flex-row justify-between items-center gap-4 pt-6 border-t border-blue-400/30">
                    
                    <p class="text-sm text-blue-200">
                        Menampilkan
                        <span class="font-bold text-white" x-text="paginatedActivities.length"></span>
                        dari
                        <span class="font-bold text-white" x-text="filteredActivities.length"></span>
                        data
                    </p>

                    <div class="flex items-center gap-2" x-show="totalPages > 1" x-cloak>
                        <button 
                            @click="prevPage" 
                            :disabled="currentPage === 1"
                            :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-500'"
                            class="px-4 py-2 bg-[#102d4f] border border-blue-400 rounded-lg text-sm transition">
                            &laquo; Sebelumnya
                        </button>

                        <div class="px-4 py-2 bg-blue-600/20 rounded-lg text-sm border border-blue-400/50">
                            Hal <span x-text="currentPage"></span> / <span x-text="totalPages"></span>
                        </div>

                        <button 
                            @click="nextPage" 
                            :disabled="currentPage === totalPages"
                            :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-500'"
                            class="px-4 py-2 bg-[#102d4f] border border-blue-400 rounded-lg text-sm transition">
                            Selanjutnya &raquo;
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </main>

</body>
</html>