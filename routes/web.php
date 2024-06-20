<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\WorkspaceController as AdminWorkspaceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Middlewares\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', AdminMiddleware::class])
    ->name('admin.dashboard');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::prefix('admin/workspace')->as('admin.workspace.')->group(function () {
        Route::get('/create', [AdminWorkspaceController::class, 'create'])->name('create');
        Route::post('/', [AdminWorkspaceController::class, 'store'])->name('store');
        Route::get('/{workspace}', [AdminWorkspaceController::class, 'edit'])->name('edit');
        Route::put('/{workspace}', [AdminWorkspaceController::class, 'update'])->name('update');
        Route::get('/{workspace}/users', [AdminWorkspaceController::class, 'users'])->name('users');
        Route::post('/{workspace}/addUser', [AdminWorkspaceController::class, 'addUser'])->name('addUser');
        Route::delete('/{workspace}/removeUser', [AdminWorkspaceController::class, 'removeUser'])->name('removeUser');
    });

});

Route::middleware('auth')->group(function () {
    Route::prefix('workspace')->as('workspace.')->group(function () {
        Route::get('{workspace}', [WorkspaceController::class, 'show'])->name('show');
    });

    Route::prefix('image')->as('image.')->group(function () {
        Route::get('{workspace}/images', [ImageController::class, 'show'])->name('show');
        Route::post('{workspace}/images', [ImageController::class, 'store'])->name('store');
        Route::delete('{image}', [ImageController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
