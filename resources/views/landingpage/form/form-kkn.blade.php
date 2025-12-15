@include('landingpage.components.header')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Magang - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

<section class="py-16 px-6">
    <div class="max-w-5xl mx-auto bg-blue-100 p-10 rounded-xl shadow-lg">

        <h1 class="text-center text-3xl font-bold text-blue-900 mb-10">
            Formulir Pendaftaran Kuliah Kerja Nyata
        </h1>

        <form action="{{ route('kkn.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Bagian Kiri -->
                <div class="bg-white p-6 rounded-xl shadow">

                    <div class="text-center bg-[#0D2C54] text-white py-2 rounded-lg mb-6 font-semibold">
                         Data Diri
                    </div>

                    <!-- Nama -->
                    <label class="block font-semibold mb-1">Nama Lengkap</label>
                    <input type="text"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-gray-100"
                        value="{{ auth()->check() ? auth()->user()->nama_lengkap : '' }}"
                        readonly>

                    <!-- Email -->
                   <label class="block font-semibold mb-1">Email</label>
                    <input type="email"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-gray-100"
                        value="{{ auth()->check() ? auth()->user()->email : '' }}"
                        readonly>

                    <!-- NIM / NIS -->
                   <label class="block font-semibold mb-1">NIM / NIS</label>
                    <input type="text" name="nim"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="NIM / NIS"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <!-- Jenis Kelamin -->
                    <label class="block font-semibold mb-1">Jenis Kelamin</label>
                    <input type="text"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-gray-100"
                        value="{{ auth()->check() ? (auth()->user()->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan') : '' }}"
                        readonly>

                    <!-- No HP -->
                    <label class="block font-semibold mb-1">No Handphone</label>
                    <input type="text"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-gray-100"
                        value="{{ auth()->check() ? auth()->user()->no_hp : '' }}"
                        readonly>

                </div>

                <!-- Bagian Kanan -->
                <div class="bg-white p-6 rounded-xl shadow">

                    <div class="text-center bg-[#0D2C54] text-white py-2 rounded-lg mb-6 font-semibold">
                         Data  Instansi
                    </div>

                    <!-- Asal Instansi -->
                    <label class="block font-semibold mb-1">Asal Instansi</label>
                    <input type="text" name="instansi"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="Asal Instansi / Perguruan Tinggi"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <!-- Prodi -->
                    <label class="block font-semibold mb-1">Prodi / Jurusan</label>
                    <input type="text" name="prodi"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="Prodi / Jurusan"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <!-- Fakultas -->
                    <label class="block font-semibold mb-1">Fakultas</label>
                    <input type="text" name="fakultas"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="fakultas"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <!-- Nama Dosen / Pembimbing -->
                    <label class="block font-semibold mb-1">Nama Dosen Pembimbing</label>
                    <input type="text" name="pembimbing"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="Nama Dosen Pembimbing"
                        {{ auth()->check() ? '' : 'disabled' }}>

                    <!-- No HP Dosen -->
                    <label class="block font-semibold mb-1">No. Handphone Dosen Pembimbing</label>
                    <input type="text" name="nohp_pembimbing"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="No. HP Pembimbing"
                        {{ auth()->check() ? '' : 'disabled' }}>

                    <!-- Tanggal Mulai -->
                    <label class="block font-semibold mb-1">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <!-- Lokasi Tujuan KKN -->
                    <label class="block font-semibold mb-1">Lokasi Tujuan KKN</label>
                    <input type="text" name="lokasi_tujuan"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="Lokasi Tujuan Penelitian"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <!-- Upload Surat -->
                    <input type="file" name="surat"
                        accept="application/pdf"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-white"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                </div>
            </div>

             <div class="flex justify-between mt-10">
                <a href="{{ route('dashboard') }}"
                    class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                    Kembali
                </a>

                @auth
                    <button type="submit"
                        class="px-6 py-2 bg-[#0D2C54] text-white rounded-lg hover:bg-blue-800">
                        Daftar KKN
                    </button>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">
                        Daftar Akun Terlebih Dahulu
                    </a>
                @endguest
            </div>

        </form>

    </div>
</section>

@include('landingpage.components.footer')

</body>
</html>
