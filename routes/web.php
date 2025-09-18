<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'as' => 'admin.', 'prefix' => '/'], function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Sidebar toggle route
    Route::post('/sidebar/toggle', [\App\Http\Controllers\SidebarController::class, 'toggle'])->name('sidebar.toggle');

    Route::group(['prefix' => 'penugasan', 'as' => 'penugasan.'], function () {
        Route::get('/', [\App\Http\Controllers\PenugasanController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\PenugasanController::class, 'create'])->name('create');
        Route::get('/1', [\App\Http\Controllers\PenugasanController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'kehadiran', 'as' => 'kehadiran.'], function () {
        Route::get('/', [\App\Http\Controllers\KehadiranController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\UserController::class, 'create'])->name('create');
        Route::get('/1', [\App\Http\Controllers\UserController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'izin', 'as' => 'izin.'], function () {
        Route::get('/', [\App\Http\Controllers\IzinController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'approval-tugas', 'as' => 'approval-tugas.'], function () {
        Route::get('/', [\App\Http\Controllers\ApprovalTugasController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'assets', 'as' => 'assets.'], function () {
        Route::get('/', [\App\Http\Controllers\AssetController::class, 'index'])->name('index');
    });
});
