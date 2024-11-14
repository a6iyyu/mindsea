<?php

namespace Database\Seeders;

use App\Models\MaterialContent;
use Illuminate\Database\Seeder;

class MaterialContentSeeder extends Seeder
{
    public function run()
    {
        $contents = [
            [
                'material_id' => 1,
                'section_type' => 'pengenalan',
                'title' => 'Pengenalan Matematika Dasar',
                'content' => '<div class="space-y-6">
                    <p>Hai teman-teman! 👋 Hari ini kita akan belajar matematika dasar yang sangat menyenangkan.</p>
                    <p>Di sini kita akan belajar:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Mengenal angka 1-10</li>
                        <li>Belajar menghitung benda-benda</li>
                        <li>Bermain dengan angka</li>
                    </ul>
                    <p>Siap untuk petualangan matematika yang seru? 🚀</p>
                </div>',
                'audio_text' => 'Hai teman-teman! Hari ini kita akan belajar matematika dasar yang sangat menyenangkan.'
            ],
            [
                'material_id' => 1,
                'section_type' => 'materi_utama',
                'title' => 'Mengenal Angka 1-10',
                'content' => '<div class="space-y-6">
                    <p>Mari kita belajar mengenal angka dari 1 sampai 10! 🔢</p>
                    
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-blue-700 mb-3">Angka 1️⃣</h3>
                        <p>Satu seperti matahari di langit ☀️</p>
                    </div>
                    
                    <div class="bg-green-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-green-700 mb-3">Angka 2️⃣</h3>
                        <p>Dua seperti sepasang sepatu 👟👟</p>
                    </div>
                    
                    <div class="bg-purple-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-purple-700 mb-3">Angka 3️⃣</h3>
                        <p>Tiga seperti balon warna-warni 🎈🎈🎈</p>
                    </div>
                </div>',
                'audio_text' => 'Mari kita belajar mengenal angka dari satu sampai sepuluh!'
            ],
            [
                'material_id' => 1,
                'section_type' => 'latihan',
                'title' => 'Latihan Mengenal Angka',
                'content' => '<div class="space-y-6">
                    <p>Ayo berlatih mengenal angka! ✏️</p>
                    
                    <div class="bg-yellow-50 p-4 rounded-xl mb-4">
                        <h3 class="text-lg font-bold text-yellow-700 mb-2">Soal 1</h3>
                        <p>Berapa jumlah apel di gambar ini? 🍎🍎🍎</p>
                        <div class="mt-3 space-x-4">
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-yellow-100">2</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-yellow-100">3</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-yellow-100">4</button>
                        </div>
                    </div>
                    
                    <div class="bg-pink-50 p-4 rounded-xl">
                        <h3 class="text-lg font-bold text-pink-700 mb-2">Soal 2</h3>
                        <p>Berapa jumlah balon di gambar ini? 🎈🎈</p>
                        <div class="mt-3 space-x-4">
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-pink-100">1</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-pink-100">2</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-pink-100">3</button>
                        </div>
                    </div>
                </div>',
                'audio_text' => 'Ayo berlatih mengenal angka! Pilih jawaban yang benar ya!'
            ],
        ];

        foreach ($contents as $content) {
            MaterialContent::create($content);
        }
    }
}

// php artisan db:seed --class=MaterialContentSeeder