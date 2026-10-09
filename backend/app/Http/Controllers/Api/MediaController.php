<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Media;
class MediaController extends Controller {
  public function index() { return response()->json(Media::paginate(24)); }
  public function show($id) { return response()->json(Media::findOrFail($id)); }
}
