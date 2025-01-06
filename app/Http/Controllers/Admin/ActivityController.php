<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with('user')
            ->latest()
            ->paginate(50);
            
        return view('pages.admin.activities.index', compact('activities'));
    }

    public function getActivities()
    {
        try {
            $activities = Activity::with('user')
                ->latest()
                ->get()
                ->map(function($activity) {
                    return [
                        'id' => $activity->id,
                        'title' => $activity->title,
                        'description' => $activity->description,
                        'type' => $activity->type,
                        'created_at' => $activity->created_at->toISOString()
                    ];
                });
            
            return response()->json([
                'status' => 'success',
                'data' => $activities
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memuat aktivitas'
            ], 500);
        }
    }
} 