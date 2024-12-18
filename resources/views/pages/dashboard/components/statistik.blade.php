<main class="rounded-2xl border-4 border-orange-200 bg-white p-8 shadow-lg hover:shadow-xl transition-all duration-300">
    @include('pages.dashboard.components.pencapaianmu')
    @auth
        @include('pages.dashboard.components.registered')
    @else
        @include('pages.dashboard.components.unregistered')
    @endauth
</main>