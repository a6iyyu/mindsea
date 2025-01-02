<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialContent extends Model
{
  protected $table = 'material_contents';

  protected $fillable = [
    'material_id',
    'section_type',
    'title',
    'content',
    'audio_text'
  ];

  public function material()
  {
    return $this->belongsTo(Material::class, 'material_id');
  }
}