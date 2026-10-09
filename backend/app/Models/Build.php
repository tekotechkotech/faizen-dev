<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Build extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "title",
        "slug",
        "short_description",
        "description",
        "thumbnail",
        "cover",
        "status",
        "published_at",
    ];
}
