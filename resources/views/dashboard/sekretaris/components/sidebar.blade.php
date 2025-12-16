<aside 
    class="bg-[#1b4c85] text-white flex flex-col flex-shrink-0 transition-all duration-300 ease-in-out" 
    :class="sidebarOpen ? 'w-72' : 'w-20'" 
    x-data="{ 
        sidebarOpen: true, 
        activeMenuInitial: '{{ request()->path() }}', 
        activeMenu: '',
        pendaftarDropdownOpen: false, // State baru untuk dropdown
        
        init() {
            // Ambil path URL saat ini
            const currentPath = this.activeMenuInitial; 
            
            // Logika penentuan activeMenu dan auto-open dropdown
            if (currentPath.includes('dashboard-sekretaris')) {
                this.activeMenu = 'dashboard-sekretaris';
            } 
            // Cek apakah URL mengandung kata kunci terkait pendaftar
            else if (currentPath.includes('data-pendaftar') || 
                     currentPath.includes('magang') || 
                     currentPath.includes('pkl') || 
                     currentPath.includes('kkn') || 
                     currentPath.includes('penelitian')) {
                
                this.activeMenu = 'data-pendaftar';
                this.pendaftarDropdownOpen = true; // Buka dropdown otomatis jika aktif
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

            {{-- 1. MENU DASHBOARD --}}
            <a href="/dashboard-sekretaris"
                class="flex items-center gap-4 px-4 py-3 rounded-xl shadow-sm border-l-4 transition"
                :class="activeMenu === 'dashboard-sekretaris' ? 'bg-white/10 text-white border-blue-300' : 'text-blue-100 hover:bg-white/5 border-transparent'"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <span class="font-medium nav-text transition-opacity duration-200" x-show="sidebarOpen">Dashboard</span>
            </a>

            {{-- 2. MENU JUMLAH DATA PENDAFTAR (DROPDOWN) --}}
            <div x-data="{ open: false }"> 
                <button 
                    @click="pendaftarDropdownOpen = !pendaftarDropdownOpen; if(!sidebarOpen) sidebarOpen = true"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl shadow-sm border-l-4 transition group"
                    :class="activeMenu === 'data-pendaftar' ? 'bg-white/10 text-white border-blue-300' : 'text-blue-100 hover:bg-white/5 border-transparent'"
                >
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="font-medium nav-text transition-opacity duration-200 text-left" x-show="sidebarOpen">Data Pendaftar</span>
                    </div>
                    <svg x-show="sidebarOpen" 
                         class="w-4 h-4 transition-transform duration-200" 
                         :class="pendaftarDropdownOpen ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="pendaftarDropdownOpen && sidebarOpen" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                     class="mt-2 space-y-1 pl-12 pr-2"
                >
                    <a href="/data-pendaftar/magang" 
                       class="block px-3 py-2 rounded-lg text-sm text-blue-100 hover:text-white hover:bg-white/10 transition"
                       :class="activeMenuInitial.includes('magang') ? 'bg-white/10 text-white font-medium' : ''">
                        Magang
                    </a>
                    
                    <a href="/data-pendaftar/pkl" 
                       class="block px-3 py-2 rounded-lg text-sm text-blue-100 hover:text-white hover:bg-white/10 transition"
                       :class="activeMenuInitial.includes('pkl') ? 'bg-white/10 text-white font-medium' : ''">
                        PKL
                    </a>

                    <a href="/data-pendaftar/kkn" 
                       class="block px-3 py-2 rounded-lg text-sm text-blue-100 hover:text-white hover:bg-white/10 transition"
                       :class="activeMenuInitial.includes('kkn') ? 'bg-white/10 text-white font-medium' : ''">
                        KKN
                    </a>

                    <a href="/data-pendaftar/penelitian" 
                       class="block px-3 py-2 rounded-lg text-sm text-blue-100 hover:text-white hover:bg-white/10 transition"
                       :class="activeMenuInitial.includes('penelitian') ? 'bg-white/10 text-white font-medium' : ''">
                        Penelitian
                    </a>
                </div>
            </div>

        </nav>
    </div>
</aside>