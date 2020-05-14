
@extends('layouts.dashboard.app')

@section('content')

@if(session()->has('success'))

    <div class="alert alert-info">{{session()->get('success')}}</div>
@endif
    <form action="{{route('dashboard.categoriesNews.store')}}" method="post" >
        @csrf()
            <div>
            <input class="form-control input mb-1 @error('title') is-invalid @enderror" value="{{ old('title') }}"  type="text" name="title"  placeholder="name" >
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror()
        <button class="form-control mt-2">@lang('site.add')</button>
    </form>
    @endsection


