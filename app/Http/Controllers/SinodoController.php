<?php

namespace App\Http\Controllers;

use App\Sinodos;
use Illuminate\Http\Request;

class SinodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("cadastros-sinodos");
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
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function show(Sinodos $sinodos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinodos $sinodos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinodos $sinodos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinodos $sinodos)
    {
        //
    }
}
