<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthController extends Controller
{
    public function index()
    {
        return response()->json(["ok" => true]);
    }
}
