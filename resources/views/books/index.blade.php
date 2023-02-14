@extends('layouts.app')

@section('content')

<x-alert></x-alert>
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
                @if (auth()->user()->access == 1)
                <a href="{{route('book.create')}}" class="btn btn-sm btn-dark  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add</a>
                @endif
            </div>
        </div>
        
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title"></h3>
                <p class="text-muted">Total : <code>{{$books->count()}}</code></p>
                 <div class="col-lg-6">
                    <form method="GET" action="{{route('book.list')}}">
                        @csrf
                        <div class="input-group">
                            <input type="text"  placeholder="{{__('Search book here...')}}" name="search" required/>
                            <span class="input-group-btn">
                                <button class="btn btn-primary"  type="submit">Go!</button>
                            </span>
                            <span class="input-group-btn">
                            <a href="{{route('book.list')}}" class="btn btn-success btn  btn-secondary" >{{__('Clear All')}}</a>
                            </span>
                        </div>
                     </form>
                </div>
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#filterModel" style="color:white" class="btn btn-sm btn-primary"><i class="fa fa-filter"></i> {{__('Filters')}}</a>
                    </ol>
                 </div>
                 <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="dataTable">
                            <thead class="bg-light">
                                <tr>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Author')}}</th>
                                    <th>{{__('Genres')}}</th>
                                    <th>{{__('Published')}}</th>
                                    <th>{{__('Publisher')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>
                                    <a href="{{route('book.details',$book->id)}}">{{$book->title}}</a>

                                    </td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->genre}}</td>
                                    <td>{{$book->publisheddate}}</td>
                                    <td>{{$book->publisher}}</td>
                                    <td>
                                        <a href="javascript:void(0);"
                                            onclick="show('{{csrf_token()}}','{{route('book.show',$book->id)}}')"
                                            class="btn btn-sm btn-warning"><i class="fa fa-eye text-white"></i></a>
                                    @if (auth()->user()->access == 1)
                                        <a href="{{route('book.edit',$book->id)}}" class="btn btn-sm btn-info"><i
                                                class="fa fa-edit text-white"></i></a>
                                    
                                        <a href="javascript:void(0);" onclick="trash('{{$book->id}}')"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash text-white"></i></a>
                                        <form method="POST" id="delete_form_{{$book->id}}"
                                            action="{{route('book.destroy',$book->id)}}" accept-charset="UTF-8">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                   </div>
                    <div class="card-footer text-right p-2">
                    {{ $books->links('vendor.pagination.custom') }}

                    </div>
             </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="filterModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="get">
                <div class="modal-header py-1 bg-dark text-white">
                    <h5 class="modal-title">{{__('Apply Filters')}}</h5>
                </div>
                <div class="modal-body">
                <div class="form-group row">
                        <label for="title" class="col-4 control-label">{{__('Title')}}</label>
                        <div class="col-8">
                            <input class="form-control title-input" name="title" type="text" minlength="1" maxlength="255" placeholder="{{__('Enter Title here...')}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-1">
                    <button type="submit" class="btn btn-sm btn-primary">{{__('Apply')}}</button>
                    <a href="{{route('book.list')}}" class="btn btn-sm btn-secondary" >{{__('Clear All')}}</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

