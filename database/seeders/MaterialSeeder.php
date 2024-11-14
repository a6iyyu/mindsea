<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            [
                'title' => 'Matematika Dasar',
                'description' => 'Belajar konsep dasar matematika dengan cara yang menyenangkan',
                'difficulty_level' => 'mudah',
            ],
            [
                'title' => 'Bahasa Indonesia',
                'description' => 'Pelajari dasar-dasar bahasa Indonesia dengan metode interaktif',
                'difficulty_level' => 'mudah',
            ],
            [
                'title' => 'Sains Dasar',
                'description' => 'Eksplorasi dunia sains melalui eksperimen sederhana',
                'difficulty_level' => 'sedang',
            ],
        ];

        foreach ($materials as $material) {
            Material::create($material);
        }
    }
} 