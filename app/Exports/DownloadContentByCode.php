<?php

namespace App\Exports;

use App\Models\Content;
use App\Models\URLMapping;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DownloadContentByCode implements FromArray, WithHeadings
{
    protected $url_map;

    public function __construct($code)
    {
        $this->url_map = URLMapping::with(['contents' => function ($query) use ($code) {
            $query->where('code', $code);
            $query->select('title', 'posted_at', 'slug');
        }])->whereHas('contents', function ($query) use ($code) {
            $query->where('code', $code);
        })->orderBy('domain')->get();
    }

    public function array(): array
    {
        $no = 1;
        $combinedData = [];
        foreach ($this->url_map as $eachURL) {
            foreach ($eachURL->contents as $eachNews) {
                if (trim($eachNews) == "") {
                    continue;
                }
                $combinedData[] = [
                    'No' => $no,
                    'Date' => Carbon::parse($eachNews->posted_at)->format('d F Y'),
                    'Title' => $eachNews->title,
                    'URL' => $eachURL->sub . '.' . $eachURL->domain . '/show/'  . $eachNews->slug,
                    'Media' => $eachURL->domain
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
            'Date',
            'Title',
            'URL',
            'Media'
        ];
    }
}
