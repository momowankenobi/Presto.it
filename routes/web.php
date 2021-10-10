<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\AdminController;
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
Route::post('/add/images/upload', [AddController::class, 'upload'])->name('add.upload');
Route::delete('/add/images/remove', [AddController::class, 'remove'])->name('add.remove');
Route::delete('/add/images', [AddController::class, 'getImages'])->name('add.getImages');
Route::get('/category/{name}/{id}', [PublicController::class, 'categoryList'])->name('public.adds.category'); //Articoli per Categorie 
Route::get('/article/show/{add}', [AddController::class, 'show'])->name('add.show'); //View per Categorie 
Route::get('/search', [AddController::class, 'search'])->name('search'); //Search
Route::get('/administration/panelcontrol', [RevisorController::class, 'index'])->name('admin.index'); //Pannello di controllo
Route::get('/administration/panelcontrol/adds', [RevisorController::class, 'showadd'])->name('admin.showadd'); //Pannello di controllo vista annunci
Route::post('/administration/panelcontrol/adds/{id}/accept',[RevisorController::class, 'accept'])->name('revisor.accept'); //Pannello di controllo vista annunci bottone accetta
Route::post('/administration/panelcontrol/adds/{id}/reject',[RevisorController::class, 'reject'])->name('revisor.reject'); //Pannello di controllo vista annunci bottone rifiuta
Route::get('/administration/panelcontrol/revisors', [AdminController::class, 'showrev'])->name('admin.showrev'); //Pannello di controllo vista revisori
Route::post('/administration/panelcontrol/revisors/{id}/accept',[AdminController::class, 'accept'])->name('admin.accept'); //Pannello di controllo vista revisori bottone accetta
Route::post('/administration/panelcontrol/revisors/{id}/reject',[AdminController::class, 'reject'])->name('admin.reject'); //Pannello di controllo vista revisori bottone rifiuta
// Route::get('/workwithUS', [PublicController::class, 'workindex'])->name('work.index'); //Lavora con noi
// Route::post('/workwithUS/submit', [PublicController::class, 'worksubmit'])->name('work.submit');


Route::get('/phpinfo', function() {
    return phpinfo();
});
