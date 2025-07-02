<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\User\WorkshopController;
use App\Http\Controllers\User\DaftarController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminWorkshopController;
use App\Http\Controllers\Admin\AdminPendaftarController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/myworkshop', [AdminWorkshopController::class, 'index'])->name('myworkshop.index');
    Route::get('/myworkshop/create', [AdminWorkshopController::class, 'create'])->name('myworkshop.create');
    Route::post('/myworkshop', [AdminWorkshopController::class, 'store'])->name('myworkshop.store');
    Route::get('/myworkshop/{id}', [AdminWorkshopController::class, 'show'])->name('myworkshop.show');
    Route::get('/myworkshop/{id}/edit', [AdminWorkshopController::class, 'edit'])->name('myworkshop.edit');
    Route::put('/myworkshop/{id}', [AdminWorkshopController::class, 'update'])->name('myworkshop.update');
    Route::delete('/myworkshop/{id}', [AdminWorkshopController::class, 'destroy'])->name('myworkshop.destroy');
    
    

    
    Route::get('/pendaftar', [AdminPendaftarController::class, 'index'])->name('pendaftar');
    Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil');
Route::put('/profil', [AdminProfilController::class, 'update'])->name('profil.update');

});



Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/home', [WorkshopController::class, 'index'])->name('home');
    Route::get('/myworkshop', [WorkshopController::class, 'myWorkshop'])->name('myworkshop');

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    Route::get('/daftar/{id}', [DaftarController::class, 'index'])->name('daftar');
    Route::post('/daftar/{id}', [DaftarController::class, 'store'])->name('daftar.store');

    Route::get('/myworkshop', [WorkshopController::class, 'myWorkshop'])->name('myworkshop');

});



require __DIR__.'/auth.php';
