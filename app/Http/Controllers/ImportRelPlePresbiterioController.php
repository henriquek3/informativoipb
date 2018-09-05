<?php

namespace App\Http\Controllers;

use App\ImportRelPlePresbiterio;
use Illuminate\Http\Request;

class ImportRelPlePresbiterioController extends Controller
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
    public function create(ImportRelPlePresbiterio $importRelPlePresbiterio)
    {
        $sql = "select upper(s.sigla)                   as sinodo,
                       upper(p.sigla)                   as presbiterio,
                       igrejas.nome                     as igreja,
                       ifnull(rc.status_relatorio, '-') as conselho_status,
                       ifnull(re.status_relatorio, '-') as estatistica_status,
                       ifnull(rm.status_relatorio, '-') as ministro_status,
                       (ifnull(rc.status_relatorio, 0) +
                        ifnull(re.status_relatorio, 0) +
                        ifnull(rm.status_relatorio, 0))as  status_geral              
                from   igrejas
                       join presbiterios p on igrejas.id_presbiterio = p.id
                       join sinodos s on p.id_sinodo = s.id
                       left join relatorios_conselhos rc on igrejas.id = rc.id_igreja
                       left join relatorios_estatisticas re on igrejas.id = re.id_igreja
                       left join relatorios_ministros rm on igrejas.id = rm.id_igreja";

        return view('pages.reunioes-presbiterio.relatorios.form', [
            'resources' => $importRelPlePresbiterio->paginate(15)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
