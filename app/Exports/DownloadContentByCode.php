<?php

namespace App\Exports;

use App\Models\Content;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class DownloadContentByCode implements FromQuery, WithHeadings, WithMapping, ShouldQueue, WithChunkReading
{
    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function query()
    {
        return Content::query()->select('title', 'posted_at', 'slug')
            ->where('code', $this->code)
            ->with(['urlMapping'])
            ->orderBy('posted_at');
    }

    public function map($content): array
    {
        return [
            'No' => $content->id,
            'Date' => Carbon::parse($content->posted_at)->format('d F Y'),
            'Title' => $content->title,
            'URL' => $content->urlMapping->sub . '.' . $content->urlMapping->domain . '/show/' . $content->slug,
            'Media' => $content->urlMapping->domain,
        ];
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

    public function chunkSize(): int
    {
        return 1000; // Menyesuaikan ukuran chunk sesuai kebutuhan
    }
}
