<?php

namespace App\Http\Controllers;

use App\Models\Bahia;
use Illuminate\Http\Request;

class BahiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Bahias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Bahias.create');
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
    public function show(Bahia $bahia)
    {
        return view('Bahias.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bahia $bahia)
    {
        return view('Bahias.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bahia $bahia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bahia $bahia)
    {
        //
    }
}