<?php

namespace App\Http\Controllers;
use App\Models\MaterialProgress;
use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
  public function index()
  {
    $materi = Material::with([
      'progress' => function ($query) {
        $query->where('user_id', Auth::id());
      }
    ])->get();

    return view('pages.materi', compact('materi'));
  }

  public function show($id)
  {
    $materi = Material::with([
      'contents' => function ($query) {
        $query->orderBy('section_type', 'asc');
      }
    ])->findOrFail($id);

    return view('pages.materi.detail', compact('materi'));
  }

  public function search(Request $request)
  {
    $keyword = $request->get('keyword');

    if (!$keyword) {
      return response()->json([]);
    }

    $results = Material::where('title', 'like', "%{$keyword}%")
      ->orWhere('description', 'like', "%{$keyword}%")
      ->select('id', 'title', 'description')
      ->limit(5)
      ->get();

    return response()->json($results);
  }

  public function showIntroduction($id)
  {
    $materi = Material::with([
      'contents' => function ($query) {
        $query->where('section_type', 'pengenalan');
      }
    ])->findOrFail($id);

    $introduction = $materi->contents->first();

    if (!$introduction) {
      return redirect()->back()->with('error', 'Konten pengenalan tidak ditemukan');
    }

    return view('components.materi.pengenalan', compact('materi', 'introduction'));

  }

  public function showMainContent($id)
  {
    $materi = Material::with([
      'contents' => function ($query) {
        $query->where('section_type', 'materi_utama');
      }
    ])->findOrFail($id);

    $mainContent = $materi->contents->first();

    return view('components.materi.materi-utama', compact('materi', 'mainContent'));
  }

  public function showExercise($id)
  {
    $materi = Material::with([
      'contents' => function ($query) {
        $query->where('section_type', 'latihan');
      }
    ])->findOrFail($id);

    $exercise = $materi->contents->first();

    return view('components.materi.latihan', compact('materi', 'exercise'));
  }

  public function completeContent($id)
  {
    try {
      $progress = MaterialProgress::firstOrNew([
        'user_id' => Auth::id(),
        'material_id' => $id
      ]);

      if (!$progress->is_completed) {
        $progress->is_completed = true;
        $progress->completed_at = now();
        $progress->save();

        return response()->json([
          'status' => 'success',
          'message' => 'Materi berhasil diselesaikan'
        ]);
      }

      return response()->json([
        'status' => 'info',
        'message' => 'Materi sudah pernah diselesaikan'
      ]);

    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => 'Terjadi kesalahan saat menyelesaikan materi'
      ], 500);
    }
  }
}