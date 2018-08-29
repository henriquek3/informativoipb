<?php

namespace App\Http\Controllers;

use App\Estados;
use App\Presbiterios;
use App\Presbiteros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresbiteroController extends Controller
{
    /**
     * PresbiteroController constructor.
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
    public function index(Presbiteros $presbiteros)
    {
        return view("pages.presbiteros.index", [
            'resources' => $presbiteros->with(
                'usuario', 'igreja', 'igreja.presbiterio', 'igreja.presbiterio.sinodo'
            )->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estados $estados)
    {
        return view('pages.presbiteros.form', [
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
        try {
            $data = $request->all();
            unset($data['sinodo']);
            unset($data['presbiterio']);
            DB::beginTransaction();
            $resource = $request->user()->presbiteros()->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/ministros/$resource->id/editar")->with('saved', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presbiteros $presbiteros
     * @return \Illuminate\Http\Response
     */
    public function show(Presbiteros $presbiteros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presbiteros $presbiteros
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estados $estados, Presbiteros $presbiteros, $id)
    {
        return view('pages.presbiteros.form', [
            'resource' => $presbiteros->where('id', '=', $id)
                ->with('usuario','igreja','igreja.presbiterio','igreja.presbiterio.sinodo')
                ->first(),
            'estados' => $estados->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Presbiteros $presbiteros
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presbiteros $presbiteros, $id)
    {
        try {
            $data = $request->all();
            unset($data['sinodo']);
            unset($data['presbiterio']);
            DB::beginTransaction();
            $resource = $presbiteros->findOrfail((int)$id);
            $resource->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/ministros/$resource->id/editar")->with('updated', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presbiteros $presbiteros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presbiteros $presbiteros, Request $request)
    {
        $resource = $presbiteros->findOrFail((int)$request->get("id"));
        try {
            $resource->delete();
        } catch (\Illuminate\Database\QueryException $queryException) {
            $msg = $queryException->getMessage();
            $erro = $queryException->getCode();
            return response()->json([$msg => $erro], 500);
        }
        return response()->json($resource);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function api(Request $request)
    {
        $result['items'] = Presbiteros::where("nome", "like", "%{$request->get("nome")}%")->get();
        return response()->json($result);
    }
}
