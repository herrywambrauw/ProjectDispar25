<?php
// components/footer.php
// Reusable footer component
// Usage: <?php include 'components/footer.php'; 

?>
<footer class="bg-white border-t border-slate-100 mt-12">
  <div class="container mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Left -->
      <div class="flex flex-col gap-3">
        <div class="flex items-center gap-3">
          <img src="/KERMA/img/Kerma1.png" alt="Logo" class="w-10 h-10 object-contain">
          <div>
            <div class="font-semibold text-slate-800">Dinas Pariwisata Kabupaten Bantul</div>
            <div class="text-sm text-slate-600">Memajukan pariwisata lokal dengan kolaborasi yang berkelanjutan.</div>
          </div>
        </div>

        <div class="flex gap-3 mt-2">
          <!-- Social icons (simple SVGs) -->
          <a href="#" class="p-2 rounded-md hover:bg-slate-100">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M10 20v-6H7v-3h3V8.5C10 6 11.5 5 13.8 5c1 0 2 .1 2 .1v3h-1.2c-1 0-1.3.5-1.3 1.2V11h2.5l-.4 3H13v6z"/></svg>
          </a>
          <a href="#" class="p-2 rounded-md hover:bg-slate-100">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M22 5.9c-.8.4-1.7.7-2.6.8.9-.6 1.6-1.5 1.9-2.6-.8.5-1.7.9-2.7 1.1C17.8 4 16.7 3.5 15.5 3.5c-2.1 0-3.7 2-3.1 4C9.1 7.4 6.1 6 4.1 4.1c-.6 1.1-.3 2.6.6 3.4-.7 0-1.4-.2-2-.5v.1c0 2.1 1.5 3.9 3.6 4.3-.4.1-.7.2-1.1.2-.3 0-.6 0-.9-.1.6 1.8 2.3 3.1 4.3 3.1-1.6 1.2-3.5 1.9-5.4 1.9-.3 0-.7 0-1-.1 2 1.3 4.4 2 6.9 2 8.2 0 12.7-6.8 12.7-12.7v-.6c.9-.7 1.6-1.6 2.1-2.6-.8.4-1.6.7-2.4.8z"/></svg>
          </a>
          <a href="#" class="p-2 rounded-md hover:bg-slate-100">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.9.2 2.4.4.6.2 1 .4 1.4.8.4.4.6.8.8 1.4.2.5.3 1.2.4 2.4.1 1.4.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 1.9-.4 2.4-.2.6-.4 1-0.8 1.4-.4.4-.8.6-1.4.8-.5.2-1.2.3-2.4.4-1.4.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-1.9-.2-2.4-.4-.6-.2-1-.4-1.4-.8-.4-.4-.6-.8-.8-1.4-.2-.5-.3-1.2-.4-2.4C2.2 15.6 2.2 15.3 2.2 12s0-3.6.1-4.9c.1-1.2.2-1.9.4-2.4.2-.6.4-1 .8-1.4.4-.4.8-.6 1.4-.8.5-.2 1.2-.3 2.4-.4C8.4 2.2 8.7 2.2 12 2.2zm0 3.4a6.4 6.4 0 100 12.8 6.4 6.4 0 000-12.8zM12 8.7a3.3 3.3 0 110 6.6 3.3 3.3 0 010-6.6z"/></svg>
          </a>
        </div>
      </div>

      <!-- Middle: Contact -->
      <div class="text-sm text-slate-700">
        <div class="flex items-start gap-3">
          <div class="w-6 mt-1">
            <!-- address icon -->
            <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8 2 5 5 5 9c0 6 7 13 7 13s7-7 7-13c0-4-3-7-7-7z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <div>
            <div class="font-semibold text-slate-800">Alamat</div>
            <div class="text-sm text-slate-600">Jalan Contoh No. 1, Bantul, Yogyakarta</div>
          </div>
        </div>

        <div class="mt-4 flex items-start gap-3">
          <div class="w-6 mt-1">
            <!-- phone icon -->
            <svg class="w-5 h-5 text-slate-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 16.9v3a2 2 0 0 1-2.2 2c-10.6-1.7-19-10.1-20.7-20.7A2 2 0 0 1 5 0h3a2 2 0 0 1 2 1.6c.2 1.1.6 2.4 1.3 3.6.6 1 .5 2.2-.2 3.3L10 10c.9 1.9 2.2 3.4 4 4.3l1.6-1.6c1.1-.7 2.3-.8 3.3-.2 1.2.7 2.5 1.1 3.6 1.3A2 2 0 0 1 22 16.9z" stroke="currentColor" stroke-width="0.9"/></svg>
          </div>
          <div>
            <div class="font-semibold text-slate-800">Kontak</div>
            <div class="text-sm text-slate-600">(0274) 123-456</div>
          </div>
        </div>

        <div class="mt-4 flex items-start gap-3">
          <div class="w-6 mt-1">
            <!-- mail icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 14H4V8l8 5l8-5zm-8-7L4 6h16z"/></svg>
          </div>
          <div>
            <div class="font-semibold text-slate-800">Email</div>
            <div class="text-sm text-slate-600">info@pariwisata-bantul.go.id</div>
          </div>
        </div>
      </div>

      <!-- Right: Links -->
      <div class="text-sm">
        <div class="font-semibold text-slate-800">Tautan</div>
        <ul class="mt-3 space-y-2">
          <li><a href="https://www.bantulkab.go.id" target="_blank" class="text-slate-600 hover:underline">Bantulkab.go.id</a></li>
          <li><a href="#" target="_blank" class="text-slate-600 hover:underline">Pariwisata Bantul</a></li>
          <li><a href="#" target="_blank" class="text-slate-600 hover:underline">Layanan Pemerintah</a></li>
        </ul>
      </div>
    </div>

    <div class="border-t border-slate-100 mt-8 pt-6 text-center text-sm text-slate-500">
      © <?= date('Y') ?> Dinas Pariwisata Kabupaten Bantul — Semua hak dilindungi.
    </div>
  </div>
</footer>
