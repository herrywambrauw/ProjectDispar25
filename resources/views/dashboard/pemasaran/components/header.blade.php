<header class="h-20 bg-[#1b4c85] px-8 flex justify-end items-center shadow-md z-20">

    {{-- Dropdown Profil --}}
    <div class="relative" x-data="{ profileOpen: false }">
        <button class="flex items-center gap-4 p-2 rounded-full hover:bg-white/10 transition"
                @click="profileOpen = !profileOpen"
                :aria-expanded="profileOpen">

            <div class="w-10 h-10 rounded-full border-2 border-blue-300 overflow-hidden bg-gray-200 flex-shrink-0">
                <img src="https://ui-avatars.com/api/?name=Hanung&background=0D8ABC&color=fff"
                     alt="Profile"
                     class="w-full h-full object-cover">
            </div>

            <div class="text-right text-white hidden sm:block">
                <div class="text-sm font-semibold whitespace-nowrap">Hanung</div>
            </div>

            <svg class="w-5 h-5 text-blue-200 transform transition-transform"
                 :class="{ 'rotate-180': profileOpen }"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        {{-- Konten Dropdown --}}
        <div x-show="profileOpen"
             x-transition.opacity.duration.300
             @click.outside="profileOpen = false"
             x-cloak
             class="absolute right-0 mt-2 w-72 bg-[#1b4c85] rounded-xl shadow-2xl overflow-hidden z-30 border border-white/10">

            <div class="p-5 text-white">
                <div class="mb-4">
                    <p class="text-sm font-semibold">Hanung</p>
                    <p class="text-sm text-blue-200">hanung@gmail.com</p>
                </div>

                <a href="profil-pemasaran"
                   class="flex items-center gap-4 px-4 py-3 hover:bg-white/10 rounded-xl transition">
                    <span>Profil Pengguna</span>
                </a>

                <a href="/logout"
                   class="flex items-center gap-4 px-4 py-3 hover:bg-white/10 rounded-xl transition">
                    <span class="font-semibold">Keluar</span>
                </a>
            </div>
        </div>
    </div>
</header>
