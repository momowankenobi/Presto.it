<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'home']) ->name('home');

Route::get('/article/form', [AddController::class, 'new'])->name('articleNew');
Route::post('/article/form/submit', [AddController::class, 'store'])->name('article.store');

