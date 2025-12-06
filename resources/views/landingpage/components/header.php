<?php
// components/header.php
// Reusable header component
// Sticky, backdrop-blur, shadow, logo left, nav center, actions right.
// Mobile-first: hamburger menu shows nav on small screens.

?>
<header class="fixed inset-x-0 top-0 z-40">
  <div class="backdrop-blur-sm bg-white/60 border-b border-slate-100 shadow-sm">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between h-16">
        <!-- Left: Logo -->
        <div class="flex items-center">
          <a href="/index.php" class="inline-flex items-center gap-3">
            <img src="/KERMA/img/Kerma2.png" alt="Logo Dinas Pariwisata" class="w-10 h-10 object-contain">
            <span class="hidden sm:inline-block font-semibold text-slate-800">DISPAR Bantul</span>
          </a>
        </div>

        <!-- Center: Nav (hidden on small screens) -->
        <nav class="hidden md:flex gap-6">
          <a href="/KERMA/index.php" class="text-sm font-medium text-slate-700 hover:text-slate-900">Beranda</a>
          <a href="/KERMA/kerjasama.php" class="text-sm font-medium text-slate-700 hover:text-slate-900">Kerjasama</a>
          <a href="/KERMA/pendaftaran.php" class="text-sm font-medium text-slate-700 hover:text-slate-900">Pendaftaran</a>
          <a href="/KERMA/dokumentasi.php" class="text-sm font-medium text-slate-700 hover:text-slate-900">Galeri Kegiatan</a>
        </nav>

        <!-- Right: Actions -->
        <div class="flex items-center gap-3">
          <div class="hidden sm:flex gap-2">
            <a href="/KERMA/register-step1.php" class="px-4 py-2 rounded-md text-sm font-medium border border-slate-200 bg-white hover:shadow transition">Buat Akun</a>
            <a href="/KERMA/login.php" class="px-4 py-2 rounded-md text-sm font-medium border border-slate-200 bg-white hover:shadow transition">Masuk</a>
          </div>

          <!-- Mobile hamburger -->
          <button id="mobile-nav-btn" class="md:hidden p-2 rounded-md text-slate-700 hover:bg-slate-100" aria-label="Toggle menu">
            <!-- simple hamburger icon -->
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile nav (hidden by default) -->
      <div id="mobile-nav" class="md:hidden hidden pb-4">
        <div class="flex flex-col gap-2">
          <a href="/KERMA/index.php" class="block px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded">Beranda</a>
          <a href="/KERMA/kerjasama.php" class="block px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded">Informasi Kerjasama</a>
          <a href="/KERMA/pendaftaran.php" class="block px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded">Panduan Pendaftaran</a>
          <a href="/KERMA/login.php" class="block px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 rounded">Galeri Kegiatan</a>

          <div class="px-4 pt-2">
            <a href="/KERMA/register-step1.php" class="block w-full text-center px-4 py-2 rounded-md bg-pale-blue text-white font-medium">Buat Akun</a>
            <a href="/KERMA/login.php" class="block w-full text-center mt-2 px-4 py-2 rounded-md border border-slate-200 bg-white">Masuk</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
