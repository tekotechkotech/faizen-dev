<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CompanySetting extends Model {
  protected $guarded = ['id'];
  protected $casts = ['features' => 'array', 'social_media' => 'array', 'is_active' => 'boolean'];
}
