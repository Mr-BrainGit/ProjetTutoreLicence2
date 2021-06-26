<?php

namespace App\Http\Controllers;

use App\Models\OccupantMaison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OccupantMaisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupants = OccupantMaison::all();
        return view("occupantsMaison")->with('occupants',$occupants);
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
        OccupantMaison::create([
            "nomOccupant" => $request->nom,
            "prenomOccupant" => $request->prenom,
            "provenanceOccupant" => $request->prov,
        ]);

        $occupants = OccupantMaison::all();
        return view("occupantsMaison")->with('occupants',$occupants)->with('success','Occupant ajouté !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OccupantMaison  $occupantMaison
     * @return \Illuminate\Http\Response
     */
    public function show(OccupantMaison $occupantMaison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OccupantMaison  $occupantMaison
     * @return \Illuminate\Http\Response
     */
    public function edit(OccupantMaison $occupantMaison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OccupantMaison  $occupantMaison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $occupant = OccupantMaison::where("idOccupant", $request->idD);
        $occupant->update([
            "nomOccupant" => $request->nom,
            "prenomOccupant" => $request->prenom,
            "provenanceOccupant" => $request->prov,
        ]);

        return Redirect::route('occupants')->with('success',"Personnel mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OccupantMaison  $occupantMaison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $demandeur = OccupantMaison::where("idOccupant", $request->idD);
        $demandeur->delete();

        return Redirect::route('occupants')->with('success',"Personnel mis à jour !");
    }
}
