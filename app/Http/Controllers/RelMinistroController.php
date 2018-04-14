<?php

namespace App\Http\Controllers;

use App\RelMinistros;
use Illuminate\Http\Request;

class RelMinistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("relatorios-ministeriais");
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
     * @param  \App\RelMinistros $relMinistros
     * @return \Illuminate\Http\Response
     */
    public function show(RelMinistros $relMinistros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelMinistros $relMinistros
     * @return \Illuminate\Http\Response
     */
    public function edit(RelMinistros $relMinistros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RelMinistros $relMinistros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RelMinistros $relMinistros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelMinistros $relMinistros
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelMinistros $relMinistros)
    {
        //
    }
}
