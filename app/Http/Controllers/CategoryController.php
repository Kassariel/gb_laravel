<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function index()
    {

        $category = app(Category::class);
        
        return view('news.cat', ['categories' => $category->getCategories()]);
        

    }
    
    public function show(int $idi)
    {
        $news = app(News::class);
        
        return view('news.index', ['news' => $news->getNewsByCategory($idi)]);
    }
}