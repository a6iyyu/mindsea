@component("layouts.admin-layout", [
    "judul" => "Kelola Pengguna",
    "deskripsi" => "Panel admin mindsea"
])
    @include("components.admin.users.main")
@endcomponent

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("open_modal") === "true") {
            open_modal("add_user_modal");
            urlParams.delete("open_modal");
            const newUrl = urlParams.toString() ? `${window.location.pathname}?${urlParams.toString()}` : window.location.pathname;
            window.history.replaceState({}, "", newUrl);
        }
    });
</script>