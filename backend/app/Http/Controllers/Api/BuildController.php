<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Build;

class BuildController extends Controller
{
    public function index()
    {
        $builds = Build::where("status", "PUBLISHED")->get();

        return response()->json($builds);
    }

    public function show($slug)
    {
        $build = Build::where("slug", $slug)->where("status", "PUBLISHED")->first();

        if (!$build) {
            return response()->json(["message" => "Build not found"], 404);
        }

        return response()->json($build);
    }
}
