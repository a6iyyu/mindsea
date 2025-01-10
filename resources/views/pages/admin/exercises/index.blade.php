@component('layouts.admin-layout', ['judul' => 'Kelola Latihan', 'deskripsi' => 'Halaman kelola latihan'])
    @include('pages.admin.exercises.components.main')
@endcomponent

<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('openModal') === 'true') {
        openModal('addExerciseModal');
        window.history.replaceState({}, '', '{{ route("admin.exercises.index") }}');
    }
});
</script>
