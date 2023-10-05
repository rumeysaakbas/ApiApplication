<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\AuthController;


Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function(){
    Route::get('/personnels', [PersonnelController::class, 'index']);
    Route::post('/personnel', [PersonnelController::class, 'store']);
    Route::get('/personnel/{id}', [PersonnelController::class, 'show']);
    Route::put('/personnel/{id}', [PersonnelController::class, 'update']);
    Route::delete('/personnel/{id}', [PersonnelController::class, 'destroy']);
});

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
