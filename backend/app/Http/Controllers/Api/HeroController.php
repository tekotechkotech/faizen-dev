<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hero;

class HeroController extends Controller
{
    public function index()
    {
        $heros = Hero::where("is_active", true)
            ->whereNotNull("starts_at")
            ->whereNotNull("ends_at")
            ->where("starts_at", "<=", now())
            ->where("ends_at", ">=", now())
            ->get();

        return response()->json($heros);
    }
}
