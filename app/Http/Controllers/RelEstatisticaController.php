<?php

namespace App\Http\Controllers;

use App\RelEstatisticas;
use Illuminate\Http\Request;

class RelEstatisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("relatorios-estatisticas");
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RelEstatisticas $relEstatisticas
     * @return \Illuminate\Http\Response
     */
    public function show(RelEstatisticas $relEstatisticas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelEstatisticas $relEstatisticas
     * @return \Illuminate\Http\Response
     */
    public function edit(RelEstatisticas $relEstatisticas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RelEstatisticas $relEstatisticas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RelEstatisticas $relEstatisticas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelEstatisticas $relEstatisticas
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelEstatisticas $relEstatisticas)
    {
        //
    }
}
