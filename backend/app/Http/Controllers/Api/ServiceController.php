<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
class ServiceController extends Controller {
  public function index(Request $r) {
    $q = \App\Models\Service::query();
    return response()->json($q->paginate(12));
  }
  public function show($slug) { $m = \App\Models\Service::where('slug',$slug)->where('status','ACTIVE')->firstOrFail(); return response()->json($m); }
}
