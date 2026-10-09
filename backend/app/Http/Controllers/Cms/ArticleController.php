<?php
namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ArticleController extends Controller {
  public function __call($m, $a) { return response()->json(['todo' => 'Article.'.$m]); }
}
