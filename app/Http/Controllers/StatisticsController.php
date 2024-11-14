<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserMaterial;
use App\Models\UserExercise;

class StatisticsController extends Controller
{
    public function getStatistics()
    {
        $userId = Auth::id();

        return [
            'completed_materials' => UserMaterial::where('user_id', $userId)->where('status', 'selesai')->count(),
            'completed_exercises' => UserExercise::where('user_id', $userId)->whereNotNull('completed_at')->count(),
            'average_score' => UserExercise::where('user_id', $userId)->whereNotNull('completed_at')->avg('score') ?? 0,
        ];

    }
}
