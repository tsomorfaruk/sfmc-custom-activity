<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('custom-activity.index');
});

Route::get('/custom-activity', function () {
    return redirect()->route('custom-activity.index');
});

Route::get('/custom-activity/index.html', function () {
    return view('custom-activity.index');
})->name('custom-activity.index');

Route::get('/custom-activity/config.json', [\App\Http\Controllers\CustomActivityController::class, 'config']);
Route::post('/custom-activity/execute', [\App\Http\Controllers\CustomActivityController::class, 'execute']);
Route::post('/custom-activity/save', [\App\Http\Controllers\CustomActivityController::class, 'save']);
Route::post('/custom-activity/publish', [\App\Http\Controllers\CustomActivityController::class, 'publish']);
Route::post('/custom-activity/validate', [\App\Http\Controllers\CustomActivityController::class, 'validate']);
Route::post('/custom-activity/stop', [\App\Http\Controllers\CustomActivityController::class, 'stop']);
