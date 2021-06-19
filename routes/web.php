<?php

use App\Http\Controllers\CertificatController;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\NoteInformationController;
use App\Http\Controllers\NoteServiceController;
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
Route::post('demandeur', [DemandeurController::class, 'store'])->name("demandeurSave");
Route::post('demandeur/{id}', [DemandeurController::class, 'update'])->name("demandeurUpdate");
Route::post('demandeurs/delete', [DemandeurController::class, 'destroy'])->name("demandeurDelete");

Route::post('certificatPrint', [CertificatController::class, 'printCertificat'])->name("printCertificat");


Route::get('noteInformation', [NoteInformationController::class, 'index'])->name("noteInformation");
Route::post('noteInformation', [NoteInformationController::class, 'store'])->name("noteInfoSave");
Route::post('noteInformation/print', [NoteInformationController::class, 'print'])->name("noteInfoPrint");
Route::post('noteInformation/delete', [NoteInformationController::class, 'destroy'])->name("noteInfoDelete");

Route::get('noteService', [NoteServiceController::class, 'index'])->name("noteService");
Route::post('noteService', [NoteServiceController::class, 'store'])->name("noteServSave");
Route::post('noteService/print', [NoteServiceController::class, 'print'])->name("noteServPrint");
Route::post('noteService/delete', [NoteServiceController::class, 'destroy'])->name("noteServDelete");




