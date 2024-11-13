<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Exercise extends Model
{
    protected $fillable = ['title', 'description', 'total_question'];

    public function userExercises(): HasMany
    {
        return $this->hasMany(UserExercise::class);
    }
}
