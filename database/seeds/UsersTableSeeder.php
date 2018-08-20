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
            'observacoes' => 'Não alterar este usuário.',
        ]);
    }
}
