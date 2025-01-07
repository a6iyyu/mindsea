<!DOCTYPE html>
<html 
  lang="{{ str_replace("_", "-", app()->getLocale()) }}"
  class="max-[8192px]:opacity-0 max-[3120px]:opacity-100 max-[3120px]:m-0 max-[3120px]:p-0 max-[3120px]:box-border max-[3120px]:[font-family:'Plus_Jakarta_Sans',Times,sans-serif,serif] max-[324px]:hidden"
>

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=7" />
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
  <link rel="icon" href={{ asset('favicon.ico') }} type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(["resources/js/app.js"])
</head>

<body class="mx-auto min-h-screen overflow-x-hidden grid place-items-center bg-amber-50/75">
  <section class="flex flex-col items-center justify-center">
    <h1 class="mb-4 text-6xl font-bold text-[#f58a66]">{{ explode(':', $judul)[0] }}</h1>
    <p class="mb-8 text-xl text-gray-600">{{ $deskripsi }}</p>
    <a
      href="/"
      class="inline-flex items-center gap-2 rounded-lg bg-[#f58a66] px-6 py-3 text-white transition-colors hover:bg-[#f58a66]/90"
    >
      <i class="fa-solid fa-home"></i>
      Kembali ke Beranda
    </a>
  </section>
</body>

</html>