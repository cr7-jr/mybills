@extends('layouts.client.app')
@section('content')
    @foreach($categories as $cate)
    <div style="padding: 0px 20px">
        <h1 class="h1-title">{{$cate->title}}</h1>
        <div class=" row" >
            @foreach($cate->News as $news)

                <div class="card mb-3 col-3" >

                    <div class=" no-gutters ">
                    <a href="{{route('category.news.show',[$news->Category->id,$news->id])}}">
                        <div class="card-header">
                            <img src="{{asset('storage/'. $news->iamge)}}" class="card-img" alt="..." style="height:160px;width: 100%">
                        </div>
                        <div class="card-body" style="padding: 20px 0px;height: 125px;">
                            <h5 class="card-title">{{$news->title}}</h5>
                            <p class="card-text">{{substr($news->content,0,50)}}{{strlen($news->content)>50?' ....':''}}</p>
                        </div>
                    </a>
                        <div class="d-flex">
                            <p class="card-text mb-1"><small class="text-muted">created at {{\Carbon\Carbon::parse($news->created_at)->diffForHumans()}}</small></p>
                            @livewire('like-and-dislike-news',['news'=>$news])
                        </div>
                    </div>

                </div>
            @endforeach()
        </div>
        <a href="{{route('category.news.index',$cate->id)}}" class="btn btn-primary mb-4">read more</a>
    </div>
    @endforeach
@endsection()
@push('style')
    <style>
        .h1-title
        {
            border-bottom: 5px solid;
            background: linear-gradient(45deg, #e0e0e0, transparent);
            text-transform: capitalize;
            letter-spacing: 1.2px;
            padding: 10px 0px 10px 13px;
        }
    </style>
    @endpush()
{{--
<style>
    img{
        width: 100%;

    }
    .con-text
    {
        position: relative;
        margin-top: 10px;
    }
    .h3-title
    {
        color: #163172;
        font-weight: 700;
        letter-spacing: 1.1px;
    }
    .span-date
    {
        position: absolute;
        top: 4px;
        color: #163172;
        right: 10px;
    }
    .p-content
    {
        color: black;

    }
    .con-main
    {
        background: linear-gradient(45deg, #e0e0e0, transparent);
        padding-top: 10px;
        border: 2px solid #fff;
    }
    .h1-title
    {
        border-bottom: 5px solid;
        background: linear-gradient(45deg, #e0e0e0, transparent);
        text-transform: capitalize;
        letter-spacing: 1.2px;
        padding: 10px 0px 10px 13px;
    }
</style>
--}}
