<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialProgress extends Model
{
    protected $fillable = [
        'user_id',
        'material_id',
        'is_completed',
        'completed_at',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
