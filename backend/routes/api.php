<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\BuildController;
use App\Http\Controllers\Api\SolutionController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\CompanySettingController;
use App\Http\Controllers\Api\InquiryController;

Route::get('health', [HealthController::class, 'index']);

/* Builds */
Route::get('builds', [BuildController::class, 'index']);
Route::get('builds/{slug}', [BuildController::class, 'show']);

/* Solutions */
Route::get('solutions', [SolutionController::class, 'index']);
Route::get('solutions/{slug}', [SolutionController::class, 'show']);

/* Services */
Route::get('services', [ServiceController::class, 'index']);
Route::get('services/{slug}', [ServiceController::class, 'show']);

/* Articles */
Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{slug}', [ArticleController::class, 'show']);

/* Heroes */
Route::get('heros', [HeroController::class, 'index']);

/* Media */
Route::get('media', [MediaController::class, 'index']);
Route::get('media/{id}', [MediaController::class, 'show']);

/* Inquiry */
Route::post('inquiry', [InquiryController::class, 'store']);

/* Company Settings */
Route::get('company-settings', [CompanySettingController::class, 'show']);
