@extends('backend.layouts.master')
@section('title')
    Permission asign Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Permission Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 90px;">
                            <div class="input-group">
                                <a href="{{route('role.list')}}" class="btn btn-success">View Role</a>
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
                            <h2>Asign Permission For <b>{{$roledetails->name}}</b></h2>
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
                            <form action="{{route('permission.permissionasign',$roledetails->id)}}" method="post">
                                {{ csrf_field()}}
                                    @foreach($permission as $p)
                                    @foreach($currentpermission as $cp)
                                        @if($cp->permission_key == $p->permission_key)
                                            @php($check = 'Checked')
                                            @php
                                                break;
                                            @endphp
                                        @else
                                            @php($check = '')
                                        @endif
                                    @endforeach
                                          <input type="checkbox" id="{{$p->name}}" name="asignpermission[]" value="{{$p->id}}" @if(isset($check)){{$check}} @else @endif><label for="{{$p->name}}">{{$p->name}} </label>&nbsp;&nbsp;&nbsp;
                                    @endforeach
                                <br><br>
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary">asign Permission</button>
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