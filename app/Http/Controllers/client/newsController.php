<?php

namespace App\Http\Controllers\client;

use App\categoryNews;
use App\Http\Controllers\Controller;
use App\news;
use Illuminate\Http\Request;

class newsController extends Controller
{

    public function index(categoryNews $category)
    {
        $news=$category->News()->paginate(12);
        abort_if(\request()->page > $news->lastPage(), 204);
        $categoryName=$category->title;
        return view('news.show',compact('news','categoryName'));
    }
    public function show($categoryNews_id, $news_id)
    {
        $categoryNews=categoryNews::find($categoryNews_id);
        $news=news::find($news_id);
        return view('news.oneNewsShow',compact('categoryNews','news'));
    }


}
