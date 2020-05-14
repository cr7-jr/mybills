<?php

namespace App\Http\Controllers\client;

use App\categoryNews;
use App\Http\Controllers\Controller;
use App\Http\Resources\categoryNewsResource;
use Illuminate\Http\Request;

class categoryNewsController extends Controller
{
    public function index()
    {
        return view('news.index')->with('categories',categoryNews::all());
    }
    public function show($id)
    {
        return  view('news.show')->with('category',categoryNews::where('title',$id)->first());
    }

}
