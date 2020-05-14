<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
{{--
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
--}}<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/plugins/morris/morris.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{asset('js/plugins/morris/morris.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/client/style.css')}}">
    @stack('style')
    <style>
        .span-Basket
        {
            position:absolute !important;
            padding: 0px 4px;
            height: 20px;
            line-height: 121%;
            border-radius: 50% !important;
            left: 41px;
            top: -9px;
            display: none;
        }
        .one-span-Basket
        {

            left: 132px;
            top: -14px;
        }

        .fa.fa-shopping-cart
        {
            font-size: 28px;
        }
        .con-span-basket
        {
            position: relative;
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
            background: red;
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
        .sk-chase {
            width: 40px;
            height: 40px;
            position: relative;
            animation: sk-chase 2.5s infinite linear both;
        }

        .sk-chase-dot {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            animation: sk-chase-dot 2.0s infinite ease-in-out both;
        }

        .sk-chase-dot:before {
            content: '';
            display: block;
            width: 25%;
            height: 25%;
            background-color:#163172;
            border-radius: 100%;
            animation: sk-chase-dot-before 2.0s infinite ease-in-out both;
        }

        .sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
        .sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
        .sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
        .sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
        .sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
        .sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
        .sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
        .sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
        .sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
        .sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
        .sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
        .sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }

        @keyframes sk-chase {
            100% { transform: rotate(360deg); }
        }

        @keyframes sk-chase-dot {
            80%, 100% { transform: rotate(360deg); }
        }

        @keyframes sk-chase-dot-before {
            50% {
                transform: scale(0.4);
            } 100%, 0% {
                  transform: scale(1.0);
              }
        }
    </style>
    {{-- font awesome --}}
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
@livewireStyles
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand " href="home.html"><img src="{{asset('image/images/logo.svg')}}" width="50%"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto p-2">

            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">الصفحة الرئيسية </a>
            </li>


            @if( ! (Auth::user()->hasRole('admin')||Auth::user()->hasRole('super_admin')))
            <li class="nav-item">
                <a class="nav-link" href="{{route('places.index')}}">الاماكن</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Question.index')}}">الأسئلة الشائعة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">من نحن</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">اتصل بنا</a>
            </li>
                @else()
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.admin')}}">لوحة التحكم</a>
                </li>
            @endif




            <div class="btn-group">
                <span class="span-Basket one-span-Basket btn btn-danger"></span>

                <button type="button"  style="background: #163172;"  class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </button>
                <div class="dropdown-menu" style="width: 10px;">
                    <a type="button" class="dropdown-item con-span-basket"
                       data-target=".bd-example-modal-lg"
                       data-toggle="modal"
                       href="{{route('home')}}"><i class="fa fa-shopping-cart"></i>  السلة
                        <span class="span-Basket btn btn-danger"></span>
                    </a>
                    <a class="dropdown-item" href="{{route('Client.edit',auth()->id())}}" >تغير اعدادات الحساب </a>
                    <a class="dropdown-item" href="#">الرصيد الكلي : {{file_get_contents("http://localhost:777/bemoBank/public/api/getAccountInformation/".Auth::user()->bank_id)}}</a>
                    <a class="dropdown-item" href="/logout" > تسجيل خروج</a>
                </div>
            </div>
        </ul>
    </div>
</nav>
<div class="content">
    <div class="container">

             @if(session()->has('all_msg_results_pay'))
                @foreach(session()->get('all_msg_results_pay') as $s)
                    <div class="alert alert-warning text-center">
                         {{$s}}
                    </div>
                @endforeach()
             @else
                @if(session()->has('msg'))
                <div class="alert alert-warning text-center">
                    {{session()->get('msg')}}
                </div>
                @endif
             @endif

    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">السلة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-pay-all" method="post" class="d-inline" action="{{route('bill.payAll')}}">
                    @csrf()
                <table id="table-bill" class="table tab-content">
                    <thead>
                    <tr>
                        <th>رقم الخاص</th>
                        <th>رقم الدورة </th>
                        <th>القيمة</th>
                        <th>نوع</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">اغلاق</button>
                    <input type="submit" class="btn btn-outline-success btn-pay-all " value="ادفع">
                </div>
                </form>


            </div>
        </div>
    </div>
    @yield('content')
</div>
@stack('script')
<script>
$('.input-search').on('keydown',(event)=>{
    if(event.keyCode==32)
    {
        event.preventDefault();
    }
});
$('.btn-search').click((event)=>{
    window.livewire.emit('clearTextInInput');
})
</script>

@livewireScripts
</body>
</html>

