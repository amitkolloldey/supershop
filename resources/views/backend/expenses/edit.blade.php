@extends('backend.layouts.master')
@section('title')
     Edit Expenses Tracking Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Expenses Management</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style=" padding-left: 120px;">
                            <div class="input-group">
                                <a href="{{route('expenses.list')}}" class="btn btn-success"> View expenses</a>
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
                            <h2> Edit Expenses Tracking</h2>
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
                            <form action="{{route('expenses.update',$expenses->id)}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="expenses_name">Expenses Name</label>
                                    <input type="text" value="{{$expenses->expenses_name}}" class="form-control" name="expenses_name" id="expenses_name" placeholder="Enter Expenses Name eg;- rent paid electricity">
                                    <span class="error"><b>
                                         @if($errors->has('expenses_name'))
                                              {{$errors->first('expenses_name')}}
                                         @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="party_name">Party Name</label>
                                    <input type="text" class="form-control" value="{{$expenses->party_name}}" id="party_name" name="party_name" placeholder="Enter party_name">
                                    <span class="error"><b>
                                         @if($errors->has('party_name'))
                                              {{$errors->first('party_name')}}
                                         @endif</b></span>
                                </div>
                                <div class="form-group">
                                <label for="totalamount">Total Amount*</label>
                                    <input type="number" class="form-control" value="{{$expenses->totalamount}}" name="totalamount" id="totalamount" placeholder="Enter totalamount">
                                    <span class="error"><b>
                                         @if($errors->has('totalamount'))
                                                {{$errors->first('totalamount')}}
                                         @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="paidamount">Paid Amount*</label>
                                    <input type="number" class="form-control" value="{{$expenses->paidamount}}" name="paidamount" id="paidamount" placeholder="Enter paidamount">
                                    <span class="error"><b>
                                         @if($errors->has('paidamount'))
                                                {{$errors->first('paidamount')}}
                                         @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Product Name*</label>
                                    <input type="text" class="form-control" name="product_name" value="{{$expenses->product_name}}" id="product_name" placeholder="Enter product_name">
                                    <span class="error"><b>
                                         @if($errors->has('product_name'))
                                                {{$errors->first('product_name')}}
                                         @endif</b></span>
                                </div>
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-2">--}}
                                        {{--<div class="input-group">--}}
                                   {{--<span class="input-group-btn">--}}
                                     {{--<button type="button" class="btn btn-danger btn-number" data-type="minus"--}}
                                             {{--data-field="quant[2]">--}}
                                        {{--<span class="glyphicon glyphicon-minus"></span>--}}
                                     {{--</button>--}}
                                   {{--</span>--}}
                                            {{--<input type="text" name="quant[2]" class="form-control input-number" value="5"--}}
                                                   {{--min="1" max="100">--}}
                                            {{--<span class="input-group-btn">--}}
                                       {{--<button type="button" class="btn btn-success btn-number" data-type="plus"--}}
                                               {{--data-field="quant[2]">--}}
                                    {{--<span class="glyphicon glyphicon-plus"></span>--}}
                                   {{--</button>--}}
                                 {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnSave" class="btn btn-primary" >Update Expenses</button>
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
<script>
    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    $( document ).ready(function() {
        $('.btn-number').click(function(e){
            e.preventDefault();

            var fieldName = $(this).attr('data-field');
            var type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if(type == 'minus') {
                    var minValue = parseInt(input.attr('min'));
                    if(!minValue) minValue = 1;
                    if(currentVal > minValue) {
                        input.val(currentVal - 1).change();
                    }
                    if(parseInt(input.val()) == minValue) {
                        $(this).attr('disabled', true);
                    }

                } else if(type == 'plus') {
                    var maxValue = parseInt(input.attr('max'));
                    if(!maxValue) maxValue = 9999999999999;
                    if(currentVal < maxValue) {
                        input.val(currentVal + 1).change();
                    }
                    if(parseInt(input.val()) == maxValue) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function(){
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            var minValue =  parseInt($(this).attr('min'));
            var maxValue =  parseInt($(this).attr('max'));
            if(!minValue) minValue = 1;
            if(!maxValue) maxValue = 9999999999999;
            var valueCurrent = parseInt($(this).val());

            var name = $(this).attr('name');
            if(valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if(valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });
</script>
@endsection