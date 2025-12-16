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
            Formulir Pendaftaran Magang
        </h1>

        <form action="{{ route('magang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- KIRI : DATA DIRI -->
                <div class="bg-white p-6 rounded-xl shadow">

                    <div class="text-center bg-[#0D2C54] text-white py-2 rounded-lg mb-6 font-semibold">
                        Data Diri Anda
                    </div>

                    <label class="block font-semibold mb-1">Nama Lengkap</label>
                    <input type="text"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-gray-100"
                        value="{{ auth()->check() ? auth()->user()->nama_lengkap : '' }}"
                        readonly>

                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-gray-100"
                        value="{{ auth()->check() ? auth()->user()->email : '' }}"
                        readonly>

                    <label class="block font-semibold mb-1">Jenis Kelamin</label>
                    <input type="text"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-gray-100"
                        value="{{ auth()->check() ? (auth()->user()->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan') : '' }}"
                        readonly>

                    <label class="block font-semibold mb-1">No Handphone</label>
                    <input type="text"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-gray-100"
                        value="{{ auth()->check() ? auth()->user()->no_hp : '' }}"
                        readonly>

                    <label class="block font-semibold mb-1">NIM / NIS</label>
                    <input type="text" name="nim"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="NIM / NIS"
                        {{ auth()->check() ? 'required' : 'disabled' }}>
                </div>

                <!-- KANAN : DATA INSTANSI -->
                <div class="bg-white p-6 rounded-xl shadow">

                    <div class="text-center bg-[#0D2C54] text-white py-2 rounded-lg mb-6 font-semibold">
                        Data Instansi
                    </div>

                    <label class="block font-semibold mb-1">Asal Instansi / Perguruan Tinggi</label>
                    <input type="text" name="instansi"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="Asal Instansi / Perguruan Tinggi"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <label class="block font-semibold mb-1">Prodi / Jurusan</label>
                    <input type="text" name="prodi"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="Prodi / Jurusan"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                     <label class="block font-semibold mb-1">Fakultas</label>
                    <input type="text" name="fakultas"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="fakultas"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <label class="block font-semibold mb-1">Nama Dosen Pembimbing</label>
                    <input type="text" name="pembimbing"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="Nama Dosen Pembimbing"
                        {{ auth()->check() ? '' : 'disabled' }}>

                    <label class="block font-semibold mb-1">No. Handphone Dosen Pembimbing</label>
                    <input type="text" name="nohp_pembimbing"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        placeholder="No. HP Pembimbing"
                        {{ auth()->check() ? '' : 'disabled' }}>

                    <label class="block font-semibold mb-1">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai"
                        class="w-full border rounded-lg px-3 py-2 mb-4"
                        {{ auth()->check() ? 'required' : 'disabled' }}>

                    <label class="block font-semibold mb-1">Unggah Surat Permohonan Magang (PDF)</label>
                    <input type="file" name="surat"
                        accept="application/pdf"
                        class="w-full border rounded-lg px-3 py-2 mb-4 bg-white"
                        {{ auth()->check() ? 'required' : 'disabled' }}>
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between mt-10">
                <a href="{{ route('dashboard') }}"
                    class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                    Kembali
                </a>

                @auth
                    <button type="submit"
                        class="px-6 py-2 bg-[#0D2C54] text-white rounded-lg hover:bg-blue-800">
                        Daftar Magang
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
