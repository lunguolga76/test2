<?php

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

Route::get('/', [\App\Http\Controllers\SearchController::class, 'show'])->name('show');

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::get('/scraper', [\App\Http\Controllers\ContentCrawlerController::class, 'scarper'])->name('scarper');

Route::get('/cv', [\App\Http\Controllers\CvController::class, 'cv'])->name('showCv');
