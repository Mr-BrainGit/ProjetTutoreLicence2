<?php

namespace App\Http\Controllers;

use App\Models\AutorisationPassageSalle;
use App\Models\DemandeHebergement;
use App\Models\OccupantMaison;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;

class DemandeHebergementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupants = OccupantMaison::all();
        $demande = DemandeHebergement::orderByDesc('demande_hebergements.created_at')
                                ->join('occupant_maisons', 'demande_hebergements.idOccupant', '=', 'occupant_maisons.idOccupant')
                                ->get()->values();

        return view('demandeMH')->with('demandes',$demande)->with('occupants',$occupants);
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

        switch ($request->motif) {
            case 'MS':
                DemandeHebergement::create([
                    "dateDemande" => $request->dateD,
                    "motifSejour" => $request->motif,
                    "enseignement" => true,
                    "volumeHoraireDispense" => $request->volumeH,
                    "disciplineEnseigne" => $request->discipline,
                    "cadre" => $request->cadre,
                    "participationJury" => false,
                    "departement" => "-",
                    "dateSoutenance" => null,
                    "themeSoutenance" => null,
                    "autreMotif" => null,
                    "dateDebutSejour" => $request->dateDS,
                    "dateFinSejour" => $request->dateFS,
                    "nomPrenomRequerant" => $request->nomR. " " .$request->prenomR,
                    "titreRequerant" => $request->titreR,
                    "fonctionRequerant" => $request->foncR,
                    "idOccupant" => $request->idO,
                ]);
                break;
            case 'PJ':
                DemandeHebergement::create([
                    "dateDemande" => $request->dateD,
                    "motifSejour" => $request->motif,
                    "enseignement" => false,
                    "volumeHoraireDispense" => null,
                    "disciplineEnseigne" => null,
                    "cadre" => null,
                    "participationJury" => true,
                    "departement" => $request->departement,
                    "dateSoutenance" => $request->dateSou,
                    "themeSoutenance" => $request->theme,
                    "autreMotif" => null,
                    "dateDebutSejour" => $request->dateDS,
                    "dateFinSejour" => $request->dateFS,
                    "nomPrenomRequerant" => $request->nomR. " " .$request->prenomR,
                    "titreRequerant" => $request->titreR,
                    "fonctionRequerant" => $request->foncR,
                    "idOccupant" => $request->idO,
                ]);
                break;
            case 'AM':
                DemandeHebergement::create([
                    "dateDemande" => $request->dateD,
                    "motifSejour" => $request->motif,
                    "enseignement" => false,
                    "volumeHoraireDispense" => null,
                    "disciplineEnseigne" => null,
                    "cadre" => null,
                    "participationJury" => false,
                    "departement" => null,
                    "dateSoutenance" => null,
                    "themeSoutenance" => null,
                    "autreMotif" => $request->autre,
                    "dateDebutSejour" => $request->dateDS,
                    "dateFinSejour" => $request->dateFS,
                    "nomPrenomRequerant" => $request->nomR. " " .$request->prenomR,
                    "titreRequerant" => $request->titreR,
                    "fonctionRequerant" => $request->foncR,
                    "idOccupant" => $request->idO,
                ]);
                break;

            default:

                break;

            return Redirect::route('demandeMH')->with('success',"Personnel mis à jour !");

        }
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DemandeHebergement  $demandeHebergement
     * @return \Illuminate\Http\Response
     */
    public function show(DemandeHebergement $demandeHebergement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DemandeHebergement  $demandeHebergement
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandeHebergement $demandeHebergement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DemandeHebergement  $demandeHebergement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandeHebergement $demandeHebergement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DemandeHebergement  $demandeHebergement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->idD;


        $auth = DemandeHebergement::where('idDemandeH', $id);
        $auth->delete();
        return Redirect::route('demandeMH')->with('success',"Personnel mis à jour !");

    }

    public function print(Request $request)
    {
        $id = $request->id;
        Carbon::setLocale('fr');
        $autorisation = DemandeHebergement::where('idDemandeH', $id)
                                                ->join('occupant_maisons', 'demande_hebergements.idOccupant', '=', 'occupant_maisons.idOccupant')
                                                 ->first();
        $pdf = PDF::loadView('autorisationMSPrint', array('data' =>$autorisation));
        //dd($autorisation);
        return $pdf->stream('teste.pdf');
    }
}
