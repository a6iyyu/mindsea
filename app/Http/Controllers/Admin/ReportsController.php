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

        return view('pages.admin.reports', compact(
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
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => '#f59e0b40',
                ],
                [
                    'label' => 'Materi Selesai',
                    'data' => array_map(fn($month) => $materialCompletions[$month] ?? 0, $months),
                    'borderColor' => '#22c55e',
                    'backgroundColor' => '#22c55e40',
                ],
                [
                    'label' => 'Latihan Selesai',
                    'data' => array_map(fn($month) => $exerciseCompletions[$month] ?? 0, $months),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => '#3b82f640',
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

    public function getMonthlyStatsForDate($year, $month)
    {
        try {
            $startDate = Carbon::create($year, $month, 1)->startOfMonth();
            $endDate = Carbon::create($year, $month, 1)->endOfMonth();

            $stats = Activity::whereBetween('created_at', [$startDate, $endDate])
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count, type')
                ->groupBy('date', 'type')
                ->get();

            $colors = [
                'login' => '#f59e0b',
                'material_view' => '#22c55e',
                'exercise_complete' => '#3b82f6',
                'material_complete' => '#8b5cf6',
                'default' => '#64748b'
            ];

            $datasets = [];
            $types = $stats->pluck('type')->unique();

            foreach ($types as $type) {
                $data = [];
                $dates = $stats->where('type', $type)
                              ->pluck('count', 'date')
                              ->toArray();

                $currentDate = $startDate->copy();
                while ($currentDate <= $endDate) {
                    $dateStr = $currentDate->format('Y-m-d');
                    $data[] = [
                        'x' => $dateStr,
                        'y' => $dates[$dateStr] ?? 0
                    ];
                    $currentDate->addDay();
                }

                $color = $colors[$type] ?? $colors['default'];
                
                $datasets[] = [
                    'label' => ucfirst(str_replace('_', ' ', $type)),
                    'data' => $data,
                    'borderColor' => $color,
                    'backgroundColor' => $color . '20',
                    'fill' => false,
                    'tension' => 0.1
                ];
            }

            return response()->json([
                'datasets' => $datasets
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in monthly stats: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch statistics'], 500);
        }
    }
}