<?php
namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use App\Models\{Build, Solution, Inquiry};
class DashboardController extends Controller {
  public function index() {
    return response()->json([
      'builds' => Build::count(), 'solutions' => Solution::count(),
      'inquiries_new' => Inquiry::where('status','new')->count(),
    ]);
  }
}
