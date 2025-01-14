<?php

namespace App\Http\Controllers\User;

use App\Models\Exercise;
use App\Models\MaterialProgress;
use App\Models\Material;
use App\Models\UserExercise;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalMaterials = Material::count();
        $completedMaterials = MaterialProgress::where('user_id', $user->id)
            ->where('is_completed', true)
            ->count();

        $inProgressMaterials = MaterialProgress::where('user_id', $user->id)
            ->where('is_started', true)
            ->where('is_completed', false)
            ->count();

        $totalExercises = Exercise::count();
        $completedExercises = UserExercise::where('user_id', $user->id)->count();

        $totalLearnableItems = $totalMaterials + $totalExercises;
        if ($totalLearnableItems > 0) {
            $completedPercentage = round((($completedMaterials + $completedExercises) / $totalLearnableItems) * 100);
            $inProgressPercentage = round(($inProgressMaterials / $totalLearnableItems) * 100);
            $notStartedPercentage = 100 - ($completedPercentage + $inProgressPercentage);
        } else {
            $completedPercentage = 0;
            $inProgressPercentage = 0;
            $notStartedPercentage = 100;
        }

        $recentActivities = MaterialProgress::with(['material', 'user'])
            ->where('user_id', Auth::id())
            ->where('is_completed', true)
            ->orderBy('completed_at', 'desc')
            ->limit(5)
            ->get();

        $recentExerciseActivities = UserExercise::with(['exercise', 'user'])
            ->where('user_id', Auth::id())
            ->orderBy('completed_at', 'desc')
            ->limit(5)
            ->get();

        $allRecentActivities = $recentActivities->merge($recentExerciseActivities)->sortByDesc(function ($activity) {
            if ($activity instanceof MaterialProgress) {
                return $activity->completed_at ?? now();
            }
            return $activity->created_at ?? now();
        })->take(5);

        $recentActivities = $allRecentActivities->map(function ($activity) {
            if ($activity instanceof MaterialProgress && $activity->material) {
                return (object) [
                    'title' => $activity->material->title,
                    'description' => 'Menyelesaikan materi',
                    'completed_at' => $activity->completed_at,
                    'color' => 'green',
                    'icon' => 'fa-check-circle'
                ];
            } else if ($activity->exercise) {
                return (object) [
                    'title' => $activity->exercise->title,
                    'description' => 'Menyelesaikan latihan',
                    'completed_at' => $activity->completed_at,
                    'color' => 'emerald',
                    'icon' => 'fa-pencil-alt'
                ];
            }
            return (object) [
                'title' => 'Activity',
                'description' => 'Aktivitas tidak diketahui',
                'completed_at' => now(),
                'color' => 'gray',
                'icon' => 'fa-question-circle'
            ];
        });

        return view('pages.progres-belajar', compact(
            'completedPercentage',
            'inProgressPercentage',
            'notStartedPercentage',
            'recentActivities'
        ));
    }
}