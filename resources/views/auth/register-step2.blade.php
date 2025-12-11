<x-guest-layout>
    <div class="min-h-screen flex">

        <!-- Left Side -->
        <div class="w-1/2 bg-white flex flex-col justify-center px-12 py-8">

            <!-- Back -->
            <div class="mb-8">
                <a href="{{ route('register.step1') }}" class="flex items-center text-blue-600 hover:text-blue-800 text-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke akun login
                </a>
            </div>

            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                Data Pribadi
            </h1>

            <!-- Tabs -->
            <div class="flex justify-center mb-8">
                <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                    <a href="{{ route('register.step1') }}" class="px-6 py-2 bg-gray-100 text-gray-600">
                        Akun Login
                    </a>
                    <div class="px-6 py-2 bg-[#0D2C54] text-white font-semibold">
                        Data Pribadi
                    </div>
                </div>
            </div>

            <!-- Form Step 2 -->
            <form method="POST" action="{{ route('register.step2.submit') }}" class="space-y-4 w-full max-w-sm mx-auto">
                @csrf

                <!-- Nama Lengkap -->
                <input name="nama_lengkap" placeholder="Nama Lengkap"
                    value="{{ old('nama_lengkap') }}"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600" required>

                <!-- NIK -->
                <input name="nik" maxlength="16" placeholder="NIK"
                    value="{{ old('nik') }}"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600" required>

                <!-- Jenis Kelamin -->
                <select name="jenis_kelamin" class="w-full px-4 py-2 border-2 border-gray-800 rounded focus:outline-none
                focus:border-blue-600" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>

                <!-- Tempat Lahir -->
                <input name="tempat_lahir" placeholder="Tempat Lahir"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600"
                    required>

                <!-- Tanggal Lahir -->
                <input type="date" name="tanggal_lahir"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded focus:outline-none focus:border-blue-600"
                    required>

                <!-- Nomor Handphone -->
                <input name="no_hp" placeholder="Nomor Handphone"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600" required>

                <!-- Alamat Lengkap -->
                <textarea name="alamat" placeholder="Alamat Lengkap" rows="3"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600" required></textarea>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-[#0D2C54] text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition">
                    Daftar Sekarang
                </button>
            </form>
        </div>

        <!-- Right Side -->
        <div class="w-1/2 bg-[#0D2C54] flex flex-col items-center justify-center">
            <img src="/img/logo.png" alt="Logo" class="h-12 mb-4">
        </div>
    </div>
</x-guest-layout>
