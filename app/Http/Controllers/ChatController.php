<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        try {
            // Debug incoming request
            \Log::info('Chat request received', [
                'message' => $request->input('message'),
                'conversation_id' => $request->input('conversation_id')
            ]);

            // Validate request
            $validated = $request->validate([
                'message' => 'required|string|max:1000',
                'conversation_id' => 'nullable|string'
            ]);

            // Check if user is authenticated (if required)
            if (!auth()->check()) {
                throw new \Exception('Silakan login terlebih dahulu.');
            }

            $message = $validated['message'];
            $conversationId = $validated['conversation_id'] ?? Str::uuid();

            // Debug API key
            if (!env('GROQ_API_KEY')) {
                \Log::error('GROQ API key is missing');
                throw new \Exception('Konfigurasi API tidak ditemukan.');
            }

            // Store user message
            try {
                $chatMessage = ChatMessage::create([
                    'user_id' => auth()->id(),
                    'role' => 'user',
                    'content' => $message,
                    'conversation_id' => $conversationId
                ]);

                \Log::info('User message stored', ['message_id' => $chatMessage->id]);

            } catch (\Exception $e) {
                \Log::error('Database Error: ' . $e->getMessage());
                throw new \Exception('Gagal menyimpan pesan ke database.');
            }

            try {
                // Make API request with error handling
                $response = Http::timeout(30)
                    ->withHeaders([
                        'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                        'Content-Type' => 'application/json'
                    ])
                    ->post('https://api.groq.com/openai/v1/chat/completions', [
                        'model' => 'llama3-8b-8192',
                        'messages' => $this->getConversationHistory($conversationId),
                        'temperature' => 0.7,
                        'max_tokens' => 1000,
                    ]);

                if (!$response->successful()) {
                    \Log::error('API Error Response', [
                        'status' => $response->status(),
                        'body' => $response->body()
                    ]);
                    throw new \Exception('API Error: ' . $response->body());
                }

                $assistantResponse = $response->json()['choices'][0]['message']['content'];

                // Store AI response
                ChatMessage::create([
                    'user_id' => auth()->id(),
                    'role' => 'assistant',
                    'content' => $assistantResponse,
                    'conversation_id' => $conversationId
                ]);

                return response()->json([
                    'response' => $assistantResponse,
                    'conversation_id' => $conversationId
                ]);

            } catch (\Exception $e) {
                \Log::error('API Request Error: ' . $e->getMessage());
                throw new \Exception('Gagal berkomunikasi dengan AI: ' . $e->getMessage());
            }

        } catch (\Exception $e) {
            \Log::error('Chat Controller Error: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function getConversationHistory($conversationId)
    {
        try {
            $messages = ChatMessage::where('conversation_id', $conversationId)
                ->orderBy('created_at')
                ->get()
                ->map(function ($message) {
                    return [
                        'role' => $message->role,
                        'content' => $message->content
                    ];
                })
                ->toArray();

            return array_merge([
                [
                    'role' => 'system',
                    'content' => "Kamu adalah asisten pembelajaran AI untuk website mindsea, sebuah platform pembelajaran untuk siswa berkebutuhan khusus. Berikut informasi tentang platform:

TENTANG MINDSEA:
- Platform pembelajaran interaktif untuk siswa berkebutuhan khusus
- Motto: 'Mencerdaskan dengan Hati!'
- Fokus pada pembelajaran yang inklusif dan menyenangkan

FITUR UTAMA:
1. Materi Pembelajaran
   - Modul interaktif dengan text-to-speech
   - Konten visual dan audio yang mendukung
   - Dapat diakses dengan tombol 'Dengarkan'

2. Latihan Soal
   - Soal-soal untuk menguji pemahaman
   - Sistem penilaian otomatis
   - Tips pembelajaran setiap hari

3. Progres Belajar
   - Pelacakan kemajuan pembelajaran
   - Penanda materi yang sudah selesai
   - Notifikasi pencapaian

PANDUAN INTERAKSI:
1. Berikan jawaban yang sederhana dan mudah dipahami
2. Gunakan bahasa yang ramah, positif, dan mendukung
3. Jika siswa kesulitan, berikan petunjuk bertahap
4. Fokus pada penguatan konsep dasar
5. Berikan apresiasi untuk setiap usaha siswa
6. Jika ada yang tidak dipahami, minta penjelasan dengan sopan
7. Gunakan analogi sederhana dari kehidupan sehari-hari
8. Hindari istilah teknis yang rumit
9. Berikan semangat dan motivasi dalam setiap respons
10. Ingatkan untuk beristirahat jika terlihat kesulitan

BANTUAN NAVIGASI:
- Jika ditanya cara menggunakan fitur, jelaskan dengan detail
- Informasikan tentang fitur text-to-speech untuk membantu pemahaman
- Arahkan ke menu yang sesuai dengan kebutuhan siswa
- Ingatkan tentang fitur bantuan dan dukungan yang tersedia

Selalu prioritaskan pemahaman dan kenyamanan siswa dalam belajar. Jika ada pertanyaan teknis, arahkan ke menu Dukungan untuk bantuan lebih lanjut."
                ]
            ], $messages);

        } catch (\Exception $e) {
            \Log::error('Error getting conversation history: ' . $e->getMessage());
            throw new \Exception('Gagal mengambil riwayat percakapan.');
        }
    }
}
