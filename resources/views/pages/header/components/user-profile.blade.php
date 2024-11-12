@auth
    @include('pages.header.components.user-dropdown')
@else
    @include('pages.header.components.login-button')
@endauth
