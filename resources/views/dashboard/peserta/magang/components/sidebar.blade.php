<aside 
    class="bg-[#1b4c85] text-white flex flex-col flex-shrink-0 transition-all duration-300 ease-in-out" 
    :class="sidebarOpen ? 'w-72' : 'w-20'" 
    x-data="{ openUnggah: false, activeMenu: '' }"
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
                :class="activeMenu === 'dashboard' ? 'bg-white/10 text-white border-blue-300' : 'text-blue-100 hover:bg-white/5 border-transparent'"
                @click="activeMenu = 'dashboard'"
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
                :class="activeMenu === 'log' ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
                @click="activeMenu = 'log'"
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
                    @click="openUnggah = !openUnggah; activeMenu = 'unggah'"
                    class="flex items-center justify-between px-4 py-3 rounded-xl transition group w-full"
                    :class="activeMenu.includes('unggah') ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
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
                    x-show="openUnggah && sidebarOpen" 
                    x-collapse 
                    x-cloak 
                    class="ml-12 mt-2 flex flex-col space-y-2 text-blue-100"
                >
                    <a href="/unggah-laporan"
                        @click="activeMenu = 'unggah-laporan'"
                        :class="activeMenu === 'unggah-laporan' ? 'bg-white/10 font-medium text-white' : 'hover:bg-white/10'"
                        class="px-3 py-2 rounded-lg block">
                        Unggah Laporan
                    </a>

                    <a href="/unggah-kegiatan"
                        @click="activeMenu = 'unggah-kegiatan'"
                        :class="activeMenu === 'unggah-kegiatan' ? 'bg-white/10 font-medium text-white' : 'hover:bg-white/10'"
                        class="px-3 py-2 rounded-lg block">
                        Unggah Kegiatan
                    </a>
                </div>
            </div>

            {{-- KALENDER --}}
            <a href="/kalender"
                class="flex items-center gap-4 px-4 py-3 rounded-xl transition"
                :class="activeMenu === 'kalender' ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'"
                @click="activeMenu = 'kalender'"
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