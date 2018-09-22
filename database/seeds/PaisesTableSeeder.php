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

        \DB::table('paises')->insert([
            0 =>
                [
                    'id' => 1,
                    'nome' => 'AFEGANISTÃO',
                    'name' => 'AFGHANISTAN',
                ],
            1 =>
                [
                    'id' => 2,
                    'nome' => 'ACROTÍRI E DECELIA',
                    'name' => 'AKROTIRI E DEKÉLIA',
                ],
            2 =>
                [
                    'id' => 3,
                    'nome' => 'ÁFRICA DO SUL',
                    'name' => 'SOUTH AFRICA',
                ],
            3 =>
                [
                    'id' => 4,
                    'nome' => 'ALBÂNIA',
                    'name' => 'ALBANIA',
                ],
            4 =>
                [
                    'id' => 5,
                    'nome' => 'ALEMANHA',
                    'name' => 'GERMANY',
                ],
            5 =>
                [
                    'id' => 6,
                    'nome' => 'AMERICAN SAMOA',
                    'name' => 'AMERICAN SAMOA',
                ],
            6 =>
                [
                    'id' => 7,
                    'nome' => 'ANDORRA',
                    'name' => 'ANDORRA',
                ],
            7 =>
                [
                    'id' => 8,
                    'nome' => 'ANGOLA',
                    'name' => 'ANGOLA',
                ],
            8 =>
                [
                    'id' => 9,
                    'nome' => 'ANGUILLA',
                    'name' => 'ANGUILLA',
                ],
            9 =>
                [
                    'id' => 10,
                    'nome' => 'ANTÍGUA E BARBUDA',
                    'name' => 'ANTIGUA AND BARBUDA',
                ],
            10 =>
                [
                    'id' => 11,
                    'nome' => 'ANTILHAS NEERLANDESAS',
                    'name' => 'NETHERLANDS ANTILLES',
                ],
            11 =>
                [
                    'id' => 12,
                    'nome' => 'ARÁBIA SAUDITA',
                    'name' => 'SAUDI ARABIA',
                ],
            12 =>
                [
                    'id' => 13,
                    'nome' => 'ARGÉLIA',
                    'name' => 'ALGERIA',
                ],
            13 =>
                [
                    'id' => 14,
                    'nome' => 'ARGENTINA',
                    'name' => 'ARGENTINA',
                ],
            14 =>
                [
                    'id' => 15,
                    'nome' => 'ARMÉNIA',
                    'name' => 'ARMENIA',
                ],
            15 =>
                [
                    'id' => 16,
                    'nome' => 'ARUBA',
                    'name' => 'ARUBA',
                ],
            16 =>
                [
                    'id' => 17,
                    'nome' => 'AUSTRÁLIA',
                    'name' => 'AUSTRALIA',
                ],
            17 =>
                [
                    'id' => 18,
                    'nome' => 'ÁUSTRIA',
                    'name' => 'AUSTRIA',
                ],
            18 =>
                [
                    'id' => 19,
                    'nome' => 'AZERBAIJÃO',
                    'name' => 'AZERBAIJAN',
                ],
            19 =>
                [
                    'id' => 20,
                    'nome' => 'BAHAMAS',
                    'name' => 'BAHAMAS, THE',
                ],
            20 =>
                [
                    'id' => 21,
                    'nome' => 'BANGLADECHE',
                    'name' => 'BANGLADESH',
                ],
            21 =>
                [
                    'id' => 22,
                    'nome' => 'BARBADOS',
                    'name' => 'BARBADOS',
                ],
            22 =>
                [
                    'id' => 23,
                    'nome' => 'BARÉM',
                    'name' => 'BAHRAIN',
                ],
            23 =>
                [
                    'id' => 24,
                    'nome' => 'BASSAS DA ÍNDIA',
                    'name' => 'BASSAS DA INDIA',
                ],
            24 =>
                [
                    'id' => 25,
                    'nome' => 'BÉLGICA',
                    'name' => 'BELGIUM',
                ],
            25 =>
                [
                    'id' => 26,
                    'nome' => 'BELIZE',
                    'name' => 'BELIZE',
                ],
            26 =>
                [
                    'id' => 27,
                    'nome' => 'BENIM',
                    'name' => 'BENIN',
                ],
            27 =>
                [
                    'id' => 28,
                    'nome' => 'BERMUDAS',
                    'name' => 'BERMUDA',
                ],
            28 =>
                [
                    'id' => 29,
                    'nome' => 'BIELORRÚSSIA',
                    'name' => 'BELARUS',
                ],
            29 =>
                [
                    'id' => 30,
                    'nome' => 'BOLÍVIA',
                    'name' => 'BOLIVIA',
                ],
            30 =>
                [
                    'id' => 31,
                    'nome' => 'BÓSNIA E HERZEGOVINA',
                    'name' => 'BOSNIA AND HERZEGOVINA',
                ],
            31 =>
                [
                    'id' => 32,
                    'nome' => 'BOTSUANA',
                    'name' => 'BOTSWANA',
                ],
            32 =>
                [
                    'id' => 33,
                    'nome' => 'BRASIL',
                    'name' => 'BRAZIL',
                ],
            33 =>
                [
                    'id' => 34,
                    'nome' => 'BRUNEI DARUSSALAM',
                    'name' => 'BRUNEI DARUSSALAM',
                ],
            34 =>
                [
                    'id' => 35,
                    'nome' => 'BULGÁRIA',
                    'name' => 'BULGARIA',
                ],
            35 =>
                [
                    'id' => 36,
                    'nome' => 'BURQUINA FASO',
                    'name' => 'BURKINA FASO',
                ],
            36 =>
                [
                    'id' => 37,
                    'nome' => 'BURUNDI',
                    'name' => 'BURUNDI',
                ],
            37 =>
                [
                    'id' => 38,
                    'nome' => 'BUTÃO',
                    'name' => 'BHUTAN',
                ],
            38 =>
                [
                    'id' => 39,
                    'nome' => 'CABO VERDE',
                    'name' => 'CAPE VERDE',
                ],
            39 =>
                [
                    'id' => 40,
                    'nome' => 'CAMARÕES',
                    'name' => 'CAMEROON',
                ],
            40 =>
                [
                    'id' => 41,
                    'nome' => 'CAMBOJA',
                    'name' => 'CAMBODIA',
                ],
            41 =>
                [
                    'id' => 42,
                    'nome' => 'CANADÁ',
                    'name' => 'CANADA',
                ],
            42 =>
                [
                    'id' => 43,
                    'nome' => 'CATAR',
                    'name' => 'QATAR',
                ],
            43 =>
                [
                    'id' => 44,
                    'nome' => 'CAZAQUISTÃO',
                    'name' => 'KAZAKHSTAN',
                ],
            44 =>
                [
                    'id' => 45,
                    'nome' => 'CENTRO-AFRICANA REPÚBLICA',
                    'name' => 'CENTRAL AFRICAN REPUBLIC',
                ],
            45 =>
                [
                    'id' => 46,
                    'nome' => 'CHADE',
                    'name' => 'CHAD',
                ],
            46 =>
                [
                    'id' => 47,
                    'nome' => 'CHILE',
                    'name' => 'CHILE',
                ],
            47 =>
                [
                    'id' => 48,
                    'nome' => 'CHINA',
                    'name' => 'CHINA',
                ],
            48 =>
                [
                    'id' => 49,
                    'nome' => 'CHIPRE',
                    'name' => 'CYPRUS',
                ],
            49 =>
                [
                    'id' => 50,
                    'nome' => 'COLÔMBIA',
                    'name' => 'COLOMBIA',
                ],
            50 =>
                [
                    'id' => 51,
                    'nome' => 'COMORES',
                    'name' => 'COMOROS',
                ],
            51 =>
                [
                    'id' => 52,
                    'nome' => 'CONGO',
                    'name' => 'CONGO',
                ],
            52 =>
                [
                    'id' => 53,
                    'nome' => 'CONGO REPÚBLICA DEMOCRÁTICA',
                    'name' => 'CONGO DEMOCRATIC REPUBLIC',
                ],
            53 =>
                [
                    'id' => 54,
                    'nome' => 'COREIA DO NORTE',
                    'name' => 'KOREA NORTH',
                ],
            54 =>
                [
                    'id' => 55,
                    'nome' => 'COREIA DO SUL',
                    'name' => 'KOREA SOUTH',
                ],
            55 =>
                [
                    'id' => 56,
                    'nome' => 'COSTA DO MARFIM',
                    'name' => 'IVORY COAST',
                ],
            56 =>
                [
                    'id' => 57,
                    'nome' => 'COSTA RICA',
                    'name' => 'COSTA RICA',
                ],
            57 =>
                [
                    'id' => 58,
                    'nome' => 'CROÁCIA',
                    'name' => 'CROATIA',
                ],
            58 =>
                [
                    'id' => 59,
                    'nome' => 'CUBA',
                    'name' => 'CUBA',
                ],
            59 =>
                [
                    'id' => 60,
                    'nome' => 'DINAMARCA',
                    'name' => 'DENMARK',
                ],
            60 =>
                [
                    'id' => 61,
                    'nome' => 'DOMÍNICA',
                    'name' => 'DOMINICA',
                ],
            61 =>
                [
                    'id' => 62,
                    'nome' => 'EGIPTO',
                    'name' => 'EGYPT',
                ],
            62 =>
                [
                    'id' => 63,
                    'nome' => 'EMIRADOS ÁRABES UNIDOS',
                    'name' => 'UNITED ARAB EMIRATES',
                ],
            63 =>
                [
                    'id' => 64,
                    'nome' => 'EQUADOR',
                    'name' => 'ECUADOR',
                ],
            64 =>
                [
                    'id' => 65,
                    'nome' => 'ERITREIA',
                    'name' => 'ERITREA',
                ],
            65 =>
                [
                    'id' => 66,
                    'nome' => 'ESLOVÁQUIA',
                    'name' => 'SLOVAKIA',
                ],
            66 =>
                [
                    'id' => 67,
                    'nome' => 'ESLOVÉNIA',
                    'name' => 'SLOVENIA',
                ],
            67 =>
                [
                    'id' => 68,
                    'nome' => 'ESPANHA',
                    'name' => 'SPAIN',
                ],
            68 =>
                [
                    'id' => 69,
                    'nome' => 'ESTADOS UNIDOS',
                    'name' => 'UNITED STATES',
                ],
            69 =>
                [
                    'id' => 70,
                    'nome' => 'ESTÓNIA',
                    'name' => 'ESTONIA',
                ],
            70 =>
                [
                    'id' => 71,
                    'nome' => 'ETIÓPIA',
                    'name' => 'ETHIOPIA',
                ],
            71 =>
                [
                    'id' => 72,
                    'nome' => 'FAIXA DE GAZA',
                    'name' => 'GAZA STRIP',
                ],
            72 =>
                [
                    'id' => 73,
                    'nome' => 'FIJI',
                    'name' => 'FIJI',
                ],
            73 =>
                [
                    'id' => 74,
                    'nome' => 'FILIPINAS',
                    'name' => 'PHILIPPINES',
                ],
            74 =>
                [
                    'id' => 75,
                    'nome' => 'FINLÂNDIA',
                    'name' => 'FINLAND',
                ],
            75 =>
                [
                    'id' => 76,
                    'nome' => 'FRANÇA',
                    'name' => 'FRANCE',
                ],
            76 =>
                [
                    'id' => 77,
                    'nome' => 'GABÃO',
                    'name' => 'GABON',
                ],
            77 =>
                [
                    'id' => 78,
                    'nome' => 'GÂMBIA',
                    'name' => 'GAMBIA',
                ],
            78 =>
                [
                    'id' => 79,
                    'nome' => 'GANA',
                    'name' => 'GHANA',
                ],
            79 =>
                [
                    'id' => 80,
                    'nome' => 'GEÓRGIA',
                    'name' => 'GEORGIA',
                ],
            80 =>
                [
                    'id' => 81,
                    'nome' => 'GIBRALTAR',
                    'name' => 'GIBRALTAR',
                ],
            81 =>
                [
                    'id' => 82,
                    'nome' => 'GRANADA',
                    'name' => 'GRENADA',
                ],
            82 =>
                [
                    'id' => 83,
                    'nome' => 'GRÉCIA',
                    'name' => 'GREECE',
                ],
            83 =>
                [
                    'id' => 84,
                    'nome' => 'GRONELÂNDIA',
                    'name' => 'GREENLAND',
                ],
            84 =>
                [
                    'id' => 85,
                    'nome' => 'GUADALUPE',
                    'name' => 'GUADELOUPE',
                ],
            85 =>
                [
                    'id' => 86,
                    'nome' => 'GUAM',
                    'name' => 'GUAM',
                ],
            86 =>
                [
                    'id' => 87,
                    'nome' => 'GUATEMALA',
                    'name' => 'GUATEMALA',
                ],
            87 =>
                [
                    'id' => 88,
                    'nome' => 'GUERNSEY',
                    'name' => 'GUERNSEY',
                ],
            88 =>
                [
                    'id' => 89,
                    'nome' => 'GUIANA',
                    'name' => 'GUYANA',
                ],
            89 =>
                [
                    'id' => 90,
                    'nome' => 'GUIANA FRANCESA',
                    'name' => 'FRENCH GUIANA',
                ],
            90 =>
                [
                    'id' => 91,
                    'nome' => 'GUINÉ',
                    'name' => 'GUINEA',
                ],
            91 =>
                [
                    'id' => 92,
                    'nome' => 'GUINÉ EQUATORIAL',
                    'name' => 'EQUATORIAL GUINEA',
                ],
            92 =>
                [
                    'id' => 93,
                    'nome' => 'GUINÉ-BISSAU',
                    'name' => 'GUINEA-BISSAU',
                ],
            93 =>
                [
                    'id' => 94,
                    'nome' => 'HAITI',
                    'name' => 'HAITI',
                ],
            94 =>
                [
                    'id' => 95,
                    'nome' => 'HONDURAS',
                    'name' => 'HONDURAS',
                ],
            95 =>
                [
                    'id' => 96,
                    'nome' => 'HONG KONG',
                    'name' => 'HONG KONG',
                ],
            96 =>
                [
                    'id' => 97,
                    'nome' => 'HUNGRIA',
                    'name' => 'HUNGARY',
                ],
            97 =>
                [
                    'id' => 98,
                    'nome' => 'IÉMEN',
                    'name' => 'YEMEN',
                ],
            98 =>
                [
                    'id' => 99,
                    'nome' => 'ILHA BOUVET',
                    'name' => 'BOUVET ISLAND',
                ],
            99 =>
                [
                    'id' => 100,
                    'nome' => 'ILHA CHRISTMAS',
                    'name' => 'CHRISTMAS ISLAND',
                ],
            100 =>
                [
                    'id' => 101,
                    'nome' => 'ILHA DE CLIPPERTON',
                    'name' => 'CLIPPERTON ISLAND',
                ],
            101 =>
                [
                    'id' => 102,
                    'nome' => 'ILHA DE JOÃO DA NOVA',
                    'name' => 'JUAN DE NOVA ISLAND',
                ],
            102 =>
                [
                    'id' => 103,
                    'nome' => 'ILHA DE MAN',
                    'name' => 'ISLE OF MAN',
                ],
            103 =>
                [
                    'id' => 104,
                    'nome' => 'ILHA DE NAVASSA',
                    'name' => 'NAVASSA ISLAND',
                ],
            104 =>
                [
                    'id' => 105,
                    'nome' => 'ILHA EUROPA',
                    'name' => 'EUROPA ISLAND',
                ],
            105 =>
                [
                    'id' => 106,
                    'nome' => 'ILHA NORFOLK',
                    'name' => 'NORFOLK ISLAND',
                ],
            106 =>
                [
                    'id' => 107,
                    'nome' => 'ILHA TROMELIN',
                    'name' => 'TROMELIN ISLAND',
                ],
            107 =>
                [
                    'id' => 108,
                    'nome' => 'ILHAS ASHMORE E CARTIER',
                    'name' => 'ASHMORE AND CARTIER ISLANDS',
                ],
            108 =>
                [
                    'id' => 109,
                    'nome' => 'ILHAS CAIMAN',
                    'name' => 'CAYMAN ISLANDS',
                ],
            109 =>
                [
                    'id' => 110,
                    'nome' => 'ILHAS COCOS (KEELING)',
                    'name' => 'COCOS (KEELING) ISLANDS',
                ],
            110 =>
                [
                    'id' => 111,
                    'nome' => 'ILHAS COOK',
                    'name' => 'COOK ISLANDS',
                ],
            111 =>
                [
                    'id' => 112,
                    'nome' => 'ILHAS DO MAR DE CORAL',
                    'name' => 'CORAL SEA ISLANDS',
                ],
            112 =>
                [
                    'id' => 113,
                    'nome' => 'ILHAS FALKLANDS (ILHAS MALVINAS)',
                    'name' => 'FALKLAND ISLANDS (ISLAS MALVINAS)',
                ],
            113 =>
                [
                    'id' => 114,
                    'nome' => 'ILHAS FEROE',
                    'name' => 'FAROE ISLANDS',
                ],
            114 =>
                [
                    'id' => 115,
                    'nome' => 'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL',
                    'name' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
                ],
            115 =>
                [
                    'id' => 116,
                    'nome' => 'ILHAS MARIANAS DO NORTE',
                    'name' => 'NORTHERN MARIANA ISLANDS',
                ],
            116 =>
                [
                    'id' => 117,
                    'nome' => 'ILHAS MARSHALL',
                    'name' => 'MARSHALL ISLANDS',
                ],
            117 =>
                [
                    'id' => 118,
                    'nome' => 'ILHAS PARACEL',
                    'name' => 'PARACEL ISLANDS',
                ],
            118 =>
                [
                    'id' => 119,
                    'nome' => 'ILHAS PITCAIRN',
                    'name' => 'PITCAIRN ISLANDS',
                ],
            119 =>
                [
                    'id' => 120,
                    'nome' => 'ILHAS SALOMÃO',
                    'name' => 'SOLOMON ISLANDS',
                ],
            120 =>
                [
                    'id' => 121,
                    'nome' => 'ILHAS SPRATLY',
                    'name' => 'SPRATLY ISLANDS',
                ],
            121 =>
                [
                    'id' => 122,
                    'nome' => 'ILHAS VIRGENS AMERICANAS',
                    'name' => 'UNITED STATES VIRGIN ISLANDS',
                ],
            122 =>
                [
                    'id' => 123,
                    'nome' => 'ILHAS VIRGENS BRITÂNICAS',
                    'name' => 'BRITISH VIRGIN ISLANDS',
                ],
            123 =>
                [
                    'id' => 124,
                    'nome' => 'ÍNDIA',
                    'name' => 'INDIA',
                ],
            124 =>
                [
                    'id' => 125,
                    'nome' => 'INDONÉSIA',
                    'name' => 'INDONESIA',
                ],
            125 =>
                [
                    'id' => 126,
                    'nome' => 'IRÃO',
                    'name' => 'IRAN',
                ],
            126 =>
                [
                    'id' => 127,
                    'nome' => 'IRAQUE',
                    'name' => 'IRAQ',
                ],
            127 =>
                [
                    'id' => 128,
                    'nome' => 'IRLANDA',
                    'name' => 'IRELAND',
                ],
            128 =>
                [
                    'id' => 129,
                    'nome' => 'ISLÂNDIA',
                    'name' => 'ICELAND',
                ],
            129 =>
                [
                    'id' => 130,
                    'nome' => 'ISRAEL',
                    'name' => 'ISRAEL',
                ],
            130 =>
                [
                    'id' => 131,
                    'nome' => 'ITÁLIA',
                    'name' => 'ITALY',
                ],
            131 =>
                [
                    'id' => 132,
                    'nome' => 'JAMAICA',
                    'name' => 'JAMAICA',
                ],
            132 =>
                [
                    'id' => 133,
                    'nome' => 'JAN MAYEN',
                    'name' => 'JAN MAYEN',
                ],
            133 =>
                [
                    'id' => 134,
                    'nome' => 'JAPÃO',
                    'name' => 'JAPAN',
                ],
            134 =>
                [
                    'id' => 135,
                    'nome' => 'JERSEY',
                    'name' => 'JERSEY',
                ],
            135 =>
                [
                    'id' => 136,
                    'nome' => 'JIBUTI',
                    'name' => 'DJIBOUTI',
                ],
            136 =>
                [
                    'id' => 137,
                    'nome' => 'JORDÂNIA',
                    'name' => 'JORDAN',
                ],
            137 =>
                [
                    'id' => 138,
                    'nome' => 'KIRIBATI',
                    'name' => 'KIRIBATI',
                ],
            138 =>
                [
                    'id' => 139,
                    'nome' => 'KOWEIT',
                    'name' => 'KUWAIT',
                ],
            139 =>
                [
                    'id' => 140,
                    'nome' => 'LAOS',
                    'name' => 'LAOS',
                ],
            140 =>
                [
                    'id' => 141,
                    'nome' => 'LESOTO',
                    'name' => 'LESOTHO',
                ],
            141 =>
                [
                    'id' => 142,
                    'nome' => 'LETÓNIA',
                    'name' => 'LATVIA',
                ],
            142 =>
                [
                    'id' => 143,
                    'nome' => 'LÍBANO',
                    'name' => 'LEBANON',
                ],
            143 =>
                [
                    'id' => 144,
                    'nome' => 'LIBÉRIA',
                    'name' => 'LIBERIA',
                ],
            144 =>
                [
                    'id' => 145,
                    'nome' => 'LÍBIA',
                    'name' => 'LIBYAN ARAB JAMAHIRIYA',
                ],
            145 =>
                [
                    'id' => 146,
                    'nome' => 'LISTENSTAINE',
                    'name' => 'LIECHTENSTEIN',
                ],
            146 =>
                [
                    'id' => 147,
                    'nome' => 'LITUÂNIA',
                    'name' => 'LITHUANIA',
                ],
            147 =>
                [
                    'id' => 148,
                    'nome' => 'LUXEMBURGO',
                    'name' => 'LUXEMBOURG',
                ],
            148 =>
                [
                    'id' => 149,
                    'nome' => 'MACAU',
                    'name' => 'MACAO',
                ],
            149 =>
                [
                    'id' => 150,
                    'nome' => 'MACEDÓNIA',
                    'name' => 'MACEDONIA',
                ],
            150 =>
                [
                    'id' => 151,
                    'nome' => 'MADAGÁSCAR',
                    'name' => 'MADAGASCAR',
                ],
            151 =>
                [
                    'id' => 152,
                    'nome' => 'MALÁSIA',
                    'name' => 'MALAYSIA',
                ],
            152 =>
                [
                    'id' => 153,
                    'nome' => 'MALAVI',
                    'name' => 'MALAWI',
                ],
            153 =>
                [
                    'id' => 154,
                    'nome' => 'MALDIVAS',
                    'name' => 'MALDIVES',
                ],
            154 =>
                [
                    'id' => 155,
                    'nome' => 'MALI',
                    'name' => 'MALI',
                ],
            155 =>
                [
                    'id' => 156,
                    'nome' => 'MALTA',
                    'name' => 'MALTA',
                ],
            156 =>
                [
                    'id' => 157,
                    'nome' => 'MARROCOS',
                    'name' => 'MOROCCO',
                ],
            157 =>
                [
                    'id' => 158,
                    'nome' => 'MARTINICA',
                    'name' => 'MARTINIQUE',
                ],
            158 =>
                [
                    'id' => 159,
                    'nome' => 'MAURÍCIA',
                    'name' => 'MAURITIUS',
                ],
            159 =>
                [
                    'id' => 160,
                    'nome' => 'MAURITÂNIA',
                    'name' => 'MAURITANIA',
                ],
            160 =>
                [
                    'id' => 161,
                    'nome' => 'MAYOTTE',
                    'name' => 'MAYOTTE',
                ],
            161 =>
                [
                    'id' => 162,
                    'nome' => 'MÉXICO',
                    'name' => 'MEXICO',
                ],
            162 =>
                [
                    'id' => 163,
                    'nome' => 'MIANMAR',
                    'name' => 'MYANMAR BURMA',
                ],
            163 =>
                [
                    'id' => 164,
                    'nome' => 'MICRONÉSIA',
                    'name' => 'MICRONESIA',
                ],
            164 =>
                [
                    'id' => 165,
                    'nome' => 'MOÇAMBIQUE',
                    'name' => 'MOZAMBIQUE',
                ],
            165 =>
                [
                    'id' => 166,
                    'nome' => 'MOLDÁVIA',
                    'name' => 'MOLDOVA',
                ],
            166 =>
                [
                    'id' => 167,
                    'nome' => 'MÓNACO',
                    'name' => 'MONACO',
                ],
            167 =>
                [
                    'id' => 168,
                    'nome' => 'MONGÓLIA',
                    'name' => 'MONGOLIA',
                ],
            168 =>
                [
                    'id' => 169,
                    'nome' => 'MONTENEGRO',
                    'name' => 'MONTENEGRO',
                ],
            169 =>
                [
                    'id' => 170,
                    'nome' => 'MONTSERRAT',
                    'name' => 'MONTSERRAT',
                ],
            170 =>
                [
                    'id' => 171,
                    'nome' => 'NAMÍBIA',
                    'name' => 'NAMIBIA',
                ],
            171 =>
                [
                    'id' => 172,
                    'nome' => 'NAURU',
                    'name' => 'NAURU',
                ],
            172 =>
                [
                    'id' => 173,
                    'nome' => 'NEPAL',
                    'name' => 'NEPAL',
                ],
            173 =>
                [
                    'id' => 174,
                    'nome' => 'NICARÁGUA',
                    'name' => 'NICARAGUA',
                ],
            174 =>
                [
                    'id' => 175,
                    'nome' => 'NÍGER',
                    'name' => 'NIGER',
                ],
            175 =>
                [
                    'id' => 176,
                    'nome' => 'NIGÉRIA',
                    'name' => 'NIGERIA',
                ],
            176 =>
                [
                    'id' => 177,
                    'nome' => 'NIUE',
                    'name' => 'NIUE',
                ],
            177 =>
                [
                    'id' => 178,
                    'nome' => 'NORUEGA',
                    'name' => 'NORWAY',
                ],
            178 =>
                [
                    'id' => 179,
                    'nome' => 'NOVA CALEDÓNIA',
                    'name' => 'NEW CALEDONIA',
                ],
            179 =>
                [
                    'id' => 180,
                    'nome' => 'NOVA ZELÂNDIA',
                    'name' => 'NEW ZEALAND',
                ],
            180 =>
                [
                    'id' => 181,
                    'nome' => 'OMÃ',
                    'name' => 'OMAN',
                ],
            181 =>
                [
                    'id' => 182,
                    'nome' => 'PAÍSES BAIXOS',
                    'name' => 'NETHERLANDS',
                ],
            182 =>
                [
                    'id' => 183,
                    'nome' => 'PALAU',
                    'name' => 'PALAU',
                ],
            183 =>
                [
                    'id' => 184,
                    'nome' => 'PALESTINA',
                    'name' => 'PALESTINE',
                ],
            184 =>
                [
                    'id' => 185,
                    'nome' => 'PANAMÁ',
                    'name' => 'PANAMA',
                ],
            185 =>
                [
                    'id' => 186,
                    'nome' => 'PAPUÁSIA-NOVA GUINÉ',
                    'name' => 'PAPUA NEW GUINEA',
                ],
            186 =>
                [
                    'id' => 187,
                    'nome' => 'PAQUISTÃO',
                    'name' => 'PAKISTAN',
                ],
            187 =>
                [
                    'id' => 188,
                    'nome' => 'PARAGUAI',
                    'name' => 'PARAGUAY',
                ],
            188 =>
                [
                    'id' => 189,
                    'nome' => 'PERU',
                    'name' => 'PERU',
                ],
            189 =>
                [
                    'id' => 190,
                    'nome' => 'POLINÉSIA FRANCESA',
                    'name' => 'FRENCH POLYNESIA',
                ],
            190 =>
                [
                    'id' => 191,
                    'nome' => 'POLÓNIA',
                    'name' => 'POLAND',
                ],
            191 =>
                [
                    'id' => 192,
                    'nome' => 'PORTO RICO',
                    'name' => 'PUERTO RICO',
                ],
            192 =>
                [
                    'id' => 193,
                    'nome' => 'PORTUGAL',
                    'name' => 'PORTUGAL',
                ],
            193 =>
                [
                    'id' => 194,
                    'nome' => 'QUÉNIA',
                    'name' => 'KENYA',
                ],
            194 =>
                [
                    'id' => 195,
                    'nome' => 'QUIRGUIZISTÃO',
                    'name' => 'KYRGYZSTAN',
                ],
            195 =>
                [
                    'id' => 196,
                    'nome' => 'REINO UNIDO',
                    'name' => 'UNITED KINGDOM',
                ],
            196 =>
                [
                    'id' => 197,
                    'nome' => 'REPÚBLICA CHECA',
                    'name' => 'CZECH REPUBLIC',
                ],
            197 =>
                [
                    'id' => 198,
                    'nome' => 'REPÚBLICA DOMINICANA',
                    'name' => 'DOMINICAN REPUBLIC',
                ],
            198 =>
                [
                    'id' => 199,
                    'nome' => 'ROMÉNIA',
                    'name' => 'ROMANIA',
                ],
            199 =>
                [
                    'id' => 200,
                    'nome' => 'RUANDA',
                    'name' => 'RWANDA',
                ],
            200 =>
                [
                    'id' => 201,
                    'nome' => 'RÚSSIA',
                    'name' => 'RUSSIAN FEDERATION',
                ],
            201 =>
                [
                    'id' => 202,
                    'nome' => 'SAHARA OCCIDENTAL',
                    'name' => 'WESTERN SAHARA',
                ],
            202 =>
                [
                    'id' => 203,
                    'nome' => 'SALVADOR',
                    'name' => 'EL SALVADOR',
                ],
            203 =>
                [
                    'id' => 204,
                    'nome' => 'SAMOA',
                    'name' => 'SAMOA',
                ],
            204 =>
                [
                    'id' => 205,
                    'nome' => 'SANTA HELENA',
                    'name' => 'SAINT HELENA',
                ],
            205 =>
                [
                    'id' => 206,
                    'nome' => 'SANTA LÚCIA',
                    'name' => 'SAINT LUCIA',
                ],
            206 =>
                [
                    'id' => 207,
                    'nome' => 'SANTA SÉ',
                    'name' => 'HOLY SEE',
                ],
            207 =>
                [
                    'id' => 208,
                    'nome' => 'SÃO CRISTÓVÃO E NEVES',
                    'name' => 'SAINT KITTS AND NEVIS',
                ],
            208 =>
                [
                    'id' => 209,
                    'nome' => 'SÃO MARINO',
                    'name' => 'SAN MARINO',
                ],
            209 =>
                [
                    'id' => 210,
                    'nome' => 'SÃO PEDRO E MIQUELÃO',
                    'name' => 'SAINT PIERRE AND MIQUELON',
                ],
            210 =>
                [
                    'id' => 211,
                    'nome' => 'SÃO TOMÉ E PRÍNCIPE',
                    'name' => 'SAO TOME AND PRINCIPE',
                ],
            211 =>
                [
                    'id' => 212,
                    'nome' => 'SÃO VICENTE E GRANADINAS',
                    'name' => 'SAINT VINCENT AND THE GRENADINES',
                ],
            212 =>
                [
                    'id' => 213,
                    'nome' => 'SEICHELES',
                    'name' => 'SEYCHELLES',
                ],
            213 =>
                [
                    'id' => 214,
                    'nome' => 'SENEGAL',
                    'name' => 'SENEGAL',
                ],
            214 =>
                [
                    'id' => 215,
                    'nome' => 'SERRA LEOA',
                    'name' => 'SIERRA LEONE',
                ],
            215 =>
                [
                    'id' => 216,
                    'nome' => 'SÉRVIA',
                    'name' => 'SERBIA',
                ],
            216 =>
                [
                    'id' => 217,
                    'nome' => 'SINGAPURA',
                    'name' => 'SINGAPORE',
                ],
            217 =>
                [
                    'id' => 218,
                    'nome' => 'SÍRIA',
                    'name' => 'SYRIA',
                ],
            218 =>
                [
                    'id' => 219,
                    'nome' => 'SOMÁLIA',
                    'name' => 'SOMALIA',
                ],
            219 =>
                [
                    'id' => 220,
                    'nome' => 'SRI LANCA',
                    'name' => 'SRI LANKA',
                ],
            220 =>
                [
                    'id' => 221,
                    'nome' => 'SUAZILÂNDIA',
                    'name' => 'SWAZILAND',
                ],
            221 =>
                [
                    'id' => 222,
                    'nome' => 'SUDÃO',
                    'name' => 'SUDAN',
                ],
            222 =>
                [
                    'id' => 223,
                    'nome' => 'SUÉCIA',
                    'name' => 'SWEDEN',
                ],
            223 =>
                [
                    'id' => 224,
                    'nome' => 'SUÍÇA',
                    'name' => 'SWITZERLAND',
                ],
            224 =>
                [
                    'id' => 225,
                    'nome' => 'SURINAME',
                    'name' => 'SURINAME',
                ],
            225 =>
                [
                    'id' => 226,
                    'nome' => 'SVALBARD',
                    'name' => 'SVALBARD',
                ],
            226 =>
                [
                    'id' => 227,
                    'nome' => 'TAILÂNDIA',
                    'name' => 'THAILAND',
                ],
            227 =>
                [
                    'id' => 228,
                    'nome' => 'TAIWAN',
                    'name' => 'TAIWAN',
                ],
            228 =>
                [
                    'id' => 229,
                    'nome' => 'TAJIQUISTÃO',
                    'name' => 'TAJIKISTAN',
                ],
            229 =>
                [
                    'id' => 230,
                    'nome' => 'TANZÂNIA',
                    'name' => 'TANZANIA',
                ],
            230 =>
                [
                    'id' => 231,
                    'nome' => 'TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO',
                    'name' => 'BRITISH INDIAN OCEAN TERRITORY',
                ],
            231 =>
                [
                    'id' => 232,
                    'nome' => 'TERRITÓRIO DAS ILHAS HEARD E MCDONALD',
                    'name' => 'HEARD ISLAND AND MCDONALD ISLANDS',
                ],
            232 =>
                [
                    'id' => 233,
                    'nome' => 'TIMOR-LESTE',
                    'name' => 'TIMOR-LESTE',
                ],
            233 =>
                [
                    'id' => 234,
                    'nome' => 'TOGO',
                    'name' => 'TOGO',
                ],
            234 =>
                [
                    'id' => 235,
                    'nome' => 'TOKELAU',
                    'name' => 'TOKELAU',
                ],
            235 =>
                [
                    'id' => 236,
                    'nome' => 'TONGA',
                    'name' => 'TONGA',
                ],
            236 =>
                [
                    'id' => 237,
                    'nome' => 'TRINDADE E TOBAGO',
                    'name' => 'TRINIDAD AND TOBAGO',
                ],
            237 =>
                [
                    'id' => 238,
                    'nome' => 'TUNÍSIA',
                    'name' => 'TUNISIA',
                ],
            238 =>
                [
                    'id' => 239,
                    'nome' => 'TURKS E CAICOS',
                    'name' => 'TURKS AND CAICOS ISLANDS',
                ],
            239 =>
                [
                    'id' => 240,
                    'nome' => 'TURQUEMENISTÃO',
                    'name' => 'TURKMENISTAN',
                ],
            240 =>
                [
                    'id' => 241,
                    'nome' => 'TURQUIA',
                    'name' => 'TURKEY',
                ],
            241 =>
                [
                    'id' => 242,
                    'nome' => 'TUVALU',
                    'name' => 'TUVALU',
                ],
            242 =>
                [
                    'id' => 243,
                    'nome' => 'UCRÂNIA',
                    'name' => 'UKRAINE',
                ],
            243 =>
                [
                    'id' => 244,
                    'nome' => 'UGANDA',
                    'name' => 'UGANDA',
                ],
            244 =>
                [
                    'id' => 245,
                    'nome' => 'URUGUAI',
                    'name' => 'URUGUAY',
                ],
            245 =>
                [
                    'id' => 246,
                    'nome' => 'USBEQUISTÃO',
                    'name' => 'UZBEKISTAN',
                ],
            246 =>
                [
                    'id' => 247,
                    'nome' => 'VANUATU',
                    'name' => 'VANUATU',
                ],
            247 =>
                [
                    'id' => 248,
                    'nome' => 'VENEZUELA',
                    'name' => 'VENEZUELA',
                ],
            248 =>
                [
                    'id' => 249,
                    'nome' => 'VIETNAME',
                    'name' => 'VIETNAM',
                ],
            249 =>
                [
                    'id' => 250,
                    'nome' => 'WALLIS E FUTUNA',
                    'name' => 'WALLIS AND FUTUNA',
                ],
            250 =>
                [
                    'id' => 251,
                    'nome' => 'ZÂMBIA',
                    'name' => 'ZAMBIA',
                ],
            251 =>
                [
                    'id' => 252,
                    'nome' => 'ZIMBABUÉ',
                    'name' => 'ZIMBABWE',
                ],
        ]);


    }
}