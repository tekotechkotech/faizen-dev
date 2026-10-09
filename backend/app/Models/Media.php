<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "filename",
        "path",
        "mime_type",
        "size",
        "width",
        "height",
        "alt",
    ];
}
