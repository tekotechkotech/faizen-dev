<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hero extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "type",
        "reference_id",
        "title_override",
        "description_override",
        "image_override",
        "sort_order",
        "is_active",
        "starts_at",
        "ends_at",
    ];
}
