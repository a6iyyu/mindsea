@auth
    @include('pages.shared.header.components.user-dropdown')
@else
    @include('pages.shared.header.components.login-button')
@endauth