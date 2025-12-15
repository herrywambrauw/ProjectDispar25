<header 
    class="h-20 bg-[#1b4c85] px-8 flex justify-between items-center shadow-md z-20 border-b border-white/10"
>
    <!-- TOGGLE SIDEBAR -->
    <button 
        class="p-2 rounded-lg border border-blue-400/30 text-white hover:bg-white/10 transition"
        @click="sidebarOpen = !sidebarOpen"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- PROFILE DROPDOWN -->
    <div class="relative" x-data="{ profileOpen: false }">
        
        <!-- Button -->
        <button 
            class="flex items-center gap-4 p-2 rounded-full hover:bg-white/10 transition"
            @click="profileOpen = !profileOpen"
            :aria-expanded="profileOpen"
        >
            <!-- Avatar -->
            <div class="w-10 h-10 rounded-full border-2 border-blue-300 overflow-hidden bg-gray-200 flex-shrink-0">
                <img src="https://ui-avatars.com/api/?name=Hanung&background=0D8ABC&color=fff" 
                     alt="Profile" 
                     class="w-full h-full object-cover">
            </div>

            <!-- Username -->
            <div class="text-white hidden sm:block text-right">
                <div class="text-sm font-semibold whitespace-nowrap">Hanung</div>
            </div>

            <!-- Arrow -->
            <svg 
                class="w-5 h-5 text-blue-200 transform transition-transform"
                :class="profileOpen ? 'rotate-180' : ''"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <!-- Dropdown Content -->
        <div 
            x-show="profileOpen"
            x-transition.opacity.duration.300
            @click.outside="profileOpen = false"
            x-cloak
            class="absolute right-0 mt-2 w-72 bg-[#1b4c85] rounded-xl shadow-2xl z-30 border border-white/10 overflow-hidden"
        >
            <div class="p-5 text-white">

                <!-- User Info -->
                <div class="mb-4">
                    <p class="text-sm font-semibold">hanung</p>
                    <p class="text-sm text-blue-200">hanung@gmail.com</p>
                </div>

                <!-- Menu: Profil -->
                <a href="/profile"
                   class="flex items-center gap-4 px-4 py-3 hover:bg-white/10 rounded-xl transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Profil Pengguna</span>
                </a>

                <!-- Menu: Logout -->
                <a href="/logout"
                   class="flex items-center gap-4 px-4 py-3 hover:bg-white/10 rounded-xl transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3v-10a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="font-semibold">Keluar</span>
                </a>
            </div>
        </div>
    </div>
</header>
