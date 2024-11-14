<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Material;
use PhpParser\Node\Stmt\TryCatch;

class MaterialController extends Controller
{
    public function index()
    {
        $materi = Material::all();
        return view('pages.sidebar.menu.materi.index', compact('materi'));
    }

    public function show($id)
    {
        $materi = Material::with([
            'contents' => function ($query) {
                $query->orderBy('section_type', 'asc');
            }
        ])->findOrFail($id);

        return view('pages.sidebar.menu.materi.show.detail', compact('materi'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $materi = Material::where('title', 'like', "%$keyword%")->orWhere('description', 'like', "%$keyword%")->get();
        return response()->json($materi);
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

        return view('pages.sidebar.menu.materi.show.section.pengenalan.index', compact('materi', 'introduction'));

    }

    public function showMainContent($id)
    {
        $materi = Material::with([
            'contents' => function ($query) {
                $query->where('section_type', 'materi_utama');
            }
        ])->findOrFail($id);

        $mainContent = $materi->contents->first();

        return view('pages.sidebar.menu.materi.show.section.materi-utama.index', compact('materi', 'mainContent'));
    }

    public function showExercise($id)
    {
        $materi = Material::with([
            'contents' => function ($query) {
                $query->where('section_type', 'latihan');
            }
        ])->findOrFail($id);

        $exercise = $materi->contents->first();

        return view('pages.sidebar.menu.materi.show.section.latihan.index', compact('materi', 'exercise'));
    }
}
