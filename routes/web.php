<?php

use Illuminate\Http\Request;
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

Route::post('language', function (Request $request) {
    \Illuminate\Support\Facades\App::setLocale($request->locale);
    session()->put('locale', $request->locale);
//    \cookie('locale',$request->locale,60);
   // return redirect('/');
      return redirect()->back();
})->name('language');

Route::group([ 'middleware' => 'setlocale'],function (){
    Route::get('/', \App\Http\Controllers\SiteController::class)->name('main');
    Route::get('/pages/{page:slug}',\App\Http\Controllers\PageController::class)->name('page');
    Route::controller(\App\Http\Controllers\NewsController::class)->group(function () {
        Route::get('/news', 'index')->name('news');
        Route::get('/news/{post:slug}', 'show')->name('news.show');
    });
    Route::controller(\App\Http\Controllers\AnnouncementController::class)->group( function (){
        Route::get('/announcements', 'index')->name('announcements');
        Route::get('/announcement/{announcement:slug}', 'show')->name('announcement.show');
    });
    Route::get('/files',[\App\Http\Controllers\FileController::class,'index']);
    Route::get('/file/show/{id}',[\App\Http\Controllers\FileController::class,'show'])->name('file.show');
    Route::get('/file/getPdf/{fileId}',[\App\Http\Controllers\FileController::class,'getPdf'])->name('get.pdf');
    Route::get('/publications/{publicationsData}',[\App\Http\Controllers\PublicationsDatabaseController::class,'show'])->name('publications-database.show');
});

