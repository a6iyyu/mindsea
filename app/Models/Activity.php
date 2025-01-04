<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'user_id',
        'created_at'
    ];

    public function getIconAttribute()
    {
        return match($this->type) {
            'user_registered' => 'fa-user-plus',
            'material_added' => 'fa-book',
            'exercise_completed' => 'fa-check-circle',
            'material_completed' => 'fa-graduation-cap',
            default => 'fa-circle-info'
        };
    }

    public function getColorAttribute()
    {
        return match($this->type) {
            'user_registered' => 'blue',
            'material_added' => 'green',
            'exercise_completed' => 'yellow',
            'material_completed' => 'purple',
            default => 'gray'
        };
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
