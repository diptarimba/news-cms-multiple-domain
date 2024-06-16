<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\URLMapping;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $domain = $request->getHttpHost();
        $domain = explode('.', $domain);
        $subdomain = $domain[0];
        unset($domain[0]);
        $domain = implode(".", $domain);

        // $templateCode = URLMapping::first()->code;
        $templateCode = 'oceanblue';
        $news = Content::paginate(5);
        $recentlyArticle = Content::orderBy('created_at', 'desc')->get()->pluck('name');
        $category = Category::get()->pluck('name');
        return view('page.news.index', compact('news', 'subdomain', 'templateCode', 'recentlyArticle', 'category'));
    }

    public function show($slug)
    {
        // $templateCode = URLMapping::first()->code;
        $templateCode = 'oceanblue';
        $category = Category::get()->pluck('name');
        $news = Content::where('slug', $slug)->first();
        $news->posted_at = Carbon::parse($news->posted_at)->format("d F Y");
        return view('page.news.show', compact('news', 'category', 'templateCode'));
    }
}
