<?php

namespace App\Http\Controllers;

use App\Estados;
use App\Igrejas;
use App\PlePresbiterios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlePresbiterioController extends Controller
{
    /**
     * PlePresbiterioController constructor.
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
    public function index(PlePresbiterios $plePresbiterios)
    {
        return view('pages.reunioes-presbiterio.index', [
            'resources' => $plePresbiterios->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estados $estados)
    {
        return view('pages.reunioes-presbiterio.form', [
            'estados' => $estados->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PlePresbiterios $plePresbiterios)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            DB::beginTransaction();
            $resource = $plePresbiterios->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/reunioes/presbiterio/$resource->id/editar")->with('created', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlePresbiterios $plePresbiterios
     * @return \Illuminate\Http\Response
     */
    public function show(PlePresbiterios $plePresbiterios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlePresbiterios $plePresbiterios
     * @return \Illuminate\Http\Response
     */
    public function edit(PlePresbiterios $plePresbiterios, Estados $estados, Igrejas $igrejas, $id)
    {
        $igrejas = $igrejas->where('id_presbiterio', '=', auth()->user()->presbitero->id_presbiterio);
        $igrejas = $igrejas->has('relatorioMinistro')->orHas('relatorioEstatistica')->orHas('relatorioConselho');
        return view('pages.reunioes-presbiterio.form', [
            'estados' => $estados->all(),
            'resource' => $plePresbiterios->where('id', '=', $id)->with('usuario')->first(),
            'igrejas' => $igrejas->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\PlePresbiterios $plePresbiterios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlePresbiterios $plePresbiterios, $id)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            DB::beginTransaction();
            $resource = $plePresbiterios->findOrFail($id);
            $resource->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/reunioes/presbiterio/$resource->id/editar")->with('updated', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlePresbiterios $plePresbiterios
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlePresbiterios $plePresbiterios, $id)
    {
        try {
            $data['user_id'] = auth()->user()->id;
            DB::beginTransaction();
            $resource = $plePresbiterios->findOrFail($id);
            $resource->update($data);
            $resource->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/reunioes/presbiterio")->with('deleted', "success");
    }
}
