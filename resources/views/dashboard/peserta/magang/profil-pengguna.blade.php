{{-- File: resources/views/dashboard/peserta/magang/profile-pengguna.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMONE - Profile Pengguna</title>
    {{-- Memuat Tailwind CSS & Alpine.js --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- Memuat Heroicons untuk ikon mata (password toggle) --}}
    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
        
        /* Alpine.js x-cloak */
        [x-cloak] { display: none !important; }

        /* WARNA DISESUAIKAN DENGAN CONTOH KODE YANG DIBERIKAN (Unggah Laporan) */
        .main-bg { background-color: #dbeafe; } /* bg-[#dbeafe] - Biru Sangat Muda */
        .content-bg { background-color: #1b4c85; border-radius: 2rem; } /* bg-[#1b4c85] - Biru Tua/Navy */
        .card-bg { background-color: #102d4f; } /* Lebih gelap dari content-bg untuk kartu */
        
        /* Style untuk tombol Edit */
        .edit-button {
            background-color: #3b82f6; /* bg-blue-500 */
            color: #ffffff; /* text-white */
        }
        .edit-button:hover {
            background-color: #2563eb; /* hover:bg-blue-600 */
        }

        /* Style untuk modal */
        .modal-background { background-color: rgba(0, 0, 0, 0.6); }
        .modal-content { background-color: #1b4c85; border-radius: 2rem; }
    </style>
</head>
<body class="main-bg flex h-screen overflow-hidden text-slate-800" x-data="{ sidebarOpen: true, openProfileModal: false, openAccountModal: false }">

    {{-- MEMANGGIL KOMPONEN SIDEBAR (Ganti dengan path yang sesuai di proyek Anda) --}}
    @include('dashboard.peserta.magang.components.sidebar')

    <main class="flex-1 flex flex-col min-w-0">

        {{-- MEMANGGIL KOMPONEN HEADER (Ganti dengan path yang sesuai di proyek Anda) --}}
        @include('dashboard.peserta.magang.components.header')

        {{-- KONTEN UTAMA: PROFILE PENGGUNA --}}
        <div class="flex-1 overflow-y-auto p-6 lg:p-8">

            {{-- Kontainer Utama: Warna disamakan dengan Log Aktivitas/Unggah Laporan --}}
            <div class="content-bg p-6 lg:p-8 shadow-2xl text-white min-h-full">

                {{-- Judul Halaman --}}
                <h1 class="text-2xl lg:text-3xl font-bold mb-8">Profile Pengguna</h1>

                {{-- Bagian Profile (Sangat Mirip dengan Gambar) --}}
                <div class="card-bg p-6 rounded-2xl shadow-xl mb-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            {{-- Foto Profile (Placeholder) --}}
                            <div class="w-14 h-14 rounded-full overflow-hidden mr-4">
                                {{-- Gunakan gambar default yang mirip dengan gambar aslinya --}}
                                <img src="https://ui-avatars.com/api/?name=User&background=2563eb&color=fff&size=128&bold=true" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <div>
                                {{-- Data Profile --}}
                                <p class="text-xl font-semibold">Username</p>
                                <p class="text-blue-300 text-sm">Jenjang | Jurusan | Kampus</p>
                            </div>
                        </div>
                        
                        {{-- Tombol Edit untuk Profile --}}
                        <button @click="openProfileModal = true" class="edit-button flex items-center px-4 py-2 rounded-xl text-sm font-medium transition duration-200 shadow-md">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </button>
                    </div>
                </div>

                {{-- Bagian Akun Personal --}}
                <div class="card-bg p-6 rounded-2xl shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold">Personal Account</h2>
                        {{-- Tombol Edit untuk Akun Personal --}}
                        <button @click="openAccountModal = true" class="edit-button flex items-center px-4 py-2 rounded-xl text-sm font-medium transition duration-200 shadow-md">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </button>
                    </div>

                    {{-- Detail Akun Personal (menggunakan grid untuk layout 2 kolom) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-12 text-sm">
                        
                        {{-- Baris 1: Username & Password --}}
                        <div>
                            <p class="text-blue-300">Username</p>
                            <p class="text-lg font-medium">Username</p>
                        </div>
                        <div>
                            <p class="text-blue-300">Password</p>
                            {{-- Menggunakan teks tersembunyi seperti di gambar --}}
                            <p class="text-lg font-medium">**********</p> 
                        </div>

                        {{-- Baris 2: Email Address & Phone --}}
                        <div>
                            <p class="text-blue-300 mt-4 sm:mt-0">Email Address</p>
                            <p class="text-lg font-medium truncate">Username@gmail.com</p>
                        </div>
                        <div>
                            <p class="text-blue-300 mt-4 sm:mt-0">Phone</p>
                            <p class="text-lg font-medium">+62 8xxx-xxxx-xxxx</p>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
        {{-- AKHIR KONTEN PROFILE PENGGUNA --}}

    </main>
    
    {{-- MODAL EDIT PROFILE (Disesuaikan dengan skema warna Anda) --}}
    {{-- Tambahkan data Alpine.js untuk file upload: currentProfileImage, newProfileImage --}}
    <div x-show="openProfileModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto modal-background flex items-center justify-center"
        x-transition:enter="transition ease-out duration-300"
        x-transition:leave="transition ease-in duration-200"
        x-data="{ 
            currentProfileImage: 'https://ui-avatars.com/api/?name=User&background=2563eb&color=fff&size=128&bold=true',
            newProfileImage: null,
            previewImage: function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.newProfileImage = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    this.newProfileImage = null;
                }
            },
            resetModal: function() {
                this.newProfileImage = null;
                this.openProfileModal = false;
            }
        }">

        <div @click.outside="resetModal" class="relative w-full max-w-lg p-8 transform modal-content text-white shadow-2xl"
            x-transition:enter="transition ease-out duration-300"
            x-transition:leave="transition ease-in duration-200">

            <h2 class="text-3xl font-bold mb-2">Edit Profile</h2>
            <p class="text-blue-200 mb-6 text-sm">Perbarui rincian Anda untuk menjaga profil Anda tetap up-to-date.</p>

            <form>
                {{-- Bagian Unggah Foto --}}
                <div class="mb-6 flex items-center space-x-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-400/50 flex-shrink-0">
                        {{-- Tampilkan foto baru atau foto lama --}}
                        <img :src="newProfileImage || currentProfileImage" alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <label for="profile_photo" class="block text-sm font-medium text-blue-200 mb-1">Foto Profile</label>
                        <input type="file" id="profile_photo" @change="previewImage" 
                               class="block w-full text-sm text-white
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100 cursor-pointer"/>
                        <p class="mt-1 text-xs text-blue-300">PNG, JPG, JPEG (Maks. 2MB)</p>
                    </div>
                </div>
                
                {{-- Input Jenjang --}}
                <div class="mb-4">
                    <label for="jenjang" class="block text-sm font-medium text-blue-200 mb-1">Jenjang</label>
                    <input type="text" id="jenjang" value="Jenjang" class="w-full bg-[#102d4f] text-white border border-blue-300/30 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                {{-- Input Jurusan --}}
                <div class="mb-4">
                    <label for="jurusan" class="block text-sm font-medium text-blue-200 mb-1">Jurusan</label>
                    <input type="text" id="jurusan" value="Jurusan" class="w-full bg-[#102d4f] text-white border border-blue-300/30 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                {{-- Input Kampus --}}
                <div class="mb-6">
                    <label for="kampus" class="block text-sm font-medium text-blue-200 mb-1">Kampus</label>
                    <input type="text" id="kampus" value="Kampus" class="w-full bg-[#102d4f] text-white border border-blue-300/30 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="flex justify-end space-x-4">
                    <button type="button" @click="resetModal" class="bg-[#153a66] hover:bg-[#102d4f] text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-lg">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-lg">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
    {{-- AKHIR MODAL EDIT PROFILE --}}
    
    {{-- MODAL EDIT AKUN PERSONAL (Disesuaikan dengan skema warna Anda) --}}
    {{-- Tambahkan data Alpine.js untuk toggle password: showPassword --}}
    <div x-show="openAccountModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto modal-background flex items-center justify-center"
        x-transition:enter="transition ease-out duration-300"
        x-transition:leave="transition ease-in duration-200"
        x-data="{ showPassword: false }">

        <div @click.outside="openAccountModal = false" class="relative w-full max-w-lg p-8 transform modal-content text-white shadow-2xl"
            x-transition:enter="transition ease-out duration-300"
            x-transition:leave="transition ease-in duration-200">

            <h2 class="text-3xl font-bold mb-2">Edit Personal Account</h2>
            <p class="text-blue-200 mb-6 text-sm">Perbarui informasi akun pribadi Anda.</p>

            <form>
                {{-- Input Username --}}
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-blue-200 mb-1">Username</label>
                    <input type="text" id="username" value="Username" class="w-full bg-[#102d4f] text-white border border-blue-300/30 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                {{-- Input Password (dengan toggle ICON BARU) --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-blue-200 mb-1">Password</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" id="password" value="password_dummy" class="w-full bg-[#102d4f] text-white border border-blue-300/30 rounded-lg p-3 pr-12 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-blue-300 hover:text-white transition duration-150">
                            {{-- Ikon Mata Terbuka (Eye) --}}
                            <svg x-show="!showPassword" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                               {{-- Ikon Mata Tertutup (Eye Slash) --}}
                            <svg x-show="showPassword"
                                class="h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <!-- Bentuk mata -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5
                                        c4.478 0 8.268 2.943 9.542 7
                                        -1.274 4.057-5.064 7-9.542 7
                                        -4.477 0-8.268-2.943-9.542-7z" />

                                <!-- Iris mata -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                <!-- Garis slash -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3l18 18" />
                            </svg>

                        </button>
                    </div>
                </div>
                {{-- Input Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-blue-200 mb-1">Email Address</label>
                    <input type="email" id="email" value="Username@gmail.com" class="w-full bg-[#102d4f] text-white border border-blue-300/30 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                {{-- Input Phone --}}
                <div class="mb-6">
                    <label for="phone" class="block text-sm font-medium text-blue-200 mb-1">Phone</label>
                    <input type="tel" id="phone" value="+62 8xxx-xxxx-xxxx" class="w-full bg-[#102d4f] text-white border border-blue-300/30 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="flex justify-end space-x-4">
                    <button type="button" @click="openAccountModal = false" class="bg-[#153a66] hover:bg-[#102d4f] text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-lg">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-lg">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
    {{-- AKHIR MODAL EDIT AKUN PERSONAL --}}

</body>
</html>