@extends('layouts.client.app')
@section('content')
    <div class="container  m-auto mt-5 position-relative">
       <div class="row " style="padding: 25px 0px;background: linear-gradient(45deg, #b9c4e0, transparent);">
            <div class="col-5">
               <img src="{{asset('storage/'. $news->iamge)}}" class="card-img img-thumbnail" alt="..."style="height: 360px" >
            </div>
            <div class="col-7">
                <div class=" no-gutters ">
                    <div  style="padding: 20px 0px;height: 125px;">
                        <h5 class="card-title">{{$news->title}}</h5>
                        <p class="card-text">{{$news->content}}</p>
                    </div>
                    <div class="d-flex position-absolute w-100" style="bottom: 0px;left: 0px;padding: 0px 50px">
                        <p class="card-text mb-1"><small class="text-muted">created at {{\Carbon\Carbon::parse($news->created_at)->diffForHumans()}}</small></p>
                        @livewire('like-and-dislike-news',['news'=>$news])
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection()

