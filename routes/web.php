<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AuthorisationController;
use App\Http\Controllers\Admin\WorkspaceController as AdminWorkspaceController;
use App\Http\Controllers\Api\ApiCommentController;
use App\Http\Controllers\Api\ApiStatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Middlewares\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
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
        Route::get('/{slug}/show', [AdminWorkspaceController::class, 'show'])->name('show');
        Route::get('/{workspace}', [AdminWorkspaceController::class, 'edit'])->name('edit');
        Route::put('/{workspace}', [AdminWorkspaceController::class, 'update'])->name('update');
        Route::delete('/{workspace}/delete-workspace', [AdminWorkspaceController::class, 'destroy'])->name('destroy');
        Route::get('/{workspace}/users', [AdminWorkspaceController::class, 'users'])->name('users');
        Route::post('/{workspace}/addUser', [AdminWorkspaceController::class, 'addUser'])->name('addUser');
        Route::delete('/{workspace}/removeUser', [AdminWorkspaceController::class, 'removeUser'])->name('removeUser');
    });

    Route::prefix('admin/authorisation')->as('admin.authorisation.')->group(function () {
        Route::get('/{workspace}', [AuthorisationController::class, 'show'])->name('show');
        Route::put('/{workspace}', [AuthorisationController::class, 'update'])->name('update');
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('workspace')->group(function () {
        Route::get('{slug}', [WorkspaceController::class, 'show'])->name('workspace.show');

        Route::get('{slug}/images', [ImageController::class, 'show'])->name('image.show');
        Route::post('{slug}/images', [ImageController::class, 'store'])->name('image.store');
        Route::delete('{image}/delete-image', [ImageController::class, 'destroy'])->name('image.destroy');

        Route::get('{slug}/comments', [CommentController::class, 'show'])->name('comment.show');
        Route::delete('{comment}/delete-comment', [CommentController::class, 'destroy'])->name('comment.destroy');
    });

});

Route::prefix('api')->as('api.')->group(function () {
    Route::post('comment/{workspace}', [ApiCommentController::class, 'store'])->name('comment.store');
    Route::get('comment/{key}', [ApiCommentController::class, 'show'])->name('comment.show');
    Route::post('stat/{workspace}', [ApiStatController::class, 'store'])->name('stat.store');
});

require __DIR__ . '/auth.php';
