<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
class CompanySettingController extends Controller {
  public function show() { return response()->json(CompanySetting::find(1) ?? (object)[]); }
}
