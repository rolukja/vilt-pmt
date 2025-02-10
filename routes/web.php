<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


include __DIR__ . '/admin.php';



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



Route::name('project.')->group(function () {
    Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index'])->name('index');
    Route::get('/project/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('create');
    Route::post('/project', [App\Http\Controllers\ProjectController::class, 'store'])->name('store');
    Route::get('/project/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('show');
    Route::get('/project/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('edit');
    Route::put('/project/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('update');
    Route::delete('/project/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('destroy');
    Route::post('/project/{project}/restore', [App\Http\Controllers\ProjectController::class, 'restore'])->name('restore');
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