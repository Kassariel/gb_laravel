<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$news = app(News::class);
       // dd($news->getNews());
        return view('admin.news.index', ['newsList' => News::with('category')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.news.create", [
            'categories' => Category::select("id", "title")->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);
       // dd($_REQUEST);
        
        $news = News::create($request->only(['category_id', 'title', 'status', 'author', 'image', 'description']));
        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }
        
        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::select("id", "title")->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $status = $news->fill($request->only(['category_id', 'title', 'status', 'author', 'image', 'description']))->save();
        if($status) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }
        
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
