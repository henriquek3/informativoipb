<?php

namespace App\Http\Controllers;

use App\RelConselhos;
use App\RelEstatisticas;
use Illuminate\Http\Request;

class RelConselhoController extends Controller
{
    /**
     * RelConselhoController constructor.
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
        return view("relatorios-conselhos");
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
            $rs = $request->user()->relConselhos()->create($request->all());
        } catch (\Exception $exception) {
            return response()->json($exception, 500); // kelewzius
        }
        return response()->json($rs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RelConselhos $relConselhos
     * @return \Illuminate\Http\Response
     */
    public function show(RelConselhos $relConselhos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelConselhos $relConselhos
     * @return \Illuminate\Http\Response
     */
    public function edit(RelConselhos $relConselhos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RelConselhos $relConselhos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RelConselhos $relConselhos)
    {
        try {
            $resource = $relConselhos->findOrfail((int)$request->get("id"));
            $resource->update($request->all());
        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelConselhos $relConselhos
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelConselhos $relConselhos, Request $request)
    {
        $resource = $relConselhos->findOrFail((int)$request->get("id"));
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
        return response()->json(RelConselhos::all());
    }
}
