<?php

namespace App\Http\Controllers;

use App\RelEstatisticas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelEstatisticaController extends Controller
{
    /**
     * RelEstatisticaController constructor.
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
    public function index(RelEstatisticas $relEstatisticas)
    {
        return view("pages.relatorios-estatisticas.index", [
            "resources" => $relEstatisticas->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RelEstatisticas $relEstatisticas)
    {
        try {
            $resource = $relEstatisticas->where('ano', '=', Date("Y"))->count();
            if ($resource === 1) {
                //throw new \Exception("Não é possível inserir mais de um relatório por ano, edite o que já existe");
                return redirect()->back()->with('config_message', 'Não é possível inserir mais de um relatório por ano, edite o relatório que já existe.');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return view("pages.relatorios-estatisticas.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // INFORMAR AQUI OS CAMPOS QUE SÃO CHECKBOX
        $data = $request->all();
        if (is_null($request->get('status_relatorio'))) {
            $data['status_relatorio'] = 0;
        }
        try {
            DB::beginTransaction();
            $resource = $request->user()->relEstatisticas()->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/estatistica/$resource->id/editar")->with('saved', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RelEstatisticas $relEstatisticas
     * @return \Illuminate\Http\Response
     */
    public function show(RelEstatisticas $relEstatisticas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelEstatisticas $relEstatisticas
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RelEstatisticas $relEstatisticas, $id)
    {
        return view('pages.relatorios-estatisticas.form', [
            'resource' => $relEstatisticas->where('id', '=', $id)
                ->with('usuario', 'usuario.presbitero.igreja', 'usuario.presbitero.igreja.presbiterio', 'usuario.presbitero.igreja.presbiterio.sinodo')
                ->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RelEstatisticas $relEstatisticas
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RelEstatisticas $relEstatisticas, $id)
    {
        try {
            DB::beginTransaction();
            $resource = $relEstatisticas->findOrfail((int)$id);
            $resource->update($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/estatistica/$resource->id/editar")->with('updated', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelEstatisticas $relEstatisticas
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelEstatisticas $relEstatisticas, $id)
    {
        try {
            $resource = $relEstatisticas->findOrFail((int)$id);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/estatistica")->with('deleted', "success");
    }
}
