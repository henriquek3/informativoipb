<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SinodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $i ) {
            \App\Sinodos::create([
                'nome' => $faker->name,
                'sigla' => $faker->currencyCode . $i,
                'regiao' => $i,
                'user_id' => 1
            ]);
        }
    }
}
