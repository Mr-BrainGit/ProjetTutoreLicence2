<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use App\Models\Personnel;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Certificat  $certificat
     * @return \Illuminate\Http\Response
     */
    public function show(Certificat $certificat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificat  $certificat
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificat $certificat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificat  $certificat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificat $certificat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificat  $certificat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificat $certificat)
    {
        //
    }

    public function printCertificat(Request $request)
    {
        $matricule = $request->matricule;
        Carbon::setLocale('fr');

        if ($request->typeCer === "1") {
            $personnels = Personnel::where('personnels.matricule', $matricule)
                                ->join('fonctions', 'personnels.idFonction', '=', 'fonctions.idFonction')
                                ->join('categorie_personnels', 'personnels.idCategorieP', '=', 'categorie_personnels.idCategorieP')
                                ->join('certificats', 'personnels.matricule', '=', 'certificats.matricule')->where('certificats.idTypeCertificat', '=', 1)
                                ->join('type_certificats', 'type_certificats.idTypeCertificat', '=', 'certificats.idTypeCertificat')
                                ->get()->values();

            $personnels[0]->date = Carbon::parse($personnels[0]->date)->translatedFormat('d M Y');
            $pdf = PDF::loadView('certificatPrint', array('data' =>$personnels));
            return $pdf->stream('teste.pdf');
        } elseif($request->typeCer === "2") {

            $personnels = Personnel::where('personnels.matricule', $matricule)
                                ->join('fonctions', 'personnels.idFonction', '=', 'fonctions.idFonction')
                                ->join('categorie_personnels', 'personnels.idCategorieP', '=', 'categorie_personnels.idCategorieP')
                                ->join('certificats', 'personnels.matricule', '=', 'certificats.matricule')->where('certificats.idTypeCertificat', '=', 2)
                                ->join('type_certificats', 'type_certificats.idTypeCertificat', '=', 'certificats.idTypeCertificat')
                                ->get()->values();



            if (isEmpty($personnels)) {
                echo('Certificat de cessation inexistant !!');
            }else{
                $pdf = PDF::loadView('certificatPrint', array('data' =>$personnels));
                return $pdf->stream('teste.pdf');
            }

        }



    }
}
