<?php
namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {
  public function login(Request $r) {
    $c = $r->validate(['email' => 'required|email', 'password' => 'required|string']);
    if (!Auth::attempt($c, $r->boolean('remember'))) return response()->json(['message' => 'Invalid credentials'], 422);
    $r->session()->regenerate();
    return response()->json(['ok' => true]);
  }
  public function logout(Request $r) { Auth::logout(); $r->session()->invalidate(); $r->session()->regenerateToken(); return response()->json(['ok' => true]); }
}
