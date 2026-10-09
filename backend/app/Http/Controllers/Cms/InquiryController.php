<?php
namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class InquiryController extends Controller {
  public function __call($m, $a) { return response()->json(['todo' => 'Inquiry.'.$m]); }
}
