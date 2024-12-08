<!-- Header utama -->
<header class="fixed z-50 left-0 top-0 z-50 h-[4.5rem] w-screen border-b-2 border-gray-200 bg-[#fceede] shadow-md">
    <section class="mx-auto flex h-full max-w-[90vw] items-center justify-between lg:max-w-[96vw]">
        <!-- Bagian kiri: Logo dan Menu -->
        <div class="flex items-center gap-3 lg:gap-6">
            @include('pages.shared.header.components.menu-button')
            @include('pages.shared.header.components.logo')
        </div>

        <!-- Bagian tengah: Search bar -->
        @include('pages.shared.header.components.search-bar')

        <!-- Bagian kanan: Navigasi -->
        <nav class="flex h-[80%] items-center gap-4">
            @include('pages.shared.header.components.mobile-search')
            @include('pages.shared.header.components.nav-items')
            @include('pages.shared.header.components.user-profile')
        </nav>
    </section>
</header>