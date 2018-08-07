<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisesTableSeeder::class);
        $this->call(EstadosTableSeeder::class);
        $this->call(CidadesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SinodosSeeder::class);
        $this->call(PresbiteriosSeeder::class);
        $this->call(IgrejasTableSeeder::class);
        $this->call(IgrejasCongregacoesTableSeeder::class);
        $this->call(MinistrosSeeder::class);
    }
}
