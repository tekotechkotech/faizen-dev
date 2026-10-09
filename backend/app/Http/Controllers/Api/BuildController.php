<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Build;
use Illuminate\Http\Request;
class BuildController extends Controller {
  public function index(Request $r) {
    $q = Build::query()->where('status','AVAILABLE');
    if ($s = $r->query('search')) $q->where('title','like',"%$s%");
    return response()->json($q->paginate(12));
  }
  public function show($slug) {
    $b = Build::where('slug',$slug)->where('status','AVAILABLE')->firstOrFail();
    return response()->json($b);
  }
}
