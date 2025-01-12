<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Exercise;
use App\Models\Material;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function getAdminStatistics()
    {
        // Jumlah pengguna bulan ini
        $currentMonthUsers = User::whereMonth('created_at', Carbon::now()->month)->count();
        $lastMonthUsers = User::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();

        // Menghitung persentase pertumbuhan
        $userGrowth = $lastMonthUsers > 0
            ? round((($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100, 1)
            : 100;

        // Mendapatkan statistik materi
        $totalMaterials = Material::count();
        $activeMaterials = Material::where('is_active', true)->count();

        // Menghitung tingkat penyelesaian
        $totalCompletions = DB::table('material_progress')->where('is_completed', true)->count();
        $totalPossibleCompletions = User::count() * Material::count();
        $completionRate = $totalPossibleCompletions > 0
            ? round(($totalCompletions / $totalPossibleCompletions) * 100, 1)
            : 0;

        // Menghitung rata-rata skor dari user_exercises table instead of exercise_results
        $totalExercises = Exercise::count();
        $averageScore = round(DB::table('user_exercises')->avg('score') ?? 0, 1);

        // Aktivitas terbaru
        $recentActivities = Activity::with('user')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($activity) {
                return (object) [
                    'title' => $activity->title,
                    'description' => $activity->description,
                    'icon' => $activity->icon,
                    'color' => $activity->color,
                    'created_at' => $activity->created_at,
                ];
            });

        return [
            'total_users' => User::count(),
            'user_growth' => $userGrowth,
            'total_materials' => $totalMaterials,
            'active_materials' => $activeMaterials,
            'completion_rate' => $completionRate,
            'average_score' => $averageScore,
            'total_exercises' => $totalExercises,
            'recentActivities' => $recentActivities
        ];
    }
}