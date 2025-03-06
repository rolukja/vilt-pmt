<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::group([
    'prefix'     => 'project',
], static function () {
    Route::get('/', [\App\Http\Controllers\ProjectController::class, 'index'])
        ->name('project.index');
});


Route::name('task.')->group(function () {
    Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('index');
    Route::get('/task/create', [App\Http\Controllers\TaskController::class, 'create'])->name('create');
    Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('store');
    Route::get('/task/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('show');
    Route::get('/task/{task}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('edit');
    Route::put('/task/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('update');
    Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('destroy');
    Route::post('/task/{task}/restore', [App\Http\Controllers\TaskController::class, 'restore'])->name('restore');
});
Route::resource('project', \App\Http\Controllers\ProjectController::class);
Route::name('user.')->group(function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('index');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('store');
    Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('show');
    Route::get('/user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::put('/user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::delete('/user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
    Route::post('/user/{user}/restore', [App\Http\Controllers\UserController::class, 'restore'])->name('restore');
});


Route::get('/kanban', [\App\Http\Controllers\KanbanController::class, 'index'])
    ->name('kanban.index');