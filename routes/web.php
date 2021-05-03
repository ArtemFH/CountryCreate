<?php

use Illuminate\Support\Facades\Route;

Route::name('home.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CountyController::class, 'indexCountry'])->name('head');
});

Route::name('user.')->group(function () {
    Route::get('/registration', [\App\Http\Controllers\UserController::class, 'registrationAvailability'])->name('registration');

    Route::post('/registration', [\App\Http\Controllers\UserController::class, 'createUser']);

    Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginAvailability'])->name('login');

    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);

    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
});

Route::name('country.')->group(function () {
    Route::get('/countries/{id}', [\App\Http\Controllers\CountyController::class, 'getCountry'])->name('getCountry');

    Route::get('/deleteCountry/{id}', [\App\Http\Controllers\CountyController::class, 'deleteCountry'])->name('deleteCountry');

    Route::post('/countries/{id}', [\App\Http\Controllers\CountyController::class, 'postComment'])->name('comment');

    Route::get('/create', [\App\Http\Controllers\CountyController::class, 'countryAvailability'])->name('create');

    Route::post('/create', [\App\Http\Controllers\CountyController::class, 'createCountry']);
});
