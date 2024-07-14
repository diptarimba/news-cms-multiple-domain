<?php

namespace Database\Seeders;

use App\Models\Content;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RegenerateNews extends Seeder
{
    // protected $count;
    // public function __construct($count = 10)
    // {
    //     $this->count = $count;
    // }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limit = $this->command->ask("Please enter the limit for creating something !!\n Format: dd-mm-yyyy:dd-mm-yyyy:count", '01-01-2022:01-01-2022:10');
        $this->command->info("Seeding {$limit} records.");

        $stringraw = explode(':', $limit);
        $start = Carbon::createFromFormat('d-m-Y', $stringraw[0]);
        $end = Carbon::createFromFormat('d-m-Y', $stringraw[1]);
        $newsPerDay = $stringraw[2];

        $totalDays = ($end->diffInDays($start) - ($start->isSaturday() ? 1 : 0) - ($start->isSunday() ? 1 : 0)) / 1;
        $totalNews = $totalDays * $newsPerDay;
        $this->command->info("Estimasi {$totalNews} records.");

        while ($start <= $end) {
            if ($start->dayOfWeek === 0 || $start->dayOfWeek === 6) {
                $start->addDays(1);
                continue;
            }

            Content::inRandomOrder()->limit($newsPerDay)->get()->each(function ($news) use ($start) {

                Content::create(array_merge($news->toArray(), [
                    'id' => null,
                    'slug' => Str::slug($news->title) .'-'. strtoupper(Str::random(10)),
                    'posted_at' => $start->format('Y-m-d'),
                ]));
            });

            $start->addDays(1);
        }
    }
}
