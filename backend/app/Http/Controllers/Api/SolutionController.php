<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
class SolutionController extends Controller {
  public function index(Request $r) {
    $q = \App\Models\Solution::query();
    return response()->json($q->paginate(12));
  }
  public function show($slug) { $m = \App\Models\Solution::where('slug',$slug)->where('status','AVAILABLE')->firstOrFail(); return response()->json($m); }
}
