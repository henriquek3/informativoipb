<?php

namespace App\Http\Controllers;

use App\RelEstatisticas;
use Illuminate\Http\Request;

class RelEstatisticaController extends Controller
{
    /**
     * RelEstatisticaController constructor.
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
        try {
            $rs = $request->user()->relEstatisticas()->create($request->all());
        } catch (\Illuminate\Database\QueryException $queryException) {
            $msg = $queryException->getMessage();
            $erro = $queryException->getCode();
            return response()->json([$msg => $erro], 500);
        }
        return response()->json($rs);
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
        try {
            $resource = $relEstatisticas->findOrfail((int)$request->get("id"));
            $resource->update($request->all());
        } catch (\Illuminate\Database\QueryException $queryException) {
            $msg = $queryException->getMessage();
            $erro = $queryException->getCode();
            return response()->json([$msg => $erro], 500);
        }
        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelEstatisticas $relEstatisticas
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelEstatisticas $relEstatisticas, Request $request)
    {
        $resource = $relEstatisticas->findOrFail((int)$request->get("id"));
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
        return response()->json(RelEstatisticas::all());
    }
}
