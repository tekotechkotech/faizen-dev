<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\AuthController;
use App\Http\Controllers\Cms\BuildController;
use App\Http\Controllers\Cms\SolutionController;
use App\Http\Controllers\Cms\ServiceController;
use App\Http\Controllers\Cms\ArticleController;
use App\Http\Controllers\Cms\HeroController;
use App\Http\Controllers\Cms\MediaController;
use App\Http\Controllers\Cms\InquiryController;
use App\Http\Controllers\Cms\CompanySettingController;
use App\Http\Controllers\Cms\DashboardController;

/* Public auth (session). Rate-limited. */
Route::get('login', fn () => response()->json(['message' => 'Unauthenticated.'], 401))->name('login');
Route::post('cms/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('cms/logout', [AuthController::class, 'logout']);

/* Protected CMS (session auth + ADMIN gate). */
Route::middleware(['auth', 'can:cms-access'])->group(function () {
    Route::get('cms/dashboard', [DashboardController::class, 'index']);

    Route::apiResource('cms/builds', BuildController::class);
    Route::apiResource('cms/solutions', SolutionController::class);
    Route::apiResource('cms/services', ServiceController::class);
    Route::apiResource('cms/articles', ArticleController::class);
    Route::apiResource('cms/heros', HeroController::class);

    Route::get('cms/media', [MediaController::class, 'index']);
    Route::post('cms/media', [MediaController::class, 'store']);
    Route::delete('cms/media/{id}', [MediaController::class, 'destroy']);

    Route::get('cms/inquiries', [InquiryController::class, 'index']);
    Route::patch('cms/inquiries/{id}', [InquiryController::class, 'update']);

    Route::get('cms/settings', [CompanySettingController::class, 'show']);
    Route::put('cms/settings', [CompanySettingController::class, 'update']);
});
