@extends('layouts.client.app')
@section('content')
    <div class="m-2">
        <div class="h1-title">{{$categoryName}}</div>
        <div class="a row" style="margin-left: 0px; margin-right: 0px;">
        @foreach($news as $news)
                <div class=" news  card  col-3 mt-2" style="border: 1px solid #163172;border-width: 0px 1px">
                    <a href="#">
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
                            @livewire('like-and-dislike-news',['news'=>$news])
                        </div>
                    </div>
               </a>
                </div>

        @endforeach()

        </div>
    </div>
    <div class="page-load-status">
        <div class="infinite-scroll-request">
            <div class="d-flex justify-content-center">
                <div class=" my-8 text-4xl">
                    <div class="sk-chase">
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                        <div class="sk-chase-dot"></div>
                    </div>
                </div>
            </div>
        </div>
        <p class="infinite-scroll-last">End of content</p>
        <p class="infinite-scroll-error">No more pages to load</p>
    </div>
@endsection()
@push('script')
    <script>
        var elem = document.querySelector('.a');
        var infScroll = new InfiniteScroll( elem, {
            // options
            path: 'news?page=@{{#}}',
            append: '.news',
            //history: false,
            status: '.page-load-status'

        });
    </script>
    @endpush()
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
        .sk-circle {
            width: 40px;
            height: 40px;
            position: absolute;
            top: 5px;
            right: 5px;
        }
        .sk-circle .sk-child {
            width: 100%;
            height: 50%;
            position: absolute;
            left: 0;
            top: 0;

        }
        .sk-circle .sk-child:before {
            background: white;
            content: '';
            display: block;
            margin: 0 auto;
            width: 15%;
            height: 15%;
            border-radius: 100%;
            -webkit-animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
            animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
        }
        .sk-circle .sk-circle2 {
            -webkit-transform: rotate(30deg);
            -ms-transform: rotate(30deg);
            transform: rotate(30deg); }
        .sk-circle .sk-circle3 {
            -webkit-transform: rotate(60deg);
            -ms-transform: rotate(60deg);
            transform: rotate(60deg); }
        .sk-circle .sk-circle4 {
            -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg); }
        .sk-circle .sk-circle5 {
            -webkit-transform: rotate(120deg);
            -ms-transform: rotate(120deg);
            transform: rotate(120deg); }
        .sk-circle .sk-circle6 {
            -webkit-transform: rotate(150deg);
            -ms-transform: rotate(150deg);
            transform: rotate(150deg); }
        .sk-circle .sk-circle7 {
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg); }
        .sk-circle .sk-circle8 {
            -webkit-transform: rotate(210deg);
            -ms-transform: rotate(210deg);
            transform: rotate(210deg); }
        .sk-circle .sk-circle9 {
            -webkit-transform: rotate(240deg);
            -ms-transform: rotate(240deg);
            transform: rotate(240deg); }
        .sk-circle .sk-circle10 {
            -webkit-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            transform: rotate(270deg); }
        .sk-circle .sk-circle11 {
            -webkit-transform: rotate(300deg);
            -ms-transform: rotate(300deg);
            transform: rotate(300deg); }
        .sk-circle .sk-circle12 {
            -webkit-transform: rotate(330deg);
            -ms-transform: rotate(330deg);
            transform: rotate(330deg); }
        .sk-circle .sk-circle2:before {
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s; }
        .sk-circle .sk-circle3:before {
            -webkit-animation-delay: -1s;
            animation-delay: -1s; }
        .sk-circle .sk-circle4:before {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s; }
        .sk-circle .sk-circle5:before {
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s; }
        .sk-circle .sk-circle6:before {
            -webkit-animation-delay: -0.7s;
            animation-delay: -0.7s; }
        .sk-circle .sk-circle7:before {
            -webkit-animation-delay: -0.6s;
            animation-delay: -0.6s; }
        .sk-circle .sk-circle8:before {
            -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s; }
        .sk-circle .sk-circle9:before {
            -webkit-animation-delay: -0.4s;
            animation-delay: -0.4s; }
        .sk-circle .sk-circle10:before {
            -webkit-animation-delay: -0.3s;
            animation-delay: -0.3s; }
        .sk-circle .sk-circle11:before {
            -webkit-animation-delay: -0.2s;
            animation-delay: -0.2s; }
        .sk-circle .sk-circle12:before {
            -webkit-animation-delay: -0.1s;
            animation-delay: -0.1s; }

        @-webkit-keyframes sk-circleBounceDelay {
            0%, 80%, 100% {
                -webkit-transform: scale(0);
                transform: scale(0);
            } 40% {
                  -webkit-transform: scale(1);
                  transform: scale(1);
              }
        }

        @keyframes sk-circleBounceDelay {
            0%, 80%, 100% {
                -webkit-transform: scale(0);
                transform: scale(0);
            } 40% {
                  -webkit-transform: scale(1);
                  transform: scale(1);
              }
        }
    </style>
@endpush()
