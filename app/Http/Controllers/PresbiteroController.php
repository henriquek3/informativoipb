<?php

namespace App\Http\Controllers;

use App\Estados;
use App\Presbiterios;
use App\Presbiteros;
use Illuminate\Http\Request;

class PresbiteroController extends Controller
{
    /**
     * PresbiteroController constructor.
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
    public function index(Presbiteros $presbiteros)
    {
        return view("pages.presbiteros.index", [
            'resources' => $presbiteros->with(
                'usuario', 'igreja', 'igreja.presbiterio', 'igreja.presbiterio.sinodo'
            )->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estados $estados)
    {
        return view('pages.presbiteros.form', [
            'estados' => $estados->all()
        ]);
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
            $rs = $request->user()->presbiteros()->create($request->all());
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
        $resource = $presbiteros->findOrfail((int)$request->get("id"));
        $resource->update($request->all());
        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presbiteros $presbiteros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presbiteros $presbiteros, Request $request)
    {
        $resource = $presbiteros->findOrFail((int)$request->get("id"));
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function api(Request $request)
    {
        $result['items'] = Presbiteros::where("nome", "like", "%{$request->get("nome")}%")->get();
        return response()->json($result);
    }
}
