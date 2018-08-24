<?php

namespace App\Http\Controllers;

use App\Estados;
use App\Igrejas;
use App\Presbiterios;
use App\Sinodos;
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
                ->simplePaginate(10),
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
    public function store(Request $request, Sinodos $sinodos, Presbiterios $presbiterios)
    {
        $sinodo = null;
        try {
            $sinodo = $sinodos->where('nome', 'like', $request->get('sinodo'))->first();
            if ($sinodo->nome !== $request->get('sinodo')) {
                throw new \PDOException('Sínodo não encontrado', 777);
            }
        } catch (\PDOException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        $presbiterio = null;
        try {
            $presbiterio = $presbiterios->where('nome', 'like', $request->get('presbiterio'))->first();
            if ($presbiterio->nome !== $request->get('presbiterio')) {
                throw new \PDOException('Presbitério não encontrado', 777);
            }
        } catch (\PDOException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        $data = $request->all();
        unset($data['sinodo']);
        unset($data['presbiterio']);
        $data['id_sinodo'] = $sinodo->id;
        $data['id_presbiterio'] = $presbiterio->id;
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
    public function edit(Igrejas $igrejas, Estados $estados, $id)
    {
        return view('pages.igrejas.form', [
            'resource' => $igrejas->where('id', '=', $id)->with('presbiterio', 'sinodo')->first(),
            'estados' => $estados->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Igrejas $igrejas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Igrejas $igrejas, $id)
    {
        $sinodo = null;
        try {
            $sinodo = $sinodos->where('nome', 'like', $request->get('sinodo'))->first();
            if ($sinodo->nome !== $request->get('sinodo')) {
                throw new \PDOException('Sínodo não encontrado', 777);
            }
        } catch (\PDOException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        $presbiterio = null;
        try {
            $presbiterio = $presbiterios->where('nome', 'like', $request->get('presbiterio'))->first();
            if ($presbiterio->nome !== $request->get('presbiterio')) {
                throw new \PDOException('Presbitério não encontrado', 777);
            }
        } catch (\PDOException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        $data = $request->all();
        unset($data['sinodo']);
        unset($data['presbiterio']);
        $data['id_sinodo'] = $sinodo->id;
        $data['id_presbiterio'] = $presbiterio->id;

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
        $id = (int)$request->get('id');
        $presbiterio = (int)$request->get('presbiterio');
        if ($presbiterio > 0) {
            return response()->json(
                Igrejas::where('id_presbiterio', $presbiterio)
                    ->with([
                        'usuario',
                        'presbiterio',
                        'presbiterio.sinodo'
                    ])->get()
            );
        } elseif ($id > 0) {
            return response()->json(
                Igrejas::with([
                    'usuario',
                    'presbiterio',
                    'presbiterio.sinodo'
                ])->where('id', $id)
                    ->get()
            );
        } else {
            return response()->json(
                Igrejas::with([
                    'usuario',
                    'presbiterio',
                    'presbiterio.sinodo'
                ])->get()
            );
        }
    }
}
