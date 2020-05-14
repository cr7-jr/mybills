<?php

namespace App\Http\Controllers\dashboard;

use App\categoryNews;
use App\Http\Controllers\Controller;
use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class newsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:update_news')->only('edit');
        $this->middleware('permission:create_news')->only('create');
        $this->middleware('permission:delete_news')->only('destroy');
    }
    public function create(categoryNews $categoriesNews)
    {
        return  view('dashboard.admin.news.create', compact('categoriesNews'));
    }
    public function store(Request $request, categoryNews $categoriesNews)
    {

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'image',
        ]);
        $request_data = $request->all();
        if ($request->file('image')) {
            $request_data['iamge'] = $request->image->store('newsImage', 'public');
        }
        $request_data['categoryNews_id'] = $categoriesNews->id;
        news::create($request_data);
        session()->flash('success', __('site.msg_add'));
        return redirect(route('dashboard.categoriesNews.index'));
    }
    public function show($id)
    {
        //
    }
    public function edit($categoryNews_id, $news_id)
    {
        $categoryNews = categoryNews::find($categoryNews_id);
        $news = news::find($news_id);
        return view('dashboard.admin.news.edit', compact('categoryNews', 'news'));
    }
    public function update(Request $request,  $categoryNews_id, $news_id)
    {
        $categoryNews = categoryNews::find($categoryNews_id);
        $news = news::find($news_id);
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'image',
        ]);
        $request_data = $request->all();
        if ($news->iamge != 'newsImage/default.png') {
            Storage::disk('public')->delete('/' . $news->iamge);
        }
        if ($request->file('image')) {
            $request_data['iamge'] = $request->image->store('newsImage', 'public');
        }
        $news->update($request_data);
        session()->flash('success', __('site.msg_add'));
        return redirect(route('dashboard.categoriesNews.index'));
    }
    public function destroy($categoryNews_id, $news_id)
    {
        $categoryNews = categoryNews::find($categoryNews_id);
        $news = news::find($news_id);
        if ($news->iamge != 'newsImage/default.png') {
            Storage::disk('public')->delete('/' . $news->iamge);
        }
        $news->delete();
        session()->flash('success', __('site.msg_add'));
        return redirect(route('dashboard.categoriesNews.show', $categoryNews->id));
    }
}
