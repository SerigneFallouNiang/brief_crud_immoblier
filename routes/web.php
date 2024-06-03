<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function(){

    Route::get('/inscription','inscription')->name('inscription');
    Route::post('/inscription','inscription')->name('inscription');


});