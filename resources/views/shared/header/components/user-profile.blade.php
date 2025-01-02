<nav class="user-profile">
    @auth
        @include('shared.header.components.user-dropdown')
    @else
        @include('shared.header.components.login-button')
    @endauth
</nav>