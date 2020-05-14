<?php

namespace App\Http\Controllers\dashboard;

use App\categoryNews;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoriesNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_categoriesNews')->only('index');
        $this->middleware('permission:create_categoriesNews')->only('create');
        $this->middleware('permission:show_categoriesNews')->only('show');
    }
    public function index()
    {
        $categoryNews = categoryNews::all();
        return view('dashboard.admin.categories.index', compact('categoryNews'));
    }


    public function create()
    {
        return view('dashboard.admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);
        categoryNews::create($request->all());
        session()->flash('success', __('site.msg_add'));
        return redirect(route('dashboard.categoriesNews.index'));
    }


    public function show($id)
    {
        $category = categoryNews::find($id);
        $news = $category->News()->paginate(12);
        return view('dashboard.admin.categories.show', compact('news', 'category'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
    }
}
