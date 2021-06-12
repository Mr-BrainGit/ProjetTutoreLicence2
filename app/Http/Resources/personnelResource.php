<?php

namespace App\Http\Resources;

use App\Models\Fonction;
use Illuminate\Http\Resources\Json\JsonResource;

class personnelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $idFonction = $this->idFonction;
        $fonction = Fonction::where('idFonction', $idFonction)->get();
        return [
            "matricule" => $request->matricule,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "dateNaissance" => $request->dateNaissance,
            "adresse" => $this->adresse,
            "sexe" => $this->sexe,
            "telephone" => $this->tel,
            "email" => $this->email,
            "EnService" => true,
            "diplome" => $request->diplome,
            "idFonction" => $request->fonction,
            "libelleFonction" => "ok",
            "idCategorieP" => $this->categorie,
        ];
    }
}
