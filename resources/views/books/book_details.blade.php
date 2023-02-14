@extends('layouts.app')

@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Books</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="{{route('home')}}" class="fw-normal">Dashboard</a></li>
                </ol>
                <a href="{{route('book.list')}}" class="btn btn-sm btn-dark  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">List</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <x-alert></x-alert>
            <div class="card shadow mb-4">
                    <div class="card-body">
                    <div class="table-responsive" >
                        <table class="table col-sm-12">
                            <tr>
                                <td class="table-info">{{__('Title')}}</td>
                                <td >{{$book->title}}</td>
                            </tr>
                            <tr>
                                <td class="table-info">{{__('Author')}}</td>
                                <td >{{$book->author}}</td>
                            </tr>
                            <tr>
                                <td class="table-info">{{__('Genres')}}</td>
                                <td >{{$book->genre}}</td>
                            </tr>
                            <tr>
                                <td class="table-info">{{__('Published')}}</td>
                                <td >{{$book->publisheddate}}</td>
                            </tr>
                            <tr>
                                <td class="table-info">{{__('Publisher')}}</td>
                                <td >{{$book->publisher}}</td>
                            </tr>
                            <tr>
                                <td class="table-info">{{__('Description')}}</td>
                                <td >{{$book->description}}</td>
                            </tr>
                           
                            <tr>
                                <td class="table-info">{{__('Created')}}</td>
                                <td >{{$book->created}}</td>
                            </tr>
                            <tr>
                                <td class="table-info">{{__('Modified')}}</td>
                                <td >{{$book->modified}}</td>
                            </tr>
                         </table>
                        </div>
                    </div>
             </div>
        </div>
    </div>
</div>
@endsection