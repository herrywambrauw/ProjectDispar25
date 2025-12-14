<aside 
    class="bg-[#1b4c85] text-white flex flex-col flex-shrink-0 transition-all duration-300 ease-in-out" 
    :class="sidebarOpen ? 'w-72' : 'w-20'" 
    {{-- PENYESUAIAN 1 & 2: Tambahkan activeMenuInital dan inisialisasi activeMenu dengan path saat ini --}}
    {{-- Asumsi: Blade template sedang diakses, jadi Anda dapat menggunakan helper request() atau URL::current() --}}
    x-data="{ 
        sidebarOpen: true, 
        openUnggah: false, 
        activeMenuInitial: '{{ request()->path() }}', 
        activeMenu: '',
        
        init() {
            // Set activeMenu berdasarkan path URL saat ini (tanpa slash di depan)
            const currentPath = this.activeMenuInitial.split('/').pop() || 'dashboard-magang'; // default ke dashboard-magang
            
            // Logika untuk menentukan activeMenu:
            if (currentPath.includes('dashboard-magang')) {
                this.activeMenu = 'dashboard-magang';
            } else if (currentPath.includes('log-aktivitas')) {
                this.activeMenu = 'log-aktivitas';
            } else if (currentPath.includes('unggah-laporan')) {
                this.activeMenu = 'unggah-laporan';
                this.openUnggah = true; // Buka Unggah jika salah satu submenunya aktif (Permintaan 2)
            } else if (currentPath.includes('unggah-kegiatan')) {
                this.activeMenu = 'unggah-kegiatan';
                this.openUnggah = true; // Buka Unggah jika salah satu submenunya aktif (Permintaan 2)
            } else if (currentPath.includes('kalender')) {
                this.activeMenu = 'kalender';
            }
        }
    }"
>
    <div class="h-20 flex items-center px-8 border-b border-white/10" :class="!sidebarOpen && 'justify-center px-2'">
        <div class="flex items-center gap-2 logo-container">
            <div class="font-bold text-3xl tracking-wide italic logo-text transition-opacity duration-200" x-show="sidebarOpen">SIMONE</div>
            <div x-show="!sidebarOpen" class="font-bold text-2xl tracking-wide italic">S</div> 
        </div> 
    </div>

    <div class="p-6 overflow-y-auto flex-1" :class="!sidebarOpen && 'px-2'">
        <p class="text-xs text-blue-200 mb-4 font-medium nav-text transition-opacity duration-200" x-show="sidebarOpen">Menu</p>

        <nav class="space-y-2">

            {{-- DASHBOARD --}}
            <a href="/dashboard-magang"
                class="flex items-center gap-4 px-4 py-3 rounded-xl shadow-sm border-l-4 transition"
                {{-- PENYESUAIAN 1: Bandingkan dengan activeMenu berdasarkan path saat ini --}}
                :class="activeMenu === 'dashboard-magang' ? 'bg-white/10 text-white border-blue-300' : 'text-blue-100 hover:bg-white/5 border-transparent'"
                {{-- Hapus @click="activeMenu = 'dashboard'" --}}
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <span class="font-medium nav-text transition-opacity duration-200" x-show="sidebarOpen">Dashboard</span>
            </a>

            {{-- LOG AKTIVITAS --}}
            <a href="/log-aktivitas"
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition"
                {{-- PENYESUAIAN 1: Bandingkan dengan activeMenu berdasarkan path saat ini --}}
                :class="activeMenu === 'log-aktivitas' ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
                {{-- Hapus @click="activeMenu = 'log'" --}}
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="nav-text transition-opacity duration-200" x-show="sidebarOpen">Log Aktivitas</span>
            </a>

            {{-- MENU UNGGAH --}}
            <div>
                <button 
                    {{-- PENYESUAIAN 2: Hanya ganti status openUnggah, jangan ubah activeMenu di sini --}}
                    @click="openUnggah = !openUnggah" 
                    class="flex items-center justify-between px-4 py-3 rounded-xl transition group w-full"
                    {{-- PENYESUAIAN 2: Tentukan kelas aktif jika openUnggah TRUE, ATAU jika activeMenu adalah submenu Unggah --}}
                    :class="(openUnggah || activeMenu.includes('unggah-')) ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
                >
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        <span class="nav-text transition-opacity duration-200" x-show="sidebarOpen">Unggah</span>
                    </div>

                    <svg class="w-4 h-4 transform transition-transform duration-300 dropdown-arrow"
                        :class="openUnggah ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="sidebarOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- DROPDOWN UNGGAH --}}
                <div 
                    {{-- PENYESUAIAN 2: Menggunakan x-show="openUnggah && sidebarOpen" (sama seperti yang Anda inginkan, tidak berubah) --}}
                    x-show="openUnggah && sidebarOpen" 
                    x-collapse 
                    x-cloak 
                    class="ml-12 mt-2 flex flex-col space-y-2 text-blue-100"
                >
                    <a href="/unggah-laporan"
                        {{-- PENYESUAIAN 1: Hapus @click agar tidak mengubah activeMenu, penentuan aktif dilakukan saat init --}}
                        :class="activeMenu === 'unggah-laporan' ? 'bg-white/10 font-medium text-white' : 'hover:bg-white/10'"
                        class="px-3 py-2 rounded-lg block">
                        Unggah Laporan
                    </a>

                    <a href="/unggah-kegiatan"
                        {{-- PENYESUAIAN 1: Hapus @click agar tidak mengubah activeMenu, penentuan aktif dilakukan saat init --}}
                        :class="activeMenu === 'unggah-kegiatan' ? 'bg-white/10 font-medium text-white' : 'hover:bg-white/10'"
                        class="px-3 py-2 rounded-lg block">
                        Unggah Kegiatan
                    </a>
                </div>
            </div>

            {{-- KALENDER --}}
            <a href="/kalender"
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition"
                {{-- PENYESUAIAN 1: Bandingkan dengan activeMenu berdasarkan path saat ini --}}
                :class="activeMenu === 'kalender' ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
                {{-- Hapus @click="activeMenu = 'kalender'" --}}
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="nav-text transition-opacity duration-200" x-show="sidebarOpen">Kalender</span>
            </a>

        </nav>
    </div>
</aside>