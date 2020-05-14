
@extends('layouts.dashboard.app')

@section('content')

@if(session()->has('success'))

    <div class="alert alert-info">{{session()->get('success')}}</div>
    @endif
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-3 text-center">categories </h3>
                    <div class= "row">
                        <form class="row col-10" action="{{route('dashboard.place.index')}}">
                        <input class="form-control col-9" type="text" name="searsh"  placeholder="@lang('site.searsh')" value="{{ request()->searsh }}">
                        <button class=" btn-primary form-control col-2"><a>@lang('site.searsh')</a></button>
                        </form>
                        @if (auth()->user()->hasPermission('create_categoriesNews'))
                          <a class="btn btn-primary form-control col-2 "  href="{{route('dashboard.categoriesNews.create')}}">@lang('site.add') <i class="fa fa-plus"></i> </a>
                        @else()
                        <a class="btn btn-primary form-control col-2  disabled">@lang('site.add')</a>
                        @endif

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">tile</th>
                            <th scope="col">option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categoryNews as $cate)
                            <tr>
                                <td>{{$cate->id}}</td>
                                <td>{{$cate->title}}</td>
                                <td>
                                    @if(auth()->user()->hasPermission('show_categoriesNews'))
                                        <a href="{{route('dashboard.categoriesNews.show',$cate->id)}}" class="btn btn-primary"> show</a>
                                    @else()
                                        <a  class="btn btn-primary disabled"> show</a>
                                    @endif()
                                    @if(auth()->user()->hasPermission('create_news'))
                                     <a href="{{route('dashboard.categoriesNews.news.create',$cate->id)}}" class="btn btn-success"> add news</a>
                                     @else()
                                    <a class="btn btn-success disabled"> add news</a>
                                    @endif()
                                </td>
                            </tr>
                        @empty
                        <tr><td colspan="8" class="text-center">empty.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection


