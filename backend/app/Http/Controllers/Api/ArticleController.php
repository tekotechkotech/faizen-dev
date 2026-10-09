<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
class ArticleController extends Controller {
  public function index(Request $r) {
    $q = \App\Models\Article::query();
    return response()->json($q->paginate(12));
  }
  public function show($slug) { $m = \App\Models\Article::where('slug',$slug)->where('status','PUBLISHED')->firstOrFail(); return response()->json($m); }
}
