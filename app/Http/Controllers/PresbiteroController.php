<?php

namespace App\Http\Controllers;

use App\Presbiteros;
use Illuminate\Http\Request;

class PresbiteroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("cadastros-ministros");
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
     * @param  \App\Presbiteros $presbiteros
     * @return \Illuminate\Http\Response
     */
    public function show(Presbiteros $presbiteros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presbiteros $presbiteros
     * @return \Illuminate\Http\Response
     */
    public function edit(Presbiteros $presbiteros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Presbiteros $presbiteros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presbiteros $presbiteros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presbiteros $presbiteros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presbiteros $presbiteros)
    {
        //
    }
}
