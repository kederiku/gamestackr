<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news_list = News::orderBy('published_at', 'desc')->with('source')->paginate(24);
        return view('pages.news.index', compact('news_list'));
    }
}
