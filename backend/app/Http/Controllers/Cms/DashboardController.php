<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Build;
use App\Models\Hero;
use App\Models\Inquiry;
use App\Models\Media;
use App\Models\Service;
use App\Models\Solution;
use App\Models\CompanySetting;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'builds' => Build::count(),
            'solutions' => Solution::count(),
            'services' => Service::count(),
            'articles' => Article::count(),
            'heros' => Hero::where('is_active', true)->count(),
            'media' => Media::count(),
            'inquiries_new' => Inquiry::where('status', 'NEW')->count(),
            'inquiries_total' => Inquiry::count(),
            'company_configured' => CompanySetting::exists(),
        ]);
    }
}
