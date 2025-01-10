@component('layouts.admin-layout', [
    'judul' => 'Admin Dashboard',
    'deskripsi' => 'Panel admin mindsea',
])
    @include('components.admin.dashboard.hero')
    @if(isset($statistics))
        @include('components.admin.dashboard.statistic-header')
        @include('components.admin.dashboard.recent-activities', ['recentActivities' => $statistics['recentActivities']])
        @include('components.admin.dashboard.quick-action')
    @else
        <div class="p-6 bg-red-100 text-red-700 rounded-lg">
            <p>Error: Statistics data not available</p>
        </div>
    @endif
@endcomponent