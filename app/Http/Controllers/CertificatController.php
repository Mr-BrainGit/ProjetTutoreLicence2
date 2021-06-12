<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

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

    public function printCertificat()
    {
        $pdf = PDF::loadView('certificatPrint');

        return $pdf->stream('teste.pdf');

    }
}
