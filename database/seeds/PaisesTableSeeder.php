<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('paises')->delete();

        \DB::table('paises')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'nome' => 'AFEGANISTÃO',
                    'name' => 'AFGHANISTAN',
                ),
            1 =>
                array(
                    'id' => 2,
                    'nome' => 'ACROTÍRI E DECELIA',
                    'name' => 'AKROTIRI E DEKÉLIA',
                ),
            2 =>
                array(
                    'id' => 3,
                    'nome' => 'ÁFRICA DO SUL',
                    'name' => 'SOUTH AFRICA',
                ),
            3 =>
                array(
                    'id' => 4,
                    'nome' => 'ALBÂNIA',
                    'name' => 'ALBANIA',
                ),
            4 =>
                array(
                    'id' => 5,
                    'nome' => 'ALEMANHA',
                    'name' => 'GERMANY',
                ),
            5 =>
                array(
                    'id' => 6,
                    'nome' => 'AMERICAN SAMOA',
                    'name' => 'AMERICAN SAMOA',
                ),
            6 =>
                array(
                    'id' => 7,
                    'nome' => 'ANDORRA',
                    'name' => 'ANDORRA',
                ),
            7 =>
                array(
                    'id' => 8,
                    'nome' => 'ANGOLA',
                    'name' => 'ANGOLA',
                ),
            8 =>
                array(
                    'id' => 9,
                    'nome' => 'ANGUILLA',
                    'name' => 'ANGUILLA',
                ),
            9 =>
                array(
                    'id' => 10,
                    'nome' => 'ANTÍGUA E BARBUDA',
                    'name' => 'ANTIGUA AND BARBUDA',
                ),
            10 =>
                array(
                    'id' => 11,
                    'nome' => 'ANTILHAS NEERLANDESAS',
                    'name' => 'NETHERLANDS ANTILLES',
                ),
            11 =>
                array(
                    'id' => 12,
                    'nome' => 'ARÁBIA SAUDITA',
                    'name' => 'SAUDI ARABIA',
                ),
            12 =>
                array(
                    'id' => 13,
                    'nome' => 'ARGÉLIA',
                    'name' => 'ALGERIA',
                ),
            13 =>
                array(
                    'id' => 14,
                    'nome' => 'ARGENTINA',
                    'name' => 'ARGENTINA',
                ),
            14 =>
                array(
                    'id' => 15,
                    'nome' => 'ARMÉNIA',
                    'name' => 'ARMENIA',
                ),
            15 =>
                array(
                    'id' => 16,
                    'nome' => 'ARUBA',
                    'name' => 'ARUBA',
                ),
            16 =>
                array(
                    'id' => 17,
                    'nome' => 'AUSTRÁLIA',
                    'name' => 'AUSTRALIA',
                ),
            17 =>
                array(
                    'id' => 18,
                    'nome' => 'ÁUSTRIA',
                    'name' => 'AUSTRIA',
                ),
            18 =>
                array(
                    'id' => 19,
                    'nome' => 'AZERBAIJÃO',
                    'name' => 'AZERBAIJAN',
                ),
            19 =>
                array(
                    'id' => 20,
                    'nome' => 'BAHAMAS',
                    'name' => 'BAHAMAS, THE',
                ),
            20 =>
                array(
                    'id' => 21,
                    'nome' => 'BANGLADECHE',
                    'name' => 'BANGLADESH',
                ),
            21 =>
                array(
                    'id' => 22,
                    'nome' => 'BARBADOS',
                    'name' => 'BARBADOS',
                ),
            22 =>
                array(
                    'id' => 23,
                    'nome' => 'BARÉM',
                    'name' => 'BAHRAIN',
                ),
            23 =>
                array(
                    'id' => 24,
                    'nome' => 'BASSAS DA ÍNDIA',
                    'name' => 'BASSAS DA INDIA',
                ),
            24 =>
                array(
                    'id' => 25,
                    'nome' => 'BÉLGICA',
                    'name' => 'BELGIUM',
                ),
            25 =>
                array(
                    'id' => 26,
                    'nome' => 'BELIZE',
                    'name' => 'BELIZE',
                ),
            26 =>
                array(
                    'id' => 27,
                    'nome' => 'BENIM',
                    'name' => 'BENIN',
                ),
            27 =>
                array(
                    'id' => 28,
                    'nome' => 'BERMUDAS',
                    'name' => 'BERMUDA',
                ),
            28 =>
                array(
                    'id' => 29,
                    'nome' => 'BIELORRÚSSIA',
                    'name' => 'BELARUS',
                ),
            29 =>
                array(
                    'id' => 30,
                    'nome' => 'BOLÍVIA',
                    'name' => 'BOLIVIA',
                ),
            30 =>
                array(
                    'id' => 31,
                    'nome' => 'BÓSNIA E HERZEGOVINA',
                    'name' => 'BOSNIA AND HERZEGOVINA',
                ),
            31 =>
                array(
                    'id' => 32,
                    'nome' => 'BOTSUANA',
                    'name' => 'BOTSWANA',
                ),
            32 =>
                array(
                    'id' => 33,
                    'nome' => 'BRASIL',
                    'name' => 'BRAZIL',
                ),
            33 =>
                array(
                    'id' => 34,
                    'nome' => 'BRUNEI DARUSSALAM',
                    'name' => 'BRUNEI DARUSSALAM',
                ),
            34 =>
                array(
                    'id' => 35,
                    'nome' => 'BULGÁRIA',
                    'name' => 'BULGARIA',
                ),
            35 =>
                array(
                    'id' => 36,
                    'nome' => 'BURQUINA FASO',
                    'name' => 'BURKINA FASO',
                ),
            36 =>
                array(
                    'id' => 37,
                    'nome' => 'BURUNDI',
                    'name' => 'BURUNDI',
                ),
            37 =>
                array(
                    'id' => 38,
                    'nome' => 'BUTÃO',
                    'name' => 'BHUTAN',
                ),
            38 =>
                array(
                    'id' => 39,
                    'nome' => 'CABO VERDE',
                    'name' => 'CAPE VERDE',
                ),
            39 =>
                array(
                    'id' => 40,
                    'nome' => 'CAMARÕES',
                    'name' => 'CAMEROON',
                ),
            40 =>
                array(
                    'id' => 41,
                    'nome' => 'CAMBOJA',
                    'name' => 'CAMBODIA',
                ),
            41 =>
                array(
                    'id' => 42,
                    'nome' => 'CANADÁ',
                    'name' => 'CANADA',
                ),
            42 =>
                array(
                    'id' => 43,
                    'nome' => 'CATAR',
                    'name' => 'QATAR',
                ),
            43 =>
                array(
                    'id' => 44,
                    'nome' => 'CAZAQUISTÃO',
                    'name' => 'KAZAKHSTAN',
                ),
            44 =>
                array(
                    'id' => 45,
                    'nome' => 'CENTRO-AFRICANA REPÚBLICA',
                    'name' => 'CENTRAL AFRICAN REPUBLIC',
                ),
            45 =>
                array(
                    'id' => 46,
                    'nome' => 'CHADE',
                    'name' => 'CHAD',
                ),
            46 =>
                array(
                    'id' => 47,
                    'nome' => 'CHILE',
                    'name' => 'CHILE',
                ),
            47 =>
                array(
                    'id' => 48,
                    'nome' => 'CHINA',
                    'name' => 'CHINA',
                ),
            48 =>
                array(
                    'id' => 49,
                    'nome' => 'CHIPRE',
                    'name' => 'CYPRUS',
                ),
            49 =>
                array(
                    'id' => 50,
                    'nome' => 'COLÔMBIA',
                    'name' => 'COLOMBIA',
                ),
            50 =>
                array(
                    'id' => 51,
                    'nome' => 'COMORES',
                    'name' => 'COMOROS',
                ),
            51 =>
                array(
                    'id' => 52,
                    'nome' => 'CONGO',
                    'name' => 'CONGO',
                ),
            52 =>
                array(
                    'id' => 53,
                    'nome' => 'CONGO REPÚBLICA DEMOCRÁTICA',
                    'name' => 'CONGO DEMOCRATIC REPUBLIC',
                ),
            53 =>
                array(
                    'id' => 54,
                    'nome' => 'COREIA DO NORTE',
                    'name' => 'KOREA NORTH',
                ),
            54 =>
                array(
                    'id' => 55,
                    'nome' => 'COREIA DO SUL',
                    'name' => 'KOREA SOUTH',
                ),
            55 =>
                array(
                    'id' => 56,
                    'nome' => 'COSTA DO MARFIM',
                    'name' => 'IVORY COAST',
                ),
            56 =>
                array(
                    'id' => 57,
                    'nome' => 'COSTA RICA',
                    'name' => 'COSTA RICA',
                ),
            57 =>
                array(
                    'id' => 58,
                    'nome' => 'CROÁCIA',
                    'name' => 'CROATIA',
                ),
            58 =>
                array(
                    'id' => 59,
                    'nome' => 'CUBA',
                    'name' => 'CUBA',
                ),
            59 =>
                array(
                    'id' => 60,
                    'nome' => 'DINAMARCA',
                    'name' => 'DENMARK',
                ),
            60 =>
                array(
                    'id' => 61,
                    'nome' => 'DOMÍNICA',
                    'name' => 'DOMINICA',
                ),
            61 =>
                array(
                    'id' => 62,
                    'nome' => 'EGIPTO',
                    'name' => 'EGYPT',
                ),
            62 =>
                array(
                    'id' => 63,
                    'nome' => 'EMIRADOS ÁRABES UNIDOS',
                    'name' => 'UNITED ARAB EMIRATES',
                ),
            63 =>
                array(
                    'id' => 64,
                    'nome' => 'EQUADOR',
                    'name' => 'ECUADOR',
                ),
            64 =>
                array(
                    'id' => 65,
                    'nome' => 'ERITREIA',
                    'name' => 'ERITREA',
                ),
            65 =>
                array(
                    'id' => 66,
                    'nome' => 'ESLOVÁQUIA',
                    'name' => 'SLOVAKIA',
                ),
            66 =>
                array(
                    'id' => 67,
                    'nome' => 'ESLOVÉNIA',
                    'name' => 'SLOVENIA',
                ),
            67 =>
                array(
                    'id' => 68,
                    'nome' => 'ESPANHA',
                    'name' => 'SPAIN',
                ),
            68 =>
                array(
                    'id' => 69,
                    'nome' => 'ESTADOS UNIDOS',
                    'name' => 'UNITED STATES',
                ),
            69 =>
                array(
                    'id' => 70,
                    'nome' => 'ESTÓNIA',
                    'name' => 'ESTONIA',
                ),
            70 =>
                array(
                    'id' => 71,
                    'nome' => 'ETIÓPIA',
                    'name' => 'ETHIOPIA',
                ),
            71 =>
                array(
                    'id' => 72,
                    'nome' => 'FAIXA DE GAZA',
                    'name' => 'GAZA STRIP',
                ),
            72 =>
                array(
                    'id' => 73,
                    'nome' => 'FIJI',
                    'name' => 'FIJI',
                ),
            73 =>
                array(
                    'id' => 74,
                    'nome' => 'FILIPINAS',
                    'name' => 'PHILIPPINES',
                ),
            74 =>
                array(
                    'id' => 75,
                    'nome' => 'FINLÂNDIA',
                    'name' => 'FINLAND',
                ),
            75 =>
                array(
                    'id' => 76,
                    'nome' => 'FRANÇA',
                    'name' => 'FRANCE',
                ),
            76 =>
                array(
                    'id' => 77,
                    'nome' => 'GABÃO',
                    'name' => 'GABON',
                ),
            77 =>
                array(
                    'id' => 78,
                    'nome' => 'GÂMBIA',
                    'name' => 'GAMBIA',
                ),
            78 =>
                array(
                    'id' => 79,
                    'nome' => 'GANA',
                    'name' => 'GHANA',
                ),
            79 =>
                array(
                    'id' => 80,
                    'nome' => 'GEÓRGIA',
                    'name' => 'GEORGIA',
                ),
            80 =>
                array(
                    'id' => 81,
                    'nome' => 'GIBRALTAR',
                    'name' => 'GIBRALTAR',
                ),
            81 =>
                array(
                    'id' => 82,
                    'nome' => 'GRANADA',
                    'name' => 'GRENADA',
                ),
            82 =>
                array(
                    'id' => 83,
                    'nome' => 'GRÉCIA',
                    'name' => 'GREECE',
                ),
            83 =>
                array(
                    'id' => 84,
                    'nome' => 'GRONELÂNDIA',
                    'name' => 'GREENLAND',
                ),
            84 =>
                array(
                    'id' => 85,
                    'nome' => 'GUADALUPE',
                    'name' => 'GUADELOUPE',
                ),
            85 =>
                array(
                    'id' => 86,
                    'nome' => 'GUAM',
                    'name' => 'GUAM',
                ),
            86 =>
                array(
                    'id' => 87,
                    'nome' => 'GUATEMALA',
                    'name' => 'GUATEMALA',
                ),
            87 =>
                array(
                    'id' => 88,
                    'nome' => 'GUERNSEY',
                    'name' => 'GUERNSEY',
                ),
            88 =>
                array(
                    'id' => 89,
                    'nome' => 'GUIANA',
                    'name' => 'GUYANA',
                ),
            89 =>
                array(
                    'id' => 90,
                    'nome' => 'GUIANA FRANCESA',
                    'name' => 'FRENCH GUIANA',
                ),
            90 =>
                array(
                    'id' => 91,
                    'nome' => 'GUINÉ',
                    'name' => 'GUINEA',
                ),
            91 =>
                array(
                    'id' => 92,
                    'nome' => 'GUINÉ EQUATORIAL',
                    'name' => 'EQUATORIAL GUINEA',
                ),
            92 =>
                array(
                    'id' => 93,
                    'nome' => 'GUINÉ-BISSAU',
                    'name' => 'GUINEA-BISSAU',
                ),
            93 =>
                array(
                    'id' => 94,
                    'nome' => 'HAITI',
                    'name' => 'HAITI',
                ),
            94 =>
                array(
                    'id' => 95,
                    'nome' => 'HONDURAS',
                    'name' => 'HONDURAS',
                ),
            95 =>
                array(
                    'id' => 96,
                    'nome' => 'HONG KONG',
                    'name' => 'HONG KONG',
                ),
            96 =>
                array(
                    'id' => 97,
                    'nome' => 'HUNGRIA',
                    'name' => 'HUNGARY',
                ),
            97 =>
                array(
                    'id' => 98,
                    'nome' => 'IÉMEN',
                    'name' => 'YEMEN',
                ),
            98 =>
                array(
                    'id' => 99,
                    'nome' => 'ILHA BOUVET',
                    'name' => 'BOUVET ISLAND',
                ),
            99 =>
                array(
                    'id' => 100,
                    'nome' => 'ILHA CHRISTMAS',
                    'name' => 'CHRISTMAS ISLAND',
                ),
            100 =>
                array(
                    'id' => 101,
                    'nome' => 'ILHA DE CLIPPERTON',
                    'name' => 'CLIPPERTON ISLAND',
                ),
            101 =>
                array(
                    'id' => 102,
                    'nome' => 'ILHA DE JOÃO DA NOVA',
                    'name' => 'JUAN DE NOVA ISLAND',
                ),
            102 =>
                array(
                    'id' => 103,
                    'nome' => 'ILHA DE MAN',
                    'name' => 'ISLE OF MAN',
                ),
            103 =>
                array(
                    'id' => 104,
                    'nome' => 'ILHA DE NAVASSA',
                    'name' => 'NAVASSA ISLAND',
                ),
            104 =>
                array(
                    'id' => 105,
                    'nome' => 'ILHA EUROPA',
                    'name' => 'EUROPA ISLAND',
                ),
            105 =>
                array(
                    'id' => 106,
                    'nome' => 'ILHA NORFOLK',
                    'name' => 'NORFOLK ISLAND',
                ),
            106 =>
                array(
                    'id' => 107,
                    'nome' => 'ILHA TROMELIN',
                    'name' => 'TROMELIN ISLAND',
                ),
            107 =>
                array(
                    'id' => 108,
                    'nome' => 'ILHAS ASHMORE E CARTIER',
                    'name' => 'ASHMORE AND CARTIER ISLANDS',
                ),
            108 =>
                array(
                    'id' => 109,
                    'nome' => 'ILHAS CAIMAN',
                    'name' => 'CAYMAN ISLANDS',
                ),
            109 =>
                array(
                    'id' => 110,
                    'nome' => 'ILHAS COCOS (KEELING)',
                    'name' => 'COCOS (KEELING) ISLANDS',
                ),
            110 =>
                array(
                    'id' => 111,
                    'nome' => 'ILHAS COOK',
                    'name' => 'COOK ISLANDS',
                ),
            111 =>
                array(
                    'id' => 112,
                    'nome' => 'ILHAS DO MAR DE CORAL',
                    'name' => 'CORAL SEA ISLANDS',
                ),
            112 =>
                array(
                    'id' => 113,
                    'nome' => 'ILHAS FALKLANDS (ILHAS MALVINAS)',
                    'name' => 'FALKLAND ISLANDS (ISLAS MALVINAS)',
                ),
            113 =>
                array(
                    'id' => 114,
                    'nome' => 'ILHAS FEROE',
                    'name' => 'FAROE ISLANDS',
                ),
            114 =>
                array(
                    'id' => 115,
                    'nome' => 'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL',
                    'name' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
                ),
            115 =>
                array(
                    'id' => 116,
                    'nome' => 'ILHAS MARIANAS DO NORTE',
                    'name' => 'NORTHERN MARIANA ISLANDS',
                ),
            116 =>
                array(
                    'id' => 117,
                    'nome' => 'ILHAS MARSHALL',
                    'name' => 'MARSHALL ISLANDS',
                ),
            117 =>
                array(
                    'id' => 118,
                    'nome' => 'ILHAS PARACEL',
                    'name' => 'PARACEL ISLANDS',
                ),
            118 =>
                array(
                    'id' => 119,
                    'nome' => 'ILHAS PITCAIRN',
                    'name' => 'PITCAIRN ISLANDS',
                ),
            119 =>
                array(
                    'id' => 120,
                    'nome' => 'ILHAS SALOMÃO',
                    'name' => 'SOLOMON ISLANDS',
                ),
            120 =>
                array(
                    'id' => 121,
                    'nome' => 'ILHAS SPRATLY',
                    'name' => 'SPRATLY ISLANDS',
                ),
            121 =>
                array(
                    'id' => 122,
                    'nome' => 'ILHAS VIRGENS AMERICANAS',
                    'name' => 'UNITED STATES VIRGIN ISLANDS',
                ),
            122 =>
                array(
                    'id' => 123,
                    'nome' => 'ILHAS VIRGENS BRITÂNICAS',
                    'name' => 'BRITISH VIRGIN ISLANDS',
                ),
            123 =>
                array(
                    'id' => 124,
                    'nome' => 'ÍNDIA',
                    'name' => 'INDIA',
                ),
            124 =>
                array(
                    'id' => 125,
                    'nome' => 'INDONÉSIA',
                    'name' => 'INDONESIA',
                ),
            125 =>
                array(
                    'id' => 126,
                    'nome' => 'IRÃO',
                    'name' => 'IRAN',
                ),
            126 =>
                array(
                    'id' => 127,
                    'nome' => 'IRAQUE',
                    'name' => 'IRAQ',
                ),
            127 =>
                array(
                    'id' => 128,
                    'nome' => 'IRLANDA',
                    'name' => 'IRELAND',
                ),
            128 =>
                array(
                    'id' => 129,
                    'nome' => 'ISLÂNDIA',
                    'name' => 'ICELAND',
                ),
            129 =>
                array(
                    'id' => 130,
                    'nome' => 'ISRAEL',
                    'name' => 'ISRAEL',
                ),
            130 =>
                array(
                    'id' => 131,
                    'nome' => 'ITÁLIA',
                    'name' => 'ITALY',
                ),
            131 =>
                array(
                    'id' => 132,
                    'nome' => 'JAMAICA',
                    'name' => 'JAMAICA',
                ),
            132 =>
                array(
                    'id' => 133,
                    'nome' => 'JAN MAYEN',
                    'name' => 'JAN MAYEN',
                ),
            133 =>
                array(
                    'id' => 134,
                    'nome' => 'JAPÃO',
                    'name' => 'JAPAN',
                ),
            134 =>
                array(
                    'id' => 135,
                    'nome' => 'JERSEY',
                    'name' => 'JERSEY',
                ),
            135 =>
                array(
                    'id' => 136,
                    'nome' => 'JIBUTI',
                    'name' => 'DJIBOUTI',
                ),
            136 =>
                array(
                    'id' => 137,
                    'nome' => 'JORDÂNIA',
                    'name' => 'JORDAN',
                ),
            137 =>
                array(
                    'id' => 138,
                    'nome' => 'KIRIBATI',
                    'name' => 'KIRIBATI',
                ),
            138 =>
                array(
                    'id' => 139,
                    'nome' => 'KOWEIT',
                    'name' => 'KUWAIT',
                ),
            139 =>
                array(
                    'id' => 140,
                    'nome' => 'LAOS',
                    'name' => 'LAOS',
                ),
            140 =>
                array(
                    'id' => 141,
                    'nome' => 'LESOTO',
                    'name' => 'LESOTHO',
                ),
            141 =>
                array(
                    'id' => 142,
                    'nome' => 'LETÓNIA',
                    'name' => 'LATVIA',
                ),
            142 =>
                array(
                    'id' => 143,
                    'nome' => 'LÍBANO',
                    'name' => 'LEBANON',
                ),
            143 =>
                array(
                    'id' => 144,
                    'nome' => 'LIBÉRIA',
                    'name' => 'LIBERIA',
                ),
            144 =>
                array(
                    'id' => 145,
                    'nome' => 'LÍBIA',
                    'name' => 'LIBYAN ARAB JAMAHIRIYA',
                ),
            145 =>
                array(
                    'id' => 146,
                    'nome' => 'LISTENSTAINE',
                    'name' => 'LIECHTENSTEIN',
                ),
            146 =>
                array(
                    'id' => 147,
                    'nome' => 'LITUÂNIA',
                    'name' => 'LITHUANIA',
                ),
            147 =>
                array(
                    'id' => 148,
                    'nome' => 'LUXEMBURGO',
                    'name' => 'LUXEMBOURG',
                ),
            148 =>
                array(
                    'id' => 149,
                    'nome' => 'MACAU',
                    'name' => 'MACAO',
                ),
            149 =>
                array(
                    'id' => 150,
                    'nome' => 'MACEDÓNIA',
                    'name' => 'MACEDONIA',
                ),
            150 =>
                array(
                    'id' => 151,
                    'nome' => 'MADAGÁSCAR',
                    'name' => 'MADAGASCAR',
                ),
            151 =>
                array(
                    'id' => 152,
                    'nome' => 'MALÁSIA',
                    'name' => 'MALAYSIA',
                ),
            152 =>
                array(
                    'id' => 153,
                    'nome' => 'MALAVI',
                    'name' => 'MALAWI',
                ),
            153 =>
                array(
                    'id' => 154,
                    'nome' => 'MALDIVAS',
                    'name' => 'MALDIVES',
                ),
            154 =>
                array(
                    'id' => 155,
                    'nome' => 'MALI',
                    'name' => 'MALI',
                ),
            155 =>
                array(
                    'id' => 156,
                    'nome' => 'MALTA',
                    'name' => 'MALTA',
                ),
            156 =>
                array(
                    'id' => 157,
                    'nome' => 'MARROCOS',
                    'name' => 'MOROCCO',
                ),
            157 =>
                array(
                    'id' => 158,
                    'nome' => 'MARTINICA',
                    'name' => 'MARTINIQUE',
                ),
            158 =>
                array(
                    'id' => 159,
                    'nome' => 'MAURÍCIA',
                    'name' => 'MAURITIUS',
                ),
            159 =>
                array(
                    'id' => 160,
                    'nome' => 'MAURITÂNIA',
                    'name' => 'MAURITANIA',
                ),
            160 =>
                array(
                    'id' => 161,
                    'nome' => 'MAYOTTE',
                    'name' => 'MAYOTTE',
                ),
            161 =>
                array(
                    'id' => 162,
                    'nome' => 'MÉXICO',
                    'name' => 'MEXICO',
                ),
            162 =>
                array(
                    'id' => 163,
                    'nome' => 'MIANMAR',
                    'name' => 'MYANMAR BURMA',
                ),
            163 =>
                array(
                    'id' => 164,
                    'nome' => 'MICRONÉSIA',
                    'name' => 'MICRONESIA',
                ),
            164 =>
                array(
                    'id' => 165,
                    'nome' => 'MOÇAMBIQUE',
                    'name' => 'MOZAMBIQUE',
                ),
            165 =>
                array(
                    'id' => 166,
                    'nome' => 'MOLDÁVIA',
                    'name' => 'MOLDOVA',
                ),
            166 =>
                array(
                    'id' => 167,
                    'nome' => 'MÓNACO',
                    'name' => 'MONACO',
                ),
            167 =>
                array(
                    'id' => 168,
                    'nome' => 'MONGÓLIA',
                    'name' => 'MONGOLIA',
                ),
            168 =>
                array(
                    'id' => 169,
                    'nome' => 'MONTENEGRO',
                    'name' => 'MONTENEGRO',
                ),
            169 =>
                array(
                    'id' => 170,
                    'nome' => 'MONTSERRAT',
                    'name' => 'MONTSERRAT',
                ),
            170 =>
                array(
                    'id' => 171,
                    'nome' => 'NAMÍBIA',
                    'name' => 'NAMIBIA',
                ),
            171 =>
                array(
                    'id' => 172,
                    'nome' => 'NAURU',
                    'name' => 'NAURU',
                ),
            172 =>
                array(
                    'id' => 173,
                    'nome' => 'NEPAL',
                    'name' => 'NEPAL',
                ),
            173 =>
                array(
                    'id' => 174,
                    'nome' => 'NICARÁGUA',
                    'name' => 'NICARAGUA',
                ),
            174 =>
                array(
                    'id' => 175,
                    'nome' => 'NÍGER',
                    'name' => 'NIGER',
                ),
            175 =>
                array(
                    'id' => 176,
                    'nome' => 'NIGÉRIA',
                    'name' => 'NIGERIA',
                ),
            176 =>
                array(
                    'id' => 177,
                    'nome' => 'NIUE',
                    'name' => 'NIUE',
                ),
            177 =>
                array(
                    'id' => 178,
                    'nome' => 'NORUEGA',
                    'name' => 'NORWAY',
                ),
            178 =>
                array(
                    'id' => 179,
                    'nome' => 'NOVA CALEDÓNIA',
                    'name' => 'NEW CALEDONIA',
                ),
            179 =>
                array(
                    'id' => 180,
                    'nome' => 'NOVA ZELÂNDIA',
                    'name' => 'NEW ZEALAND',
                ),
            180 =>
                array(
                    'id' => 181,
                    'nome' => 'OMÃ',
                    'name' => 'OMAN',
                ),
            181 =>
                array(
                    'id' => 182,
                    'nome' => 'PAÍSES BAIXOS',
                    'name' => 'NETHERLANDS',
                ),
            182 =>
                array(
                    'id' => 183,
                    'nome' => 'PALAU',
                    'name' => 'PALAU',
                ),
            183 =>
                array(
                    'id' => 184,
                    'nome' => 'PALESTINA',
                    'name' => 'PALESTINE',
                ),
            184 =>
                array(
                    'id' => 185,
                    'nome' => 'PANAMÁ',
                    'name' => 'PANAMA',
                ),
            185 =>
                array(
                    'id' => 186,
                    'nome' => 'PAPUÁSIA-NOVA GUINÉ',
                    'name' => 'PAPUA NEW GUINEA',
                ),
            186 =>
                array(
                    'id' => 187,
                    'nome' => 'PAQUISTÃO',
                    'name' => 'PAKISTAN',
                ),
            187 =>
                array(
                    'id' => 188,
                    'nome' => 'PARAGUAI',
                    'name' => 'PARAGUAY',
                ),
            188 =>
                array(
                    'id' => 189,
                    'nome' => 'PERU',
                    'name' => 'PERU',
                ),
            189 =>
                array(
                    'id' => 190,
                    'nome' => 'POLINÉSIA FRANCESA',
                    'name' => 'FRENCH POLYNESIA',
                ),
            190 =>
                array(
                    'id' => 191,
                    'nome' => 'POLÓNIA',
                    'name' => 'POLAND',
                ),
            191 =>
                array(
                    'id' => 192,
                    'nome' => 'PORTO RICO',
                    'name' => 'PUERTO RICO',
                ),
            192 =>
                array(
                    'id' => 193,
                    'nome' => 'PORTUGAL',
                    'name' => 'PORTUGAL',
                ),
            193 =>
                array(
                    'id' => 194,
                    'nome' => 'QUÉNIA',
                    'name' => 'KENYA',
                ),
            194 =>
                array(
                    'id' => 195,
                    'nome' => 'QUIRGUIZISTÃO',
                    'name' => 'KYRGYZSTAN',
                ),
            195 =>
                array(
                    'id' => 196,
                    'nome' => 'REINO UNIDO',
                    'name' => 'UNITED KINGDOM',
                ),
            196 =>
                array(
                    'id' => 197,
                    'nome' => 'REPÚBLICA CHECA',
                    'name' => 'CZECH REPUBLIC',
                ),
            197 =>
                array(
                    'id' => 198,
                    'nome' => 'REPÚBLICA DOMINICANA',
                    'name' => 'DOMINICAN REPUBLIC',
                ),
            198 =>
                array(
                    'id' => 199,
                    'nome' => 'ROMÉNIA',
                    'name' => 'ROMANIA',
                ),
            199 =>
                array(
                    'id' => 200,
                    'nome' => 'RUANDA',
                    'name' => 'RWANDA',
                ),
            200 =>
                array(
                    'id' => 201,
                    'nome' => 'RÚSSIA',
                    'name' => 'RUSSIAN FEDERATION',
                ),
            201 =>
                array(
                    'id' => 202,
                    'nome' => 'SAHARA OCCIDENTAL',
                    'name' => 'WESTERN SAHARA',
                ),
            202 =>
                array(
                    'id' => 203,
                    'nome' => 'SALVADOR',
                    'name' => 'EL SALVADOR',
                ),
            203 =>
                array(
                    'id' => 204,
                    'nome' => 'SAMOA',
                    'name' => 'SAMOA',
                ),
            204 =>
                array(
                    'id' => 205,
                    'nome' => 'SANTA HELENA',
                    'name' => 'SAINT HELENA',
                ),
            205 =>
                array(
                    'id' => 206,
                    'nome' => 'SANTA LÚCIA',
                    'name' => 'SAINT LUCIA',
                ),
            206 =>
                array(
                    'id' => 207,
                    'nome' => 'SANTA SÉ',
                    'name' => 'HOLY SEE',
                ),
            207 =>
                array(
                    'id' => 208,
                    'nome' => 'SÃO CRISTÓVÃO E NEVES',
                    'name' => 'SAINT KITTS AND NEVIS',
                ),
            208 =>
                array(
                    'id' => 209,
                    'nome' => 'SÃO MARINO',
                    'name' => 'SAN MARINO',
                ),
            209 =>
                array(
                    'id' => 210,
                    'nome' => 'SÃO PEDRO E MIQUELÃO',
                    'name' => 'SAINT PIERRE AND MIQUELON',
                ),
            210 =>
                array(
                    'id' => 211,
                    'nome' => 'SÃO TOMÉ E PRÍNCIPE',
                    'name' => 'SAO TOME AND PRINCIPE',
                ),
            211 =>
                array(
                    'id' => 212,
                    'nome' => 'SÃO VICENTE E GRANADINAS',
                    'name' => 'SAINT VINCENT AND THE GRENADINES',
                ),
            212 =>
                array(
                    'id' => 213,
                    'nome' => 'SEICHELES',
                    'name' => 'SEYCHELLES',
                ),
            213 =>
                array(
                    'id' => 214,
                    'nome' => 'SENEGAL',
                    'name' => 'SENEGAL',
                ),
            214 =>
                array(
                    'id' => 215,
                    'nome' => 'SERRA LEOA',
                    'name' => 'SIERRA LEONE',
                ),
            215 =>
                array(
                    'id' => 216,
                    'nome' => 'SÉRVIA',
                    'name' => 'SERBIA',
                ),
            216 =>
                array(
                    'id' => 217,
                    'nome' => 'SINGAPURA',
                    'name' => 'SINGAPORE',
                ),
            217 =>
                array(
                    'id' => 218,
                    'nome' => 'SÍRIA',
                    'name' => 'SYRIA',
                ),
            218 =>
                array(
                    'id' => 219,
                    'nome' => 'SOMÁLIA',
                    'name' => 'SOMALIA',
                ),
            219 =>
                array(
                    'id' => 220,
                    'nome' => 'SRI LANCA',
                    'name' => 'SRI LANKA',
                ),
            220 =>
                array(
                    'id' => 221,
                    'nome' => 'SUAZILÂNDIA',
                    'name' => 'SWAZILAND',
                ),
            221 =>
                array(
                    'id' => 222,
                    'nome' => 'SUDÃO',
                    'name' => 'SUDAN',
                ),
            222 =>
                array(
                    'id' => 223,
                    'nome' => 'SUÉCIA',
                    'name' => 'SWEDEN',
                ),
            223 =>
                array(
                    'id' => 224,
                    'nome' => 'SUÍÇA',
                    'name' => 'SWITZERLAND',
                ),
            224 =>
                array(
                    'id' => 225,
                    'nome' => 'SURINAME',
                    'name' => 'SURINAME',
                ),
            225 =>
                array(
                    'id' => 226,
                    'nome' => 'SVALBARD',
                    'name' => 'SVALBARD',
                ),
            226 =>
                array(
                    'id' => 227,
                    'nome' => 'TAILÂNDIA',
                    'name' => 'THAILAND',
                ),
            227 =>
                array(
                    'id' => 228,
                    'nome' => 'TAIWAN',
                    'name' => 'TAIWAN',
                ),
            228 =>
                array(
                    'id' => 229,
                    'nome' => 'TAJIQUISTÃO',
                    'name' => 'TAJIKISTAN',
                ),
            229 =>
                array(
                    'id' => 230,
                    'nome' => 'TANZÂNIA',
                    'name' => 'TANZANIA',
                ),
            230 =>
                array(
                    'id' => 231,
                    'nome' => 'TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO',
                    'name' => 'BRITISH INDIAN OCEAN TERRITORY',
                ),
            231 =>
                array(
                    'id' => 232,
                    'nome' => 'TERRITÓRIO DAS ILHAS HEARD E MCDONALD',
                    'name' => 'HEARD ISLAND AND MCDONALD ISLANDS',
                ),
            232 =>
                array(
                    'id' => 233,
                    'nome' => 'TIMOR-LESTE',
                    'name' => 'TIMOR-LESTE',
                ),
            233 =>
                array(
                    'id' => 234,
                    'nome' => 'TOGO',
                    'name' => 'TOGO',
                ),
            234 =>
                array(
                    'id' => 235,
                    'nome' => 'TOKELAU',
                    'name' => 'TOKELAU',
                ),
            235 =>
                array(
                    'id' => 236,
                    'nome' => 'TONGA',
                    'name' => 'TONGA',
                ),
            236 =>
                array(
                    'id' => 237,
                    'nome' => 'TRINDADE E TOBAGO',
                    'name' => 'TRINIDAD AND TOBAGO',
                ),
            237 =>
                array(
                    'id' => 238,
                    'nome' => 'TUNÍSIA',
                    'name' => 'TUNISIA',
                ),
            238 =>
                array(
                    'id' => 239,
                    'nome' => 'TURKS E CAICOS',
                    'name' => 'TURKS AND CAICOS ISLANDS',
                ),
            239 =>
                array(
                    'id' => 240,
                    'nome' => 'TURQUEMENISTÃO',
                    'name' => 'TURKMENISTAN',
                ),
            240 =>
                array(
                    'id' => 241,
                    'nome' => 'TURQUIA',
                    'name' => 'TURKEY',
                ),
            241 =>
                array(
                    'id' => 242,
                    'nome' => 'TUVALU',
                    'name' => 'TUVALU',
                ),
            242 =>
                array(
                    'id' => 243,
                    'nome' => 'UCRÂNIA',
                    'name' => 'UKRAINE',
                ),
            243 =>
                array(
                    'id' => 244,
                    'nome' => 'UGANDA',
                    'name' => 'UGANDA',
                ),
            244 =>
                array(
                    'id' => 245,
                    'nome' => 'URUGUAI',
                    'name' => 'URUGUAY',
                ),
            245 =>
                array(
                    'id' => 246,
                    'nome' => 'USBEQUISTÃO',
                    'name' => 'UZBEKISTAN',
                ),
            246 =>
                array(
                    'id' => 247,
                    'nome' => 'VANUATU',
                    'name' => 'VANUATU',
                ),
            247 =>
                array(
                    'id' => 248,
                    'nome' => 'VENEZUELA',
                    'name' => 'VENEZUELA',
                ),
            248 =>
                array(
                    'id' => 249,
                    'nome' => 'VIETNAME',
                    'name' => 'VIETNAM',
                ),
            249 =>
                array(
                    'id' => 250,
                    'nome' => 'WALLIS E FUTUNA',
                    'name' => 'WALLIS AND FUTUNA',
                ),
            250 =>
                array(
                    'id' => 251,
                    'nome' => 'ZÂMBIA',
                    'name' => 'ZAMBIA',
                ),
            251 =>
                array(
                    'id' => 252,
                    'nome' => 'ZIMBABUÉ',
                    'name' => 'ZIMBABWE',
                ),
        ));


    }
}