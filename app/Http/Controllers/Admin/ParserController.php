<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser, Category $category)
    {
        
        $data = $parser->setUrl('https://news.yandex.ru/auto.rss')->getNews();
        $title = trim(stristr($data['title'], ' '));
        $dat = $category->where('title', '=', $title)->value('id');
        $catid = $data['news'];
        $cd = ['category_id' => $dat];
        
        $ct = ['title' => $title,
               'description' => $data['description']
              ];

        if($category->where('title', $title)->exists()) {
            for($i=0; $i<count($data['news']); $i++) {
            $catid[$i]['category_id'] = $dat;
        }
            \DB::table('news')->insert($catid);
        }else {
            \DB::table('categories')->insert($ct);
             $dat = $category->where('title', '=', $title)->value('id');
            for($i=0; $i<count($data['news']); $i++) {
            $catid[$i]['category_id'] = $dat;
        }
            \DB::table('news')->insert($catid);
        }
       
    }
}
