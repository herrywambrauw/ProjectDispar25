<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Left Side -->
        <div class="w-1/2 bg-white flex flex-col justify-center px-12 py-8">

            <!-- Back Link -->
            <div class="mb-8">
                <a href="/" class="flex items-center text-blue-600 hover:text-blue-800 text-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke beranda
                </a>
            </div>

            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                Pendaftaran Akun
            </h1>

            <!-- Tabs -->
            <div class="flex justify-center mb-8">
                <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                    <div class="px-6 py-2 bg-blue-900 text-white font-semibold">
                        Akun Login
                    </div>
                    <a href="#" class="px-6 py-2 bg-gray-100 text-gray-600">
                        Data Pribadi
                    </a>
                </div>
            </div>

            <!-- Form Step 1 -->
            <form method="POST" action="{{ route('register.step1.submit') }}" class="space-y-4 w-full max-w-sm mx-auto">
                @csrf

                <!-- Email -->
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600"
                    required
                >

                <!-- Username -->
                <input
                    type="text"
                    name="username"
                    placeholder="Nama Pengguna"
                    value="{{ old('username') }}"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600"
                    required
                >

                <!-- Password -->
                <input
                    type="password"
                    name="password"
                    placeholder="Kata Sandi"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600"
                    required
                >

                <!-- Confirm Password -->
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Konfirmasi Kata Sandi"
                    class="w-full px-4 py-2 border-2 border-gray-800 rounded placeholder-gray-600 focus:outline-none
                    focus:border-blue-600"
                    required
                >

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-blue-900 text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition"
                >
                    Berikutnya
                </button>

                <div class="text-center text-sm text-gray-600">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                        Masuk
                    </a>
                </div>
            </form>
        </div>

        <!-- Right Side -->
        <div class="w-1/2 bg-blue-900 flex flex-col items-center justify-center">
            <img src="/img/logo.png" alt="Logo" class="h-12 mb-4">
        </div>
    </div>
</x-guest-layout>
