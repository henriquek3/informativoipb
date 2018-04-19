<?php

namespace App\Http\Controllers;

use App\Presbiterios;
use Illuminate\Http\Request;

class PresbiterioController extends Controller
{
    /**
     * PresbiterioController constructor.
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
        $rs = $request->user()->presbiterios()->create($request->all());
        return response()->json($rs);
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
        $resource = $presbiterios->findOrfail((int)$request->get("id"));
        $resource->update($request->all());
        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presbiterios $presbiterios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presbiterios $presbiterios, Request $request)
    {
        $resource = $presbiterios->findOrFail((int)$request->get("id"));
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
     *
     */
    public function api()
    {
        return response()->json(Presbiterios::all());
    }
}
