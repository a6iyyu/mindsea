<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['title', 'description', 'icon', 'color', 'total_question'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function exerciseList()
    {
        return $this->belongsTo(ExerciseList::class, 'title', 'title');
    }
}