<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IgrejasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('igrejas')->delete();

        $faker = Faker::create('pt_BR');

        foreach (range(1, 50) as $item) {
            \App\Igrejas::create([
                'id_presbiterio' => $item,
                'id_sinodo' => $item,
                'id_estado' => 11,
                'id_cidade' => 4271,
                'cnpj' => $faker->cnpj,
                'nome' => $faker->company,
                'data_organizacao' => '1990-12-11',
                'endereco' => $faker->address,
                'endereco_numero' => rand(111, 9999),
                'endereco_complemento' => $faker->cityPrefix,
                'endereco_bairro' => $faker->state,
                'endereco_cep' => '78700-000',
                'endereco_cx_postal' => $faker->postcode,
                'telefone' => $faker->cellphoneNumber,
                'email' => $faker->companyEmail,
                'website' => $faker->url,
                'user_id' => 1,
            ]);
        }
    }
}
