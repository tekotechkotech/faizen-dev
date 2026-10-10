<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function index()
    {
        return response()->json(Service::latest()->paginate(15));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'cover' => 'nullable|string|max:255',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);

        $service = Service::create($data);
        Log::info('cms.service.created', ['user' => $request->user()?->email, 'id' => $service->id]);

        return response()->json($service, 201);
    }

    public function show($id)
    {
        return response()->json(Service::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:services,slug,' . $service->id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'cover' => 'nullable|string|max:255',
            'status' => 'sometimes|in:ACTIVE,INACTIVE',
        ]);

        $service->update($data);
        Log::info('cms.service.updated', ['user' => $request->user()?->email, 'id' => $service->id]);

        return response()->json($service);
    }

    public function destroy(Request $request, $id)
    {
        Service::findOrFail($id)->delete();
        Log::info('cms.service.deleted', ['user' => $request->user()?->email, 'id' => $id]);

        return response()->json(['message' => 'Deleted']);
    }
}
