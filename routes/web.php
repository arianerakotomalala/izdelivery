<?php

use App\Http\Controllers\CclientController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
|                     C L I E N T
|--------------------------------------------------------------------------*/


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



Route :: prefix('client')->controller(CclientController::class)->name('client.')->group(function(){
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

/*
|--------------------------------------------------------------------------
|                       A D M I N I S T R A T I O N
|--------------------------------------------------------------------------*/

use App\Http\Controllers\ClientController;
use App\Http\Controllers\VehicleController;

Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');

Route::resource('clients', ClientController::class);

use App\Http\Controllers\LivreurController;

Route::get('/livreurs', [LivreurController::class, 'index'])->name('livreurs.index');
Route::get('/livreurs/create', [LivreurController::class, 'create'])->name('livreurs.create');
Route::post('/livreurs', [LivreurController::class, 'store'])->name('livreurs.store');

use App\Http\Controllers\Admin\AuthController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('admin.login');

//Route::prefix('admin')->group(function () {//
    Route::get('admin/register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('admin/register', [AuthController::class, 'register']);
    Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [AuthController::class, 'login']);
    Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    });

    use App\Http\Controllers\UserController;

    Route::put('/users/{id}/valider', [UserController::class, 'validerClient'])->name('users.valider');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Formulaire pour créer un utilisateur
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

    // Enregistrement d'un nouvel utilisateur
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Détails d'un utilisateur
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    // Validation d'un utilisateur
    Route::put('/users/{id}/valider', [UserController::class, 'validerClient'])->name('users.valider');

//});
use App\Http\Controllers\CommandeController;
Route::get('/commande/{id}/assign', [CommandeController::class, 'assignerLivreurVehicule'])->name('commande.assign');
Route::get('/commande/{id}/assign', [CommandeController::class, 'assignerLivreurVehicule'])->name('commande.assign');
Route::put('/commande/{id}/assign', [CommandeController::class, 'assignerLivreurVehiculeStore'])->name('commande.assign.store');
Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');
//Route::get('/das/formulaire', [EleveController::class, 'formulaire'])->name('das.formulaire');
//Route::post('/das/formulaire', [EleveController::class, 'store'])->name('eleves.store');
//Route::get('/', function () {
    //return view('welcome');
//});
