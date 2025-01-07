<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseList extends Model
{
  protected $fillable = [
    'title',
    'description',
    'icon',
    'color',
    'order',
    'is_active'
  ];

  protected $casts = [
    'is_active' => 'boolean'
  ];

  public function exercise()
  {
    return $this->hasOne(Exercise::class, 'title', 'title');
  }
}