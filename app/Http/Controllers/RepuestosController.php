<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepuestosController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Repuestos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Repuestos.create');
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
    public function show(Request $repuestos)
    {
        return view('Repuestos.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $repuestos)
    {
        return view('Repuestos.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $repuestos)
    {
        //
    }
}