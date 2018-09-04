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
            if (is_null($request->get('pastor_titular'))) {
                $data['pastor_titular'] = 0;
            }
            DB::beginTransaction();
            $resource = $request->user()->presbiteros()->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
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
                ->with('usuario', 'igreja', 'igreja.presbiterio', 'igreja.presbiterio.sinodo')
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
            if (is_null($request->get('pastor_titular'))) {
                $data['pastor_titular'] = 0;
            }
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
    public function destroy(Presbiteros $presbiteros, $id)
    {
        try {
            $data['user_id'] = auth()->user()->id;
            $resource = $presbiteros->findOrFail($id);
            $resource->update($data);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/cadastros/ministros")->with('deleted', "success");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function api(Request $request)
    {
        $result['items'] = Presbiteros::where("nome", "like", "%{$request->get("nome")}%")->get();
        // Caso vier o sinodo no get, o request partiu do form ministros
        if (!is_null($request->get('igreja'))) {
            $result['items'] = Presbiteros::where('id_igreja', '=', $request->get('igreja'))
                ->get();
        }
        return response()->json($result);
    }
}
