<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Content;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path ke file CSV di dalam folder public
        $csvPath = public_path('berita.csv');

        // Membaca file CSV
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);
        $csv->setDelimiter(';');

        $categoryId = Category::first()->id;
        $authorId = User::first()->id;

        // Loop melalui setiap record dalam CSV dan buat entri di database
        foreach ($csv as $record) {
            Content::firstOrCreate([
                'title' => $record['Judul'],
                'content' => $record['Content'],
                'category_id' => $categoryId,
                'slug' => Str::slug($record['Judul']) . strtoupper(Str::random(5)),
                'posted_at' => Carbon::createFromFormat('d/m/Y', $record['Date']),
                'author_id' => $authorId,
            ]);
        }
    }
}
