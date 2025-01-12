<?php

namespace App\Http\Controllers;

use App\Models\MaterialProgress;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Hitung persentase progress
        $totalMaterials = Material::count();
        $completedMaterials = MaterialProgress::where('user_id', $user->id)->where('is_completed', true)->count();
        $completedPercentage = ($totalMaterials > 0) ? round(($completedMaterials / $totalMaterials) * 100) : 0;
        
        $inProgressPercentage = 35; // Contoh statis, sesuaikan dengan logika aplikasi
        $notStartedPercentage = 100 - ($completedPercentage + $inProgressPercentage);
        
        // Ambil aktivitas terakhir
        $recentActivities = MaterialProgress::with('material')
            ->where('user_id', $user->id)
            ->where('is_completed', true)
            ->orderBy('completed_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function($progress) {
                return (object)[
                    'title' => $progress->material->title,
                    'description' => 'Menyelesaikan materi',
                    'completed_at' => $progress->completed_at,
                    'color' => 'green',
                    'icon' => 'fa-check-circle'
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