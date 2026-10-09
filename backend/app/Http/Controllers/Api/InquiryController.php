<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
class InquiryController extends Controller {
  public function store(Request $r) {
    $v = $r->validate([
      'intent' => 'required|in:existing,custom,partnership,other',
      'name' => 'required|string|min:2|max:100',
      'contact_type' => 'required|in:email,whatsapp',
      'contact_value' => 'required|string|max:255',
      'brief_description' => 'required|string|min:10|max:2000',
    ]);
    if ($v['contact_type'] === 'email' && !filter_var($v['contact_value'], FILTER_VALIDATE_EMAIL)) {
      return response()->json(['message' => 'Invalid email'], 422);
    }
    $inq = Inquiry::create($v);
    return response()->json(['id' => $inq->id], 201);
  }
}
