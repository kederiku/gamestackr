<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->route(app()->getLocale().'.home');
})->name("language");

Route::localized(function () {
    Route::get(Lang::uri('/'), HomeController::class)->name('home');
    Route::get(Lang::uri('/news'), [NewsController::class, 'index'])->name('news');
    Route::get(Lang::uri('/choose-country'), LocaleController::class)->name('choose-country');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /*
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');*/
});


Route::fallback(\CodeZero\LocalizedRoutes\Controllers\FallbackController::class);