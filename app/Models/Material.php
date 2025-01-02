<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $table = 'materials';

  protected $fillable = [
    'title',
    'description',
    'difficulty_level'
  ];

  public function contents()
  {
    return $this->hasMany(MaterialContent::class);
  }

  public function progress()
  {
    return $this->hasOne(MaterialProgress::class);
  }
}