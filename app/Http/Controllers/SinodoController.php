<?php

namespace App\Http\Controllers;

use App\Sinodos;
use Illuminate\Http\Request;

class SinodoController extends Controller
{
    /**
     * SinodoController constructor.
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
        $rs = $request->user()->sinodos()->create($request->all());
        return response()->json($rs);
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
        $resource = $sinodos->findOrfail((int)$request->get("id"));
        $resource->update($request->all());
        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinodos $sinodos, Request $request)
    {
        $resource = $sinodos->findOrFail((int)$request->get("id"));
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
    public function api(Request $request)
    {
        $id = (int)$request->get("id");
        if ($id > 0 ){
            return response()->json( Sinodos::findOrFail($id) );
        } else {
            return response()->json(Sinodos::all());
        }
    }
}
