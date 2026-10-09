<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Solution;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::whereIn("status", ["AVAILABLE", "BETA", "COMING_SOON"])->get();

        return response()->json($solutions);
    }

    public function show($slug)
    {
        $solution = Solution::where("slug", $slug)->whereIn("status", ["AVAILABLE", "BETA", "COMING_SOON"])->first();

        if (!$solution) {
            return response()->json(["message" => "Solution not found"], 404);
        }

        return response()->json($solution);
    }
}
