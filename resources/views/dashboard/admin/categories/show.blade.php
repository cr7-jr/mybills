@extends('layouts.dashboard.app')
@section('content')
    <div class="m-2">
        {{$news->links()}}
        <div class="h1-title">{{$category->title}}</div>
        <div class="a row" style="margin-left: 0px; margin-right: 0px;">

            @foreach($news as $news)
                <div class=" news  card  col-3 mt-2">
                        <div class=" no-gutters">
                            <div class="card-header">
                                <img src="{{asset('storage/'. $news->iamge)}}" class="card-img" alt="..." style="height:160px;width: 100%">
                            </div>
                            <div class="card-body" style="padding: 20px 0px;height: 125px;">
                                <h5 class="card-title">{{$news->title}}</h5>
                                <p class="card-text">{{substr($news->content,0,50)}}{{strlen($news->content)>50?' ....':''}}</p>
                            </div>
                            <div class="d-flex">
                                <p class="card-text mb-1"><small class="text-muted">created at {{\Carbon\Carbon::parse($news->created_at)->diffForHumans()}}</small></p>
                                <span class="ml-auto"><i class="fa fa-thumbs-o-up" style="color: blue"></i> {{$news->like}}</span>
                            </div>
                            <div class="d-flex">
  {{--  <a href="{{route('dashboard.categoriesNews.news.show',[$category->id,$news->id])}}">عرض </a>--}}
                            @if(auth()->user()->hasPermission('update_news'))
                                <a class="btn btn-outline-success" href="{{route('dashboard.categoriesNews.news.edit',[$category->id,$news->id])}}">تعديل </a>
                            @else()
                            <a class="btn btn-outline-success disabled">تعديل </a>
                            @endif()
                            @if(auth()->user()->hasPermission('delete_news'))
                            <form method="post" action="{{route('dashboard.categoriesNews.news.destroy',[$category->id,$news->id])}}">
                                    @method('DELETE')
                                    @csrf()
                                    <input class="btn btn-outline-danger" type="submit"  value="حذف">
                                </form>
                            @else()
                            <a class="btn btn-outline-danger disabled">حذف </a>
                            @endif()

                            </div>
                        </div>
                </div>
            @endforeach()

        </div>
    </div>
@endsection()

@push('style')
    <style>
        .h1-title
        {
            background: linear-gradient(45deg, #9c95fd, transparent);
            margin: 10px 0px;
            color: white;
            text-transform: capitalize;
            letter-spacing: 1.2px;
            font-size: 26px;
            padding: 10px 0px;
            font-weight: 700;
            text-align: center;
        }
</style>
    @endpush()
