<?php

namespace App\Http\Controllers;

use App\Http\Requests\RelatoriosRequest;
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
    public function store(RelatoriosRequest $request)
    {
        // INFORMAR AQUI OS CAMPOS QUE SÃO CHECKBOX
        //or_declaracao_ano_anterior_irenda
        //or_declaracao_ano_anterior_rais
        //or_declaracao_ano_anterior_dirf
        //se_trabalho_missionario_jmn
        //se_trabalho_missionario_apmt
        //se_trabalho_missionario_pmc
        //se_trabalho_missionario_plantacao
        $data = $request->all();
        if (is_null($request->get('status_relatorio'))) {
            $data['status_relatorio'] = 0;
        }
        if (is_null($request->get('or_declaracao_ano_anterior_irenda'))) {
            $data['or_declaracao_ano_anterior_irenda'] = 0;
        }
        if (is_null($request->get('or_declaracao_ano_anterior_rais'))) {
            $data['or_declaracao_ano_anterior_rais'] = 0;
        }
        if (is_null($request->get('or_declaracao_ano_anterior_dirf'))) {
            $data['or_declaracao_ano_anterior_dirf'] = 0;
        }
        if (is_null($request->get('se_trabalho_missionario_jmn'))) {
            $data['se_trabalho_missionario_jmn'] = 0;
        }
        if (is_null($request->get('se_trabalho_missionario_apmt'))) {
            $data['se_trabalho_missionario_apmt'] = 0;
        }
        if (is_null($request->get('se_trabalho_missionario_pmc'))) {
            $data['se_trabalho_missionario_pmc'] = 0;
        }
        if (is_null($request->get('se_trabalho_missionario_plantacao'))) {
            $data['se_trabalho_missionario_plantacao'] = 0;
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
    public function update(RelatoriosRequest $request, RelConselhos $relConselhos, $id)
    {
        try {
            $data = $request->all();
            if (is_null($request->get('status_relatorio'))) {
                $data['status_relatorio'] = 0;
            }
            if (is_null($request->get('or_declaracao_ano_anterior_irenda'))) {
                $data['or_declaracao_ano_anterior_irenda'] = 0;
            }
            if (is_null($request->get('or_declaracao_ano_anterior_rais'))) {
                $data['or_declaracao_ano_anterior_rais'] = 0;
            }
            if (is_null($request->get('or_declaracao_ano_anterior_dirf'))) {
                $data['or_declaracao_ano_anterior_dirf'] = 0;
            }
            if (is_null($request->get('se_trabalho_missionario_jmn'))) {
                $data['se_trabalho_missionario_jmn'] = 0;
            }
            if (is_null($request->get('se_trabalho_missionario_apmt'))) {
                $data['se_trabalho_missionario_apmt'] = 0;
            }
            if (is_null($request->get('se_trabalho_missionario_pmc'))) {
                $data['se_trabalho_missionario_pmc'] = 0;
            }
            if (is_null($request->get('se_trabalho_missionario_plantacao'))) {
                $data['se_trabalho_missionario_plantacao'] = 0;
            }
            DB::beginTransaction();
            $resource = $relConselhos->findOrfail((int)$id);
            $resource->update($data);
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
            $data['user_id'] = auth()->user()->id;
            $resource = $relConselhos->findOrFail((int)$id);
            $resource->update($data);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/conselho")->with('deleted', "success");
    }
}
