<?php

use Carbon\Carbon;
use App\Models\Pendaftaran;

use App\Mail\PembayaranLunasMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\DaftarController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\User\WorkshopController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminWorkshopController;
use App\Http\Controllers\Admin\AdminPendaftarController;

Route::get('/', function () {
    return view('auth.login');
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
    Route::get('/myworkshop', [AdminWorkshopController::class, 'index'])->name('myworkshop.index');
    Route::get('/myworkshop/create', [AdminWorkshopController::class, 'create'])->name('myworkshop.create');
    Route::post('/myworkshop', [AdminWorkshopController::class, 'store'])->name('myworkshop.store');
    Route::get('/myworkshop/{id}', [AdminWorkshopController::class, 'show'])->name('myworkshop.show');
    Route::get('/myworkshop/{id}/edit', [AdminWorkshopController::class, 'edit'])->name('myworkshop.edit');
    Route::put('/myworkshop/{id}', [AdminWorkshopController::class, 'update'])->name('myworkshop.update');
    Route::delete('/myworkshop/{id}', [AdminWorkshopController::class, 'destroy'])->name('myworkshop.destroy');

    Route::get('/pendaftar', [AdminPendaftarController::class, 'index'])->name('pendaftar');
    Route::put('/pendaftar/lunas/{id}', [AdminPendaftarController::class, 'setLunas'])->name('pendaftar.lunas');


    Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil');
    Route::put('/profil', [AdminProfilController::class, 'update'])->name('profil.update');

    Route::get('/test-email', function () {
        $pendaftaran = Pendaftaran::with(['user', 'workshop'])->latest()->first();

        if (!$pendaftaran) {
            return 'Tidak ada data pendaftaran.';
        }

        Mail::to($pendaftaran->user->email)->send(new PembayaranLunasMail($pendaftaran));

        return 'Email berhasil dikirim ke Mailtrap!';
    });
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


Route::get('test', function () {
    $tamgga = 2025 - 02 - 23;
    $date = Carbon::parse($tamgga)->locale('id')->translatedFormat('l, d F Y');
    echo $date;
});



require __DIR__ . '/auth.php';
