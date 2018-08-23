<?php

namespace App\Http\Controllers;

use App\Estados;
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
    public function index(Igrejas $igrejas)
    {
        return view("pages.igrejas.index", [
            'resources' => $igrejas->with('presbiterio','presbiterio.sinodo')
                ->simplePaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estados $estados)
    {
        return view('pages.igrejas.form', [
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
            $rs = $request->user()->igrejas()->create($request->all());
        } catch (\Exception $exception) {
            return response()->json($exception);
        }
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
        try {
            $resource = $igrejas->findOrfail((int)$request->get("id"));
            $resource->update($request->all());
        } catch (\Exception $exception) {
            return response()->json($exception);
        }
        return response()->json(
            $resource->with([
                'usuario',
                'presbiterio',
                'presbiterio.sinodo'
            ])->where('id',$resource->id)->get()
        );
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
    public function api(Request $request)
    {
        $id = (int)$request->get('id');
        $presbiterio = (int)$request->get('presbiterio');
        if ($presbiterio > 0) {
            return response()->json(
                Igrejas::where('id_presbiterio', $presbiterio)
                    ->with([
                        'usuario',
                        'presbiterio',
                        'presbiterio.sinodo'
                    ])->get()
            );
        } elseif ($id > 0) {
            return response()->json(
                Igrejas::with([
                    'usuario',
                    'presbiterio',
                    'presbiterio.sinodo'
                ])->where('id', $id)
                    ->get()
            );
        } else {
            return response()->json(
                Igrejas::with([
                    'usuario',
                    'presbiterio',
                    'presbiterio.sinodo'
                ])->get()
            );
        }
    }
}
