<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuarioRequest;
use App\Notifications\ConviteNotification;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('pages.usuarios.index', [
            'resources' => $user->paginate(10)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.usuarios.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request, User $user)
    {
        $data = $request->all();
        unset($data['sinodo']);
        unset($data['presbiterio']);
        $data['user_id'] = \auth()->user()->id;
        try {
            $data['password'] = 'ipb@' . rand(7777, 9999);
            DB::beginTransaction();
            $resource = $user->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }

        if ($resource) {
            /* Mail::send('mail', [], function ($m) use ($data) {
                 $m->from('mensageiro@informativoipb.com', 'InformativoIPB');
                 $m->to($data['email'], $data['nome'])->subject('Confirmação de Login');
             });*/
            try {
                $user->notify(new ConviteNotification($user->nome, $user->email, $user->cpf, $data['password']));
            } catch (\Exception $exception) {
                return redirect()->back()->withErrors($exception->getMessage());
            }
        }
        return redirect("/configuracoes/usuarios/$resource->id/editar")->with('saved', "success");
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
        return view('pages.usuarios.form', [
            'resource' => $user->where('id', '=', $id)
                ->with('usuario', 'presbitero', 'presbitero.igreja', 'presbitero.igreja.presbiterio', 'presbitero.igreja.presbiterio.sinodo')
                ->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, User $user, $id)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            DB::beginTransaction();
            $resource = $user->findOrFail((int)$id);
            $resource->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors($exception->getMessage());
        }
        return redirect("/configuracoes/usuarios/$resource->id/editar")->with('updated', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        try {
            $resource = $user->findOrFail((int)$id);
            $resource->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getCode());
        }
        return redirect("/administrar-usuarios")->with('deleted', "success");
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

    /*public function connect(Request $request)
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
    }*/

    /*public function users()
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
    }*/

    public function sending()
    {
        $user = User::findOrFail(Auth()->user()->id);
        $user->notify(new ConviteNotification($user->nome, $user->email, $user->cpf));
        return "Deu certo ?  -  " . $user->email;
    }

}
