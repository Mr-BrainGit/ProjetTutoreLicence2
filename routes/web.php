<?php

use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\PersonnelController;
use App\Models\Personnel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('personnel', [PersonnelController::class, 'index'])->name("personnel");
Route::post('personnel', [PersonnelController::class, 'store'])->name("personnelSave");
Route::post('personnel/delete', [PersonnelController::class, 'destroy'])->name("personnelDelete");
Route::post('personnel/{matricule}', [PersonnelController::class, 'update'])->name("updatePersonnel");

Route::get('demandeur', [DemandeurController::class, 'index'])->name("demandeur");
Route::post('demandeur', [DemandeurController::class, 'store'])->name("demandeur");
Route::post('demande/{id}', [DemandeurController::class, 'update'])->name("updateDemande");





