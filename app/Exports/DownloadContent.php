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
    // protected $url_map;

    public function __construct($start_at, $end_at, $web)
    {
        // dd($web);
        $this->content = Content::with(['domain' => function ($query) use ($web) {
            $query->whereIn('domain_uuid', $web);
            $query->select('sub', 'domain');
        }])->select('id', 'title', 'posted_at', 'slug')
            ->where(function ($query) use ($start_at, $end_at) {
                $query->whereDate('posted_at', '>=', $start_at)->whereDate('posted_at', '<=', $end_at);
            })
            ->whereHas('domain', function ($query) use ($web) {
                $query->whereIn('domain_uuid', $web);
            })
            ->get();
        // dd($this->content);
        // $this->url_map = $this->content->domain()->whereIn('id', $web)->get();
    }

    public function array(): array
    {
        $no = 1;
        $combinedData = [];
        foreach ($this->content as $eachNews) {
            foreach ($eachNews->domain as $eachURL) {
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
