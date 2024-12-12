<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('1234')
        ]);

        Material::create([
            'title' => 'Matematika Dasar',
            'description' => 'Pengenalan konsep matematika dasar',
            'difficulty_level' => 'mudah',
        ]);

        $this->call([
            ExerciseSeeder::class,
            MaterialContentSeeder::class
        ]);
    }
}