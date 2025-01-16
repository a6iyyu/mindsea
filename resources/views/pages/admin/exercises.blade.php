@component("layouts.admin-layout", [
    "judul" => "Kelola Latihan Soal",
    "deskripsi" => ""
])
    @include("components.admin.exercises.main")
@endcomponent

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get("open_modal") === "true") {
            open_modal("add_exercise_modal");
            window.history.replaceState({}, "", "{{ route('admin.exercises.index') }}");
        }
    });
</script>
