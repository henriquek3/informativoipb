<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PresbiteriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');
        foreach (range(1, 50) as $i){
            \App\Presbiterios::create([
                'nome' => $faker->name,
                'id_sinodo' => $i,
                'sigla' => $faker->currencyCode . $i,
                'regiao' => $i,
                'user_id' => 1
            ]);
        }
    }
}
