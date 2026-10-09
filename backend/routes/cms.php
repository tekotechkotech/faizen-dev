<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\{AuthController, BuildController as CmsBuild, SolutionController as CmsSolution, ServiceController as CmsService, ArticleController as CmsArticle, HeroController as CmsHero, MediaController as CmsMedia, InquiryController as CmsInquiry, CompanySettingController as CmsSettings, DashboardController};
// Public auth
Route::post('/cms/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('/cms/logout', [AuthController::class, 'logout']);
// Protected CMS (session auth + admin). Middleware enforced; no JWT per API-BOUNDARY.
Route::middleware(['auth', 'can:cms-access'])->prefix('cms')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);
  Route::apiResource('/builds', CmsBuild::class);
  Route::apiResource('/solutions', CmsSolution::class);
  Route::apiResource('/services', CmsService::class);
  Route::apiResource('/articles', CmsArticle::class);
  Route::apiResource('/heros', CmsHero::class);
  Route::apiResource('/media', CmsMedia::class)->only(['index','store','destroy']);
  Route::get('/inquiries', [CmsInquiry::class, 'index']);
  Route::patch('/inquiries/{id}', [CmsInquiry::class, 'update']);
  Route::get('/settings', [CmsSettings::class, 'show']);
  Route::put('/settings', [CmsSettings::class, 'update']);
});
