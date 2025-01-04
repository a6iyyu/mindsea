<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="max-[8192px]:opacity-0 max-[3120px]:opacity-100 max-[3120px]:m-0 max-[3120px]:p-0 max-[3120px]:box-border max-[3120px]:[font-family:'Plus_Jakarta_Sans',Times,sans-serif,serif] max-[324px]:hidden">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @viteReactRefresh
    @vite(["resources/js/app.js"])
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="mx-auto overflow-x-hidden">
    <!-- Header -->
    <header class="fixed left-0 top-0 z-50 h-[4.5rem] w-screen border-b-2 border-gray-200 bg-[#fceede] shadow-md">
        <div class="mx-auto flex h-full max-w-[90vw] items-center justify-between lg:max-w-[96vw]">
            <!-- Logo dan Menu -->
            <div class="flex items-center gap-3 lg:gap-6">
                <button type="button" onclick="toggleSidebar()"
                    class="rounded-xl p-3 text-gray-600 transition-colors hover:bg-[#f58a66]/10 lg:hidden"
                    aria-label="Toggle Sidebar">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <a href="/admin" class="flex items-center gap-2">
                    <i class="fas fa-brain text-[#f58a66] text-2xl"></i>
                    <span class="hidden text-xl font-bold text-gray-800 lg:inline">Mindsea Admin</span>
                </a>
            </div>

            <!-- Navigasi -->
            <nav class="flex items-center gap-4">
                <a href="/"
                    class="flex items-center gap-2 rounded-xl px-4 py-2 text-gray-600 transition-colors hover:bg-[#f58a66]/10">
                    <i class="fas fa-home"></i>
                    <span class="hidden lg:inline">Beranda</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 rounded-xl px-4 py-2 text-gray-600 transition-colors hover:bg-[#f58a66]/10">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden lg:inline">Keluar</span>
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed z-40 left-0 top-0 h-screen w-16 border-r border-gray-200 bg-amber-50 shadow-md transition-all duration-300 ease-in-out md:w-60 lg:w-[16rem]">
        <nav class="mt-20 flex flex-col gap-2 p-4 text-gray-600">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 rounded-xl p-4 transition-colors hover:bg-[#f58a66]/10">
                <i class="fas fa-tachometer-alt text-[#f58a66]"></i>
                <span class="hidden md:inline">Dashboard</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 rounded-xl p-4 transition-colors hover:bg-[#f58a66]/10">
                <i class="fas fa-users text-[#f58a66]"></i>
                <span class="hidden md:inline">Pengguna</span>
            </a>
            <a href="#" class="flex items-center gap-3 rounded-xl p-4 transition-colors hover:bg-[#f58a66]/10">
                <i class="fas fa-book text-[#f58a66]"></i>
                <span class="hidden md:inline">Konten</span>
            </a>
            <a href="#" class="flex items-center gap-3 rounded-xl p-4 transition-colors hover:bg-[#f58a66]/10">
                <i class="fas fa-chart-bar text-[#f58a66]"></i>
                <span class="hidden md:inline">Laporan</span>
            </a>
            <a href="#" class="flex items-center gap-3 rounded-xl p-4 transition-colors hover:bg-[#f58a66]/10">
                <i class="fas fa-cog text-[#f58a66]"></i>
                <span class="hidden md:inline">Pengaturan</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-16 min-h-screen px-6 pt-28 pb-16 bg-white lg:ml-68 lg:py-28 lg:pr-10 lg:pl-60">
        {{ $slot }}
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-full");
        }
    </script>
</body>

</html>