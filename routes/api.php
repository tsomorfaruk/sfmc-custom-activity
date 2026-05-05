<?php


use App\Http\Controllers\CustomActivityController;
use Illuminate\Support\Facades\Route;

Route::post('/custom-activity/save', [CustomActivityController::class, 'save']);
Route::post('/custom-activity/publish', [CustomActivityController::class, 'publish']);
Route::post('/custom-activity/validate', [CustomActivityController::class, 'validateConfig']);
Route::post('/custom-activity/stop', [CustomActivityController::class, 'stop']);
Route::post('/custom-activity/execute', [CustomActivityController::class, 'execute']);
