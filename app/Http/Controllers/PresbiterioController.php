<?php

namespace App\Http\Controllers;

use App\Presbiterios;
use Illuminate\Http\Request;

class PresbiterioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("cadastros-presbiterios");
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
     * @param  \App\Presbiterios $presbiterios
     * @return \Illuminate\Http\Response
     */
    public function show(Presbiterios $presbiterios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presbiterios $presbiterios
     * @return \Illuminate\Http\Response
     */
    public function edit(Presbiterios $presbiterios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Presbiterios $presbiterios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presbiterios $presbiterios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presbiterios $presbiterios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presbiterios $presbiterios)
    {
        //
    }
}
