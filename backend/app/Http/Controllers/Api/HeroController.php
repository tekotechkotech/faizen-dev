<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
class HeroController extends Controller {
  public function index() {
    $now = now();
    $q = HeroSlide::query()->where('is_active', true)
      ->where(fn($w) => $w->whereNull('starts_at')->orWhere('starts_at','<=',$now))
      ->where(fn($w) => $w->whereNull('ends_at')->orWhere('ends_at','>',$now));
    return response()->json($q->get());
  }
}
