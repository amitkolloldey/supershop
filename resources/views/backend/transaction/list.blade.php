@extends('backend.layouts.master')
@section('title')
    Transaction Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Transaction Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group top_search">
                        <div class="row">
                            <div class="col-md-7"></div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <a href="{{route('transaction.report')}}" class="btn btn-success">Import</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <a href="{{route('transaction.create')}}" class="btn btn-success">Make Transaction</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="title_right">--}}
                    {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                        {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 110px;">--}}
                            {{--<div class="input-group">--}}
                                {{--<a href="{{route('transaction.create')}}" class="btn btn-success">Make Transaction</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
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
                            <h2> Remaining To Deposite Deails</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Total Amount</th>
                                    <th>deposite Amount</th>
                                    <th>Remaining To Deposite</th>
                                    <th>Deposited By</th>
                                    <th>Deposited Date</th>
                                    <th>Bank Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach($transaction as $pc)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td> {{$pc->totalamount}}</td>
                                        <td> {{$pc->depositeamount}}</td>
                                        <td> {{$pc->remainingamount}}</td>
                                        <td> {{$pc->deposite_by}}</td>
                                        <td> {{$pc->deposite_date}}</td>
                                        <td> {{$pc->bank_name}}</td>
                                        <td> <a href="{{route('transaction.update',$pc->id)}}" class="btn btn-info" onclick="return confirm('Do You Deposite Remaining Amount also????')"> Confirm</a> </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Total</td>
                                    <td>
                                        <?php $total=0 ?>
                                        @if($transaction)
                                            @foreach($transaction as $s)
                                                @php
                                                    $price = $s->totalamount;
                                                    $total += $price;
                                                @endphp
                                            @endforeach
                                           BDT. {{$total}}
                                        @endif
                                    </td>
                                    <td>
                                        <?php $total=0 ?>
                                        @if($transaction)
                                            @foreach($transaction as $s)
                                                @php
                                                    $price = $s->depositeamount;
                                                    $total += $price;
                                                @endphp
                                            @endforeach
                                           BDT. {{$total}}
                                        @endif
                                    </td>
                                    <td>
                                        <?php $total=0 ?>
                                        @if($transaction)
                                            @foreach($transaction as $s)
                                                @php
                                                    $price = $s->remainingamount;
                                                    $total += $price;
                                                @endphp
                                            @endforeach
                                           BDT. {{$total}}
                                        @endif
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <h2>Deposited details</h2>
                        <hr>
                        <div class="x_content">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Total Amount</th>
                                    <th>deposite Amount</th>
                                    <th>Remaining To Deposite</th>
                                    <th>Deposited By</th>
                                    <th>Deposited Date</th>
                                    <th>Bank Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach($finaltransaction as $pc)
                                    <tr>
                                        <th> {{$i++}}</th>
                                        <td> {{$pc->totalamount}}</td>
                                        <td> {{$pc->depositeamount}}</td>
                                        <td> {{$pc->remainingamount}}</td>
                                        <td> {{$pc->deposite_by}}</td>
                                        <td> {{$pc->deposite_date}}</td>
                                        <td> {{$pc->bank_name}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Total</td>
                                    <td>
                                        <?php $total=0 ?>
                                        @if($finaltransaction)
                                            @foreach($finaltransaction as $s)
                                                @php
                                                    $price = $s->totalamount;
                                                    $total += $price;
                                                @endphp
                                            @endforeach
                                           BDT. {{$total}}
                                        @endif
                                    </td>
                                    <td>
                                        <?php $total=0 ?>
                                        @if($finaltransaction)
                                            @foreach($finaltransaction as $s)
                                                @php
                                                    $price = $s->depositeamount;
                                                    $total += $price;
                                                @endphp
                                            @endforeach
                                           BDT. {{$total}}
                                        @endif
                                    </td>
                                    <td>
                                        <?php $total=0 ?>
                                        @if($finaltransaction)
                                            @foreach($finaltransaction as $s)
                                                @php
                                                    $price = $s->remainingamount;
                                                    $total += $price;
                                                @endphp
                                            @endforeach
                                           BDT. {{$total}}
                                        @endif
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('backend/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categorytable').DataTable();
        });
    </script>
@endsection