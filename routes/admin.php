<?php


use App\Http\Controllers\Admin\AdminOverviewController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'admin',
], static function () {
    Route::get('/overview', [AdminOverviewController::class, 'index'])
        ->name('admin.overview.index');

    Route::name('admin.project.')->group(function () {
        Route::get('/project', [\App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('index');
        Route::get('/project/create', [\App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('create');
        Route::post('/project', [\App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('store');
        Route::get('/project/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('show');
        Route::get('/project/{project}/edit', [\App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('edit');
        Route::put('/project/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('update');
        Route::delete('/project/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('destroy');
        Route::post('/project/{project}/restore', [\App\Http\Controllers\Admin\ProjectController::class, 'restore'])->name('restore');
    });
    Route::name('admin.task.')->group(function () {
        Route::get('/task', [\App\Http\Controllers\Admin\TaskController::class, 'index'])->name('index');
        Route::get('/task/create', [\App\Http\Controllers\Admin\TaskController::class, 'create'])->name('create');
        Route::post('/task', [\App\Http\Controllers\Admin\TaskController::class, 'store'])->name('store');
        Route::get('/task/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'show'])->name('show');
        Route::get('/task/{task}/edit', [\App\Http\Controllers\Admin\TaskController::class, 'edit'])->name('edit');
        Route::put('/task/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'update'])->name('update');
        Route::delete('/task/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'destroy'])->name('destroy');
        Route::post('/task/{task}/restore', [\App\Http\Controllers\Admin\TaskController::class, 'restore'])->name('restore');
    });


});
