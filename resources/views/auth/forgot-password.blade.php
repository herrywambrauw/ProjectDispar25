<x-guest-layout>
    <div class="min-h-screen flex">

        <!-- Left Side - Form -->
        <div class="w-1/2 bg-white flex flex-col justify-center px-12 py-8">

            <!-- Title -->
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">
                {{ __('Lupa Kata Sandi') }}
            </h1>

            <p class="text-center text-gray-600 text-sm mb-6 max-w-sm mx-auto">
                {{ __('Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.') }}
            </p>

            <!-- Status -->
            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ $value }}
                </div>
            @endsession

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4 max-w-sm mx-auto" />

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}" class="w-full">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        placeholder="{{ __('Masukkan Email Anda') }}"
                        class="w-full max-w-sm mx-auto block px-4 py-2 border-2 border-gray-800 rounded text-gray-800
                            placeholder-gray-600 focus:outline-none focus:border-blue-600 focus:ring-0"
                        required
                        autofocus
                        autocomplete="username"
                    />
                </div>

                <div class="max-w-sm mx-auto">
                    <button
                        type="submit"
                        class="w-full bg-blue-900 text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition duration-200"
                    >
                        {{ __('Kirim Tautan Reset Password') }}
                    </button>
                </div>
            </form>

            <!-- Return to Login -->
            <div class="mt-6 text-center text-sm">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                    {{ __('Kembali ke Login') }}
                </a>
            </div>

        </div>

        <!-- Right Side - Branding -->
        <div class="w-1/2 bg-blue-900 flex flex-col items-center justify-center">
            <div class="text-center text-white">
                <img src="/img/logo.png" alt="Logo" class="h-10 mb-4">
            </div>
        </div>

    </div>
</x-guest-layout>
