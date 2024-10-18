<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Etapas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etapa = new Etapa();
        return view('Etapas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(Etapa $etapa)
    {
        return view('Etapas.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etapa $etapa)
    {
        return view('Etapas.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etapa $etapa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etapa $etapa)
    {
        //
    }
}