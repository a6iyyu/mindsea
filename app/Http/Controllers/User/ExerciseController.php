<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
            ->whereHas('exercise', function($query) {
                $query->where('is_active', true);
            })
            ->get();

        $completedExercises = UserExercise::where('user_id', auth()->id())->count();
        $bestScore = UserExercise::where('user_id', auth()->id())->max('score') ?? 0;

        return view('pages.latihan', compact('exercise_lists', 'completedExercises', 'bestScore'));
    }

    public function showSection(ExerciseList $section)
    {
        if (!$section->is_active) {
            abort(404);
        }

        $exercise = Exercise::where('title', $section->title)
            ->where('is_active', true)
            ->first();
        
        if (!$exercise) abort(404);

        $questions = $exercise->questions()->paginate(5);
        $timeLimit = count($questions) * 5;

        return view('pages.latihan.content', [
            'exercise' => $section,
            'questions' => $questions,
            'timeLimit' => $timeLimit
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
            if ($question && $question->correct_answer === $answer) $correctAnswer++;
        }

        $score = ($correctAnswer / $totalQuestion) * 100;

        $existingExercise = UserExercise::where([
            'user_id' => Auth::id(),
            'exercise_id' => $exercise->id,
        ])->first();

        if (!$existingExercise) {
            UserExercise::create([
                'user_id' => Auth::id(),
                'exercise_id' => $exercise->id,
                'score' => $score,
                'completed_at' => now(),
            ]);

            Auth::user()->logActivity(
                'Latihan Selesai',
                '{Auth::user()->name} telah menyelesaikan latihan {$exercise->title} dengan nilai {$score}',
                'exercise_completed'
            );
        }

        $finalScore = $existingExercise ? $existingExercise->score : $score;

        return response()->json([
            'status' => 'success',
            'message' => $existingExercise
                ? 'Latihan selesai. Nilai yang ditampilkan adalah nilai terbaik Anda sebelumnya.'
                : 'Latihan berhasil diselesaikan',
            'score' => $finalScore,
            'correct_answer' => $correctAnswer,
            'total_question' => $totalQuestion,
        ]);
    }
}