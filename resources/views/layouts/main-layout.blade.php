<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta property="og:image" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index" />
    <meta name="description" content="{{ $deskripsi }}" />
    <meta property="og:title" content="{{ $judul }}" />
    <meta property="og:description" content="{{ $deskripsi }}" />
    <meta property="og:image" content="{{ asset("favicon.ico") }}" />
    <meta name="twitter:title" content="{{ $judul }}" />
    <meta name="twitter:description" content="{{ $deskripsi }}" />
    <meta name="twitter:image" content="{{ asset("favicon.ico") }}" />
    <title>{{ $judul }}</title>
    <link rel="icon" href="{{ asset("favicon.ico") }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+US+Trad:wght@100..400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @viteReactRefresh
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="mx-auto overflow-x-hidden">
    @include("layouts.forest-background")

    @if ($auth ?? true)
        @include("pages.shared.header.header")
    @endif

    @if (!$halaman_khusus)
        @include("pages.shared.sidebar.sidebar")
    @endif

    {{ $slot }}
</body>

</html>