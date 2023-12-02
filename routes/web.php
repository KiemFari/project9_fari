<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\TuteurController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/update-etudiant/{id}',[EtudiantController::class, 'update_etudiant']);
Route::get('/delete-etudiant/{id}',[EtudiantController::class, 'delete_etudiant']);
Route::post('/update/traitement',[EtudiantController::class, 'update_etudiant_traitement']);

Route::get('/etudiant',[EtudiantController::class, 'liste_etudiant']);
Route::get('/ajouter',[EtudiantController::class, 'ajouter_etudiant']);
Route::post('/ajouter/traitement',[EtudiantController::class, 'ajouter_etudiant_traitement']);

// --------------------------------------------------------------

Route::get('/update2-tuteur/{id}',[TuteurController::class, 'update2_tuteur']);
Route::get('/delete-tuteur/{id}',[TuteurController::class, 'delete_tuteur']);
Route::post('/update2/traitement',[TuteurController::class, 'update2_tuteur_traitement']);

Route::get('/tuteur',[TuteurController::class, 'liste2_tuteur']);
Route::get('/ajouter2',[TuteurController::class, 'ajouter2_tuteur']);
Route::post('/ajouter2/traitement',[TuteurController::class, 'ajouter2_tuteur_traitement']);


