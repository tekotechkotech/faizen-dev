<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "contact" => "required|string|max:255",
            "intent" => "required|string|in:EXISTING,CUSTOM,PARTNERSHIP,OTHER",
            "message" => "required|string",
        ]);

        $inquiry = Inquiry::create([
            "name" => $validated["name"],
            "contact" => $validated["contact"],
            "intent" => $validated["intent"],
            "message" => $validated["message"],
            "status" => "NEW",
        ]);

        return response()->json(["message" => "Inquiry submitted successfully", "id" => $inquiry->id], 201);
    }
}
