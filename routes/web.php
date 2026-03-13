<?php

use App\Http\Controllers\CustomActivityController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->to('/custom-activity');
});

Route::get('/custom-activity', function () {
    return redirect()->route('custom-activity.index');
});


/*Route::get('/custom-activity/config.json', [\App\Http\Controllers\CustomActivityController::class, 'config']);
Route::get('/custom-activity/images/icon.png', [\App\Http\Controllers\CustomActivityController::class, 'image']);
Route::post('/custom-activity/execute', [\App\Http\Controllers\CustomActivityController::class, 'execute']);
Route::post('/custom-activity/save', [\App\Http\Controllers\CustomActivityController::class, 'save']);
Route::post('/custom-activity/publish', [\App\Http\Controllers\CustomActivityController::class, 'publish']);
Route::post('/custom-activity/validate', [\App\Http\Controllers\CustomActivityController::class, 'validate']);
Route::post('/custom-activity/stop', [\App\Http\Controllers\CustomActivityController::class, 'stop']);*/
Route::get('/custom-activity/index.html', [CustomActivityController::class, 'index'])->name('custom-activity.index');
Route::post('/custom-activity/upload-image', [CustomActivityController::class, 'upload_image'])->name('custom-activity.upload_image');
Route::post('/custom-activity/save', [CustomActivityController::class, 'save']);
Route::post('/custom-activity/publish', [CustomActivityController::class, 'publish']);
Route::post('/custom-activity/validate', [CustomActivityController::class, 'validateConfig']);
Route::post('/custom-activity/stop', [CustomActivityController::class, 'stop']);
Route::post('/custom-activity/execute', [CustomActivityController::class, 'execute']);
