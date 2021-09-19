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

Route::get('/', function () {
    return view('welcome');
});

// Place on an API route
Route::post('/upload', [App\Http\Controllers\PartController::class, 'upload'])->name('part.upload');
Route::get('/combination', [App\Http\Controllers\PartController::class, 'combination'])->name('part.combination');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

