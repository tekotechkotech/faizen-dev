<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanySettingController extends Controller
{
    public function show()
    {
        return response()->json(CompanySetting::firstOrFail());
    }

    public function update(Request $request)
    {
        $settings = CompanySetting::firstOrFail();
        $data = $request->validate([
            'company_name' => 'sometimes|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|string|max:255',
            'favicon' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_whatsapp' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'socials' => 'nullable|array',
        ]);

        $settings->update($data);
        Log::info('cms.settings.updated', ['user' => $request->user()?->email]);

        return response()->json($settings);
    }
}
