<?php

namespace App\Http\Controllers;

use App\Estados;
use App\Igrejas;
use App\IgrejasCongregacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IgrejaController extends Controller
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
    public function index(Igrejas $igrejas)
    {
        return view("pages.igrejas.index", [
            'resources' => $igrejas->with('presbiterio', 'presbiterio.sinodo')
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estados $estados)
    {
        return view('pages.igrejas.form', [
            'estados' => $estados->all()
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
        if (is_null($request->get('congregacao_presbiterio'))) {
            $data['congregacao_presbiterio'] = 0;
        }
        unset($data['sinodo']);
        unset($data['presbiterio']);
        try {
            DB::beginTransaction();
            $resource = $request->user()->igrejas()->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/igrejas/$resource->id/editar")->with('saved', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Igrejas $igrejas
     * @return \Illuminate\Http\Response
     */
    public function show(Igrejas $igrejas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Igrejas $igrejas
     * @return \Illuminate\Http\Response
     */
    public function edit(Igrejas $igrejas, Estados $estados, IgrejasCongregacoes $congregacoes, $id)
    {
        return view('pages.igrejas.form', [
            'resource' => $igrejas->where('id', '=', $id)->with('presbiterio', 'sinodo', 'usuario')->first(),
            'estados' => $estados->all(),
            'congregacoes' => $congregacoes->where('id_igreja', '=', $id)->simplePaginate(5)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Igrejas $igrejas
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Igrejas $igrejas, $id)
    {
        //dd($request->get('congregacao_presbiterio'));
        $data = $request->all();
        if (is_null($request->get('congregacao_presbiterio'))) {
            $data['congregacao_presbiterio'] = 0;
        }
        unset($data['sinodo']);
        unset($data['presbiterio']);
        try {
            $resource = $igrejas->findOrfail((int)$id);
            $resource->update($data);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/igrejas/$resource->id/editar")->with('updated', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Igrejas $igrejas
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Igrejas $igrejas, $id)
    {
        try {
            $resource = $igrejas->findOrFail((int)$id);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/igrejas")->with('deleted', "success");
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function api(Request $request)
    {
        $result['items'] = Igrejas::where("nome", "like", "%{$request->get("nome")}%")->get();

        // Caso vier o sinodo no get, o request partiu do form ministros
        if (!is_null($request->get('presbiterio'))) {
            $result['items'] = Igrejas::where('id_sinodo', '=', $request->get('presbiterio'))
                ->where("nome", "like", "%{$request->get("nome")}%")
                ->get();
        }
        return response()->json($result);
    }
}
