<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanySetting;

class CompanySettingController extends Controller
{
    public function show()
    {
        $setting = CompanySetting::first();

        if (!$setting) {
            return response()->json(["message" => "Company setting not found"], 404);
        }

        return response()->json($setting);
    }
}
