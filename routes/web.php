<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserAkses;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/sapmas');
});

Route::get('/lg', function () {
    return view('login2');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/sapmas', [AdminController::class, 'index']);
    Route::get('/sapmas/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::resource('/sapmas/admin/akun', App\Http\Controllers\AkunController::class)->middleware('userAkses:admin');
    Route::get('/sapmas/petugas', [AdminController::class, 'petugas'])->middleware('userAkses:petugas');
    Route::get('/sapmas/masyarakat', [AdminController::class, 'masyarakat'])->middleware('userAkses:masyarakat');
    Route::get('/logout', [SesiController::class, 'logout']);
});
