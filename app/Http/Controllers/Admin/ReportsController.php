<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Material;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $performanceStats = $this->getPerformanceStats();
        $activitySummary = $this->getActivitySummary();

        return view('pages.admin.reports', compact(
            'performanceStats',
            'activitySummary'
        ));
    }

    public function getMonthlyStats(Request $request)
    {
        try {
            $month = $request->get('month', date('m'));
            $year = $request->get('year', date('Y'));
            
            $dailyStats = Activity::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->select(
                    DB::raw('DATE(created_at) as date'),
                    'type',
                    DB::raw('count(*) as count')
                )
                ->groupBy('date', 'type')
                ->orderBy('date')
                ->get();
            
            $daysInMonth = Carbon::create($year, $month)->daysInMonth;
            
            $activityTypes = [
                'material_created' => ['label' => 'Pembuatan Materi', 'color' => 'rgba(59, 130, 246'],      
                'material_updated' => ['label' => 'Pembaruan Materi', 'color' => 'rgba(16, 185, 129'],     
                'material_deleted' => ['label' => 'Penghapusan Materi', 'color' => 'rgba(239, 68, 68'],    
                'exercise_created' => ['label' => 'Pembuatan Latihan', 'color' => 'rgba(236, 72, 153'],     
                'exercise_updated' => ['label' => 'Pembaruan Latihan', 'color' => 'rgba(168, 85, 247'],    
                'exercise_deleted' => ['label' => 'Penghapusan Latihan', 'color' => 'rgba(245, 158, 11'],  
                'material_completed' => ['label' => 'Materi Selesai', 'color' => 'rgba(34, 197, 94'],      
                'exercise_completed' => ['label' => 'Latihan Selesai', 'color' => 'rgba(14, 165, 233'],    
            ];
            
            $datasets = [];
            $labels = range(1, $daysInMonth);
            
            foreach ($activityTypes as $type => $config) {
                $data = array_fill(0, $daysInMonth, 0);
                
                foreach ($dailyStats as $stat) {
                    if ($stat->type === $type) {
                        $day = (int)Carbon::parse($stat->date)->format('d');
                        $data[$day - 1] = $stat->count;
                    }
                }
                
                $datasets[] = [
                    'label' => $config['label'],
                    'data' => $data,
                    'backgroundColor' => $config['color'] . ', 0.2)',
                    'borderColor' => $config['color'] . ', 1)',
                    'borderWidth' => 1.5,
                    'pointRadius' => 2,
                    'pointHoverRadius' => 4,
                    'tension' => 0.3,
                    'fill' => true
                ];
            }
            
            return response()->json([
                'labels' => $labels,
                'datasets' => $datasets
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat memuat data'
            ], 500);
        }
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