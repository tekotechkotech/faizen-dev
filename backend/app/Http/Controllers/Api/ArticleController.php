<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where("status", "PUBLISHED")->get();

        return response()->json($articles);
    }

    public function show($slug)
    {
        $article = Article::where("slug", $slug)->where("status", "PUBLISHED")->first();

        if (!$article) {
            return response()->json(["message" => "Article not found"], 404);
        }

        return response()->json($article);
    }
}
