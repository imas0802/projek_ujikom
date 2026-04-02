<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\FasilitasController;
use App\Http\Controllers\Backend\GedungController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\LantaiController;
use App\Http\Controllers\Backend\PetugasController;
use App\Http\Controllers\Backend\RuanganController;
use App\Http\Controllers\FrontendController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('/detail/{slug}', [FrontendController::class, 'detail'])
    ->name('frontend.detail');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/dashboard', [AdminController::class, 'index']);

    //crud
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/gedung', GedungController::class);
    Route::resource('/lantai', LantaiController::class);
    Route::resource('ruangan', RuanganController::class);
    Route::resource('/fasilitas', FasilitasController::class);
    Route::resource('/petugas', PetugasController::class);

    Route::patch(
    'ruangan/{id}/status',
    [RuanganController::class, 'updateStatus']
)->name('ruangan.updateStatus');

Route::delete('/ruangan/image/{id}', [RuanganController::class, 'destroyImage'])
    ->name('ruangan.image.destroy');

});
