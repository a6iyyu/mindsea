<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Model
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
