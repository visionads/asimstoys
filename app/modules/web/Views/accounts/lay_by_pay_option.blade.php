@extends('web::layout.web_master')

@section('content')
    <div class="pos-new-product home-text-container">
        <div class="description">

            <div class="cart_container">
                <div class="row">
                    <div class="col-sm-12">

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation">
                                <a href="{{route('myaccount')}}" >Profile</a>
                            </li>
                            <li role="presentation">
                                <a href="{{route('order_summery_lists')}}" >Order History</a>
                            </li>
                            <li role="presentation">
                                <a href="{{route('lay_by_order_lists')}}">Lay by Order</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row margin-top-30 margin-bottom-30">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div>
                                <span class="panel-title"> Payment for the Invoice (<a href="{{route('details_of_lay_by', $order_data->id)}}"> {{@$order_data->invoice_no}} </a> ) </span><br>
                                <small style="color: blue">Invoice Bill is : {{@$total_amount->total_amount}}</small>  |
                                <small style="color: green">Paid Amount is : {{isset($paid_amount->paid_amount)?$paid_amount->paid_amount: "0.00"}}</small> |
                                <small style="color: red">Due Amount is : {{@$due_amount}}</small>
                            </div>
                            <br>
                            <div class="radio" style="margin-top: 0;">
                                <label>
                                    <input type="radio" name="payment_method" id="r1" value="e_way" checked="checked" class="px">
                                    <span class="lbl">Pay Now </span><br>
                                    <i>pay using your Credit Card. We accept VISA | MasterCard | Amex |</i>
                                </label><br><br>
                            </div> <!-- / .radio -->
                            {{--<div class="radio" style="margin-inside: 0;">
                                <label>
                                    <input type="radio" name="payment_method" id="r2" value="lay_by" class="px">
                                    <span class="lbl">Bank Process</span><br>
                                    <i>You can deposit the amount in the bank account and then fill out the form in next page </i>
                                </label>
                            </div>--}}

                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12" id="e-way-button">
                                <h3> Secure eWay Payment </h3>
                                <small>You may pay amount should be getter than AUD 50.00 or more. </small><br>

                                {!! Form::open(['method' =>'GET','route'=>'step_final_payment_for_layby']) !!}
                                <label for="amount">Amount (Partial or Full Payment)</label>
                                <input type="text" name="amount" id="edValue" value="50.00" class="form-control" placeholder="50 or more "><br>
                                <input type="hidden" name="order_head_id" value="{{$order_data->id}}">

                                <input type="checkbox" value="1" name="agree" required="required" checked="checked"> I agree with <a href="{{URL::to('terms-condition')}}" style="text-decoration: underline">Terms and Condition</a> <br>


                                <input type="submit" value="Go for Pay" style="background-color: #ff7722; padding: 7px 15px; text-align: right; color: white;" class="pull-right">

                                {!! Form::close() !!}


                            </div>

                            <div style="display: none" class="col-md-12" id="bank-process-form">
                                <h3>Bank Deposit Form</h3>
                                <small>After pay to Bank Account please fill out the form. </small>
                                {!! Form::open(['route' => 'bank_partial_payment_submit']) !!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <input type="hidden" name="order_head_id" value="{{$order_data->id}}">
                                    <input type="hidden" name="customer_id" value="{{Session::get('user_id')}}">
                                    <input type="hidden" name="payment_type" value="bank">

                                    <label for="amount">Amount (Partial or Full Payment) (required)</label>
                                    <input type="text" name="amount" value="50.00" id="pay-amount-bank" class="form-control" placeholder="50.00 or more " required><br>

                                    <label for="transaction_no">Bank Transaction NO# (required)</label>
                                    <input type="text" name="transaction_no" value=""  class="form-control" placeholder="Bank Transaction NO " required><br>
                                    <label for="gateway_name">Bank Name (required)</label>
                                    <input type="text" name="gateway_name" class="form-control" required><br>

                                    <label for="gateway_address">Bank Information (Address)</label>
                                    <textarea name="gateway_address" class="form-control" required></textarea><br>


                                    <div class="pull-right">
                                        <input type="submit" class="form-control register_btn" name="submit" value="Submit">
                                    </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script style="javascript/text">
        $("#r1").click(function(){
            $("#bank-process-form").hide();
            $("#e-way-button").show();
        });

        $("#r2").click(function(){
            $("#e-way-button").hide();
            $("#bank-process-form").show();
        });
    </script>
@stop