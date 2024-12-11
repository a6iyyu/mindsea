<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\ExerciseList;
use App\Models\Question;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $exerciseList = ExerciseList::create([
            'title' => 'Matematika Dasar',
            'description' => 'Latihan soal matematika dasar',
            'icon' => 'fa-calculator',
            'color' => 'blue',
        ]);

        $exercise = Exercise::create([
            'title' => 'Matematika Dasar',
            'description' => 'Latihan soal matematika dasar',
            'icon' => 'fa-calculator',
            'color' => 'blue',
            'total_question' => 1
        ]);

        Question::create([
            'exercise_id' => $exercise->id,
            'question' => 'Berapakah hasil dari 5 + 3?',
            'options' => [
                'A' => '6',
                'B' => '7',
                'C' => '8',
                'D' => '9'
            ],
            'correct_answer' => 'C'
        ]);
    }
}
