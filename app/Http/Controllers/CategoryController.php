<?php

declare(strict_type=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->categoryList();
        return view ('news.cat', ['catList' => $categories]);
        

    }
    
    public function show(int $idi)
    {
        $news = $this->getNews(null, $idi);
        
        return view('news.index', [
            'newsList' => $news
        ]);
    }
}