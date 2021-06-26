<?php

namespace App\Http\Controllers;

use App\Models\AutorisationPassageSalle;
use App\Models\Demandeur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade as PDF;

class AutorisationPassageSalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandeurs = Demandeur::all();
        $autorisations = AutorisationPassageSalle::orderByDesc('autorisation_passage_salles.created_at')
                                ->join('demandeurs', 'autorisation_passage_salles.idDemandeur', '=', 'demandeurs.idDemandeur')
                                ->get()->values();

        return view('autorisationPassageSalle')->with('demandeurs',$demandeurs)
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
        AutorisationPassageSalle::create([
            "dateDemande" => $request->dateD,
            "motif" => $request->motif,
            "idDemandeur" => $request->demandeur,
        ]);
        return Redirect::route('autorisationPS')->with('success',"Personnel mis à jour !");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AutorisationPassageSalle  $autorisationPassageSalle
     * @return \Illuminate\Http\Response
     */
    public function show(AutorisationPassageSalle $autorisationPassageSalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutorisationPassageSalle  $autorisationPassageSalle
     * @return \Illuminate\Http\Response
     */
    public function edit(AutorisationPassageSalle $autorisationPassageSalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutorisationPassageSalle  $autorisationPassageSalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutorisationPassageSalle $autorisationPassageSalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutorisationPassageSalle  $autorisationPassageSalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->idD;


        $auth = AutorisationPassageSalle::where('idAutorisationPS', $id);
        $auth->delete();
        return Redirect::route('autorisationPS')->with('success',"Personnel mis à jour !");
    }

    public function print(Request $request)
    {
        $id = $request->id;
        Carbon::setLocale('fr');
        $autorisation = AutorisationPassageSalle::where('idAutorisationPS', $id)
                                                ->join('demandeurs', 'autorisation_passage_salles.idDemandeur', '=', 'demandeurs.idDemandeur')
                                                 ->first();
        $autorisation->dateDemande = Carbon::parse($autorisation->dateDemande)->translatedFormat('d M Y');
        $pdf = PDF::loadView('autorisationPSPrint', array('data' =>$autorisation));
        return $pdf->stream('teste.pdf');
    }
}
