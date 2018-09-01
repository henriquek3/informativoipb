<?php

namespace App\Http\Controllers;

use App\RelConselhos;
use App\RelEstatisticas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelConselhoController extends Controller
{
    /**
     * RelConselhoController constructor.
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
    public function index(RelConselhos $relConselhos)
    {
        return view("pages.relatorios-conselhos.index", [
            "resources" => $relConselhos->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RelConselhos $relConselhos)
    {
        try {
            $resource = $relConselhos->where('ano', '=', Date("Y"))->count();
            if ($resource === 1) {
                //throw new \Exception("Não é possível inserir mais de um relatório por ano, edite o que já existe");
                return redirect()->back()->with('config_message', 'Não é possível inserir mais de um relatório por ano, edite o relatório que já existe.');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return view("pages.relatorios-conselhos.form");
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
        // INFORMAR AQUI OS CAMPOS QUE SÃO CHECKBOX
        if (is_null($request->get('congregacao_presbiterio'))) {
            $data['congregacao_presbiterio'] = 0;
        }
        try {
            DB::beginTransaction();
            $resource = $request->user()->relConselhos()->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/conselho/$resource->id/editar")->with('saved', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RelConselhos $relConselhos
     * @return \Illuminate\Http\Response
     */
    public function show(RelConselhos $relConselhos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelConselhos $relConselhos
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RelConselhos $relConselhos, $id)
    {
        return view('pages.relatorios-conselhos.form', [
            'resource' => $relConselhos->where('id', '=', $id)
                ->with('usuario', 'usuario.presbitero.igreja', 'usuario.presbitero.igreja.presbiterio', 'usuario.presbitero.igreja.presbiterio.sinodo')
                ->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RelConselhos $relConselhos
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RelConselhos $relConselhos, $id)
    {
        try {
            DB::beginTransaction();
            $resource = $relConselhos->findOrfail((int)$id);
            $resource->update($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/conselho/$resource->id/editar")->with('updated', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelConselhos $relConselhos
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelConselhos $relConselhos, $id)
    {
        try {
            $resource = $relConselhos->findOrFail((int)$id);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/conselho")->with('deleted', "success");
    }
}
