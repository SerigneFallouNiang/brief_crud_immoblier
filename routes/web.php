<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});









Route::controller(CategorieController::class)->group(function (){
    Route::get('categories', 'index')->name('categories.index');
    Route::get('categories/create', 'create')->name('categories.create');
    Route::post('categories/store', 'store')->name('categories.store');


});
