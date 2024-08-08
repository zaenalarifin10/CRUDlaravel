<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangjualController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\WhyTradersChooseUsController;

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

Route::middleware(['web', 'disableBackButton'])->group(function(){
    Route::middleware(['disableRedirectToLoginPage'])->group(function(){
        Route::get('/', [AuthenticationController::class, 'login'])->name('index');
        Route::get('/index', [AuthenticationController::class, 'login'])->name('index');
        Route::get('login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('post/login', [AuthenticationController::class, 'postLogin'])->name('post.login');
        Route::post('/arifin/tambah', [AuthenticationController::class, 'store'])->name('post.store');
        Route::get('/create', [AuthenticationController::class, 'create'])->name('create');
    });

    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'disableBackButton', 'admin'])->group(function(){
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('barang', [BarangController::class, 'index'])->name('barang');
        Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('barang/store', [BarangController::class, 'store'])->name('barang.store');
        // Route::get('barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
        Route::get('barang/show/{id}', [BarangController::class, 'show'])->name('barang.show');
        // Route::put('barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
        Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');


        Route::get('jual', [BarangjualController::class, 'index'])->name('jual');
        Route::get('jual/create', [BarangjualController::class, 'create'])->name('jual.create');
        Route::post('jual/store', [BarangjualController::class, 'store'])->name('jual.store');
        Route::get('jual/show/{id}', [BarangjualController::class, 'show'])->name('jual.show');
        Route::get('jual/edit/{id}', [BarangjualController::class, 'edit'])->name('jual.edit');
        Route::put('jual/update/{id}', [BarangjualController::class, 'update'])->name('jual.update');
        Route::delete('jual/delete/{id}', [BarangjualController::class, 'destroy'])->name('jual.delete');

    });
});
