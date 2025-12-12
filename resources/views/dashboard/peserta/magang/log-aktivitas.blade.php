    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIMONE - Log Aktivitas</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Poppins', sans-serif; }
            [x-cloak] { display: none !important; }
            /* Style untuk Tabel */
            .table-custom th {
                @apply px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-blue-200;
            }
            .table-custom td {
                @apply px-4 py-4 whitespace-normal text-sm font-light text-white align-top;
            }
            /* Style untuk Sidebar Minimal (optional, diambil dari konteks sebelumnya) */
            .sidebar-min { width: 4.5rem !important; } 
            .sidebar-min .nav-text, .sidebar-min .logo-text { display: none; }
        </style>
    </head>
    {{-- Inisialisasi Alpine Data untuk Halaman --}}
    <body class="bg-[#dbeafe] flex h-screen overflow-hidden text-slate-800" 
        x-data="{ 
            sidebarOpen: true, 
            activeMenu: 'log-aktivitas', 
            showAddModal: false,
            showEditModal: false,
            editData: '' // Data dummy untuk edit modal
        }">

        {{-- SETUP DATA DUMMY --}}
        @php
            $logActivities = [
                [
                    'tanggal' => 'Wednesday, 10 August 2025',
                    'log' => 'The activity log records every action performed by users within the system. It provides a detailed history of interactions, including the date, time, and type of activity. This feature helps administrators monitor system usage effectively. It also improves security by identifying unusual or unauthorized actions. The log allows users to track changes made to their data. Each entry is sequenced in chronological order for easy review. The activity log supports troubleshooting by showing when known issues occurred. It also helps maintain transparency in system operations. Filters can be applied to search logs by user, date, or activity type. Overall, the activity log ensures accountability and enhances system reliability.',
                    'status' => 'Diterima'
                ],
                [
                    'tanggal' => 'Wednesday, 11 August 2025',
                    'log' => 'The activity log records every action performed by users within the system. It provides a detailed history of interactions of Diana-Diana.',
                    'status' => 'Diterima'
                ],
                [
                    'tanggal' => 'Wednesday, 12 August 2025',
                    'log' => 'The activity log records every action performed by users within the system. It provides a detailed history of interactions',
                    'status' => 'Ditinjau'
                ],
            ];
            
            // Data dummy untuk diisi di textarea Edit
            $editLogDummy = 'The activity log records every action performed by users within the system. It provides a detailed history of interactions, including the date, time, and type of activity. This feature helps administrators monitor system usage effectively. It also improves security by identifying unusual or unauthorized actions. The log allows users to track changes made to their data. Each entry is sequenced in chronological order for easy review. The activity log supports troubleshooting by showing when known issues occurred. It also helps maintain transparency in system operations. Filters can be applied to search logs by user, date, or activity type. Overall, the activity log ensures accountability and enhances system reliability.';
        @endphp

        {{-- Sidebar (Menggunakan struktur dari konteks sebelumnya) --}}
        <aside 
            class="bg-[#1b4c85] text-white flex flex-col flex-shrink-0 transition-all duration-300" 
            :class="sidebarOpen ? 'w-72' : 'sidebar-min'"
            x-data="{ openUnggah: false }"
        >
            <div class="h-20 flex items-center px-8 border-b border-white/10" :class="!sidebarOpen && 'justify-center px-2'">
                <div class="font-bold text-3xl tracking-wide italic" x-show="sidebarOpen">SIMONE</div>
                <div x-show="!sidebarOpen" class="font-bold text-2xl tracking-wide italic">S</div> 
            </div>

            <div class="p-6 overflow-y-auto flex-1" :class="!sidebarOpen && 'px-2'">
                <p class="text-xs text-blue-200 mb-4 font-medium" x-show="sidebarOpen">Menu</p>
                <nav class="space-y-2">
                    {{-- Menu Dashboard --}}
                    <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl transition"
                    :class="activeMenu === 'dashboard' ? 'bg-white/10 text-white border-l-4 border-blue-300 shadow-sm' : 'text-blue-100 hover:bg-white/5'">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        <span x-show="sidebarOpen">Dashboard</span>
                    </a>

                    {{-- Menu Log Aktivitas (Active) --}}
                    <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl shadow-sm border-l-4 transition bg-white/10 text-white border-blue-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span x-show="sidebarOpen">Log Aktivitas</span>
                    </a>
                    
                    {{-- Menu Unggah (Placeholder) --}}
                    <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl transition text-blue-100 hover:bg-white/5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        <span x-show="sidebarOpen">Unggah</span>
                    </a>
                    
                    {{-- Menu Kalender (Placeholder) --}}
                    <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-xl transition text-blue-100 hover:bg-white/5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span x-show="sidebarOpen">Kalender</span>
                    </a>

                </nav>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 flex flex-col min-w-0">
            
            {{-- Header (Menggunakan struktur dari konteks sebelumnya) --}}
            <header class="h-20 bg-[#1b4c85] px-8 flex justify-between items-center shadow-md z-10">
                <button class="p-2 rounded-lg border border-blue-400/30 text-white hover:bg-white/10"
                        @click="sidebarOpen = !sidebarOpen">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="flex items-center gap-4">
                    <span class="text-white hidden sm:block">Hanung</span>
                    <div class="relative" x-data="{ profileOpen: false }">
                        <button @click="profileOpen = !profileOpen" class="flex items-center gap-2">
                            <div class="w-10 h-10 rounded-full border-2 border-blue-300 overflow-hidden bg-gray-200">
                                <img src="https://ui-avatars.com/api/?name=Hanung&background=0D8ABC&color=fff" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        {{-- Dropdown Profile --}}
                        <div x-show="profileOpen" @click.outside="profileOpen = false" x-cloak
                            class="absolute right-0 mt-2 w-56 bg-[#1b4c85] rounded-xl shadow-xl z-20 overflow-hidden border-t border-white/10">
                            <a href="/logout" class="flex items-center gap-3 px-4 py-3 hover:bg-[#0b213f] transition text-white">
                                <span class="font-semibold">Keluar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Content Area --}}
            <div class="flex-1 overflow-y-auto p-6 lg:p-8">
                <div class="bg-[#1b4c85] rounded-[2rem] p-8 text-white shadow-lg">
                    
                    {{-- Title dan Breadcrumb --}}
                    <div class="mb-8 flex justify-between items-end">
                        <div>
                            <h2 class="text-3xl font-bold">Riwayat Log Aktivitas</h2>
                            <p class="text-sm text-blue-200 mt-1">
                                <a href="#" class="hover:text-white">Dashboard</a> / Log Aktivitas
                            </p>
                        </div>
                    </div>

                    {{-- Tabel Log Aktivitas --}}
                    <div class="overflow-x-auto rounded-xl">
                        <table class="min-w-full table-auto rounded-xl overflow-hidden bg-[#153a66] shadow-inner">
                            <thead class="bg-[#0d345e]">
                                <tr>
                                    <th class="w-1/12">Hari/Tanggal</th>
                                    <th class="w-6/12">Log Aktivitas</th>
                                    <th class="w-1/12">Status</th>
                                    <th class="w-1/12 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @foreach($logActivities as $activity)
                                <tr class="hover:bg-white/5 transition">
                                    <td>{{ $activity['tanggal'] }}</td>
                                    <td class="text-justify">{{ $activity['log'] }}</td>
                                    <td>
                                        @if($activity['status'] == 'Diterima')
                                            <div class="flex items-center">
                                                <div class="w-4 h-4 mr-2 rounded-full bg-[#4ade80] flex-shrink-0"></div>
                                                <span class="text-sm text-[#4ade80]">Diterima</span>
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <div class="w-4 h-4 mr-2 rounded-full bg-[#fbbf24] flex-shrink-0"></div>
                                                <span class="text-sm text-[#fbbf24]">Ditinjau</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{-- Tombol Edit yang memunculkan Modal Edit --}}
                                        <button 
                                            @click="showEditModal = true; editData = '{{ $editLogDummy }}'"
                                            class="p-2 rounded-lg text-blue-300 hover:bg-blue-300/10 transition"
                                            title="Edit Aktivitas">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-7 1l4-4M15 11l4-4M18 6L14 10M11 11L3 19M16 5l-4 4"/></svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Footer Tabel (Pagination dan Tombol Baru) --}}
                    <div class="mt-8 flex justify-between items-center">
                        {{-- Pagination Dummy --}}
                        <div class="flex items-center gap-2 text-sm text-blue-200">
                            <span class="py-1 px-3 bg-white/10 rounded-lg cursor-pointer hover:bg-white/20">Sebelumnya</span>
                            <span class="py-1 px-3 bg-blue-300 text-blue-900 font-bold rounded-lg cursor-pointer">1</span>
                            <span class="py-1 px-3 bg-white/10 rounded-lg cursor-pointer hover:bg-white/20">2</span>
                            <span class="py-1 px-3 bg-white/10 rounded-lg cursor-pointer hover:bg-white/20">3</span>
                            <span class="py-1 px-3 bg-white/10 rounded-lg cursor-pointer hover:bg-white/20">Berikutnya</span>
                        </div>

                        {{-- Tombol Buat Baru yang memunculkan Modal Tambah --}}
                        <button 
                            @click="showAddModal = true"
                            class="bg-[#4dd0e1] text-white font-semibold py-3 px-8 rounded-full shadow-md hover:bg-[#26c6da] transition">
                            Buat Baru
                        </button>
                    </div>
                </div>
            </div>
        </main>
        
        {{-- Modal Tambah Log Aktivitas (image_474278.png) --}}
        <div x-show="showAddModal" x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
            x-transition.opacity>
            <div @click.outside="showAddModal = false"
                class="bg-[#1b4c85] rounded-[2rem] p-8 max-w-lg w-full shadow-2xl text-white"
                x-transition.scale>
                <h3 class="text-xl font-bold mb-2">Tambah Log Aktivitas</h3>
                <p class="text-sm text-blue-200 mb-6">Perbarui linform Anda untuk menjaga profil Anda tetap up-to-date.</p>
                
                <textarea 
                    placeholder="What have you done today?"
                    class="w-full h-40 p-4 bg-[#153a66] rounded-xl border border-white/20 text-white placeholder-blue-300 resize-none focus:ring focus:ring-blue-400 focus:border-blue-400 outline-none"></textarea>
                
                <p class="text-sm text-blue-200 mt-2">Log Aktivitasnya jangan lupa di isi yah</p>
                
                <div class="mt-8 flex justify-end gap-3">
                    <button @click="showAddModal = false"
                            class="text-white py-2 px-6 rounded-full border border-white/20 hover:bg-white/10 transition">
                        Tutup
                    </button>
                    <button @click="showAddModal = false"
                            class="bg-[#4dd0e1] text-white font-semibold py-2 px-6 rounded-full shadow-md hover:bg-[#26c6da] transition">
                        Simpan
                    </button>
                </div>
            </div>
        </div>

        {{-- Modal Edit Log Aktivitas (image_473fb2.png) --}}
        <div x-show="showEditModal" x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
            x-transition.opacity>
            <div @click.outside="showEditModal = false"
                class="bg-[#1b4c85] rounded-[2rem] p-8 max-w-xl w-full shadow-2xl text-white"
                x-transition.scale>
                <h3 class="text-xl font-bold mb-2">Edit Log Aktivitas</h3>
                <p class="text-sm text-blue-200 mb-6">Perbarui linform Anda untuk menjaga profil Anda tetap up-to-date.</p>
                
                <textarea 
                    x-model="editData" 
                    class="w-full h-40 p-4 bg-[#153a66] rounded-xl border border-white/20 text-white resize-none focus:ring focus:ring-blue-400 focus:border-blue-400 outline-none"></textarea>
                
                <div class="mt-8 flex justify-end gap-3">
                    <button @click="showEditModal = false"
                            class="text-white py-2 px-6 rounded-full border border-white/20 hover:bg-white/10 transition">
                        Tutup
                    </button>
                    <button @click="showEditModal = false"
                            class="bg-[#4dd0e1] text-white font-semibold py-2 px-6 rounded-full shadow-md hover:bg-[#26c6da] transition">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </body>
    </html>