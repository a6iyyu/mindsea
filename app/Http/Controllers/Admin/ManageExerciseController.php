<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExerciseList;
use App\Models\Exercise;
use App\Models\Question;
use App\Traits\NotificationHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageExerciseController extends Controller
{
    use NotificationHelper;

    public function index(Request $request)
    {
        $search = $request->input('search');

        $exercises = Exercise::when($search, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('pages.admin.exercises', compact('exercises'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'required|string|max:255',
                'color' => 'required|in:blue,green,yellow,red,purple,orange,pink,gray,indigo,teal',
                'questions' => 'required|array',
                'questions.*.question' => 'required|string',
                'questions.*.options' => 'required|array',
                'questions.*.options.*' => 'required|string',
                'questions.*.correct_answer' => 'required|in:A,B,C,D',
            ]);

            $exercise = Exercise::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'icon' => $validated['icon'],
                'color' => $validated['color'],
                'is_active' => true,
                'total_question' => count($validated['questions'])
            ]);

            ExerciseList::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'icon' => $validated['icon'],
                'color' => $validated['color'],
                'is_active' => true,
                'order' => ExerciseList::max('order') + 1 
            ]);

            // Create questions
            foreach ($validated['questions'] as $questionData) {
                Question::create([
                    'exercise_id' => $exercise->id,
                    'question' => $questionData['question'],
                    'options' => $questionData['options'],
                    'correct_answer' => $questionData['correct_answer'],
                ]);
            }

            DB::commit();

            return redirect()->route('admin.exercises.index')
                ->with('success', 'Latihan berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Exercise $exercise)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'required|string',
                'color' => 'required|string',
                'questions' => 'required|array|min:1',
                'questions.*.question' => 'required|string',
                'questions.*.options' => 'required|array',
                'questions.*.correct_answer' => 'required|string'
            ]);

            $originalTitle = $exercise->title;

            // Update exercise
            $exercise->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'icon' => $validated['icon'],
                'color' => $validated['color'],
                'total_question' => count($validated['questions'])
            ]);

            $exercise->questions()->delete();

            foreach ($validated['questions'] as $questionData) {
                $exercise->questions()->create([
                    'question' => $questionData['question'],
                    'options' => $questionData['options'],
                    'correct_answer' => $questionData['correct_answer'],
                ]);
            }

            $exerciseList = ExerciseList::where('title', $originalTitle)->first();
            if ($exerciseList) {
                $exerciseList->update([
                    'title' => $validated['title'],
                    'description' => $validated['description'],
                    'icon' => $validated['icon'],
                    'color' => $validated['color'],
                    'is_active' => $exercise->is_active
                ]);
            }

            DB::commit();

            Auth::user()->logActivity(
                'Latihan Diubah',
                "Admin telah mengubah latihan: {$validated['title']}",
                'exercise_updated'
            );

            return redirect()->route('admin.exercises.index')
                ->with('success', 'Latihan berhasil diubah!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Exercise $exercise)
    {
        try {
            DB::beginTransaction();

            $exerciseList = ExerciseList::where('title', $exercise->title)->first();
            if ($exerciseList) {
                $exerciseList->delete();
            }

            $exercise->questions()->delete();
            $exercise->delete();

            DB::commit();

            Auth::user()->logActivity(
                'Latihan Dihapus',
                "Admin telah menghapus latihan: {$exercise->title}",
                'exercise_deleted'
            );

            $this->sendNotification(
                'Latihan Dihapus',
                "Latihan telah dihapus: {$exercise->title}",
                'exercise_deleted',
                'fa-trash',
                'red'
            );

            return redirect()->route('admin.exercises.index')->with('success', 'Latihan berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus latihan: ' . $e->getMessage());
        }
    }

    public function toggleStatus(Exercise $exercise)
    {
        try {
            DB::beginTransaction();
            
            $newStatus = !$exercise->is_active;
            
            $exercise->update(['is_active' => $newStatus]);
            
            ExerciseList::where('title', $exercise->title)->update([
                'is_active' => $newStatus
            ]);

            DB::commit();

            Auth::user()->logActivity(
                'Status Latihan Diubah',
                "Admin telah mengubah status latihan: {$exercise->title}",
                'exercise_status_updated'
            );

            return response()->json([
                'success' => true,
                'status' => $newStatus,
                'message' => $newStatus ? 'Latihan diaktifkan.' : 'Latihan dinonaktifkan.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getData(Exercise $exercise)
    {
        return response()->json($exercise->load('questions'));
    }
}