
@extends('layouts.dashboard.app')

@section('content')

    @if(session()->has('success'))

        <div class="alert alert-info">{{session()->get('success')}}</div>
    @endif
    <form action="{{route('dashboard.categoriesNews.news.store',$categoriesNews->id)}}" method="post" enctype="multipart/form-data">
        @csrf()
        <div>
            <input class="form-control input mb-1 @error('title') is-invalid @enderror" value="{{ old('title') }}"  type="text" name="title"  placeholder="title" >
        </div>
        <div>
            <input class="form-control input mb-1 @error('content') is-invalid @enderror" value="{{ old('content') }}"  type="text" name="content"  placeholder="content" >
        </div>
        <div>
            <input class="form-control-sm input mb-1 @error('image') is-invalid @enderror" value="{{ old('image') }}"  type="file" name="image" >
        </div>
        @error('content')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror()
        <button class="form-control mt-2">@lang('site.add')</button>
    </form>
@endsection


