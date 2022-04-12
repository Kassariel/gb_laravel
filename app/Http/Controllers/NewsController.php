<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = app(News::class);
        //dd($news->getNews());
        return view('news.index', ['news' => $news->getNews()]);
    }
    
    public function show(int $id)
    {
        $news = app(News::class);
        
        return view('news.show', ['news' => $news->getOneNews($id)]);
    }
}

