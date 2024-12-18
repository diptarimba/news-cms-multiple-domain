<?php

namespace App\Http\Controllers;

use App\Exports\DownloadContent;
use App\Exports\DownloadContentByCode;
use App\Models\Category;
use App\Models\Content;
use App\Models\URLMapping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $domain = $request->getHttpHost();
        $domain = explode('.', $domain);
        $subdomain = $domain[0];
        unset($domain[0]);
        $domain = implode(".", $domain);

        if ($subdomain == 'localhost:8000') {
            $subdomain = 'nasional';
            $domain = 'listriknusantara.com';
        }

        $template = URLMapping::with('contents.category', 'contents.author')->where('sub', $subdomain)->where('domain', $domain)->first();
        if (is_null($template)) {
            abort(404);
        }
        $template = is_null($template) ? URLMapping::first() : $template;

        $templateCode = $template ? $template->code : 'greymilk';
        $news = $template->contents()->paginate(5);
        $recentlyArticle = Content::orderBy('created_at', 'desc')->get()->pluck('name');
        $category = Category::get()->pluck('name');
        return view('page.news.index', compact('news', 'subdomain', 'templateCode', 'recentlyArticle', 'category', 'template'));
    }

    public function show(Request $request, $slug)
    {
        $domain = $request->getHttpHost();
        $domain = explode('.', $domain);
        $subdomain = $domain[0];
        unset($domain[0]);
        $domain = implode(".", $domain);
        $news = Content::with(['author', 'domain' => function($query) use ($slug, $subdomain, $domain){
            return $query->where('slug', $slug)->where('sub', $subdomain)->where('domain', $domain)->first();
        }])->whereHas('domain', function($query) use ($slug, $subdomain, $domain){
            return $query->where('slug', $slug)->where('sub', $subdomain)->where('domain', $domain);
        })->first();
        if (is_null($news)) {
            abort(404);
        }
        $templateCode = $news ? $news->domain->first()->code : 'greymilk';
        $category = Category::get()->pluck('name');
        $news->posted_at = Carbon::parse($news->domain()->first()->pivot->posted_at)->format("d F Y");
        return view('page.news.show', compact('news', 'category', 'templateCode', 'template'));
    }

    public function custom_download()
    {
        $website = URLMapping::get();
        $website = $website->mapWithKeys(function ($query) {
            return [$query->id => $query->sub . '.' . $query->domain];
        });
        return view('page.download.form', compact('website'));
    }
    public function download(Request $request)
    {
        $request->validate([
            'start_at' => 'required',
            'end_at' => 'required',
            'website_id' => 'required|array',
            'website_id.*' => 'required|exists:u_r_l_mappings,id',
        ]);

        return Excel::download(new DownloadContent($request->start_at, $request->end_at, $request->website_id), 'news.xlsx');
    }

    public function downloadByCodeIndex()
    {
        return view('page.download.code');
    }

    public function downloadByCode(Request $request)
    {
        set_time_limit(300); // Menyesuaikan waktu eksekusi
        ini_set('memory_limit', '512M'); // Menyesuaikan batas memori

        $request->validate([
            'code' => 'required'
        ]);

        $content = Content::where('code', $request->code)->first();
        if (is_null($content)) {
            return redirect()->back()->with('error', 'Code not found');
        }

        return Excel::download(new DownloadContentByCode($request->code),  'news_' . $request->code . '.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
