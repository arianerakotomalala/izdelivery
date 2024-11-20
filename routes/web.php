<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {  
    return view('welcome');
});

//***************ROUTES POUR LE CLIENT**************************//


//LOGIN*****
Route::prefix('/login')->controller(LoginController::class)->name('login')->group(function(){
    //authentification
    Route::get('/','blade_login');
    Route::post('/','login')->name('.action');
    //deconnexion
    Route::post('/deconnexion','deconnexion')->name('.deconnexion');
});


//Inscription
Route::prefix('/inscrire')->controller(InscriptionController::class)->name('inscrire.')->group(function(){
    Route::get('/','blade_inscription')->name('blade');
    Route::post('/','inscrire')->name('action');
});



Route :: prefix('client')->controller( ClientController::class)->name('client.')->group(function(){
    //acceuil******//
    Route::get('/acceuil','blade_acceuil')->name('acceuil');

    //condition-collaboration
    Route::get('/condition-de-collaboration','condition')->name('collaboration');

    //a propos 
    Route::get('/a-propos','propos')->name('propos');

    //commander
    Route::get('/commander', 'blade_commander')->name('commander.form')->middleware(['auth']);
    Route::post('/commander', 'action_commander')->name('commander.submit')->middleware(['auth']);

});