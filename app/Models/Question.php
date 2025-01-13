<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $fillable = [
        'exercise_id',
        'question',
        'options',
        'correct_answer',
        'image_path'
    ];
    protected $casts = ['options' => 'array'];

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }
}