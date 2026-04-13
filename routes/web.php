<?php

use App\Http\Controllers\CustomActivityController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->to('/custom-activity/v2');
});

Route::get('/custom-activity/v2', function () {
    return redirect()->route('custom-activity.index');
});


Route::get('/custom-activity/v2/index.html', [CustomActivityController::class, 'index'])->name('custom-activity.index');
Route::post('/custom-activity/upload-image', [CustomActivityController::class, 'upload_image'])->name('custom-activity.upload_image');
Route::post('/custom-activity/v2/save', [CustomActivityController::class, 'save']);
Route::post('/custom-activity/v2/publish', [CustomActivityController::class, 'publish']);
Route::post('/custom-activity/v2/validate', [CustomActivityController::class, 'validateConfig']);
Route::post('/custom-activity/v2/stop', [CustomActivityController::class, 'stop']);
Route::post('/custom-activity/v2/execute', [CustomActivityController::class, 'execute']);
