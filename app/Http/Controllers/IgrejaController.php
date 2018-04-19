<?php

namespace App\Http\Controllers;

use App\Igrejas;
use Illuminate\Http\Request;

class IgrejaController extends Controller
{
    /**
     * IgrejaController constructor.
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
        return view("cadastros-igrejas");
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
        $rs = $request->user()->igrejas()->create($request->all());
        return response()->json($rs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Igrejas $igrejas
     * @return \Illuminate\Http\Response
     */
    public function show(Igrejas $igrejas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Igrejas $igrejas
     * @return \Illuminate\Http\Response
     */
    public function edit(Igrejas $igrejas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Igrejas $igrejas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Igrejas $igrejas)
    {
        $resource = $igrejas->findOrfail((int)$request->get("id"));
        $resource->update($request->all());
        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Igrejas $igrejas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Igrejas $igrejas, Request $request)
    {
        $resource = $igrejas->findOrFail((int)$request->get("id"));
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
        return response()->json(Igrejas::all());
    }
}
