@extends('backend.layouts.master')
@section('title')
    Module create Page
@endsection

<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Module Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <a href="{{route('module.list')}}" class="btn btn-success">View Module</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Module</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{route('module.store')}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Module Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                    <span class="error"><b>
                                         @if($errors->has('name'))
                                                {{$errors->first('name')}}
                                            @endif</b>
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="module_key">Module Key</label>
                                    <input type="text" class="form-control" id="module_key" name="module_key" placeholder="Enter module_key">
                                    <span class="error"><b>
                                         @if($errors->has('module_key'))
                                                {{$errors->first('module_key')}}
                                            @endif</b>
                                         </span>
                                </div>
                                <div class="form-group">
                                    <label for="module_url">Module Url</label>
                                    <input type="text" class="form-control" id="module_url" name="module_url" placeholder="Enter module_url">
                                    <span class="error"><b>
                                         @if($errors->has('module_url'))
                                                {{$errors->first('module_url')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="module_rank">Module Rank</label>
                                    <input type="text" class="form-control" id="module_rank" name="module_rank" placeholder="Enter module_rank">
                                    <span class="error"><b>
                                         @if($errors->has('module_rank'))
                                                {{$errors->first('module_rank')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="module_icon">Module Icon</label>
                                    <input type="text" class="form-control" id="module_icon" name="module_icon" placeholder="Enter module_icon (eg:- fa fa-dashboard)">
                                </div>
                                <div class="form-group">
                                    <label>Disply in Sidebar</label>
                                    <input type="radio" name="view_sidebar" value="1" id="view_sidebar" checked="">
                                    <label for="view_sidebar"> Yes </label>
                                    <input type="radio" name="view_sidebar" id="deactive" value="0">
                                    <label for="deactive">No</label>
                                </div>
                                <div class="form-group">
                                    <label>Display For &nbsp;</label>
                                    @foreach($role as $r)
                                        <input type="checkbox" id="{{$r->name}}" name="roles[]" value="{{$r->id}}"><label for="{{$r->name}}">{{$r->name}}</label>
                                    @endforeach
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary">Save Module</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('script')

@endsection