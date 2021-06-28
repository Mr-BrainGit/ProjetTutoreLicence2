<?php

namespace App\Http\Controllers;

use App\Models\Signataire;
use App\Models\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SignataireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $fonctions = Fonction::all();
        $signataires = Signataire::orderByDesc('signataires.created_at')
                                ->join('fonctions', 'signataires.idFonctionSignataire', '=', 'fonctions.idFonction')
                                ->get()->values();

        return view("signataire")->with('signataires',$signataires)
                                 ->with('fonctions',$fonctions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         Signataire::create([
            "idSignataire" => $request->idSignataire,
            "nomCompletSignataire" => $request->nomCompletSignataire,
            "distinctionSignataire" => $request->distinctionSignataire,
            "idFonctionSignataire" => $request->idFonction,
        ]);

        $signataires = Signataire::all();
        return Redirect::route('signataire')->with('success',"Signataire mis à jour !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signataire  $signataire
     * @return \Illuminate\Http\Response
     */
    public function show(Signataire $signataire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signataire  $signataire
     * @return \Illuminate\Http\Response
     */
    public function edit(Signataire $signataire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Signataire  $signataire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signataire $signataire)
    {
        // dd($request->signataire);
            $oldidSignataire = $request->OldidSignataire;
            $signataire = Signataire::where("idSignataire", $oldidSignataire);
            $signataire->update([
            
            "nomCompletSignataire" => $request->nomCompletSignataire,
            "distinctionSignataire" => $request->distinctionSignataire,
            "idFonctionSignataire" => $request->idFonctionSignataire,
        ]);
        return Redirect::route('signataire')->with('success',"Signataire mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signataire  $signataires
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->signataires);
        $idSignataire = $request->idSignataire;
        $signataires = Signataire::where("idSignataire", $idSignataire);
        $signataires->delete();
        return Redirect::route('signataire')->with('success',"Signataire mis à jour !");
    }
}
