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
            if (!$request->has('message')) {
                return response()->json([
                    'error' => 'Pesan tidak boleh kosong'
                ], 400);
            }

            $message = $request->input('message');
            $conversationId = $request->input('conversation_id', Str::uuid());
            
            // Store user message
            ChatMessage::create([
                'user_id' => auth()->id(),
                'role' => 'user',
                'content' => $message,
                'conversation_id' => $conversationId
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type' => 'application/json'
            ])->post('https://api.groq.com/v1/chat/completions', [
                'model' => 'mixtral-8x7b-32768',
                'messages' => $this->getConversationHistory($conversationId),
                'temperature' => 0.7,
                'max_tokens' => 1000,
            ]);

            $assistantResponse = $response->json()['choices'][0]['message']['content'];

            // Store assistant response
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
            \Log::error('Chat Error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan saat memproses permintaan'
            ], 500);
        }
    }

    private function getConversationHistory($conversationId)
    {
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
                'content' => 'Kamu adalah asisten pembelajaran yang membantu siswa berkebutuhan khusus. Berikan jawaban yang sederhana, jelas, dan mudah dipahami. Gunakan bahasa yang ramah dan positif.'
            ]
        ], $messages);
    }
}
