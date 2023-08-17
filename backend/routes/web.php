<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UploadController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/HelloWorld', function () {
    return Inertia::render('HelloWorld');
})->name('helloworld.index');

Route::get('/Bookmark',[App\Http\Controllers\BookmarkController::class, 'index'])->name('bookmark.index');
Route::get('/Bookmark/search/{queryWord}',[App\Http\Controllers\BookmarkController::class, 'search'])->where('queryWord', '.*')->name('bookmark.search');
Route::post('/Bookmark/store',[App\Http\Controllers\BookmarkController::class, 'store'])->name('bookmark.store');
Route::delete('/Bookmark/delete/{id}',[App\Http\Controllers\BookmarkController::class, 'destroy'])->name('bookmark.delete');

Route::resource('/Upload',UploadController::class);

Route::get('/Contact',[App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/Contact/confirm',[App\Http\Controllers\ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/Contact/send',[App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');