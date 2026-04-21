<?php

use App\Http\Controllers\CustomActivityController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->to('/custom-activity/v1');
});

Route::get('/custom-activity/v1', function () {
    return redirect()->route('custom-activity.index');
});


Route::get('/custom-activity/v1/index.html', [CustomActivityController::class, 'index'])->name('custom-activity.index');
Route::post('/custom-activity/upload-image', [CustomActivityController::class, 'upload_image'])->name('custom-activity.upload_image');
Route::post('/custom-activity/v1/save', [CustomActivityController::class, 'save']);
Route::post('/custom-activity/v1/publish', [CustomActivityController::class, 'publish']);
Route::post('/custom-activity/v1/validate', [CustomActivityController::class, 'validateConfig']);
Route::post('/custom-activity/v1/stop', [CustomActivityController::class, 'stop']);
Route::post('/custom-activity/v1/execute', [CustomActivityController::class, 'execute']);
