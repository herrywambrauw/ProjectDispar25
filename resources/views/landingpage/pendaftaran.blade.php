<?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Program - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

<!-- HERO -->
<section class="bg-blue-600 py-16 text-center text-white">
    <h1 class="text-3xl md:text-5xl font-bold">Pendaftaran Program</h1>
    <p class="mt-2 text-blue-100">Silakan pilih jenis kegiatan yang ingin Anda daftarkan</p>
</section>

<!-- MENU PENDAFTARAN -->
<section class="py-16 px-6">
    <div class="max-w-5xl mx-auto">

        <h2 class="text-2xl font-bold text-blue-700 mb-10 text-center">Pilih Jenis Pendaftaran</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- PENELITIAN -->
            <a href="form-penelitian.php"
               class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="text-blue-600 mb-4">
                    <!-- Icon Research -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" d="M3 4h18M4 4v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4"/>
                        <path stroke-width="1.5" d="M9 10h6M9 14h6"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-lg">Penelitian</h3>
            </a>

            <!-- KKN -->
            <a href="form-kkn.php"
               class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="text-blue-600 mb-4">
                    <!-- Icon Community -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" d="M12 6a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/>
                        <path stroke-width="1.5" d="M6 20v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-lg">KKN</h3>
            </a>

            <!-- MAGANG -->
            <a href="form-magang.php"
               class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="text-blue-600 mb-4">
                    <!-- Icon Work -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" d="M3 7h18M6 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"/>
                        <path stroke-width="1.5" d="M3 7v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-lg">Magang</h3>
            </a>

            <!-- PKL -->
            <a href="form-pkl.php"
               class="bg-white shadow rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="text-blue-600 mb-4">
                    <!-- Icon Document -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" d="M12 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V10l-6-6z"/>
                        <path stroke-width="1.5" d="M12 4v6h6"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-lg">PKL</h3>
            </a>

        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>
</body>
</html>
