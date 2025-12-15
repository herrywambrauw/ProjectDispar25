<aside 
    class="bg-[#1b4c85] text-white flex flex-col flex-shrink-0 transition-all duration-300 ease-in-out" 
    :class="sidebarOpen ? 'w-72' : 'w-20'" 
    {{-- PENYESUAIAN 1 & 2: Tambahkan activeMenuInital dan inisialisasi activeMenu dengan path saat ini --}}
    {{-- Asumsi: Blade template sedang diakses, jadi Anda dapat menggunakan helper request() atau URL::current() --}}
    x-data="{ 
        sidebarOpen: true, 
        openKerjasama: false, 
        activeMenuInitial: '{{ request()->path() }}', 
        activeMenu: '',
        
        init() {
            // Set activeMenu berdasarkan path URL saat ini (tanpa slash di depan)
            const currentPath = this.activeMenuInitial.split('/').pop() || 'dashboard-pemasaran'; // default ke dashboard-pemasaran
            
            // Logika untuk menentukan activeMenu:
            if (currentPath.includes('dashboard-pemasaran')) {
                this.activeMenu = 'dashboard-pemasaran';
            } else if (currentPath.includes('kegiatan')) {
                this.activeMenu = 'kegiatan';
            } else if (currentPath.includes('unggah-mou')) {
                this.activeMenu = 'unggah-mou';
                this.openKerjasama = true; // Buka Unggah jika salah satu submenunya aktif (Permintaan 2)
            } else if (currentPath.includes('unggah-pks')) {
                this.activeMenu = 'unggah-pks';
                this.openKerjasama = true; // Buka Unggah jika salah satu submenunya aktif (Permintaan 2)
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
            <a href="/dashboard-pemasaran"
                class="flex items-center gap-4 px-4 py-3 rounded-xl shadow-sm border-l-4 transition"
                {{-- PENYESUAIAN 1: Bandingkan dengan activeMenu berdasarkan path saat ini --}}
                :class="activeMenu === 'dashboard-pemasaran' ? 'bg-white/10 text-white border-blue-300' : 'text-blue-100 hover:bg-white/5 border-transparent'"
                {{-- Hapus @click="activeMenu = 'dashboard'" --}}
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <span class="font-medium nav-text transition-opacity duration-200" x-show="sidebarOpen">Dashboard</span>
            </a>

            {{-- kegiatan --}}
            <a href="/kegiatan"
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition"
                {{-- PENYESUAIAN 1: Bandingkan dengan activeMenu berdasarkan path saat ini --}}
                :class="activeMenu === 'kegiatan' ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
                {{-- Hapus @click="activeMenu = 'log'" --}}
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="6" r="4"/>
                    <path d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z"/></g>
                </svg>
                <span class="nav-text transition-opacity duration-200" x-show="sidebarOpen">Kegiatan</span>
            </a>

            {{-- MENU UNGGAH --}}
            <div>
                <button 
                    {{-- PENYESUAIAN 2: Hanya ganti status openKerjasama, jangan ubah activeMenu di sini --}}
                    @click="openKerjasama = !openKerjasama" 
                    class="flex items-center justify-between px-4 py-3 rounded-xl transition group w-full"
                    {{-- PENYESUAIAN 2: Tentukan kelas aktif jika openKerjasama TRUE, ATAU jika activeMenu adalah submenu Unggah --}}
                    :class="(openKerjasama || activeMenu.includes('unggah-')) ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
                >
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        <span class="nav-text transition-opacity duration-200" x-show="sidebarOpen">Kerjasama</span>
                    </div>

                    <svg class="w-4 h-4 transform transition-transform duration-300 dropdown-arrow"
                        :class="openKerjasama ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="sidebarOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- DROPDOWN UNGGAH --}}
                <div 
                    {{-- PENYESUAIAN 2: Menggunakan x-show="openKerjasama && sidebarOpen" (sama seperti yang Anda inginkan, tidak berubah) --}}
                    x-show="openKerjasama && sidebarOpen" 
                    x-collapse 
                    x-cloak 
                    class="ml-12 mt-2 flex flex-col space-y-2 text-blue-100"
                >
                    <a href="/unggah-mou"
                        {{-- PENYESUAIAN 1: Hapus @click agar tidak mengubah activeMenu, penentuan aktif dilakukan saat init --}}
                        :class="activeMenu === 'unggah-mou' ? 'bg-white/10 font-medium text-white' : 'hover:bg-white/10'"
                        class="px-3 py-2 rounded-lg block">
                        Unggah MoU
                    </a>

                    <a href="/unggah-pks"
                        {{-- PENYESUAIAN 1: Hapus @click agar tidak mengubah activeMenu, penentuan aktif dilakukan saat init --}}
                        :class="activeMenu === 'unggah-pks' ? 'bg-white/10 font-medium text-white' : 'hover:bg-white/10'"
                        class="px-3 py-2 rounded-lg block">
                        Unggah PKS
                    </a>
                </div>
            </div>
        </nav>
    </div>
</aside>