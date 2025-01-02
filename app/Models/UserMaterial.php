<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMaterial extends Model
{
  protected $fillable = ['user_id', 'material_id', 'status', 'completed_at'];

  protected $casts = [
    'completed_at' => 'datetime',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function material(): BelongsTo
  {
    return $this->belongsTo(Material::class);
  }
}