@component("layouts.admin-layout", [
    "judul" => "Admin Dashboard",
    "deskripsi" => "Panel admin mindsea"
])
    @include("components.admin.users.main")
@endcomponent