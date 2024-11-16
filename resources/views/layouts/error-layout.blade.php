<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content={{ $deskripsi }} />
    <title>{{ $judul }}</title>
    <link rel="icon" href={{ asset('favicon.ico') }} type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-amber-50/75">
    <main class="flex min-h-screen flex-col items-center justify-center px-4">
        <section class="text-center">
            <header>
                <h1 class="mb-4 text-6xl font-bold text-[#f58a66]">
                    {{ explode(':', $judul)[0] }}
                </h1>
            </header>
            <p class="mb-8 text-xl text-gray-600">{{ $deskripsi }}</p>
            <nav>
                <a href="/"
                    class="inline-flex items-center gap-2 rounded-lg bg-[#f58a66] px-6 py-3 text-white transition-colors hover:bg-[#f58a66]/90">
                    <i class="fa-solid fa-home"></i>
                    Kembali ke Beranda
                </a>
            </nav>
        </section>
    </main>
</body>

</html>
