@component("layouts.admin-layout", [
    "judul" => "Kelola Materi",
    "deskripsi" => "",
])
    @include("components.admin.materials.main")
@endcomponent

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("open_modal") === "true") {
            open_modal("add_material_modal");
            window.history.replaceState({}, "", "{{ route('admin.materials.index') }}");
        }
    });
</script>