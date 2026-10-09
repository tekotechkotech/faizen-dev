<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "title",
        "slug",
        "short_description",
        "description",
        "cover",
        "status",
    ];
}
