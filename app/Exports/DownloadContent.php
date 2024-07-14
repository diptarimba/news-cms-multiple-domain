<?php

namespace App\Exports;

use App\Models\Content;
use App\Models\URLMapping;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadContent implements FromArray, WithHeadings
{
    protected $content;
    protected $url_map;

    public function __construct($start_at, $end_at, $web)
    {
        $this->content = Content::where(function($query) use ($start_at, $end_at) {
            $query->whereDate('posted_at', '>=', $start_at)->whereDate('posted_at', '<=', $end_at);
        })->get();
        $this->url_map = URLMapping::whereIn('id', $web)->get();
    }

    public function array(): array
    {
        $no = 1;
        $combinedData = [];
        foreach($this->url_map as $eachURL){
            foreach($this->content as $eachNews)
            {
                if (trim($eachNews) == ""){
                    continue;
                }
                $combinedData[] = [
                    'No' => $no,
                    'URL' => $eachURL->sub . '.' . $eachURL->domain . '/show/'  . $eachNews->slug,
                    'Title' => $eachNews->title,
                    'Date' => Carbon::parse($eachNews->posted_at)->format('d F Y'),
                  ];
                  $no++;
            }
        }

        return $combinedData;
    }

    public function headings(): array
    {
        return [
            'No',
            'URL',
            'Title',
            'Date',
        ];
    }


}
