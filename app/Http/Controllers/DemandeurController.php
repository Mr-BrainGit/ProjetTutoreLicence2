<?php

namespace App\Http\Controllers;

use App\Models\Demandeur;
use Illuminate\Http\Request;

class DemandeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandeurs = Demandeur::all();
        return view("demandeur")->with('demandeurs',$demandeurs);
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
       
        Demandeur::create([
            "nomDemandeur" => $request->nom,
            "prenomDemandeur" => $request->prenom,
            "tel" => $request->tel,
        ]);

        $demandeurs = Demandeur::all();
        return view("demandeur")->with('demandeurs',$demandeurs)->with('success','Demandeur ajouté !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function show(Demandeur $demandeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function edit(Demandeur $demandeur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demandeur $demandeur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demandeur $demandeur)
    {
        //
    }
}
