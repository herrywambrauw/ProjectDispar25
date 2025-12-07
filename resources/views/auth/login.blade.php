<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Left Side - Form -->
        <div class="w-1/2 bg-white flex flex-col justify-center px-12 py-8">
            <!-- Back Link -->
            <div class="mb-8">
                <a href="/" class="flex items-center text-blue-600 hover:text-blue-800 text-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    {{ __('Kembali ke beranda') }}
                </a>
            </div>

            <!-- User Icon -->
            <div class="flex justify-center mb-6">
                <div class="w-32 h-32 rounded-full border-4 border-gray-800 flex items-center justify-center bg-gray-100">
                    <svg class="w-16 h-16 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                    </svg>
                </div>
            </div>

            <!-- Masuk Title -->
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">{{ __('MASUK') }}</h1>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Status Message -->
            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        placeholder="{{ __('Email / Nama Pengguna') }}"
                        class="w-full max-w-sm mx-auto block px-4 py-2 border-2 border-gray-800 rounded text-gray-800
                            placeholder-gray-600 focus:outline-none focus:border-blue-600 focus:ring-0"
                        required
                        autofocus
                        autocomplete="username"
                    />
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="{{ __('Kata Sandi') }}"
                        class="w-full max-w-sm mx-auto block px-4 py-2 border-2 border-gray-800 rounded text-gray-800
                            placeholder-gray-600 focus:outline-none focus:border-blue-600 focus:ring-0"
                        required
                        autocomplete="current-password"
                    />
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-6 flex items-center max-w-sm mx-auto">
                    <input
                        type="checkbox"
                        id="remember_me"
                        name="remember"
                        class="w-5 h-5 border-2 border-gray-800 rounded accent-blue-700"
                    />
                    <label for="remember_me" class="ml-2 text-sm text-gray-700">
                        {{ __('Ingatkan Saya?') }}
                    </label>
                </div>

                <!-- Login Button -->
                <div class="max-w-sm mx-auto">
                    <button
                        type="submit"
                        class="w-full bg-blue-900 text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition duration-200"
                    >
                        {{ __('Masuk') }}
                    </button>
                </div>
            </form>

            <!-- Sign Up Link -->
            <div class="mt-6 text-center text-sm text-gray-600">
                {{ __('Belum memiliki akun?') }}
                <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                    {{ __('Daftar Sekarang') }}
                </a>
            </div>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <div class="mt-2 text-center">
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                </div>
            @endif
        </div>

        <!-- Right Side - Branding -->
        <div class="w-1/2 bg-blue-900 flex flex-col items-center justify-center">
            <div class="text-center">
                <!-- SIMONE Logo -->
                <div class="text-white mb-4">
                    <img src="/img/logo.png" alt="Logo" class="h-10">
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
