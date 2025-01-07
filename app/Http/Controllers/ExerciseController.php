<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseList;
use App\Models\UserExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercise_lists = ExerciseList::where('is_active', true)
            ->orderBy('order')
            ->get();

        $completedExercises = UserExercise::where('user_id', Auth::id())->count();
        $bestScore = UserExercise::where('user_id', Auth::id())->max('score') ?? 0;

        return view('pages.latihan', compact('exercise_lists', 'completedExercises', 'bestScore'));
    }

    public function showSection(ExerciseList $section)
    {
        $exercise = Exercise::where('title', $section->title)->first();

        if (!$exercise) {
            abort(404);
        }

        $questions = $exercise->questions()->paginate(5);

        return view('pages.latihan.content', [
            'exercise' => $section,
            'questions' => $questions
        ]);
    }

    public function show(Exercise $exercise)
    {
        $questions = $exercise->questions()->paginate(5);

        return view('pages.latihan.content', [
            'exercise' => $exercise,
            'questions' => $questions
        ]);
    }

    public function completeExercise(Request $request, Exercise $exercise)
    {
        $answers = $request->answers;
        $totalQuestion = count($exercise->questions);
        $correctAnswer = 0;

        foreach ($answers as $questionId => $answer) {
            $question = $exercise->questions()->find($questionId);
            if ($question && $question->correct_answer === $answer) {
                $correctAnswer++;
            }
        }

        $score = ($correctAnswer / $totalQuestion) * 100;

        $userExercise = UserExercise::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'exercise_id' => $exercise->id,
            ],
            [
                'score' => $score,
                'completed_at' => now(),
            ]
        );

        $user = Auth::user();
        $user->logActivity(
            'Latihan Selesai',
            "{$user->name} telah menyelesaikan latihan {$exercise->title} dengan nilai {$score}",
            'exercise_completed'
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Latihan berhasil diselesaikan',
            'score' => $score,
            'correct_answer' => $correctAnswer,
            'total_question' => $totalQuestion,
        ]);
    }
}
