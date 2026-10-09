<?php
namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ServiceController extends Controller {
  public function __call($m, $a) { return response()->json(['todo' => 'Service.'.$m]); }
}
