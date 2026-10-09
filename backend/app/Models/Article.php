<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "title",
        "slug",
        "excerpt",
        "cover",
        "content",
        "category",
        "author",
        "status",
        "published_at",
    ];
}
