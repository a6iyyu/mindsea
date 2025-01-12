<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\MaterialProgress;
use App\Models\UserExercise;

class StatisticsController extends Controller
{
    public function getStatistics()
    {
        $userId = Auth::id();

        return [
            'completed_materials' => MaterialProgress::where('user_id', $userId)->where('is_completed', true)->count(),
            'completed_exercises' => UserExercise::where('user_id', $userId)->whereNotNull('completed_at')->count(),
            'average_score' => UserExercise::where('user_id', $userId)->whereNotNull('completed_at')->avg('score') ?? 0,
        ];
    }
}