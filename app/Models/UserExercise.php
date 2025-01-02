<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserExercise extends Model
{
  protected $fillable = ['user_id', 'exercise_id', 'score', 'completed_at'];

  protected $casts = [
    'completed_at' => 'datetime',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function exercise(): BelongsTo
  {
    return $this->belongsTo(Exercise::class);
  }
}