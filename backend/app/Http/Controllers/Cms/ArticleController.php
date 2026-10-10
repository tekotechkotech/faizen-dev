<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
        return response()->json(Article::latest()->paginate(15));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug',
            'excerpt' => 'nullable|string',
            'cover' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'category' => 'required|in:Technical,Business,Product,Insight',
            'author' => 'nullable|string|max:255',
            'status' => 'required|in:DRAFT,PUBLISHED,ARCHIVED',
            'published_at' => 'nullable|date',
        ]);

        $article = Article::create($data);
        Log::info('cms.article.created', ['user' => $request->user()?->email, 'id' => $article->id]);

        return response()->json($article, 201);
    }

    public function show($id)
    {
        return response()->json(Article::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:articles,slug,' . $article->id,
            'excerpt' => 'nullable|string',
            'cover' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'category' => 'sometimes|in:Technical,Business,Product,Insight',
            'author' => 'nullable|string|max:255',
            'status' => 'sometimes|in:DRAFT,PUBLISHED,ARCHIVED',
            'published_at' => 'nullable|date',
        ]);

        $article->update($data);
        Log::info('cms.article.updated', ['user' => $request->user()?->email, 'id' => $article->id]);

        return response()->json($article);
    }

    public function destroy(Request $request, $id)
    {
        Article::findOrFail($id)->delete();
        Log::info('cms.article.deleted', ['user' => $request->user()?->email, 'id' => $id]);

        return response()->json(['message' => 'Deleted']);
    }
}
