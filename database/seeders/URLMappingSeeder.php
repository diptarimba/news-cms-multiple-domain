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
        $data = [
            ['sub' => 'nasional', 'domain' => 'miracrate.my.id', 'name' => 'Miracrate Indonesi', 'code' => 'greymilk'],
            ['sub' => 'yogyakarta', 'domain' => 'miracrate.my.id', 'name' => 'Miracrate Indonesi', 'code' => 'oceanblue'],
            ['sub' => 'bandung', 'domain' => 'miracrate.my.id', 'name' => 'Miracrate Indonesi', 'code' => 'antara'],
            ['sub' => 'surabaya', 'domain' => 'miracrate.my.id', 'name' => 'Listrik Nusantara', 'code' => 'redeye'],
        ];

        foreach($data as $each){
            \App\Models\URLMapping::firstOrCreate($each);
        }
    }
}
