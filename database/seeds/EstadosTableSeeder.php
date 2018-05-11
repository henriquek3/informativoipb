<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('estados')->delete();

        \DB::table('estados')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'id_pais' => 1,
                    'uf_codigo' => '12',
                    'nome' => 'Acre',
                    'uf_nome' => 'AC',
                    'regiao' => 'Norte',
                ),
            1 =>
                array(
                    'id' => 2,
                    'id_pais' => 1,
                    'uf_codigo' => '27',
                    'nome' => 'Alagoas',
                    'uf_nome' => 'AL',
                    'regiao' => 'Nordeste',
                ),
            2 =>
                array(
                    'id' => 3,
                    'id_pais' => 1,
                    'uf_codigo' => '16',
                    'nome' => 'Amapá',
                    'uf_nome' => 'AP',
                    'regiao' => 'Norte',
                ),
            3 =>
                array(
                    'id' => 4,
                    'id_pais' => 1,
                    'uf_codigo' => '13',
                    'nome' => 'Amazonas',
                    'uf_nome' => 'AM',
                    'regiao' => 'Norte',
                ),
            4 =>
                array(
                    'id' => 5,
                    'id_pais' => 1,
                    'uf_codigo' => '29',
                    'nome' => 'Bahia',
                    'uf_nome' => 'BA',
                    'regiao' => 'Nordeste',
                ),
            5 =>
                array(
                    'id' => 6,
                    'id_pais' => 1,
                    'uf_codigo' => '23',
                    'nome' => 'Ceará',
                    'uf_nome' => 'CE',
                    'regiao' => 'Nordeste',
                ),
            6 =>
                array(
                    'id' => 7,
                    'id_pais' => 1,
                    'uf_codigo' => '53',
                    'nome' => 'Distrito Federal',
                    'uf_nome' => 'DF',
                    'regiao' => 'Centro-Oeste',
                ),
            7 =>
                array(
                    'id' => 8,
                    'id_pais' => 1,
                    'uf_codigo' => '32',
                    'nome' => 'Espírito Santo',
                    'uf_nome' => 'ES',
                    'regiao' => 'Sudeste',
                ),
            8 =>
                array(
                    'id' => 9,
                    'id_pais' => 1,
                    'uf_codigo' => '52',
                    'nome' => 'Goiás',
                    'uf_nome' => 'GO',
                    'regiao' => 'Centro-Oeste',
                ),
            9 =>
                array(
                    'id' => 10,
                    'id_pais' => 1,
                    'uf_codigo' => '21',
                    'nome' => 'Maranhão',
                    'uf_nome' => 'MA',
                    'regiao' => 'Nordeste',
                ),
            10 =>
                array(
                    'id' => 11,
                    'id_pais' => 1,
                    'uf_codigo' => '51',
                    'nome' => 'Mato Grosso',
                    'uf_nome' => 'MT',
                    'regiao' => 'Centro-Oeste',
                ),
            11 =>
                array(
                    'id' => 12,
                    'id_pais' => 1,
                    'uf_codigo' => '50',
                    'nome' => 'Mato Grosso do Sul',
                    'uf_nome' => 'MS',
                    'regiao' => 'Centro-Oeste',
                ),
            12 =>
                array(
                    'id' => 13,
                    'id_pais' => 1,
                    'uf_codigo' => '31',
                    'nome' => 'Minas Gerais',
                    'uf_nome' => 'MG',
                    'regiao' => 'Sudeste',
                ),
            13 =>
                array(
                    'id' => 14,
                    'id_pais' => 1,
                    'uf_codigo' => '15',
                    'nome' => 'Pará',
                    'uf_nome' => 'PA',
                    'regiao' => 'Nordeste',
                ),
            14 =>
                array(
                    'id' => 15,
                    'id_pais' => 1,
                    'uf_codigo' => '25',
                    'nome' => 'Paraíba',
                    'uf_nome' => 'PB',
                    'regiao' => 'Nordeste',
                ),
            15 =>
                array(
                    'id' => 16,
                    'id_pais' => 1,
                    'uf_codigo' => '41',
                    'nome' => 'Paraná',
                    'uf_nome' => 'PR',
                    'regiao' => 'Sul',
                ),
            16 =>
                array(
                    'id' => 17,
                    'id_pais' => 1,
                    'uf_codigo' => '26',
                    'nome' => 'Pernambuco',
                    'uf_nome' => 'PE',
                    'regiao' => 'Nordeste',
                ),
            17 =>
                array(
                    'id' => 18,
                    'id_pais' => 1,
                    'uf_codigo' => '22',
                    'nome' => 'Piauí',
                    'uf_nome' => 'PI',
                    'regiao' => 'Nordeste',
                ),
            18 =>
                array(
                    'id' => 19,
                    'id_pais' => 1,
                    'uf_codigo' => '33',
                    'nome' => 'Rio de Janeiro',
                    'uf_nome' => 'RJ',
                    'regiao' => 'Sudeste',
                ),
            19 =>
                array(
                    'id' => 20,
                    'id_pais' => 1,
                    'uf_codigo' => '24',
                    'nome' => 'Rio Grande do Norte',
                    'uf_nome' => 'RN',
                    'regiao' => 'Nordeste',
                ),
            20 =>
                array(
                    'id' => 21,
                    'id_pais' => 1,
                    'uf_codigo' => '43',
                    'nome' => 'Rio Grande do Sul',
                    'uf_nome' => 'RS',
                    'regiao' => 'Sul',
                ),
            21 =>
                array(
                    'id' => 22,
                    'id_pais' => 1,
                    'uf_codigo' => '11',
                    'nome' => 'Rondônia',
                    'uf_nome' => 'RO',
                    'regiao' => 'Norte',
                ),
            22 =>
                array(
                    'id' => 23,
                    'id_pais' => 1,
                    'uf_codigo' => '14',
                    'nome' => 'Roraima',
                    'uf_nome' => 'RR',
                    'regiao' => 'Norte',
                ),
            23 =>
                array(
                    'id' => 24,
                    'id_pais' => 1,
                    'uf_codigo' => '42',
                    'nome' => 'Santa Catarina',
                    'uf_nome' => 'SC',
                    'regiao' => 'Sul',
                ),
            24 =>
                array(
                    'id' => 25,
                    'id_pais' => 1,
                    'uf_codigo' => '35',
                    'nome' => 'São Paulo',
                    'uf_nome' => 'SP',
                    'regiao' => 'Sudeste',
                ),
            25 =>
                array(
                    'id' => 26,
                    'id_pais' => 1,
                    'uf_codigo' => '28',
                    'nome' => 'Sergipe',
                    'uf_nome' => 'SE',
                    'regiao' => 'Nordeste',
                ),
            26 =>
                array(
                    'id' => 27,
                    'id_pais' => 1,
                    'uf_codigo' => '17',
                    'nome' => 'Tocantins',
                    'uf_nome' => 'TO',
                    'regiao' => 'Norte',
                ),
        ));


    }
}