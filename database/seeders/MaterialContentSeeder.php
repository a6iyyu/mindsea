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
            [
                'material_id' => 2,
                'section_type' => 'pengenalan',
                'title' => 'Mengenal Bagian Tumbuhan',
                'content' => '<div class="space-y-6">
                    <p>Yuk, kita kenali bagian-bagian tumbuhan dan fungsinya! 🌱</p>
                    
                    <div class="bg-green-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-green-700 mb-3">Akar</h3>
                        <p>Akar berfungsi menyerap air dan nutrisi dari tanah. 🌳</p>
                    </div>
                    
                    <div class="bg-yellow-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-yellow-700 mb-3">Batang</h3>
                        <p>Batang berfungsi mengalirkan air dan nutrisi ke seluruh bagian tumbuhan. 🌿</p>
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-blue-700 mb-3">Daun</h3>
                        <p>Daun berfungsi sebagai tempat fotosintesis, yaitu proses pembuatan makanan pada tumbuhan. 🍃</p>
                    </div>
                </div>',
                'audio_text' => 'Mari kita mengenal bagian-bagian tumbuhan, seperti akar, batang, dan daun!'
            ],
            [
                'material_id' => 2,
                'section_type' => 'materi_utama',
                'title' => 'Mengenal Hewan di Sekitar Kita',
                'content' => '<div class="space-y-6">
                    <p>Mari kita mengenal berbagai hewan yang ada di sekitar kita! 🐶🐱🐰</p>
                    
                    <div class="bg-red-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-red-700 mb-3">Kucing</h3>
                        <p>Kucing adalah hewan peliharaan yang lucu dan menggemaskan. 🐱</p>
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-blue-700 mb-3">Anjing</h3>
                        <p>Anjing adalah sahabat manusia yang setia. 🐶</p>
                    </div>
                    
                    <div class="bg-yellow-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-yellow-700 mb-3">Kelinci</h3>
                        <p>Kelinci memiliki telinga yang panjang dan suka melompat. 🐰</p>
                    </div>
                </div>',
                'audio_text' => 'Mari kita mengenal hewan-hewan seperti kucing, anjing, dan kelinci!'
            ],
            [
                'material_id' => 2,
                'section_type' => 'latihan',
                'title' => 'Latihan Bagian Tumbuhan',
                'content' => '<div class="space-y-6">
                    <p>Mari berlatih tentang bagian tumbuhan! 🌼</p>
                    
                    <div class="bg-purple-50 p-4 rounded-xl mb-4">
                        <h3 class="text-lg font-bold text-purple-700 mb-2">Soal 1</h3>
                        <p>Bagian tumbuhan yang berfungsi menyerap air adalah... 💧</p>
                        <div class="mt-3 space-x-4">
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-purple-100">Akar</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-purple-100">Batang</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-purple-100">Daun</button>
                        </div>
                    </div>
                    
                    <div class="bg-red-50 p-4 rounded-xl">
                        <h3 class="text-lg font-bold text-red-700 mb-2">Soal 2</h3>
                        <p>Fotosintesis terjadi di bagian... ☀️</p>
                        <div class="mt-3 space-x-4">
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-red-100">Akar</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-red-100">Batang</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-red-100">Daun</button>
                        </div>
                    </div>
                </div>',
                'audio_text' => 'Ayo berlatih tentang bagian tumbuhan! Pilih jawaban yang benar ya!'
            ],
            [
                'material_id' => 3,
                'section_type' => 'pengenalan',
                'title' => 'Mengenal Keluarga',
                'content' => '<div class="space-y-6">
                    <p>Mari kita belajar tentang anggota keluarga! 👨‍👩‍👧‍👦</p>
                    
                    <div class="bg-pink-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-pink-700 mb-3">Ayah</h3>
                        <p>Ayah adalah kepala keluarga. 💪</p>
                    </div>
                    
                    <div class="bg-indigo-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-indigo-700 mb-3">Ibu</h3>
                        <p>Ibu adalah orang yang melahirkan kita. ❤️</p>
                    </div>
                    
                    <div class="bg-teal-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-teal-700 mb-3">Anak</h3>
                        <p>Anak adalah buah hati ayah dan ibu. 😊</p>
                    </div>
                </div>',
                'audio_text' => 'Mari kita mengenal anggota keluarga, seperti ayah, ibu, dan anak!'
            ],
            [
                'material_id' => 3,
                'section_type' => 'materi_utama',
                'title' => 'Kehidupan Bermasyarakat',
                'content' => '<div class="space-y-6">
                    <p>Mari kita pelajari tentang kehidupan bermasyarakat dan bagaimana kita berinteraksi dengan orang lain! 🤝</p>
                    
                    <div class="bg-yellow-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-yellow-700 mb-3">Kerjasama</h3>
                        <p>Kerjasama adalah kunci untuk mencapai tujuan bersama. 🤲</p>
                    </div>
                    
                    <div class="bg-green-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-green-700 mb-3">Toleransi</h3>
                        <p>Toleransi penting untuk hidup berdampingan dengan damai. 😊</p>
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded-xl">
                        <h3 class="text-xl font-bold text-blue-700 mb-3">Saling Menghormati</h3>
                        <p>Menghormati perbedaan adalah dasar dari masyarakat yang harmonis. 💖</p>
                    </div>
                </div>',
                'audio_text' => 'Mari kita belajar tentang kehidupan bermasyarakat, termasuk kerjasama, toleransi, dan saling menghormati!'
            ],
            [
                'material_id' => 3,
                'section_type' => 'latihan',
                'title' => 'Latihan Anggota Keluarga',
                'content' => '<div class="space-y-6">
                    <p>Mari berlatih tentang anggota keluarga! 👨‍👩‍👧‍👦</p>
                    
                    <div class="bg-orange-50 p-4 rounded-xl mb-4">
                        <h3 class="text-lg font-bold text-orange-700 mb-2">Soal 1</h3>
                        <p>Siapa yang disebut kepala keluarga? 🤔</p>
                        <div class="mt-3 space-x-4">
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-orange-100">Ayah</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-orange-100">Ibu</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-orange-100">Anak</button>
                        </div>
                    </div>
                    
                    <div class="bg-lime-50 p-4 rounded-xl">
                        <h3 class="text-lg font-bold text-lime-700 mb-2">Soal 2</h3>
                        <p>Siapa yang melahirkan kita? ❤️</p>
                        <div class="mt-3 space-x-4">
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-lime-100">Ayah</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-lime-100">Ibu</button>
                            <button class="px-4 py-2 bg-white rounded-lg hover:bg-lime-100">Anak</button>
                        </div>
                    </div>
                </div>',
                'audio_text' => 'Ayo berlatih tentang anggota keluarga! Pilih jawaban yang benar ya!'
            ],
        ];



        foreach ($contents as $content) {
            MaterialContent::create($content);
        }
    }
}

// php artisan db:seed --class=MaterialContentSeeder