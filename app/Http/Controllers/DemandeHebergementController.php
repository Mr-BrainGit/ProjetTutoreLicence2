<?php

namespace App\Http\Controllers;

use App\Models\DemandeHebergement;
use App\Models\OccupantMaison;
use Illuminate\Http\Request;

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
        //
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
    public function destroy(DemandeHebergement $demandeHebergement)
    {
        //
    }
}
