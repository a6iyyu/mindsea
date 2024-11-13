<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Exercise;
use App\Models\UserMaterial;
use App\Models\UserExercise;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Material::create([
            'title' => 'Matematika Dasar',
            'description' => 'Pengenalan konsep matematika dasar',
            'difficulty_level' => 'mudah',
        ]);

        Exercise::create([
            'title' => 'Latihan Penjumlahan',
            'description' => 'Latihan soal penjumlahan',
            'total_question' => 10,
        ]);

        UserMaterial::create([
            'user_id' => $user->id,
            'material_id' => 1,
            'status' => 'selesai',
            'completed_at' => now(),
        ]);

        UserExercise::create([
            'user_id' => $user->id,
            'exercise_id' => 1,
            'score' => 90,
            'completed_at' => now(),
        ]);
    }
}