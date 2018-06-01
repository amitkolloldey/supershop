@extends('backend.layouts.master')
@section('title')
    Purchase  Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Purchase Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <a href="{{route('purchase.list')}}" class="btn btn-success">View purchase</a>
                                </div>
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
                            <h2>Purchase Create</h2>
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
                            <form action="{{route('purchase.store')}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="goods_name">Goods Name</label>
                                    <input type="text" class="form-control" id="goods_name" name="goods_name" placeholder="Enter Goods Name what you Purchase">
                                     @if($errors->has('goods_name'))
                                        <span class="error"><b>
                                            {{$errors->first('goods_name')}}
                                        </b></span>
                                     @endif
                                </div>
                                <div class="form-group">
                                    <label for="party_name">Party Name</label>
                                    <input type="text" class="form-control" id="party_name" name="party_name" placeholder="Enter party_name">
                                    @if($errors->has('party_name'))
                                        <span class="error"><b>
                                                {{$errors->first('party_name')}}
                                            </b></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                <label for="totalamount">Total Amount*</label>
                                    <input type="number" class="form-control" name="totalamount" id="totalamount" placeholder="Enter totalamount">
                                    @if($errors->has('totalamount'))
                                        <span class="error"><b>
                                            {{$errors->first('totalamount')}}
                                        </b></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="paidamount">Paid Amount*</label>
                                    <input type="number" class="form-control" name="paidamount" id="paidamount" placeholder="Enter paidamount">
                                    @if($errors->has('paidamount'))
                                        <span class="error"><b>
                                            {{$errors->first('paidamount')}}
                                        </b></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Purchase Status</label><br>
                                    <input type="radio" name="status" id="normal" value="normal" checked><label for="normal"> Normal Bill </label><br>
                                    <input type="radio" name="status" value="vat" id="vat" ><label for="vat"> Vat Bill </label><br>
                                    <input type="radio" name="status" id="pan" value="pan"><label for="pan"> Pan Bill </label>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnSave" class="btn btn-primary" >Save Purchase </button>
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