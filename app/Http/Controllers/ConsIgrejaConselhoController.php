<?php

namespace App\Http\Controllers;

use App\RelConselhos;
use Illuminate\Http\Request;

class ConsIgrejaConselhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.consulta-conselho.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function geral()
    {
        return view("pages.consulta-conselho.consulta-geral");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RelConselhos $relConselhos)
    {
        if (!is_null($request->get('id_sinodo'))) {
            $relConselhos = $relConselhos->where('id_sinodo', '=', $request->get('id_sinodo'));
        }
        if (!is_null($request->get('id_presbiterio'))) {
            $relConselhos = $relConselhos->where('id_presbiterio', '=', $request->get('id_presbiterio'));
        }
        if (!is_null($request->get('id_igreja'))) {
            $relConselhos = $relConselhos->where('id_igreja', '=', $request->get('id_igreja'));
        }

        return view('pages.consulta-conselho.index', [
            'resources' => $relConselhos->paginate(10),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
