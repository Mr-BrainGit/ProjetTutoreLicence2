<?php

use App\Http\Controllers\AutorisationPrelevementController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\FonctionController;
use App\Models\Personnel;
use App\Models\Fonction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorisationPassageSalleController;
use App\Http\Controllers\DemandeHebergementController;
use App\Http\Controllers\OccupantMaisonController;
use App\Http\Controllers\SignataireController;
use App\Http\Controllers\TypeFonctionController;
use App\Models\DemandeHebergement;

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
Route::get('personnelHS', [PersonnelController::class, 'index2'])->name("personnelHS");
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

Route::get('autorisationP', [AutorisationPrelevementController::class, 'index'])->name("autorisationP");
Route::post('autorisationP', [AutorisationPrelevementController::class, 'store'])->name("autorisationPSave");
Route::post('autorisationP/update', [AutorisationPrelevementController::class, 'update'])->name("autorisationPUpdate");
Route::post('autorisationP/delete', [AutorisationPrelevementController::class, 'destroy'])->name("autorisationPDelete");
Route::post('autorisationP/print', [AutorisationPrelevementController::class, 'print'])->name("autorisationPrint");


Route::get('autorisationAB', [AutorisationAbsenceController::class, 'index'])->name("autorisationAB");
Route::post('autorisationAB', [AutorisationAbsenceController::class, 'store'])->name("autorisationABSave");
Route::post('autorisationAB/update', [AutorisationAbsenceController::class, 'update'])->name("autorisationABUpdate");
Route::post('autorisationAB/delete', [AutorisationAbsenceController::class, 'destroy'])->name("autorisationABDelete");
Route::post('autorisationAB/print', [AutorisationAbsenceController::class, 'print'])->name("autorisationABPrint");

Route::get('autorisationPS', [AutorisationPassageSalleController::class, 'index'])->name("autorisationPS");
Route::post('autorisationPS', [AutorisationPassageSalleController::class, 'store'])->name("autorisationPSSave");
Route::post('autorisationPS/update', [AutorisationPassageSalleController::class, 'update'])->name("autorisationPSUpdate");
Route::post('autorisationPS/delete', [AutorisationPassageSalleController::class, 'destroy'])->name("autorisationPSDelete");
Route::post('autorisationPS/print', [AutorisationPassageSalleController::class, 'print'])->name("autorisationPSPrint");

Route::get('occupants', [OccupantMaisonController::class, 'index'])->name("occupants");
Route::post('occupants', [OccupantMaisonController::class, 'store'])->name("occupantsSave");
Route::post('occupants/update', [OccupantMaisonController::class, 'update'])->name("occupantsUpdate");
Route::post('occupants/delete', [OccupantMaisonController::class, 'destroy'])->name("occupantsDelete");

Route::get('demandeMH', [DemandeHebergementController::class, 'index'])->name("demandeMH");
Route::post('demandeMH', [DemandeHebergementController::class, 'store'])->name("demandeMHSSave");
Route::post('demandeMH/update', [DemandeHebergementController::class, 'update'])->name("demandeMHUpdate");
Route::post('demandeMH/delete', [DemandeHebergementController::class, 'destroy'])->name("demandeMHDelete");
Route::post('demandeMH/print', [DemandeHebergementController::class, 'print'])->name("demandeMHPrint");

Route::get('fonction', [FonctionController::class, 'index'])->name("fonction");
Route::post('fonction', [FonctionController::class, 'store'])->name("fonctionSave");
Route::post('fonction/delete', [FonctionController::class, 'destroy'])->name("fonctionDelete");
Route::post('fonction/{idFonction}', [FonctionController::class, 'update'])->name("updateFonction");


Route::get('signataire', [SignataireController::class, 'index'])->name("signataire");
Route::post('signataire', [SignataireController::class, 'store'])->name("signataireSave");
Route::post('signataire/delete', [SignataireController::class, 'destroy'])->name("signataireDelete");
Route::post('signataire/{idSignataire}', [SignataireController::class, 'update'])->name("updateSignataire");
