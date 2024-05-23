<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', \App\Http\Controllers\SiteController::class);
Route::get('/pages/{page:slug}',\App\Http\Controllers\PageController::class)->name('page');
Route::controller(\App\Http\Controllers\NewsController::class)->group(function () {
    Route::get('/news', 'index')->name('news');
    Route::get('/news/{post:slug}', 'show')->name('news.show');
});
Route::controller(\App\Http\Controllers\AnnouncementController::class)->group( function (){
    Route::get('/announcements', 'index')->name('announcements');
    Route::get('/announcement/{announcement:slug}', 'show')->name('announcement.show');
});
