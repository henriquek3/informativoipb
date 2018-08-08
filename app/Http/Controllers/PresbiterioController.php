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
    public function index(Presbiterios $presbiterios)
    {
        return view("pages.presbiterios.index", ['resources' => $presbiterios->with('sinodos')->simplePaginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.presbiterios.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sinodos $sinodos)
    {
        dd($request->all());

        try {
            $sinodo = $sinodos->where('nome', 'like', $request->get('sinodo'))->first();
            if (count($sinodo) = !1)
        } catch (\PDOException $exception) {
        }

        try {
            DB::beginTransaction();
            $resource = $request->user()->presbiterios()->create($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/presbiterios/$resource->id/editar")->with('saved', "success");
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
    public function api(Request $request)
    {
        $id = (int)$request->get("id");
        $sinodo = (int)$request->get("sinodo");
        if ($id > 0 ){
            return response()->json(Presbiterios::with([
                'sinodo',
                'usuario',
            ])->where("id", $id)->get());
        } elseif ($sinodo > 0) {
            return response()->json(Presbiterios::with([
                'sinodo',
                'usuario',
            ])->where("id_sinodo", $sinodo)->get());
        } else {
            return response()->json(Presbiterios::with([
                'sinodo',
                'usuario',
            ])->get());
        }
    }

    public function scopos(Presbiterios $presbiterios)
    {
        return view("scopos", [
            'resource' => $presbiterios->sinodos()->get()
        ]);
    }
}
