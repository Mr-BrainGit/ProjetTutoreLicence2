<?php

namespace App\Http\Controllers;

use App\Models\TypeFonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TypeFonctionController extends Controller
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
     * @param  \App\Models\TypeFonction  $typeFonction
     * @return \Illuminate\Http\Response
     */
    public function show(TypeFonction $typeFonction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeFonction  $typeFonction
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeFonction $typeFonction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeFonction  $typeFonction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeFonction $typeFonction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeFonction  $typeFonction
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeFonction $typeFonction)
    {
        //
    }
}
