<?php

namespace App\Http\Controllers;

use App\Sinodos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SinodoRequest;

class SinodoController extends Controller
{
    /**
     * SinodoController constructor.
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
    public function index(Sinodos $sinodos)
    {
        return view("pages.sinodos.index", [
            'resources' => $sinodos->orderBy('nome', 'asc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sinodos.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SinodoRequest $request)
    {
        try {
            DB::beginTransaction();
            $resource = $request->user()->sinodos()->create($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/sinodos/$resource->id/editar")->with('saved', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function show(Sinodos $sinodos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinodos $sinodos, $id)
    { //dd(Request::method())
        return view('pages.sinodos.form', ['resource' => $sinodos->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function update(SinodoRequest $request, Sinodos $sinodos, $id)
    {
        try {
            DB::beginTransaction();
            $resource = $sinodos->findOrfail((int)$id);
            $resource->update($request->validated());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/sinodos/$resource->id/editar")->with('updated', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sinodos $sinodos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinodos $sinodos, $id)
    {
        try {
            $resource = $sinodos->findOrFail((int)$id);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/sinodos")->with('deleted', "success");
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function api(Request $request)
    {
        $result['items'] = Sinodos::where("nome", "like", "%{$request->get("nome")}%")->get();
        return response()->json($result);
    }
}
