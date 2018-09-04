<?php

namespace App\Http\Controllers;

use App\Estados;
use App\IgrejasCongregacoes;
use Illuminate\Http\Request;

class IgrejaCongregacaoController extends Controller
{
    /**
     * IgrejaController constructor.
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IgrejasCongregacoes $congregacoes, Estados $estados, $id)
    {
        return view('pages.congregacoes.form', [
            'estados' => $estados->all(),
            'id_igreja' => $id,
            'nome_igreja' => $congregacoes->findOrFail($id)->igreja->nome,
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
            $rs = $request->user()->congregacoes()->create($request->all());
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
     * @param  \App\IgrejasCongregacoes $igrejasCongregacoes
     * @return \Illuminate\Http\Response
     */
    public function show(IgrejasCongregacoes $igrejasCongregacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IgrejasCongregacoes $igrejasCongregacoes
     * @return \Illuminate\Http\Response
     */
    public function edit(IgrejasCongregacoes $congregacoes, Estados $estados, $id)
    {
        return view('pages.congregacoes.form', [
            'estados' => $estados->all(),
            'resource' => $congregacoes->findOrFail($id),
            'id_igreja' => $congregacoes->findOrFail($id)->id_igreja,
            'nome_igreja' => $congregacoes->findOrFail($id)->igreja->nome,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\IgrejasCongregacoes $igrejasCongregacoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IgrejasCongregacoes $igrejasCongregacoes)
    {
        try {
            $resource = $igrejasCongregacoes->findOrfail((int)$request->get("id"));
            $resource->update($request->all());
        } catch (\Illuminate\Database\QueryException $queryException) {
            $msg = $queryException->getMessage();
            $erro = $queryException->getCode();
            return response()->json([$msg => $erro], 500);
        }
        return response()->json(
            $resource->with([
                'usuario',
                'igreja',
            ])->where('id', $resource->id)->get()
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IgrejasCongregacoes $igrejasCongregacoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(IgrejasCongregacoes $igrejasCongregacoes, $id)
    {
        try {
            $data['user_id'] = auth()->user()->id;
            $resource = $igrejasCongregacoes->findOrFail($id);
            $resource->update($data);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/sinodos")->with('deleted', "success");
    }
}
