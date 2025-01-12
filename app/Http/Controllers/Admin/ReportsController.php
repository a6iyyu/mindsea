<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Material;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $monthlyStats = $this->getMonthlyStats();
        $performanceStats = $this->getPerformanceStats();
        $activitySummary = $this->getActivitySummary();

        return view('pages.admin.reports.index', compact(
            'monthlyStats',
            'performanceStats',
            'activitySummary'
        ));
    }

    private function getMonthlyStats()
    {
        $currentYear = Carbon::now()->year;
        $months = range(1, 12);

        $userSignups = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $materialCompletions = DB::table('material_progress')
            ->selectRaw('MONTH(completed_at) as month, COUNT(*) as count')
            ->whereYear('completed_at', $currentYear)
            ->where('is_completed', true)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $exerciseCompletions = DB::table('user_exercises')
            ->selectRaw('MONTH(completed_at) as month, COUNT(*) as count')
            ->whereYear('completed_at', $currentYear)
            ->whereNotNull('completed_at')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [
                [
                    'label' => 'Pengguna Baru',
                    'data' => array_map(fn($month) => $userSignups[$month] ?? 0, $months),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => '#3b82f680',
                ],
                [
                    'label' => 'Materi Selesai',
                    'data' => array_map(fn($month) => $materialCompletions[$month] ?? 0, $months),
                    'borderColor' => '#22c55e',
                    'backgroundColor' => '#22c55e80',
                ],
                [
                    'label' => 'Latihan Selesai',
                    'data' => array_map(fn($month) => $exerciseCompletions[$month] ?? 0, $months),
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => '#f59e0b80',
                ],
            ]
        ];
    }

    private function getPerformanceStats()
    {
        return [
            'average_score' => round(DB::table('user_exercises')->avg('score') ?? 0, 1),
            'active_users' => User::whereHas('activities', function ($query) {
                $query->where('created_at', '>=', Carbon::now()->subDays(30));
            })->count(),
            'completion_rate' => round((DB::table('material_progress')->where('is_completed', true)->count() / (User::count() * Material::count())) * 100, 1),
            'total_activities' => Activity::count()
        ];
    }

    private function getActivitySummary()
    {
        return Activity::select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->orderByDesc('count')
            ->limit(5)
            ->get();
    }
}