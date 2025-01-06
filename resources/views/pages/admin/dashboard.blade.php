@component('layouts.admin-layout', ['judul' => 'Admin Dashboard | mindsea', 'deskripsi' => 'Panel admin mindsea'])
    @include('pages.admin.components.hero')
    @if(isset($statistics))
        @include('pages.admin.components.statistics', ['statistics' => $statistics])
        @include('pages.admin.components.recent-activities', ['recentActivities' => $statistics['recentActivities']])
        @include('pages.admin.components.quick-action')
    @else
        <div class="p-6 bg-red-100 text-red-700 rounded-lg">
            <p>Error: Statistics data not available</p>
        </div>
    @endif
@endcomponent