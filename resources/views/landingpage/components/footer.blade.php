<?php
// components/footer.php
// Reusable footer component
// Usage: <?php include 'components/footer.php';

?>
<footer class="bg-blue-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">

        <!-- LOGO & DESKRIPSI -->
        <div>
            <div class="flex items-center space-x-3 mb-3">
                <img src="/img/logo.png" alt="Logo" class="h-12">
                <h3 class="font-bold text-lg">Dinas Pariwisata Kabupaten Bantul</h3>
            </div>

            <p class="text-sm opacity-80">
                Memajukan pariwisata lokal dengan kolaborasi yang berkelanjutan.
            </p>

            <!-- SOSIAL MEDIA -->
            <div class="flex space-x-4 mt-4">

                <!-- Facebook -->
                <a href="#" class="hover:opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="white" viewBox="0 0 24 24">
                        <path d="M22 12a10 10 0 10-11.5 9.9v-7H8v-3h2.5V9.5c0-2.4 1.5-3.7 3.6-3.7 1 0 2 .1 2 .1v2.7h-1.1c-1.1 0-1.5.7-1.5 1.4V12H18l-.5 3h-2.5v7A10 10 0 0022 12z"/>
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="#" class="hover:opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="white" viewBox="0 0 24 24">
                        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm6.6-.3a1.2 1.2 0 11-2.3 0 1.2 1.2 0 012.3 0z"/>
                    </svg>
                </a>

                <!-- YouTube -->
                <a href="#" class="hover:opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="white" viewBox="0 0 24 24">
                        <path d="M21.8 8s-.2-1.5-.8-2.2c-.7-.8-1.5-.8-1.9-.9C16.6 4.5 12 4.5 12 4.5h-.1s-4.6 0-7.1.4c-.4.1-1.2.1-1.9.9C2.3 6.5 2.2 8 2.2 8S2 9.7 2 11.5v1c0 1.8.2 3.5.2 3.5s.2 1.5.8 2.2c.7.8 1.7.8 2.1.9 1.5.2 6.9.4 6.9.4s4.6 0 7.1-.4c.4-.1 1.2-.1 1.9-.9.6-.7.8-2.2.8-2.2s.2-1.8.2-3.5v-1c0-1.8-.2-3.5-.2-3.5zM10 15.3V8.7l6 3.3-6 3.3z"/>
                    </svg>
                </a>

            </div>
        </div>

        <!-- INFORMASI KONTAK -->
        <div class="md:col-span-2">
            <div class="space-y-4 text-sm">

                <!-- ALAMAT -->
                <div class="flex space-x-3">
                    <div class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M12 2a7 7 0 00-7 7c0 5.2 7 13 7 13s7-7.8 7-13a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/>
                        </svg>
                    </div>
                    <p>
                        Jl. Lingkar Timur, Bantul, Manding, Area Sawah, Trirenggo,
                        Kabupaten Bantul, DIY 55714
                    </p>
                </div>

                <!-- TELEPON -->
                <div class="flex space-x-3">
                    <div class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M6.6 10.8A15.1 15.1 0 0013.2 17l2.3-2.3c.3-.4.9-.5 1.3-.3 1.4.6 3 .9 4.6.9.7 0 1.3.6 1.3 1.3V20c0 .7-.6 1.3-1.3 1.3C10.8 21.3 2.7 13.2 2.7 3.3 2.7 2.6 3.3 2 4 2h3.4c.7 0 1.3.6 1.3 1.3 0 1.6.3 3.2.9 4.6.2.4.1 1-.3 1.3L6.6 10.8z"/>
                        </svg>
                    </div>
                    <p>(0274) 6460222</p>
                </div>

                <!-- EMAIL -->
                <div class="flex space-x-3">
                    <div class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <p>dinas.pariwisata@bantulkab.go.id</p>
                </div>

            </div>
        </div>
        <div class="border-t border-slate-100 mt-8 pt-6 text-center text-sm text-slate-500">
      © <?= date('Y') ?> Dinas Pariwisata Kabupaten Bantul — Semua hak dilindungi.
    </div>
    </div>
</footer>
