<?php

namespace App\Http\Controllers;

use App\RelMinistros;
use Illuminate\Http\Request;

class RelMinistroController extends Controller
{
    /**
     * RelMinistroController constructor.
     *
     * @authenticator
     */
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
        $rs = $request->user()->relMinistros()->create($request->all());
        return response()->json($rs);
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
        $resource = $relMinistros->findOrfail((int)$request->get("id"));
        $resource->update($request->all());
        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelMinistros $relMinistros
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelMinistros $relMinistros, Request $request)
    {
        $resource = $relMinistros->findOrFail((int)$request->get("id"));
        try {
            $resource->delete();
        } catch (\Illuminate\Database\QueryException $queryException) {
            $msg = $queryException->getMessage();
            $erro = $queryException->getCode();
            return response()->json([$msg => $erro], 500);
        }
        return response()->json($resource);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function api()
    {
        return response()->json(RelMinistros::all());
    }
}
