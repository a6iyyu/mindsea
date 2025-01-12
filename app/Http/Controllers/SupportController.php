<?php

namespace App\Http\Controllers;

class SupportController extends Controller
{
    public function show($category)
    {
        $helpContent = [
            'panduan-belajar' => [
                'title' => 'Panduan Belajar',
                'icon' => 'fa-book',
                'color' => 'blue',
                'sections' => [
                    [
                        'title' => 'Cara Memulai Pembelajaran',
                        'content' => 'Pilih materi yang ingin Anda pelajari, kemudian klik tombol "Mulai Belajar" untuk memulai pembelajaran.'
                    ],
                    [
                        'title' => 'Menggunakan Fitur Text to Speech',
                        'content' => 'Klik tombol speaker di setiap materi untuk mendengarkan konten dalam bentuk audio.'
                    ],
                    [
                        'title' => 'Melihat Progres Belajar',
                        'content' => 'Kunjungi halaman Progres Belajar untuk melihat pencapaian dan kemajuan pembelajaran Anda.'
                    ]
                ]
            ],
            'pengaturan-akun' => [
                'title' => 'Pengaturan Akun',
                'icon' => 'fa-gear',
                'color' => 'green',
                'sections' => [
                    [
                        'title' => 'Mengubah Profil',
                        'content' => 'Kunjungi halaman Preferensi untuk mengubah informasi profil, foto, dan pengaturan pembelajaran.'
                    ],
                    [
                        'title' => 'Mengubah Password',
                        'content' => 'Untuk keamanan akun, ubah password Anda secara berkala melalui menu Pengaturan Akun.'
                    ],
                    [
                        'title' => 'Mengelola Notifikasi',
                        'content' => 'Atur preferensi notifikasi untuk mendapatkan informasi pembelajaran yang relevan.'
                    ]
                ]
            ],
            'keamanan' => [
                'title' => 'Keamanan',
                'icon' => 'fa-shield',
                'color' => 'red',
                'sections' => [
                    [
                        'title' => 'Tips Keamanan Akun',
                        'content' => 'Gunakan password yang kuat, jangan bagikan informasi akun, dan logout setelah selesai menggunakan platform.'
                    ],
                    [
                        'title' => 'Kebijakan Privasi',
                        'content' => 'Kami menjaga kerahasiaan data pribadi Anda sesuai dengan kebijakan privasi yang berlaku.'
                    ]
                ]
            ],
            'faq' => [
                'title' => 'FAQ',
                'icon' => 'fa-message',
                'color' => 'yellow',
                'sections' => [
                    [
                        'title' => 'Bagaimana cara menggunakan fitur Text to Speech?',
                        'content' => 'Klik ikon speaker yang tersedia di setiap materi untuk mendengarkan konten dalam bentuk audio.'
                    ],
                    [
                        'title' => 'Bagaimana jika lupa password?',
                        'content' => 'Klik "Lupa Password" pada halaman login dan ikuti instruksi yang diberikan untuk mereset password Anda.'
                    ],
                    [
                        'title' => 'Apakah bisa mengakses materi secara offline?',
                        'content' => 'Saat ini materi hanya bisa diakses secara online. Pastikan Anda memiliki koneksi internet yang stabil.'
                    ]
                ]
            ],
            'kontak-support' => [
                'title' => 'Kontak Support',
                'icon' => 'fa-headset',
                'color' => 'purple',
                'sections' => [
                    [
                        'title' => 'Email Support',
                        'content' => 'Hubungi kami melalui email di support@mindsea.com untuk bantuan lebih lanjut.'
                    ],
                    [
                        'title' => 'WhatsApp Support',
                        'content' => 'Tim kami siap membantu Anda melalui WhatsApp di nomor +62 812 3456 7890.'
                    ],
                    [
                        'title' => 'Jam Operasional',
                        'content' => 'Layanan support tersedia 24/7 untuk membantu Anda.'
                    ]
                ]
            ],
            'informasi-platform' => [
                'title' => 'Informasi Platform',
                'icon' => 'fa-circle-info',
                'color' => 'orange',
                'sections' => [
                    [
                        'title' => 'Tentang mindsea',
                        'content' => 'mindsea adalah platform pembelajaran yang dirancang khusus untuk membantu Anak Berkebutuhan Khusus dalam belajar.'
                    ],
                    [
                        'title' => 'Fitur Utama',
                        'content' => 'Text to Speech, Materi Interaktif, Latihan Soal, Progress Tracking, dan Chatbot Asisten.'
                    ],
                    [
                        'title' => 'Pembaruan Platform',
                        'content' => 'Kami terus mengembangkan platform dengan fitur-fitur baru untuk pengalaman belajar yang lebih baik.'
                    ]
                ]
            ]
        ];

        $content = $helpContent[$category] ?? abort(404);

        return view('pages.dukungan.category', compact('content'));
    }
}