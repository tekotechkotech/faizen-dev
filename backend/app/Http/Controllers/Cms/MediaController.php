<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::all();

        return response()->json($media);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,webp,avif|max:5120',
        ]);

        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();

        // Generate a safe storage name
        $filename = Str::slug(Str::substr($file->getClientOriginalName(), 0, -strlen('.'.$extension))) . '-' . uniqid() . '.' . $extension;

        // Store in storage/app/public/media
        $path = $file->storeAs('media', $filename, 'public');

        // Create media record
        $media = Media::create([
            'filename' => $filename,
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);

        return response()->json([
            'message' => 'Media uploaded successfully.',
            'media' => $media,
        ], 201);
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Delete the file from storage
        Storage::disk('public')->delete($media->path);

        // Delete the media record
        $media->delete();

        return response()->json([
            'message' => 'Media deleted successfully.',
        ]);
    }
}