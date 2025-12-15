<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Daftar PKS</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }
        .main-bg { background-color: #dbeafe; }
        .content-bg { background-color: #1b4c85; border-radius: 2rem; }
        .card-item-bg { background-color: #153a66; }
        .modal-scroll::-webkit-scrollbar { width: 8px; }
        .modal-scroll::-webkit-scrollbar-track { background: #0f294a; }
        .modal-scroll::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 4px; }
    </style>
</head>

<body
class="main-bg flex h-screen overflow-hidden"
x-data="{
    sidebarOpen: true,
    activeMenu: 'kerjasama',
    
    // --- STATE MODAL & FORM ---
    isUploadModalOpen: false,
    isEditing: false, // Penanda mode edit
    editingIndex: null, // Index data yang sedang diedit
    
    form: {
        logo: null,
        instansi: '',
        keterangan: '',
        no_pks_1: '', nama_1: '', jabatan_1: '',
        no_pks_2: '', nama_2: '', jabatan_2: '',
        tgl_mulai: '', tgl_selesai: ''
    },

    filterTime: 'all', 
    search: '',
    perPage: 10,
    currentPage: 1,

    monthMap: {
        'Januari': 0, 'Februari': 1, 'Maret': 2, 'April': 3, 'Mei': 4, 'Juni': 5,
        'Juli': 6, 'Agustus': 7, 'September': 8, 'Oktober': 9, 'November': 10, 'Desember': 11
    },
    monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],

    activities: [
        { instansi: 'PT Teknologi Harapan Bangsa', nomor_pks: 'PKS/THB/2025/001', tanggal_mulai: '01 Januari 2025', tanggal_selesai: '15 Januari 2026' },
        { instansi: 'Universitas Negeri Yogyakarta', nomor_pks: 'PKS/UNY/KS/2025/042', tanggal_mulai: '15 Februari 2025', tanggal_selesai: '20 Desember 2027' },
        { instansi: 'Dinas Kominfo Jawa Tengah', nomor_pks: 'DKI-JATENG/SPK/2024/112', tanggal_mulai: '10 Desember 2024', tanggal_selesai: '30 Januari 2026' },
        { instansi: 'Rumah Sakit Sehat Sentosa', nomor_pks: 'RSSS/PKS/MEDIS/25/003', tanggal_mulai: '01 Maret 2025', tanggal_selesai: '01 Maret 2030' },
        { instansi: 'CV Kreatif Digital Nusantara', nomor_pks: 'KDN/DN/2025/X/009', tanggal_mulai: '05 Januari 2025', tanggal_selesai: '01 Februari 2026' },
        { instansi: 'Politeknik Elektronika Negeri', nomor_pks: 'PENS/KERJASAMA/2025/088', tanggal_mulai: '20 April 2025', tanggal_selesai: '20 April 2030' },
        { instansi: 'Bank Syariah Amanah', nomor_pks: 'BSA/FIN/2025/002', tanggal_mulai: '02 Januari 2025', tanggal_selesai: '10 Januari 2026' }
    ],

    parseDate(dateStr) {
        const parts = dateStr.split(' ');
        const day = parseInt(parts[0]);
        const month = this.monthMap[parts[1]];
        const year = parseInt(parts[2]);
        return new Date(year, month, day);
    },

    // Helper: Mengubah '01 Januari 2025' menjadi '2025-01-01' untuk input HTML
    dateToInput(dateStr) {
        if(!dateStr) return '';
        const parts = dateStr.split(' ');
        const day = parts[0].padStart(2, '0');
        const monthIndex = this.monthMap[parts[1]] + 1;
        const month = String(monthIndex).padStart(2, '0');
        const year = parts[2];
        return `${year}-${month}-${day}`;
    },

    getDaysRemaining(dateStr) {
        const endDate = this.parseDate(dateStr);
        const today = new Date();
        const diffTime = endDate - today;
        return Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    },

    get filteredActivities() {
        let result = this.activities;
        if (this.filterTime !== 'all') {
            result = result.filter(a => {
                const days = this.getDaysRemaining(a.tanggal_selesai);
                if (this.filterTime === 'under_2_months') return days <= 60;
                if (this.filterTime === 'over_2_months') return days > 60;
            });
        }
        if (this.search !== '') {
            const lowerSearch = this.search.toLowerCase();
            result = result.filter(a => 
                a.instansi.toLowerCase().includes(lowerSearch) || 
                a.nomor_pks.toLowerCase().includes(lowerSearch)
            );
        }
        return result;
    },

    get paginatedActivities() {
        const start = (this.currentPage - 1) * this.perPage;
        return this.filteredActivities.slice(start, start + this.perPage);
    },

    // --- FUNGSI AKSI (EDIT & DELETE) ---
    deleteActivity(index) {
        // Karena pagination, index yang diterima adalah index halaman saat ini
        // Kita perlu mencari index asli di array 'activities'
        // Namun untuk simplicitas contoh ini, kita pakai logika sederhana:
        if (confirm('Yakin ingin menghapus data kerjasama ini?')) {
            const realIndex = (this.currentPage - 1) * this.perPage + index; 
            // Note: Logika realIndex ini asumsi tanpa filter. 
            // Jika ada filter, sebaiknya gunakan ID unik. Tapi ini cukup untuk prototype.
            
            // Mencari item di array asli untuk dihapus
            const itemToDelete = this.paginatedActivities[index];
            const actualIndex = this.activities.indexOf(itemToDelete);
            
            if(actualIndex > -1) {
                this.activities.splice(actualIndex, 1);
            }
        }
    },

    openModalCreate() {
        this.resetForm();
        this.isEditing = false;
        this.isUploadModalOpen = true;
    },

    editActivity(item) {
        this.isEditing = true;
        // Simpan referensi item asli untuk diupdate nanti
        this.editingIndex = this.activities.indexOf(item);

        // Isi form dengan data yang ada
        this.form = {
            instansi: item.instansi,
            no_pks_1: item.nomor_pks,
            tgl_mulai: this.dateToInput(item.tanggal_mulai),
            tgl_selesai: this.dateToInput(item.tanggal_selesai),
            // Field lain dikosongkan/mock karena tidak ada di dummy data activities
            keterangan: item.keterangan || '',
            nama_1: '', jabatan_1: '',
            no_pks_2: '', nama_2: '', jabatan_2: ''
        };
        
        this.isUploadModalOpen = true;
    },

    resetForm() {
        this.form = {
            logo: null, instansi: '', keterangan: '', 
            no_pks_1: '', nama_1: '', jabatan_1: '', 
            no_pks_2: '', nama_2: '', jabatan_2: '', 
            tgl_mulai: '', tgl_selesai: ''
        };
        this.editingIndex = null;
    },

    saveNewData() {
        if(!this.form.instansi || !this.form.tgl_mulai || !this.form.tgl_selesai) {
            alert('Mohon lengkapi data wajib (Instansi, Tanggal)');
            return;
        }

        const formatIndo = (dateString) => {
            const date = new Date(dateString);
            const d = String(date.getDate()).padStart(2, '0');
            const m = this.monthNames[date.getMonth()];
            const y = date.getFullYear();
            return `${d} ${m} ${y}`;
        };

        const dataPayload = {
            instansi: this.form.instansi,
            nomor_pks: this.form.no_pks_1 || 'No. PKS Pending',
            tanggal_mulai: formatIndo(this.form.tgl_mulai),
            tanggal_selesai: formatIndo(this.form.tgl_selesai)
        };

        if (this.isEditing && this.editingIndex !== null) {
            // Logic Update
            this.activities[this.editingIndex] = dataPayload;
            alert('Data berhasil diperbarui!');
        } else {
            // Logic Create
            this.activities.unshift(dataPayload);
            alert('Data berhasil ditambahkan!');
        }

        this.isUploadModalOpen = false;
        this.resetForm();
    }
}"
>

<!-- SIDEBAR -->
@include('dashboard.pemasaran.components.sidebar')

<main class="flex-1 flex flex-col min-w-0 relative">
    <!-- HEADER -->
@include('dashboard.pemasaran.components.header')


    <div class="flex-1 overflow-y-auto p-6">
        <div class="content-bg p-8 text-white shadow-2xl">
            <div class="flex flex-col xl:flex-row xl:justify-between xl:items-center gap-4 mb-8">
                <h2 class="text-3xl font-bold">Daftar PKS</h2>

                <div class="flex items-center gap-4">
                    <input type="text" x-model="search" @input="currentPage = 1" placeholder="Cari instansi..." class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none placeholder:text-blue-300 w-48">

                    <select x-model="perPage" @change="currentPage = 1" class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none">
                        <option value="10">10 Data</option>
                        <option value="20">20 Data</option>
                    </select>

                    <select x-model="filterTime" @change="currentPage = 1" class="bg-[#102d4f] border border-blue-400 text-white text-sm rounded-xl px-4 py-2 focus:outline-none cursor-pointer hover:bg-[#153a66] transition">
                        <option value="all">Semua Waktu</option>
                        <option value="under_2_months" class="text-yellow-400">⚠ Kurang dari 2 Bulan</option>
                        <option value="over_2_months" class="text-green-400">🛡 Lebih dari 2 Bulan</option>
                    </select>

                    <div>
                        <button @click="openModalCreate()" class="bg-blue-600 hover:bg-blue-500 border border-blue-400 text-white text-sm rounded-xl px-4 py-2 flex items-center gap-2 transition shadow-lg focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                            </svg>
                            Unggah
                        </button>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <template x-for="(item, index) in paginatedActivities" :key="index">
                    <div class="card-item-bg p-6 rounded-xl shadow-lg flex flex-col md:flex-row md:items-center gap-6 border border-white/10 hover:border-blue-400/50 transition duration-300">

                        <div class="w-16 h-16 bg-blue-900/50 rounded-lg flex items-center justify-center border border-white/10 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-blue-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>

                        <div class="flex-1">
                            <p class="text-xs text-blue-300 font-mono tracking-wide mb-1" x-text="item.nomor_pks"></p>
                            <h3 class="text-xl font-semibold text-white mb-3" x-text="item.instansi"></h3>
                            
                            <div class="flex flex-wrap items-center gap-y-2 gap-x-6 text-sm text-blue-100/80">
                                <div class="flex items-center gap-2">
                                    <span class="text-blue-400">Mulai:</span>
                                    <span class="font-medium text-white" x-text="item.tanggal_mulai"></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-blue-400">Selesai:</span>
                                    <span class="font-medium px-2 py-0.5 rounded transition-colors duration-300" 
                                        :class="getDaysRemaining(item.tanggal_selesai) <= 60 
                                            ? 'bg-red-500/20 text-red-300 border border-red-500/50 animate-pulse' 
                                            : 'text-white'"
                                        x-text="item.tanggal_selesai">
                                    </span>
                                    <span x-show="getDaysRemaining(item.tanggal_selesai) <= 60" class="text-[10px] text-red-400 italic">(Segera Berakhir)</span>
                                </div>
                            </div>
                        </div>

                        <div x-data="{ open: false }" class="relative self-start md:self-center">
                            <button @click="open = !open" class="p-2 rounded-full hover:bg-white/10 transition text-xl text-blue-200">⋮</button>
                            <div x-show="open" @click.outside="open = false" x-transition x-cloak class="absolute right-0 mt-2 w-44 bg-[#102d4f] rounded-xl shadow-xl border border-white/5 overflow-hidden text-sm z-50">
                                
                                <button @click="editActivity(item); open=false" class="w-full text-left px-4 py-3 hover:bg-blue-600/50 text-white flex items-center gap-2 border-b border-white/5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-blue-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    Edit Data
                                </button>

                                <button @click="deleteActivity(index); open=false" class="w-full text-left px-4 py-3 hover:bg-red-600/80 text-white flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    Hapus Data
                                </button>

                            </div>
                        </div>

                    </div>
                </template>
            </div>
            
            <div x-show="filteredActivities.length === 0" x-cloak class="flex flex-col items-center justify-center py-12 text-blue-200 opacity-70">
                <p class="text-lg">Tidak ada data yang sesuai filter</p>
            </div>
            <div class="flex justify-between items-center mt-8 border-t border-white/10 pt-4">
                <p class="text-sm text-blue-200">
                    Menampilkan <span class="font-bold text-white" x-text="paginatedActivities.length"></span>
                    dari <span class="font-bold text-white" x-text="filteredActivities.length"></span> data
                </p>
            </div>

        </div>
    </div>

    <div
        x-show="isUploadModalOpen"
        x-cloak
        class="fixed inset-0 z-[99] flex items-center justify-center bg-slate-900/70 backdrop-blur-sm p-4"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
    >
        <div class="bg-[#1b4c85] w-full max-w-4xl rounded-2xl shadow-2xl border border-white/10 flex flex-col max-h-[90vh]">
            
            <div class="flex justify-between items-center p-6 border-b border-white/10">
                <h3 class="text-2xl font-bold text-white" x-text="isEditing ? 'Edit Perjanjian Kerja Sama (PKS)' : 'Unggah Perjanjian Kerja Sama (PKS)'"></h3>
                <button @click="isUploadModalOpen = false" class="text-blue-200 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-6 overflow-y-auto modal-scroll text-white">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Unggah Logo Instansi</label>
                            <input type="file" class="block w-full text-sm text-blue-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer bg-[#102d4f] rounded-lg border border-blue-400/50">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Nama Instansi</label>
                            <input type="text" x-model="form.instansi" placeholder="Contoh: PT Teknologi Bangsa" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-blue-200 mb-1">Keterangan</label>
                            <textarea x-model="form.keterangan" rows="3" placeholder="Deskripsi singkat kerjasama..." class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-400"></textarea>
                        </div>

                        <div class="bg-[#153a66] p-4 rounded-xl border border-white/5 space-y-3 mt-4">
                            <h4 class="font-semibold text-blue-300 border-b border-white/10 pb-2">Data Pihak Pertama</h4>
                            <div>
                                <label class="block text-xs text-blue-200 mb-1">Nomor PKS</label>
                                <input type="text" x-model="form.no_pks_1" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-3 py-1.5 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs text-blue-200 mb-1">Nama Pihak Pertama</label>
                                <input type="text" x-model="form.nama_1" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-3 py-1.5 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs text-blue-200 mb-1">Jabatan</label>
                                <input type="text" x-model="form.jabatan_1" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-3 py-1.5 text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-blue-200 mb-1">Tanggal Mulai</label>
                                <input type="date" x-model="form.tgl_mulai" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 text-white scheme-dark">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-blue-200 mb-1">Tanggal Selesai</label>
                                <input type="date" x-model="form.tgl_selesai" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 text-white scheme-dark">
                            </div>
                        </div>

                        <div class="bg-[#153a66] p-4 rounded-xl border border-white/5 space-y-3 mt-4">
                            <h4 class="font-semibold text-blue-300 border-b border-white/10 pb-2">Data Pihak Kedua</h4>
                            <div>
                                <label class="block text-xs text-blue-200 mb-1">Nomor PKS</label>
                                <input type="text" x-model="form.no_pks_2" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-3 py-1.5 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs text-blue-200 mb-1">Nama Pihak Kedua</label>
                                <input type="text" x-model="form.nama_2" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-3 py-1.5 text-sm">
                            </div>
                            <div>
                                <label class="block text-xs text-blue-200 mb-1">Jabatan</label>
                                <input type="text" x-model="form.jabatan_2" class="w-full bg-[#102d4f] border border-blue-400/50 rounded-lg px-3 py-1.5 text-sm">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="p-6 border-t border-white/10 flex justify-end gap-3 bg-[#153a66] rounded-b-2xl">
                <button 
                    @click="isUploadModalOpen = false; resetForm()" 
                    class="px-5 py-2 rounded-xl border border-blue-400 text-blue-200 hover:bg-white/10 transition">
                    Batal
                </button>
                <button 
                    @click="saveNewData()" 
                    class="px-5 py-2 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-500 shadow-lg transition"
                    x-text="isEditing ? 'Simpan Perubahan' : 'Simpan Data'">
                </button>
            </div>

        </div>
    </div>

</main>
</body>
</html>