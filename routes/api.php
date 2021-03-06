<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\GetFileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('viewfile','App\Http\Controllers\GetFileController');
Route::apiResource('categorie','App\Http\Controllers\CategorieController');
Route::apiResource('utilisateur','App\Http\Controllers\UtilisateurController');
Route::apiResource('historique','App\Http\Controllers\HistoriqueController');
Route::apiResource('visite','App\Http\Controllers\VisiteController');
Route::apiResource('lien','App\Http\Controllers\LienController');
Route::apiResource('projet','App\Http\Controllers\ProjetController');
Route::apiResource('membre','App\Http\Controllers\MembreController');
Route::apiResource('encadreur','App\Http\Controllers\EncadreurController');
Route::apiResource('administrateur','App\Http\Controllers\AdministrateurController');
Route::apiResource('users','App\Http\Controllers\UserController');
Route::apiResource('encadrement','App\Http\Controllers\EncadrementController');
Route::apiResource('categorie_projet','App\Http\Controllers\CategorieProjetController');
Route::get('searchprojet',[ProjetController::class,'search']);
Route::get('projetplustelecharger',[ProjetController::class,'projetsPlusTelecharger']);
Route::get('projetplusvue',[ProjetController::class,'projetsPlusVue']);
Route::get('searchadmin',[UserController::class,'search']);
Route::get('searchcategorie',[CategorieController::class,'search']);
