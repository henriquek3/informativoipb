<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminuser()
    {
        return view('administrar-usuarios');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = new User();
        $data['usuario_inclusao'] = $request->user()->id;
        $user->fill($data);
        $user->save();
        $retrieve = User::findOrFail((int)$user->id);
        return response()->json($retrieve);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $userEdit = $user->find((int)$id);

        return response()->json($userEdit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $data = $request->all();
        $userUpdate = $user->findOrFail((int)$id);
        $data['usuario_alteracao'] = $request->user()->id;
        $userUpdate->update($data);
        return response()->json($userUpdate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $userToDestroy = $user->findOrFail((int)$id);
        $userToDestroy->delete();
        return response()->json([
            'status' => 'com suceddo'
        ]);
    }

    /*    public function prelogin()
        {
            return view("pre-login");
        }*/
    /*
        public function teste()
        {
            $estados = Estados::all();
            return view("pages.teste", [
                'estados' => $estados->toJson()
            ]);
        }*/

    public function connect(Request $request)
    {
        $id = Auth::user()->getAuthIdentifier();
        $u = DB::table('users')
            ->leftJoin('presbiteros', 'users.id_presbitero', '=', 'presbiteros.id')
            ->leftJoin('igrejas', 'presbiteros.id_igreja', '=', 'igrejas.id')
            ->leftJoin('presbiterios', 'igrejas.id_presbiterio', '=', 'presbiterios.id')
            ->leftJoin('sinodos', 'presbiterios.id_sinodo', '=', 'sinodos.id')
            ->where('users.id', '=', $id)
            ->select(
                'users.id',
                'users.status',
                'users.nivel',
                'users.perfil',
                'users.nome',
                'users.email',
                'presbiteros.id as id_presbitero',
                'igrejas.id as id_igreja',
                'igrejas.nome as nome_igreja',
                'presbiterios.id as id_presbiterio',
                'presbiterios.sigla as sigla_presbiterio',
                'sinodos.id as id_sinodo',
                'sinodos.sigla as sigla_sinodo'
            )->get();

        return response()->json($u);
    }

    public function users()
    {

        $u = DB::table('users')
            ->leftJoin('presbiteros', 'users.id_presbitero', '=', 'presbiteros.id')
            ->leftJoin('igrejas', 'presbiteros.id_igreja', '=', 'igrejas.id')
            ->leftJoin('presbiterios', 'igrejas.id_presbiterio', '=', 'presbiterios.id')
            ->leftJoin('sinodos', 'presbiterios.id_sinodo', '=', 'sinodos.id')
            ->where('users.deleted_at', "=", null)
            ->select(
                'users.*',
                'presbiteros.id as id_presbitero',
                'igrejas.id as id_igreja',
                'igrejas.nome as nome_igreja',
                'presbiterios.id as id_presbiterio',
                'presbiterios.sigla as sigla_presbiterio',
                'sinodos.id as id_sinodo',
                'sinodos.sigla as sigla_sinodo'
            )->get();

        return response()->json($u);
    }

}
