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
            ['sub' => 'nasional', 'domain' => 'listriknusantara.com', 'name' => 'Listrik Nusantara', 'code' => 'greymilk'],
            ['sub' => 'yogyakarta', 'domain' => 'listriknusantara.com', 'name' => 'Listrik Nusantara', 'code' => 'greymilk'],
        ];

        foreach($data as $each){
            \App\Models\URLMapping::firstOrCreate($each);
        }
    }
}
