<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function(){

    Route::get('/inscription','inscription')->name('inscription');
    Route::post('/inscription','inscriptionPost')->name('inscription');

    Route::get('/connexion','connexion')->name('connexion');
    Route::post('/connexion','connexionPost')->name('connexion');

    Route::delete('/deconnexion','deconnexion')->name('deconnexion');

});


Route::controller(CategorieController::class)->group(function (){
    Route::get('categories', 'index')->name('categories.index');
    Route::get('categories/create', 'create')->name('categories.create');
    Route::post('categories/store', 'store')->name('categories.store');
    Route::delete('{categorie}', 'destroy')->name('categories.destroy');

    Route::get('{categorie}/edit',  'edit')->name('categories.edit');
    Route::put('{categorie}', 'update')->name('categories.update');
    


});
