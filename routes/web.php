<?php

use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\back\ads\AdsController;
use App\Http\Controllers\back\ads\getAdsDataController;
use App\Http\Controllers\back\CategoryController;
use App\Http\Controllers\back\StateController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\front\profileAdsController;
use App\Http\Controllers\front\showAdsController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main Page Route

Route::get('/test',[HomeController::class,'test']);

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::group(['prefix' => 'profile'], function () {
  Route::resource('/ads', profileAdsController::class);
  Route::post('/adStore', [profileAdsController::class, 'store'])->name('adStore');
  Route::get('/subCat',[profileAdsController::class,'getSubCategories'])->name('getSubCategories');
  Route::get('/getCities',[profileAdsController::class,'getCities'])->name('getCities');
  Route::resource('/settings', profileAdsController::class);
});

Route::get('/ad/{id}', [showAdsController::class, 'show'])->name('front.ads.show');
Route::get('/ads', [showAdsController::class, 'ads'])->name('front.ads.index');
Route::get('/main_category/{id}', [showAdsController::class, 'mainCategoryAds'])->name('mainCategoryAds');
Route::get('/sub_category/{id}', [showAdsController::class, 'subCategoryAds'])->name('subCategoryAds');
Route::get('/state/{id}', [showAdsController::class, 'stateAds'])->name('stateAds');
Route::get('/city/{id}', [showAdsController::class, 'cityAds'])->name('cityAds');

Route::get('/payments/verify/{payment?}',[\App\Http\Controllers\PaymentController::class,'verifyWithKashier'])->name('payment-verify');


Auth::routes();

Route::prefix('admin')->group(function () {
  Route::middleware(Admin::class)->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/users/getAllUsers', [UserController::class, 'getAllUsers'])->name('back.getAllUsers');
    Route::resource('/users', UserController::class);
    Route::post('/users/get', [UserController::class, 'getUser'])->name('users.getUser');
    Route::post('/users/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::post('/users/update', [UserController::class, 'update'])->name('users.update');

    Route::prefix('ads')->group(function () {
      Route::get('/', [AdsController::class, 'index'])->name('advertisements.index');
      Route::get('/active', [AdsController::class, 'active'])->name('advertisements.active');
      Route::get('/inactive', [AdsController::class, 'inActive'])->name('advertisements.inactive');
      Route::get('/underReview', [AdsController::class, 'underReview'])->name('advertisements.underReview');

      Route::post('/approve', [AdsController::class, 'approve'])->name('advertisements.approve');

      Route::post('/getAllAds', [getAdsDataController::class, 'getAllAds'])->name('advertisements.getAllAds');
      Route::post('/getActiveAds', [getAdsDataController::class, 'getActiveAds'])->name('advertisements.getActiveAds');
      Route::post('/getInactiveAds', [getAdsDataController::class, 'getInactiveAds'])->name('advertisements.getInactiveAds');
      Route::post('/getUnderReviewAds', [getAdsDataController::class, 'getUnderReviewAds'])->name('advertisements.getUnderReviewAds');
      Route::post('/getAd', [getAdsDataController::class, 'getAd'])->name('advertisements.getAd');

      Route::delete('/destroy', [AdsController::class, 'destroy'])->name('advertisements.destroy');
      Route::put('/update', [AdsController::class, 'update'])->name('advertisements.update');
      Route::post('/getCities', [StateController::class, 'getCities'])->name('state.getCities');
      Route::post('/getSubCategories', [CategoryController::class, 'getSubCategories'])->name('category.getSubCategories');

    });
  });
});
