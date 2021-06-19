<?php

namespace App\Http\Controllers;

use App\Models\NoteInformation;
use App\Models\Signataire;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NoteInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signataires = Signataire::all();
        $noteInformation = NoteInformation::orderByDesc('note_information.created_at')
                                ->join('signataires', 'note_information.idSignataire', '=', 'signataires.idSignataire')
                                ->get()->values();

        return view('noteInformation')->with('noteInformation',$noteInformation)
                                      ->with('signataires',$signataires);
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
        NoteInformation::create([
            "destinataire" => $request->destinataire,
            "description" => $request->description,
            "idSignataire" => $request->signataire
        ]);
        return Redirect::route('noteInformation')->with('success',"Personnel mis à jour !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoteInformation  $noteInformation
     * @return \Illuminate\Http\Response
     */
    public function show(NoteInformation $noteInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoteInformation  $noteInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(NoteInformation $noteInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoteInformation  $noteInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NoteInformation $noteInformation)
    {
        //
    }

    public function print(Request $request)
    {
        $id = $request->id;
        $noteInformation = NoteInformation::where('idNoteI', $id)
                                ->join('signataires', 'note_information.idSignataire', '=', 'signataires.idSignataire')
                                ->first();

        $pdf = PDF::loadView('noteInfoPrint', array('data' => $noteInformation));
                return $pdf->stream('teste.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoteInformation  $noteInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->idD;
        $nateI = NoteInformation::where("idNoteI", $id);
        $nateI->delete();
        return Redirect::route('noteInformation')->with('success',"Personnel mis à jour !");

    }
}
