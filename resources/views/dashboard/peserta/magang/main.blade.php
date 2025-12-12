<!DOCTYPE html>
<html lang="id" x-data="{ sidebar:true }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIMONE - Magang' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100">

    <div class="flex">
        <!-- SIDEBAR -->
        <div :class="sidebar ? 'block' : 'hidden'" class="md:block">
            @include('magang.components.sidebar')
        </div>

        <!-- KONTEN -->
        <div class="flex-1 flex flex-col">
            <!-- HEADER -->
            @include('magang.components.header')

            <!-- ISI HALAMAN -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
