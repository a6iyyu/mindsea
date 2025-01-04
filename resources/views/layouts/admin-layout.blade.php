<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+US+Trad:wght@100..400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media screen and (max-width: 3120px) {
            ::-webkit-scrollbar {
                display: none !important;
            }

            input:-webkit-autofill,
            input:-webkit-autofill:hover,
            input:-webkit-autofill:focus,
            input:-webkit-autofill:active {
                -webkit-text-fill-color: #374151 !important;
                -webkit-box-shadow: 0 0 0 30px #fceede inset !important;
                transition: background-color 5000s ease-in-out 0s;
                caret-color: #374151;
                box-shadow: 0 0 0 30px #fceede inset !important;
            }

            input:autofill {
                -webkit-text-fill-color: #374151 !important;
                box-shadow: 0 0 0 30px #fceede inset !important;
            }

            input[type="search"]::-webkit-search-cancel-button {
                -webkit-appearance: none;
                appearance: none;
            }
        }
    </style>
    @viteReactRefresh
    @vite(["resources/js/app.js"])
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="bg-amber-100">
    <header class="fixed left-0 top-0 z-50 h-[4.5rem] w-screen bg-[#f47951] text-white shadow-lg">
        <div class="mx-auto flex h-full max-w-[95vw] items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="text-2xl font-bold flex items-center gap-2">
                    <i class="fas fa-brain"></i>
                    Mindsea Admin
                </span>
            </div>
            <nav class="flex items-center gap-6">
                <a href="/" class="hover:text-amber-100 transition-colors flex items-center gap-2">
                    <i class="fas fa-home"></i> 
                    <span>Beranda</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-amber-100 transition-colors flex items-center gap-2">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <aside class="fixed left-0 top-[4.5rem] h-screen w-64 bg-[#fceede] shadow-lg">
        <nav class="p-6">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-3 p-4 rounded-xl hover:bg-[#f58a66]/10 transition-all group">
                <i class="fas fa-tachometer-alt text-[#f58a66] group-hover:scale-110 transition-transform"></i>
                <span class="text-gray-700">Dashboard</span>
            </a>
            
            <a href="#" class="flex items-center gap-3 p-4 rounded-xl hover:bg-[#f58a66]/10 transition-all group">
                <i class="fas fa-users text-[#f58a66] group-hover:scale-110 transition-transform"></i>
                <span class="text-gray-700">Pengguna</span>
            </a>

            <a href="#" class="flex items-center gap-3 p-4 rounded-xl hover:bg-[#f58a66]/10 transition-all group">
                <i class="fas fa-book text-[#f58a66] group-hover:scale-110 transition-transform"></i>
                <span class="text-gray-700">Konten</span>
            </a>

            <a href="#" class="flex items-center gap-3 p-4 rounded-xl hover:bg-[#f58a66]/10 transition-all group">
                <i class="fas fa-chart-bar text-[#f58a66] group-hover:scale-110 transition-transform"></i>
                <span class="text-gray-700">Laporan</span>
            </a>

            <a href="#" class="flex items-center gap-3 p-4 rounded-xl hover:bg-[#f58a66]/10 transition-all group">
                <i class="fas fa-cog text-[#f58a66] group-hover:scale-110 transition-transform"></i>
                <span class="text-gray-700">Pengaturan</span>
            </a>
        </nav>
    </aside>

    <main class="ml-64 pt-[4.5rem] min-h-screen bg-amber-50/50 p-8">
        {{ $slot }}
    </main>
</body>

</html>