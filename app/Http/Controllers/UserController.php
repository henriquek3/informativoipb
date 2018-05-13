<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Notifications\ConviteNotification;

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
        $data['user_id'] = $request->user()->id;

        try {
            $user->fill($data);
            $statment = $user->save();
        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }

        if ($statment) {
            /* Mail::send('mail', [], function ($m) use ($data) {
                 $m->from('mensageiro@informativoipb.com', 'InformativoIPB');
                 $m->to($data['email'], $data['nome'])->subject('Confirmação de Login');
             });*/
            $user->notify(new ConviteNotification($user->nome, $user->email, $user->cpf));
        }

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
        $data['user_id'] = $request->user()->id;
        unset($data['email']);
        unset($data['cpf']);

        try {
            $userUpdate = $user->findOrFail((int)$id);
            //$changed = $userUpdate->update($data);
            $userUpdate->update($data);
        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }

        /*if ($changed === true) {
            Mail::send('mail', [], function ($m) {
                $m->from('hello@app.com', 'YOUR APP');
                $m->to('henriquek3@live.com', 'Jean Freitas')->subject('Hellooo Worrdll!');
            });
        }*/

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

    public function sending()
    {
        $user = User::findOrFail(Auth()->user()->id);
        $user->notify(new ConviteNotification($user->nome, $user->email, $user->cpf));
        return "Deu certo ?  -  " . $user->email;
    }

}
