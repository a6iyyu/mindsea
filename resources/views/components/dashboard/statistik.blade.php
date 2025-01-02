<main class="rounded-2xl border-4 border-orange-200 bg-white p-6 shadow-lg hover:shadow-xl transition-all duration-300 lg:p-8">
    @include('components.dashboard.pencapaianmu')
    @auth
        @include('components.dashboard.registered')
    @else
        @include('components.dashboard.unregistered')
    @endauth
</main>