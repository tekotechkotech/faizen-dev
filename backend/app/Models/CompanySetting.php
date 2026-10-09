<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySetting extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "company_name",
        "tagline",
        "description",
        "logo",
        "favicon",
        "email",
        "phone_whatsapp",
        "address",
        "socials",
    ];
}
