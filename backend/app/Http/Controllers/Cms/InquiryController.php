<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InquiryController extends Controller
{
    public function index()
    {
        return response()->json(Inquiry::latest()->paginate(15));
    }

    public function update(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $data = $request->validate([
            'status' => 'required|in:NEW,READ,REPLIED,ARCHIVED',
        ]);

        $inquiry->update($data);
        Log::info('cms.inquiry.updated', ['user' => $request->user()?->email, 'id' => $inquiry->id]);

        return response()->json($inquiry);
    }
}
