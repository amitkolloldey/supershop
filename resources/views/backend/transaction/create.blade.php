@extends('backend.layouts.master')
@section('title')
    Bank Transaction  Page
@endsection
@section('css')
    <link  href="{{asset('backend/plugins/datepicker/datepicker.css')}}" rel="stylesheet">
@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Transaction/Bank Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <a href="{{route('transaction.list')}}" class="btn btn-success">View Transaction</a>
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
                            <h2> Make Transaction</h2>
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
                            <form action="{{route('transaction.store')}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="totalamount">Total Amount(To Be Deposited)*</label>
                                    <input type="number" class="form-control" id="totalamount" name="totalamount" placeholder="Enter Total Amount To Be Deposite">
                                     @if($errors->has('totalamount'))
                                        <span class="error"><b>
                                            {{$errors->first('totalamount')}}
                                        </b></span>
                                     @endif
                                </div>
                                <div class="form-group">
                                    <label for="depositeamount">Deposited Amount*</label>
                                    <input type="number" class="form-control" id="depositeamount" name="depositeamount" placeholder="Enter Deposited Amount">
                                    @if($errors->has('depositeamount'))
                                        <span class="error"><b>
                                                {{$errors->first('depositeamount')}}
                                            </b></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                <label for="deposite_by">Deposite By*</label>
                                    <input type="text" class="form-control" name="deposite_by" id="deposite_by" placeholder="Enter Depositor  Full Name">
                                    @if($errors->has('deposite_by'))
                                        <span class="error"><b>
                                            {{$errors->first('deposite_by')}}
                                        </b></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="deposite_date">Deposite Date*</label>
                                    <input type="text" class="form-control" data-toggle="start" name="deposite_date" id="deposite_date" placeholder="Pick Deposite Date">
                                    @if($errors->has('deposite_date'))
                                        <span class="error"><b>
                                            {{$errors->first('deposite_date')}}
                                        </b></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="bank_name">Bank Name*</label>
                                    <input type="text" class="form-control"  name="bank_name" id="bank_name" placeholder="Enter Bank Name where you Deposite">
                                    @if($errors->has('bank_name'))
                                        <span class="error"><b>
                                            {{$errors->first('deposite_date')}}
                                        </b></span>
                                    @endif
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnSave" class="btn btn-primary" >Make Deposite</button>
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
    <script src="{{asset('backend/plugins/datepicker/datepicker.js')}}"></script>
    <script type="text/javascript">
        $('[data-toggle="start"]').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('[data-toggle="end"]').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection