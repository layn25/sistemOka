<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return redirect('login');
});



Route::group(['middleware' => 'auth', 'as' => 'admin.', 'prefix' => '/'], function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Sidebar toggle route
    Route::post('/sidebar/toggle', [\App\Http\Controllers\SidebarController::class, 'toggle'])->name('sidebar.toggle');

    Route::group(['prefix' => 'penugasan', 'as' => 'penugasan.'], function () {
        Route::get('/', [PenugasanController::class, 'index'])->name('index');
        Route::get('/create', [PenugasanController::class, 'create'])->name('create');
        Route::post('/store', [PenugasanController::class, 'store'])->name('store');
        Route::get('/detail/{id}', [PenugasanController::class, 'detail'])->name('detail');
        Route::get('/update/{id}', [PenugasanController::class, 'update'])->name('update');
        Route::get('/1', [PenugasanController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'kehadiran', 'as' => 'kehadiran.'], function () {
        Route::get('/', [\App\Http\Controllers\KehadiranController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::put('/{id}', [UserController::class, 'edit'])->name('edit');
        Route::delete('delete/{id}', [UserController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'izin', 'as' => 'izin.'], function () {
        Route::get('/', [\App\Http\Controllers\IzinController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'approval-tugas', 'as' => 'approval-tugas.'], function () {
        Route::get('/', [\App\Http\Controllers\ApprovalTugasController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'aset', 'as' => 'aset.'], function () {
        Route::get('/', [AsetController::class, 'index'])->name('index');
        Route::get('/create', [AsetController::class, 'create'])->name('create');
        Route::post('/store', [AsetController::class, 'store'])->name('store');
        Route::get('/update', [AsetController::class, 'update'])->name('update');
    });
});
