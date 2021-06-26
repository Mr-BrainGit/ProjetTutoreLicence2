<?php

namespace App\Http\Controllers;

use App\Models\AutorisationAbsence;
use App\Models\Personnel;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AutorisationAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personnels = Personnel::all();
        $autorisations = AutorisationAbsence::orderByDesc('autorisation_absences.created_at')
                                ->join('personnels', 'autorisation_absences.matricule', '=', 'personnels.matricule')
                                ->get()->values();

        return view('autorisationAbsence')->with('personnels',$personnels)
                                ->with('autorisations',$autorisations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AutorisationAbsence::create([
            "motifAbsence" => $request->motif,
            "dateDepart" => $request->dateD,
            "dateRetour" => $request->dateR,
            "matricule" => $request->matricule,
          ]);
          return Redirect::route('autorisationAB')->with('success',"Personnel mis à jour !");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AutorisationAbsence  $autorisationAbsence
     * @return \Illuminate\Http\Response
     */
    public function show(AutorisationAbsence $autorisationAbsence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutorisationAbsence  $autorisationAbsence
     * @return \Illuminate\Http\Response
     */
    public function edit(AutorisationAbsence $autorisationAbsence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutorisationAbsence  $autorisationAbsence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutorisationAbsence $autorisationAbsence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutorisationAbsence  $autorisationAbsence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->idD;


        $auth = AutorisationAbsence::where('idAutorisationAb', $id);
        $auth->delete();
        return Redirect::route('autorisationAB')->with('success',"Personnel mis à jour !");
    }

    public function print(Request $request)
    {
        $id = $request->id;
        Carbon::setLocale('fr');
        $autorisation = AutorisationAbsence::where('idAutorisationAb', $id)
                                                ->join('personnels', 'autorisation_absences.matricule', '=', 'personnels.matricule')
                                                ->join('fonctions', 'personnels.idFonction', '=', 'fonctions.idFonction')
                                                ->first();
        $autorisation->dateDepart = Carbon::parse($autorisation->dateDepart)->translatedFormat('d M Y');
        $autorisation->dateRetour = Carbon::parse($autorisation->dateRetour)->translatedFormat('d M Y');
        $autorisation->dateNaissance = Carbon::parse($autorisation->dateNaissance)->translatedFormat('d M Y');
        $pdf = PDF::loadView('autorisationABPrint', array('data' =>$autorisation));
        return $pdf->stream('teste.pdf');
    }
}
