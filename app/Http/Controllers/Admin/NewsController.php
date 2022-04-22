<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\News;
use App\Models\Category;
use App\Http\Requests\News\EditRequest;
use App\Http\Requests\News\CreateRequest;
use Illuminate\Validation\ValidationException;

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
    public function store(CreateRequest $request)
    {
        //$request->validate(['title' => ['required', 'string']]);
       // dd($_REQUEST);
        
        $news = News::create($request->validated());
        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        
        return back()->with('error', __('messages.admin.news.create.fail'));
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
    public function update(EditRequest $request, News $news)
    {
        //$request->validate(['title' => ['required', 'string', 'min:3', 'max:30'],'author' => ['required', 'string']]);
        
        //$status = $news->fill($request->only(['category_id', 'title', 'status', 'author', 'image', 'description']))->save();
        $status = $news->fill($request->validated())->save();
        
        if($status) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        
       // config(['lang' => 'en']);
        
        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
        try{
            $news->delete();
            
            return response()->json(['status' => 'ok']);
        }catch (\Exeption $e) {
            \Log::error("News wasn't delete");
            return response()->json(['status' => 'error'], 400);
        }
    }
}
