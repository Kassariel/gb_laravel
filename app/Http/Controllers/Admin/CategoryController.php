<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $category = app(Category::class);
        //dd($category->getCategoryById(9));
        //dd(\DB::table('categories')->avg('id'));
        //dd(Category::find(5));   
                
        return view('admin.categories.index', ['categories' => Category::query()->active()->withCount('news')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //return response()->json($request->only('title', 'description'), 201 );
        $data = $request->only(['title', 'description']);
        $category = Category::create($data);
        if($category) {
            return redirect()->route('admin.categories.index')
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
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //$category = Category::findOrFail($id);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        //$category->title = $request->input('title');
        //$category->description = $request->input('description');
        
        $status = $category->fill($request->only(['title', 'description']))->save();
        
        if($status) {
            return redirect()->route('admin.categories.index')
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
