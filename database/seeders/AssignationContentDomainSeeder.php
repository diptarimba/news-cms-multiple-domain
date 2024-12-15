<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\URLMapping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignationContentDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contentIds = Content::select('id')->get()->pluck('id');
        $domainIds = URLMapping::select('id')->get()->pluck('id');

        $assignationData = [];
        foreach ($contentIds as $contentId) {
            foreach($domainIds as $domainId){
               $assignationData[] = [
                    'content_uuid' => $contentId,
                    'domain_uuid' => $domainId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        $chunks = array_chunk($assignationData, 100);
        foreach ($chunks as $chunk) {
            DB::table('domain_content')->insert($chunk);
        }
    }
}
