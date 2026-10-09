<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Media;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            Media::query()->latest()->paginate($request->integer('per_page', 15))
        );
    }

    public function show($id)
    {
        $media = Media::find($id);

        if (!$media) {
            return response()->json(["message" => "Media not found"], 404);
        }

        return response()->json($media);
    }
}
