<?php


use App\Http\Controllers\Admin\AdminOverviewController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'admin',
], static function () {
    Route::get('/overview', [AdminOverviewController::class, 'index'])
        ->name('admin.overview.index');
});
