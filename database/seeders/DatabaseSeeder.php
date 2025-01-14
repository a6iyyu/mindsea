<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Material;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mindsea.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        // User
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('1234')
        ]);

        // Materials
        Material::create([
            'title' => 'Matematika Dasar',
            'description' => 'Pengenalan konsep matematika dasar',
            'color' => 'green',
            'difficulty_level' => 'mudah',
        ]);

        Material::create([
            'title' => 'Ilmu Pengetahuan Alam',
            'description' => 'Pengenalan konsep ilmu pengetahuan alam',
            'color' => 'red',
            'difficulty_level' => 'sulit',
        ]);

        Material::create([
            'title' => 'Ilmu Pengetahuan Sosial',
            'description' => 'Pengenalan konsep ilmu pengetahuan sosial dan kehidupan bermasyarakat',
            'color' => 'yellow',
            'difficulty_level' => 'sedang',
        ]);

        $this->call([
            MaterialContentSeeder::class,
            ExerciseSeeder::class,
        ]);
    }
}