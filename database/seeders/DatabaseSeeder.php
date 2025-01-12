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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mindsea.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

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