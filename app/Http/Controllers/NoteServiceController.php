<?php

namespace App\Http\Controllers;

use App\Models\NoteService;
use App\Models\Signataire;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NoteServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signataires = Signataire::all();
        $noteService = NoteService::orderByDesc('note_services.created_at')
                                ->join('signataires', 'note_services.idSignataire', '=', 'signataires.idSignataire')
                                ->get()->values();

        return view('noteService')->with('noteService',$noteService)
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
        NoteService::create([
            "libelleNoteS" => $request->destinataire,
            "corpsNoteS" => $request->description,
            "idSignataire" => $request->signataire
        ]);
        return Redirect::route('noteService')->with('success',"Personnel mis à jour !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoteService  $noteService
     * @return \Illuminate\Http\Response
     */
    public function show(NoteService $noteService)
    {
        //
    }

    public function print(Request $request)
    {
        $id = $request->id;
        $noteService = NoteService::where('idNoteS', $id)
                                ->join('signataires', 'note_services.idSignataire', '=', 'signataires.idSignataire')
                                ->first();

        $pdf = PDF::loadView('noteInfoPrint', array('data' => $noteService));
                return $pdf->stream('teste.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoteService  $noteService
     * @return \Illuminate\Http\Response
     */
    public function edit(NoteService $noteService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoteService  $noteService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NoteService $noteService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoteService  $noteService
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->idD;
        $nateI = NoteService::where("idNoteS", $id);
        $nateI->delete();
        return Redirect::route('noteService')->with('success',"Personnel mis à jour !");
    }
}
