<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where("status", "ACTIVE")->get();

        return response()->json($services);
    }

    public function show($slug)
    {
        $service = Service::where("slug", $slug)->where("status", "ACTIVE")->first();

        if (!$service) {
            return response()->json(["message" => "Service not found"], 404);
        }

        return response()->json($service);
    }
}
