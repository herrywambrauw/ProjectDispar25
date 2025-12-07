<?php
// components/header.php
// Reusable header component
// Sticky, backdrop-blur, shadow, logo left, nav center, actions right.
// Mobile-first: hamburger menu shows nav on small screens.

?>
<header class="bg-blue-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LOGO -->
        <a href="index.php" class="flex items-center space-x-3">
            <img src="/img/logo.png" alt="Logo" class="h-10">
        </a>

        <!-- MENU DESKTOP -->
        <nav class="hidden md:flex space-x-6 text-sm font-medium">
            <a href="#" class="hover:text-blue-200">Beranda</a>
            <a href="#" class="hover:text-blue-200">Informasi Kerjasama</a>
            <a href="#" class="hover:text-blue-200">Panduan Pendaftaran</a>
            <a href="#" class="hover:text-blue-200">Galeri Kegiatan</a>
        </nav>

        <!-- CTA Buttons -->
        <div class="hidden md:flex space-x-3">
            <a href="#" class="bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-600 text-sm">Buat Akun</a>
            <a href="#" class="border border-white px-4 py-2 rounded-lg hover:bg-white hover:text-blue-900 text-sm">Masuk</a>
        </div>

        <!-- MOBILE MENU BUTTON -->
        <button id="menu-btn" class="md:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- MOBILE MENU -->
    <div id="mobile-menu" class="hidden bg-blue-800 md:hidden px-6 pb-4 space-y-3">
        <a href="#" class="block py-2 border-b border-white/20">Beranda</a>
        <a href="#" class="block py-2 border-b border-white/20">Informasi Kerjasama</a>
        <a href="#" class="block py-2 border-b border-white/20">Panduan Pendaftaran</a>
        <a href="#" class="block py-2 border-b border-white/20">Galeri Kegiatan</a>

        <div class="pt-2">
            <a href="#" class="block bg-blue-700 px-4 py-2 rounded-lg text-center">Buat Akun</a>
            <a href="#" class="block border border-white px-4 py-2 rounded-lg text-center mt-2">Masuk</a>
        </div>
    </div>
</header>

<script>
document.getElementById("menu-btn").onclick = function () {
    document.getElementById("mobile-menu").classList.toggle("hidden");
};
</script>
