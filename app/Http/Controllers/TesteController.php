<?php

namespace App\Http\Controllers;

use App\Teste;
use Illuminate\Http\Request;

class TesteController extends Controller
{
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
    public function create()
    {
        return view('pages.teste', [
            'testes' => Teste::all()
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
        $data = $request->all();
        $t = new Teste();
        $t->fill($data);
        $t->save();
        return response()->json($t->toJson());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teste $teste
     * @return \Illuminate\Http\Response
     */
    public function show(Teste $teste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teste $teste
     * @return \Illuminate\Http\Response
     */
    public function edit(Teste $teste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Teste $teste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teste $teste)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teste $teste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teste $teste)
    {
        //
    }
}
