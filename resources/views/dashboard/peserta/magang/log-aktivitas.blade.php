<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Riwayat Log Aktivitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
        /* Alpine.js x-cloak untuk menyembunyikan elemen sebelum inisialisasi */
        [x-cloak] { display: none !important; }
        
        /* Tambahkan style untuk sidebar yang diperkecil */
        .sidebar-min { width: 4.5rem !important; }
        .sidebar-min .nav-text, .sidebar-min .logo-text, .sidebar-min .dropdown-arrow { display: none; }
        .sidebar-min .h-20 { padding-left: 0.5rem; padding-right: 0.5rem; justify-content: center; }
        .sidebar-min .logo-container { justify-content: center; }

        /* Custom style untuk Status */
        .status-diterima { background-color: #4ade80; color: #064e3b; } /* bg-green-400, text-green-900 */
        .status-ditinjau { background-color: #fbbf24; color: #78350f; } /* bg-amber-400, text-amber-900 */
        .status-ditolak { background-color: #f87171; color: #7f1d1d; } /* bg-red-400, text-red-900 */
    </style>
</head>
<body class="bg-[#dbeafe] flex h-screen overflow-hidden text-slate-800" x-data="{ sidebarOpen: true, activeMenu: 'log-aktivitas' }">
    
    {{-- SETUP DATA DUMMY (Disesuaikan untuk Log Aktivitas) --}}
    @php
        $logActivityFull = [
            [
                'date' => 'Wednesday, 10 August 2025', 
                'status' => 'Diterima', 
                'aksi' => true,
                'desc' => "The activity log records every action performed by users within the system. It provides a detailed history of interactions, including the date, time, and type of activity. This feature helps administrators monitor system usage effectively. It also improves security by identifying unusual or unauthorized actions. The log allows users to track changes made to their data. Each entry is stored in chronological order for easy review. The activity log supports troubleshooting by showing when specific issues occurred. It also helps maintain transparency in system operations. Filters can be applied to search logs by user, date, or activity type. Overall, the activity log ensures accountability and enhances system reliability.",
            ], 
            [
                'date' => 'Wednesday, 11 August 2025', 
                'status' => 'Diterima', 
                'aksi' => false,
                'desc' => "The activity log records every action performed by users within the system. It provides a detailed history of interactions",
            ], 
            [
                'date' => 'Wednesday, 12 August 2025', 
                'status' => 'Ditinjau', 
                'aksi' => true,
                'desc' => "The activity log records every action performed by users within the system. It provides a detailed history of interactions",
            ],
        ];
    @endphp

    {{-- MEMANGGIL KOMPONEN SIDEBAR (Diasumsikan ada) --}}
    @include('dashboard.peserta.magang.components.sidebar')

    <main class="flex-1 flex flex-col min-w-0">
        
        {{-- MEMANGGIL KOMPONEN HEADER (Diasumsikan ada) --}}
        @include('dashboard.peserta.magang.components.header')

        {{-- KONTEN UTAMA: RIWAYAT LOG AKTIVITAS --}}
        <div class="flex-1 overflow-y-auto p-6 lg:p-8">
       
                <div class="bg-[#1b4c85] rounded-[2rem] p-6 lg:p-8 text-white shadow-lg">
                    
                    {{-- Judul Halaman --}}
                    <h1 class="text-2xl lg:text-3xl font-bold mb-8">Riwayat Log Aktivitas</h1>

                    {{-- Tabel Riwayat Log Aktivitas --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="border-b border-blue-200/30 text-left text-sm font-medium uppercase tracking-wider text-blue-200">
                                    <th class="py-3 pr-4 w-[15%]">Hari/Tanggal</th>
                                    <th class="py-3 px-4 w-[55%]">Log Aktivitas</th>
                                    <th class="py-3 px-4 w-[15%]">Status</th>
                                    <th class="py-3 pl-4 w-[15%] text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logActivityFull as $log)
                                <tr class="border-b border-blue-200/10">
                                    
                                    {{-- Kolom Tanggal --}}
                                    <td class="py-4 pr-4 align-top text-sm font-light text-blue-50 whitespace-nowrap">
                                        {{ $log['date'] }}
                                    </td>

                                    {{-- Kolom Deskripsi --}}
                                    <td class="py-4 px-4 align-top text-sm font-light text-blue-100 text-justify">
                                        {{ $log['desc'] }}
                                    </td>

                                    {{-- Kolom Status --}}
                                    <td class="py-4 px-4 align-top">
                                        <span class="text-[10px] font-bold px-4 py-1 rounded-full shadow-sm 
                                            @if($log['status'] == 'Diterima') 
                                                status-diterima
                                            @elseif($log['status'] == 'Ditinjau') 
                                                status-ditinjau
                                            @else
                                                status-ditolak
                                            @endif
                                        ">
                                            {{ $log['status'] }}
                                        </span>
                                    </td>

                                    {{-- Kolom Aksi --}}
                                    <td class="py-4 pl-4 align-top text-center">

                                        {{-- Tombol Edit hanya muncul saat status = Ditinjau --}}
                                        @if($log['status'] == 'Ditinjau')
                                            <button 
                                                class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-4 py-2 rounded-lg transition duration-200 flex items-center justify-center mx-auto">
                                                
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>

                                                Edit
                                            </button>

                                        {{-- Jika status bukan Ditinjau maka tidak boleh edit --}}
                                        @else
                                            <span class="text-xs text-blue-300">-</span>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    {{-- Navigasi dan Tombol --}}
                    <div class="mt-8 flex justify-between items-center flex-wrap gap-4">
                      {{-- Paginasi --}}
                        <div class="w-full flex justify-center mt-4">
                            <div class="flex items-center space-x-2 text-sm">

                                <button class="bg-[#153a66] hover:bg-[#102d4f] text-blue-200 font-semibold py-2 px-4 rounded-lg transition duration-200 text-xs">
                                    Sebelumnya
                                </button>

                                <span class="bg-[#102d4f] text-white font-semibold w-8 h-8 flex items-center justify-center rounded-lg text-xs">1</span>
                                <span class="text-blue-200 font-semibold w-8 h-8 flex items-center justify-center rounded-lg text-xs hover:bg-[#153a66] cursor-pointer">2</span>
                                <span class="text-blue-200 font-semibold w-8 h-8 flex items-center justify-center rounded-lg text-xs hover:bg-[#153a66] cursor-pointer">3</span>

                                <button class="bg-[#153a66] hover:bg-[#102d4f] text-blue-200 font-semibold py-2 px-4 rounded-lg transition duration-200 text-xs">
                                    Selanjutnya
                                </button>

                            </div>
                        </div>

                        {{-- Tombol Buat Baru --}}
                        <button class="ml-auto bg-blue-600 hover:bg-blue-700 text-white text-base font-bold py-3 px-6 rounded-xl shadow-md transition duration-200">
                            Buat Baru
                        </button>

                    </div>

                </div>
            </div>
        </div>
        {{-- AKHIR KONTEN RIWAYAT LOG AKTIVITAS --}}

    </main>

    {{-- SCRIPT JAM REALTIME DIHAPUS KARENA TIDAK DIGUNAKAN DI HALAMAN INI --}}
</body>
</html>