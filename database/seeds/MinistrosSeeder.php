<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MinistrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presbiteros')->delete();

        $faker = Faker::create('pt_BR');

        foreach (range(1, 50) as $item) {
            foreach (range(1, 3) as $subitem) {
                \App\Presbiteros::create([
                    'id_sinodo' => $item,
                    'id_presbiterio' => $item,
                    'id_igreja' => $item,
                    'nome' => $faker->name,
                    'nome_mae' => $faker->name,
                    'nome_pai' => $faker->name,
                    'nascimento_data' => '1978-06-21',
                    'nascimento_id_cidade' => 105,
                    'nascimento_id_estado' => 18,
                    'nacionalidade' => 2,
                    'rg' => '21549998',
                    'rg_emissor' => 'sspmt',
                    'cpf' => $faker->cpf,
                    'estado_civil' => 2,
                    'conjuge_nome' => $faker->name,
                    'conjuge_nascimento' => '1990-12-11',
                    'nome_filhos' => $faker->name . ', ' . $faker->name . ', ' . $faker->name,
                    'endereco' => $faker->address,
                    'endereco_nr' => rand(5, 999),
                    'endereco_complemento' => $faker->state,
                    'endereco_bairro' => $faker->city,
                    'endereco_id_estado' => 6,
                    'endereco_id_cidade' => 498,
                    'cep' => '78653-234',
                    'telefone' => $faker->cellphoneNumber,
                    'celular' => $faker->cellphoneNumber,
                    'email' => $faker->freeEmail,
                    'cx_postal' => $faker->postcode,
                    'cx_postal_cep' => '65800-000',
                    'ordenacao_data' => '1992-10-11',
                    'ativo' => 1,
                    'tipo' => 1,
                ]);
            }
        }
    }
}
