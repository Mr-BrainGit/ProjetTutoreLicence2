<?php

namespace App\Http\Controllers;

use App\Models\CategoriePersonnel;
use App\Models\Certificat;
use App\Models\Echellon;
use App\Models\Fonction;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoriePersonnel::all();
        $fonctions = Fonction::all();
        $echellons = Echellon::all();
        $personnels = Personnel::orderByDesc('personnels.created_at')
                                ->join('fonctions', 'personnels.idFonction', '=', 'fonctions.idFonction')
                                ->join('categorie_personnels', 'personnels.idCategorieP', '=', 'categorie_personnels.idCategorieP')
                                ->join('certificats', 'personnels.matricule', '=', 'certificats.matricule')->where('certificats.idTypeCertificat', '=', 1)
                                ->get()->values();


        return view('personnel')->with('categories',$categories)
                                ->with('fonctions',$fonctions)
                                ->with('echellons',$echellons)
                                ->with('personnels',$personnels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /**Personnel::validate([
            "matricule" => "required",
            "nom" => "required",
            "prenom" => "required",
            "dateNaissance" => "required",
            "adresse" => "required",
            "sexe" => "required",
            "telephone" => "required",
            "email" => "required",
            "EnService" => true,
            "diplome" => "required",
            "idFonction" => "required",
            "idCategorieP" => "required",
        ]);*/

        Personnel::create([
            "matricule" => $request->matricule,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "dateNaissance" => $request->dateNaissance,
            "adresse" => $request->adresse,
            "sexe" => $request->sexe,
            "telephone" => $request->tel,
            "email" => $request->email,
            "EnService" => true,
            "diplome" => $request->diplome,
            "idFonction" => $request->fonction,
            "idCategorieP" => $request->categorie,
        ]);

        Certificat::create([
            "fonctionPrecedente" => $request->foncP,
            "fonctionActuelle" => $request->fonction,
            "structurePrecedente" => $request->strucP,
            "structureActuelle" => "IBAM",
            "decision" => $request->decision,
            "date" => $request->datePS,
            "matricule" => $request->matricule,
            "idTypeCertificat" => 1,

        ]);

        return Redirect::route('personnel')->with('success',"Personnel mis à jour !");

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $oldMatricule = $request->Oldmatricule;
        $personnel = Personnel::where("matricule", $oldMatricule);
        $personnel->update([
            "matricule" => $request->matricule,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "dateNaissance" => $request->dateNaissance,
            "adresse" => $request->adresse,
            "sexe" => $request->sexe,
            "telephone" => $request->tel,
            "email" => $request->email,
            "EnService" => true,
            "diplome" => $request->diplome,
            "idFonction" => $request->fonction,
            "idCategorieP" => $request->categorie,
        ]);

        return Redirect::route('personnel')->with('success',"Personnel mis à jour !");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $matricule = $request->matricule;
        $personnel = Personnel::where("matricule", $matricule);
        $personnel->delete();
        return Redirect::route('personnel')->with('success',"Personnel mis à jour !");


    }
}
