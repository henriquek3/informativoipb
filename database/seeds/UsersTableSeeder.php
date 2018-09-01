<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'administração jksistemas',
            'email' => 'atendimento@jksistemas.com.br',
            'password' => Hash::make('84089554'),
            'cpf' => '06762817882',
            'status' => '1',
            'nivel' => '1',
            'perfil' => '5',
            'id_presbitero' => 1,
            'id_igreja' => 1,
            'id_presbiterio' => 1,
            'id_sinodo' => 1,
            'user_id' => 1,
            'created_at' => Date("Y-m-d h:m:s"),
            'updated_at' => Date("Y-m-d h:m:s"),
            'observacoes' => 'Não alterar este usuário.',
        ]);
    }
}
