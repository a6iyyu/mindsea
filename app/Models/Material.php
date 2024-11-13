<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $fillable = ['title', 'description', 'difficulty_level'];

    public function userMaterials(): HasMany
    {
        return $this->hasMany(UserMaterial::class);
    }
}
