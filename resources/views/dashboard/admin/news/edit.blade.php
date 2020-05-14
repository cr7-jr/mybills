
@extends('layouts.dashboard.app')

@section('content')

    @if(session()->has('success'))

        <div class="alert alert-info">{{session()->get('success')}}</div>
    @endif
    <form action="{{route('dashboard.categoriesNews.news.update',[$categoryNews->id,$news->id])}}" method="post" enctype="multipart/form-data">
        @csrf()
        @method("PUT")
        <div>
            <input class="form-control input mb-1 @error('title') is-invalid @enderror" value="{{ $news->title}}"  type="text" name="title"  placeholder="title" >
        </div>
        <div>
            <input class="form-control input mb-1 @error('content') is-invalid @enderror" value="{{ $news->content }}"  type="text" name="content"  placeholder="content" >
        </div>
        <div>
            <input class="form-control-sm input mb-1 @error('image') is-invalid @enderror"   type="file" name="image" >
        </div>
        <img src="{{asset('storage/'. $news->iamge)}}" width="200">
        @error('content')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror()
        <button class="form-control mt-2">@lang('site.edit')</button>
    </form>
@endsection


