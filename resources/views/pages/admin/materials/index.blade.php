@component('layouts.admin-layout', ['judul' => 'Kelola Materi', 'deskripsi' => 'Halaman kelola materi'])
@include('pages.admin.materials.components.main')
@endcomponent

<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('openModal') === 'true') {
        openModal('addMaterialModal');
        window.history.replaceState({}, '', '{{ route("admin.materials.index") }}');
    }
});
</script>
