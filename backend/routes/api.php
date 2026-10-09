<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{BuildController, SolutionController, ServiceController, ArticleController, HeroController, MediaController, InquiryController, CompanySettingController};

Route::get('/health', fn() => ['ok' => true]);
Route::get('/builds', [BuildController::class, 'index']);
Route::get('/builds/{slug}', [BuildController::class, 'show']);
Route::get('/solutions', [SolutionController::class, 'index']);
Route::get('/solutions/{slug}', [SolutionController::class, 'show']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{slug}', [ServiceController::class, 'show']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{slug}', [ArticleController::class, 'show']);
Route::get('/heros', [HeroController::class, 'index']);
Route::get('/media', [MediaController::class, 'index']);
Route::get('/media/{id}', [MediaController::class, 'show']);
Route::post('/inquiry', [InquiryController::class, 'store'])->middleware('throttle:3,1');
Route::get('/company-settings', [CompanySettingController::class, 'show']);
