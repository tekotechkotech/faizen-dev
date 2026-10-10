<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HeroController extends Controller
{
    public function index()
    {
        return response()->json(Hero::orderBy('sort_order')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:BUILD,SOLUTION,CUSTOM',
            'reference_id' => 'nullable|integer',
            'title_override' => 'nullable|string|max:255',
            'description_override' => 'nullable|string',
            'image_override' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
        ]);

        $hero = Hero::create($data);
        Log::info('cms.hero.created', ['user' => $request->user()?->email, 'id' => $hero->id]);

        return response()->json($hero, 201);
    }

    public function show($id)
    {
        return response()->json(Hero::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);
        $data = $request->validate([
            'type' => 'sometimes|in:BUILD,SOLUTION,CUSTOM',
            'reference_id' => 'nullable|integer',
            'title_override' => 'nullable|string|max:255',
            'description_override' => 'nullable|string',
            'image_override' => 'nullable|string|max:255',
            'sort_order' => 'sometimes|integer|min:0',
            'is_active' => 'sometimes|boolean',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date',
        ]);

        $hero->update($data);
        Log::info('cms.hero.updated', ['user' => $request->user()?->email, 'id' => $hero->id]);

        return response()->json($hero);
    }

    public function destroy(Request $request, $id)
    {
        Hero::findOrFail($id)->delete();
        Log::info('cms.hero.deleted', ['user' => $request->user()?->email, 'id' => $id]);

        return response()->json(['message' => 'Deleted']);
    }
}
