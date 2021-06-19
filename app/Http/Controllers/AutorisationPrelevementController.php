<?php

namespace App\Http\Controllers;

use App\Models\AutorisationPrelevement;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class AutorisationPrelevementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personnels = Personnel::all();
        $autorisations = AutorisationPrelevement::orderByDesc('autorisation_prelevements.created_at')
                                ->join('personnels', 'autorisation_prelevements.matricule', '=', 'personnels.matricule')
                                ->get()->values();

        return view('autorisationPrelevement')->with('personnels',$personnels)
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
        AutorisationPrelevement::create([
          "libelleAutorisation" => "a",
          "datePriseEffet" => $request->dateps,
          "dateEtablissement" => $request->dateE,
          "montantChiffer" => $request->montantChiffre,
          "montantLettre" => $request->montantLettre,
          "matricule" => $request->matricule
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AutorisationPrelevement  $autorisationPrelevement
     * @return \Illuminate\Http\Response
     */
    public function show(AutorisationPrelevement $autorisationPrelevement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutorisationPrelevement  $autorisationPrelevement
     * @return \Illuminate\Http\Response
     */
    public function edit(AutorisationPrelevement $autorisationPrelevement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutorisationPrelevement  $autorisationPrelevement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $auth = AutorisationPrelevement::where('idAutorisationP', $id);
        $auth->update([
            "libelleAutorisation" => "a",
            "datePriseEffet" => $request->dateps,
            "dateEtablissement" => $request->dateE,
            "montantChiffer" => $request->montantChiffre,
            "montantLettre" => $request->montantLettre,
            "matricule" => $request->matricule
        ]);

        return Redirect::route('autorisationP')->with('success',"Personnel mis à jour !");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutorisationPrelevement  $autorisationPrelevement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->idD;


        $auth = AutorisationPrelevement::where('idAutorisationP', $id);
        $auth->delete();
        return Redirect::route('autorisationP')->with('success',"Personnel mis à jour !");

    }

    public function print(Request $request){
        $id = $request->id;
        Carbon::setLocale('fr');
        $autorisation = AutorisationPrelevement::where('idAutorisationP', $id)
                                                ->join('personnels', 'autorisation_prelevements.matricule', '=', 'personnels.matricule')
                                                ->first();
        $autorisation->datePriseEffet = Carbon::parse($autorisation->datePriseEffet)->translatedFormat('d M Y');
        $autorisation->dateEtablissement = Carbon::parse($autorisation->dateEtablissement)->translatedFormat('d M Y');
        $autorisation->dateNaissance = Carbon::parse($autorisation->dateNaissance)->translatedFormat('d M Y');
        $pdf = PDF::loadView('autorisationPrePrint', array('data' =>$autorisation));
        return $pdf->stream('teste.pdf');
    }
}
