<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kerja Sama - DISPAR Bantul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

<!-- HEADER TITLE -->
<section class="bg-blue-600 py-16 text-center text-white">
    <h1 class="text-3xl md:text-5xl font-bold">Daftar Kerja Sama</h1>
    <p class="mt-2 text-blue-100">Informasi lengkap mengenai seluruh kerja sama DISPAR Bantul</p>
</section>

<!-- MAIN CONTENT -->
<section class="py-16 px-6">
    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-blue-700">Semua Kerja Sama</h2>

            <!-- FILTER -->
            <form method="GET">
                <select name="filter"
                        onchange="this.form.submit()"
                        class="px-4 py-2 border rounded-lg text-gray-700 bg-white shadow-sm">
                    <option value="">Filter Tanggal</option>
                    <option value="terdekat" <?= (isset($_GET['filter']) && $_GET['filter']=='terdekat') ? 'selected' : '' ?>>
                        Tanggal Terdekat
                    </option>
                    <option value="terjauh" <?= (isset($_GET['filter']) && $_GET['filter']=='terjauh') ? 'selected' : '' ?>>
                        Tanggal Terjauh
                    </option>
                    <option value="selesai" <?= (isset($_GET['filter']) && $_GET['filter']=='selesai') ? 'selected' : '' ?>>
                        Sudah Selesai
                    </option>
                </select>
            </form>
        </div>

        <?php
            // Data dummy (bisa diganti DB)
            $kerjasama = [
                ["img" => "kerjasama/perusahaan1.jpg", "title" => "PT Maju Jaya", "tanggal_selesai" => "2026-03-01"],
                ["img" => "kerjasama/perusahaan2.jpg", "title" => "CV Kreatif Nusantara", "tanggal_selesai" => "2026-01-20"],
                ["img" => "kerjasama/perusahaan3.jpg", "title" => "Bantul Tekno Indonesia", "tanggal_selesai" => "2026-02-05"],
                ["img" => "kerjasama/perusahaan4.jpg", "title" => "PT Wisata Mandiri", "tanggal_selesai" => "2026-04-18"],
                ["img" => "kerjasama/perusahaan5.jpg", "title" => "Yogyakarta Art Studio", "tanggal_selesai" => "2026-01-30"],
                ["img" => "kerjasama/perusahaan6.jpg", "title" => "CV Digital Indo", "tanggal_selesai" => "2026-05-11"],
            ];

            $today = strtotime(date("Y-m-d"));

            // FILTER LOGIC
            if (isset($_GET['filter'])) {
                $filter = $_GET['filter'];

                if ($filter == "terdekat") {
                    // Sort tanggal terdekat ke hari ini
                    usort($kerjasama, function ($a, $b) use ($today) {
                        $diffA = abs(strtotime($a['tanggal_selesai']) - $today);
                        $diffB = abs(strtotime($b['tanggal_selesai']) - $today);
                        return $diffA - $diffB;
                    });

                } elseif ($filter == "terjauh") {
                    // Sort descending (terjauh)
                    usort($kerjasama, function ($a, $b) {
                        return strtotime($b['tanggal_selesai']) - strtotime($a['tanggal_selesai']);
                    });

                } elseif ($filter == "selesai") {
                    // Ambil data yang tanggal_selesai < hari ini
                    $kerjasama = array_filter($kerjasama, function ($item) use ($today) {
                        return strtotime($item['tanggal_selesai']) < $today;
                    });
                }
            }
        ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <?php foreach ($kerjasama as $i => $item): ?>
                <a href="detail-kerjasama.php?id=<?= $i+1 ?>"
                   class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                    <img src="<?= $item['img'] ?>" class="w-full h-48 object-cover">

                    <div class="p-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <?= $item['title'] ?>
                        </h3>

                        <span class="text-sm text-blue-600 font-medium">
                            <?= date("d M Y", strtotime($item['tanggal_selesai'])) ?>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>

    </div>
</section>

</body>
</html>
