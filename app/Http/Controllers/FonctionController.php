<?php

namespace App\Http\Controllers;
use App\Http\Resources\fonctionResource;
use App\Models\Fonction;
use App\Models\TypeFonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $typefonctions = TypeFonction::all();
        $fonctions = Fonction::orderByDesc('fonctions.created_at')
                                ->join('type_fonctions', 'fonctions.idTypeFonction', '=', 'type_fonctions.idTypeFonction')
                                ->get()->values();
        return view('fonction')->with('typefonctions',$typefonctions)
                               ->with('fonctions',$fonctions);
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
         fonction::create([
            "libelleFonction" => $request->libelleFonction,
            "idTypeFonction" => $request->idTypeFonction,
        ]);

        return Redirect::route('fonction')->with('success',"Fonciont mis à jour !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function show(Fonction $fonction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function edit(Fonction $fonction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonction $fonction)
    {
        //
        $oldidFonction = $request->oldidFonction;
        $fonction = fonction::where("idFonction", $oldidFonction);
        $fonction->update([
            "libelleFonction" => $request->libelleFonction,
            "idTypeFonction" => $request->idTypeFonction,
        ]);
        return Redirect::route('fonction')->with('success',"Fonciont mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $idFonction = $request->idFonction;
        $fonction = fonction::where("idFonction", $idFonction);
        $fonction->delete();
        return Redirect::route('fonction')->with('success',"Fonction mis à jour !");
    }
}
