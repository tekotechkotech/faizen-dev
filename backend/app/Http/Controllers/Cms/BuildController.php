<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BuildController extends Controller
{
    public function index()
    {
        return response()->json(Build::latest()->paginate(15));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:builds,slug',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string|max:255',
            'cover' => 'nullable|string|max:255',
            'status' => 'required|in:DRAFT,PUBLISHED,ARCHIVED',
            'published_at' => 'nullable|date',
        ]);

        $build = Build::create($data);
        Log::info('cms.build.created', ['user' => $request->user()?->email, 'id' => $build->id]);

        return response()->json($build, 201);
    }

    public function show($id)
    {
        return response()->json(Build::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $build = Build::findOrFail($id);
        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:builds,slug,' . $build->id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string|max:255',
            'cover' => 'nullable|string|max:255',
            'status' => 'sometimes|in:DRAFT,PUBLISHED,ARCHIVED',
            'published_at' => 'nullable|date',
        ]);

        $build->update($data);
        Log::info('cms.build.updated', ['user' => $request->user()?->email, 'id' => $build->id]);

        return response()->json($build);
    }

    public function destroy(Request $request, $id)
    {
        $build = Build::findOrFail($id);
        $build->delete();
        Log::info('cms.build.deleted', ['user' => $request->user()?->email, 'id' => $id]);

        return response()->json(['message' => 'Deleted']);
    }
}
