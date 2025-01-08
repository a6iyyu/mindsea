<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExerciseList;
use App\Models\Question;
use DB;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Traits\NotificationHelper;

class ManageExerciseController extends Controller
{
    use NotificationHelper;

    public function index()
    {
        $exercises = ExerciseList::with('exercise.questions')
            ->latest()
            ->paginate(10);
        return view('pages.admin.exercises.index', compact('exercises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'color' => 'required|string',
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|string',
            'questions.*.options' => 'required|array|size:4',
            'questions.*.correct_answer' => 'required|string|size:1'
        ]);

        try {
            DB::beginTransaction();

            $exerciseList = ExerciseList::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'icon' => $validated['icon'],
                'color' => $validated['color'],
                'total_question' => count($validated['questions']),
            ]);

            $exercise = Exercise::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'icon' => $validated['icon'],
                'color' => $validated['color'],
                'total_question' => count($validated['questions'])
            ]);


            foreach ($validated['questions'] as $questionData) {
                Question::create([
                    'exercise_id' => $exercise->id,
                    'question' => $questionData['question'],
                    'options' => $questionData['options'],
                    'correct_answer' => $questionData['correct_answer'],
                ]);
            }

            DB::commit();

            auth()->user()->logActivity(
                'Latihan Baru Ditambahkan',
                "Admin telah membuat latihan baru: {$exerciseList->title}",
                'exercise_created'
            );

            $this->sendNotification(
                'Latihan Baru Tersedia',
                "Latihan baru telah ditambahkan: {$exerciseList->title}",
                'exercise_added',
                'fa-pencil',
                'purple'
            );

            return redirect()->route('admin.exercises.index')
            ->with('success', 'Latihan baru berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat latihan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, ExerciseList $exercise)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
            'color' => 'required|string',
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|string',
            'questions.*.options' => 'required|array|size:4',
            'questions.*.correct_answer' => 'required|string|size:1'
        ]);

        try {
            DB::beginTransaction();

            $exerciseModel = Exercise::where('title', $exercise->title)->first();
            
            if (!$exerciseModel) {
                throw new \Exception('Exercise not found');
            }

            $exerciseModel->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'icon' => $validated['icon'],
                'color' => $validated['color'],
                'total_question' => count($validated['questions']),
            ]);

            $exercise->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'icon' => $validated['icon'],
                'color' => $validated['color'],
            ]);

            $exerciseModel->questions()->delete();
            foreach ($validated['questions'] as $questionData) {
                Question::create([
                    'exercise_id' => $exerciseModel->id,
                    'question' => $questionData['question'],
                    'options' => $questionData['options'],
                    'correct_answer' => $questionData['correct_answer'],
                ]);
            }

            DB::commit();

            auth()->user()->logActivity(
                'Latihan Diubah',
                "Admin telah mengubah latihan: {$validated['title']}",
                'exercise_updated'
            );

            $this->sendNotification(
                'Latihan Diperbarui',
                "Latihan telah diperbarui: {$validated['title']}",
                'exercise_updated',
                'fa-edit',
                'blue'
            );

            return redirect()->route('admin.exercises.index')
                ->with('success', 'Latihan berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengubah latihan: ' . $e->getMessage());
        }
    }

    public function destroy(ExerciseList $exercise)
    {
        try {
            DB::beginTransaction();

            $exerciseModel = Exercise::where('title', $exercise->title)->first();
            if ($exerciseModel) {
                $exerciseModel->questions()->delete();
                $exerciseModel->delete();
            }

            $exercise->delete();
            DB::commit();

            auth()->user()->logActivity(
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

            return redirect()->route('admin.exercises.index')
            ->with('success', 'Latihan berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus latihan: ' . $e->getMessage());
        }
    }
}

