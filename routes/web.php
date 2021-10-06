<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

Route::get('/', [PublicController::class, 'home']) ->name('home'); //Homepage
Route::get('/article/form', [AddController::class, 'new'])->name('articleNew'); //Form
Route::post('/article/form/submit', [AddController::class, 'store'])->name('article.store'); //Ricezione dati dal form e invio sul database
Route::get('/category/{name}/{id}', [PublicController::class, 'categoryList'])->name('public.adds.category'); //Articoli per Categorie 
Route::get('/article/show/{add}', [AddController::class, 'show'])->name('add.show'); //View per Categorie 
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.home');
Route::post('/revisor/home/{id}/accept',[RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/home/{id}/reject',[RevisorController::class, 'reject'])->name('revisor.reject');


