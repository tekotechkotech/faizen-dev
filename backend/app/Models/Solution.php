<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solution extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "name",
        "slug",
        "short_description",
        "description",
        "logo",
        "thumbnail",
        "cover",
        "status",
        "pricing",
        "url",
        "published_at",
    ];
}
