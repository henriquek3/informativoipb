<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IgrejasCongregacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('igrejas_congregacoes')->delete();

        $faker = Faker::create('pt_BR');

        foreach (range(1, 50) as $item) {
            foreach (range(1, 3) as $subitem) {
                \App\IgrejasCongregacoes::create([
                    'id_igreja' => $item,
                    'id_estado' => 17,
                    'id_cidade' => 36,
                    'cnpj' => $faker->cnpj,
                    'nome' => $faker->company,
                    'data_organizacao' => '1990-12-11',
                    'endereco' => $faker->address,
                    'endereco_numero' => rand(111, 9999),
                    'endereco_complemento' => $faker->cityPrefix,
                    'endereco_bairro' => $faker->state,
                    'endereco_cep' => '75265-321',
                    'endereco_cx_postal' => $faker->postcode,
                    'telefone' => $faker->cellphoneNumber,
                    'email' => $faker->companyEmail,
                    'website' => $faker->url,
                    'user_id' => 1,
                ]);
            }
        }
    }
}
