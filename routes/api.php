<?php

use Illuminate\Support\Facades\Route;

//config

Route::group(['as' => 'role.'], function () {
    // Route::group(['middleware' => 'role:' . RoleEnum::SYSTEM->value], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('role', [RoleController::class, 'store']);
        Route::put('role/{id}', [RoleController::class, 'edit']);
        Route::delete('role/{id}', [RoleController::class, 'destroy']);
    });
    // });
    Route::get('role/{id}', [RoleController::class, 'show']);
    Route::get('roles', [RoleController::class, 'index']);
});