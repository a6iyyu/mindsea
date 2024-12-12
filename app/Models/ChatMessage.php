<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
        'content',
        'conversation_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 