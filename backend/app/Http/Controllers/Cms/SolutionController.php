<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SolutionController extends Controller
{
    public function index()
    {
        return response()->json(Solution::latest()->paginate(15));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:solutions,slug',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|string|max:255',
            'cover' => 'nullable|string|max:255',
            'status' => 'required|in:DRAFT,COMING_SOON,BETA,AVAILABLE,ARCHIVED',
            'pricing' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'published_at' => 'nullable|date',
        ]);

        $solution = Solution::create($data);
        Log::info('cms.solution.created', ['user' => $request->user()?->email, 'id' => $solution->id]);

        return response()->json($solution, 201);
    }

    public function show($id)
    {
        return response()->json(Solution::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $solution = Solution::findOrFail($id);
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:solutions,slug,' . $solution->id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|string|max:255',
            'cover' => 'nullable|string|max:255',
            'status' => 'sometimes|in:DRAFT,COMING_SOON,BETA,AVAILABLE,ARCHIVED',
            'pricing' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'published_at' => 'nullable|date',
        ]);

        $solution->update($data);
        Log::info('cms.solution.updated', ['user' => $request->user()?->email, 'id' => $solution->id]);

        return response()->json($solution);
    }

    public function destroy(Request $request, $id)
    {
        Solution::findOrFail($id)->delete();
        Log::info('cms.solution.deleted', ['user' => $request->user()?->email, 'id' => $id]);

        return response()->json(['message' => 'Deleted']);
    }
}
