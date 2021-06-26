<?php

namespace App\Http\Controllers;

use App\Models\AutorisationAbsence;
use App\Models\Personnel;
use Illuminate\Http\Request;

class AutorisationAbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personnels = Personnel::all();
        $autorisations = AutorisationAbsence::orderByDesc('autorisation_absences.created_at')
                                ->join('personnels', 'autorisation_absences.matricule', '=', 'personnels.matricule')
                                ->get()->values();

        return view('autorisationAbsence')->with('personnels',$personnels)
                                ->with('autorisations',$autorisations);
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
     * @param  \App\Models\AutorisationAbsence  $autorisationAbsence
     * @return \Illuminate\Http\Response
     */
    public function show(AutorisationAbsence $autorisationAbsence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutorisationAbsence  $autorisationAbsence
     * @return \Illuminate\Http\Response
     */
    public function edit(AutorisationAbsence $autorisationAbsence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutorisationAbsence  $autorisationAbsence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutorisationAbsence $autorisationAbsence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutorisationAbsence  $autorisationAbsence
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutorisationAbsence $autorisationAbsence)
    {
        //
    }

    public function print()
    {

    }
}
