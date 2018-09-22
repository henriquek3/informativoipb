<?php

namespace App\Http\Controllers;

use App\Http\Requests\RelatoriosRequest;
use App\RelMinistros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelMinistroController extends Controller
{
    /**
     * RelMinistroController constructor.
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
    public function index(RelMinistros $relMinistros)
    {
        return view("pages.relatorios-ministros.index", [
            "resources" => $relMinistros->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RelMinistros $relMinistros)
    {
        try {
            $resource = $relMinistros->where('ano', '=', Date("Y"))->count();
            if ($resource === 1) {
                //throw new \Exception("Não é possível inserir mais de um relatório por ano, edite o que já existe");
                return redirect()->back()->with('config_message', 'Não é possível inserir mais de um relatório por ano, edite o relatório que já existe.');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return view("pages.relatorios-ministros.form");
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
        $data = $request->all();
        if (is_null($request->get('status_relatorio'))) {
            $data['status_relatorio'] = 0;
        }
        try {
            DB::beginTransaction();
            $resource = $request->user()->relMinistros()->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/ministerial/$resource->id/editar")->with('saved', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RelMinistros $relMinistros
     * @return \Illuminate\Http\Response
     */
    public function show(RelMinistros $relMinistros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RelMinistros $relMinistros
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RelMinistros $relMinistros, $id)
    {
        return view('pages.relatorios-ministros.form', [
            'resource' => $relMinistros->where('id', '=', $id)
                ->with('usuario', 'usuario.presbitero.igreja', 'usuario.presbitero.igreja.presbiterio', 'usuario.presbitero.igreja.presbiterio.sinodo')
                ->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RelMinistros $relMinistros
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RelatoriosRequest $request, RelMinistros $relMinistros, $id)
    {
        $data = $request->all();
        if (is_null($request->get('status_relatorio'))) {
            $data['status_relatorio'] = 0;
        }
        try {
            DB::beginTransaction();
            $resource = $relMinistros->findOrfail((int)$id);
            $resource->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/ministerial/$resource->id/editar")->with('updated', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RelMinistros $relMinistros
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelMinistros $relMinistros, $id)
    {
        try {
            $data['user_id'] = auth()->user()->id;
            $resource = $relMinistros->findOrFail((int)$id);
            $resource->update($data);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/relatorios/ministerial")->with('deleted', "success");
    }
}
