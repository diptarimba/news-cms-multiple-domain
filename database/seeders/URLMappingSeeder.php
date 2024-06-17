<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class URLMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dataCreator = [
            [
                'domain' => 'navigasinusantara.com', 'name' => 'Navigasi Nusantara', 'code' => 'greymilk', 'sub' => [
                    "nasional",
                    "aceh",
                    "balikpapan",
                    "bandung",
                    "belitung",
                    "denpasar",
                    "gorontalo",
                    "indramayu",
                    "jabar",
                    "jatim",
                    "kalimantan",
                    "malang",
                    "manado",
                    "medan",
                    "pekanbaru",
                    "potianak",
                    "jateng",
                    "yogyakarta",
                    "surabaya",
                    "banten",
                    "samarinda",
                    "semarang"
                ],
            ], [
                'domain' => 'listriknusantara.com', 'name' => 'Listrik Nusantara', 'code' => 'oceanblue', 'sub' => [
                    "nasional",
                    "balikpapan",
                    "bandung",
                    "belitung",
                    "denpasar",
                    "gorontalo",
                    "indramayu",
                    "jabar",
                    "jatim",
                    "jateng",
                    "kalimantan",
                    "malang",
                    "manado",
                    "medan",
                    "pekanbaru",
                    "potianak",
                    "samarinda",
                    "yogyakarta",
                    "aceh",
                    "surabaya"
                ],
            ], [
                'domain' => 'listrikhijau.com', 'name' => 'Listrik Hijau', 'code' => 'antara', 'sub' => [
                    "nasional",
                    "aceh",
                    "balikpapan",
                    "bandung",
                    "denpasar",
                    "banten",
                    "indramayu",
                    "jabar",
                    "jateng",
                    "jatim",
                    "kalimantan",
                    "malang",
                    "manado",
                    "medan",
                    "pekanbaru",
                    "potianak",
                    "samarinda",
                    "yogyakarta",
                    "surabaya",
                    "gorontalo"
                ],
            ], [
                'domain' => 'kompasenergi.com', 'name' => 'Kompas Energi', 'code' => 'redeye', 'sub' => [
                    "nasional",
                    "aceh",
                    "balikpapan",
                    "bandung",
                    "banten",
                    "belitung",
                    "gorontalo",
                    "indramayu",
                    "denpasar",
                    "jabar",
                    "jateng",
                    "jatim",
                    "kalimantan",
                    "malang",
                    "medan",
                    "manado",
                    "pekanbaru",
                    "potianak",
                    "surabaya",
                    "yogyakarta",
                    "samarinda"
                ],
            ], [
                'domain' => 'energiprimerindonesia.com', 'name' => 'Energi Primer Indonesia', 'code' => 'minima', 'sub' => [
                    "nasional",
                    "jabar",
                    "kalimantan",
                    "denpasar",
                    "malang",
                    "indramayu",
                    "bandung",
                    "aceh",
                    "jateng",
                    "medan",
                    "potianak",
                    "pekanbaru",
                    "samarinda",
                    "balikpapan",
                    "manado",
                    "jatim",
                    "banten",
                    "gorontalo",
                    "surabaya",
                    "yogyakarta"

                ],
            ],
        ];

        foreach ($dataCreator as $each) {
            foreach($each['sub'] as $sub) {
                \App\Models\URLMapping::firstOrCreate([
                    'domain' => $each['domain'],
                    'sub' => $sub,
                    'name' => $each['name'],
                    'code' => $each['code'],
                ]);
            }
        }
    }
}
