<?php

namespace App\Http\Controllers;

use App\Presbiterios;
use App\Sinodos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresbiterioController extends Controller
{
    /**
     * PresbiterioController constructor.
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
    public function index(Presbiterios $presbiterios)
    {
        return view("pages.presbiterios.index", ['resources' => $presbiterios->with('sinodo')->simplePaginate(10)]);
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
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sinodos $sinodos)
    {
        //dd($request->all());
        $sinodo = null;
        try {
            $sinodo = $sinodos->where('nome', 'like', $request->get('sinodo'))->first();
            if ($sinodo->nome !== $request->get('sinodo')) {
                throw new \PDOException('Sínodo não encontrado', 777);
            }
        } catch (\PDOException $exception) {
            dd($exception->getMessage());
            return redirect()->back()->withErrors($exception->getMessage());
        }
        $data = $request->all();
        unset($data['sinodo']);
        $data['id_sinodo'] = $sinodo->id;
        try {
            DB::beginTransaction();
            $resource = $request->user()->presbiterios()->create($data);
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Presbiterios $presbiterios, int $id)
    {
        $resource = $presbiterios->where('id', '=', $id)->with('sinodo')->first();
        return view("pages.presbiterios.form", ['resource' => $resource]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Presbiterios $presbiterios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presbiterios $presbiterios)
    {//ajustar rota editar
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function api(Request $request)
    {
        $nome = $request->get("nome");
        if ($nome) {
            $nome = "%" . $nome . "%";
            $result['items'] = Presbiterios::where("nome", "like", $nome)->get();
            return response()->json($result);
        }
    }
}
