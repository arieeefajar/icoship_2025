<?php

use App\Http\Controllers\MainController;
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

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/welcome', 'welcome')->name('welcome');
    Route::get('/download', 'download')->name('download');
    Route::get('/{slug}', 'pages')->name('pages');
});

// Route::get('/', [MainController::class, 'index'])->name('main');
// Route::get('/welcome', [MainController::class, 'welcome'])->name('welcome');
// Route::get('/download', [MainController::class, 'download'])->name('download');
// Route::get('/{slug}', [MainController::class, 'pages'])->name('page');
