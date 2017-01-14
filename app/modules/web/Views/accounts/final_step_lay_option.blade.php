@extends('web::layout.web_master')

@section('content')
    <div class="pos-new-product home-text-container">
        <div class="description">

            <div class="cart_container">
                <div class="row">
                    <div class="col-sm-12">

                        <ul class="nav nav-tabs" role="tablist">
                            @include('web::accounts._account_menu')
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
                                    <span class="lbl">Pay now  </span><br>
                                    <i>pay using your Credit Card. Its Secure. </i>
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
                                <small>CC data will not be stored into our system. we will not use any data here </small><br>

                                <input type="text" name="amount" id="edValue" value="{{$amount}}" class="form-control" placeholder="50.00 or more " readonly><br>

                                <div style="padding: 10%; text-align: center">
                                    <style>
                                        .eway-button span{
                                            padding: 10%;
                                            width: 200px;
                                            text-align: center;
                                            height: 70px;
                                            color: lightyellow;
                                        }
                                    </style>

                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-primary eway-button" data-toggle="modal" data-target=".bs-example-modal-lg">
                    <span>
                        Confirm to Pay ( {{number_format($payable_amount, 2)}} )
                    </span>

                                    </button>


                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                </div>
                                                <div class="modal-body">
                                                    <h2>Please note:</h2>
                                                    <p>1.	That most of Kids ride-on products creating with a process, the process involves blowing sheets and can caused dents or very small scratches. This does not affect the strength or durability of the body. They are just minor cosmetic flaws; Asim’s Toys will not accept any returns back due to this and this no reason to claim the item as faulty.</p>

                                                    <p>2- All Our Cars are tested , Asim’s Toys  Will not accept any returns back but if we agree to accept the item Returns please note :
                                                        .  Shipping costs are non-refundable.
                                                        .  Return postage fee will be at buyer’s expense.</p>
                                                    <h5 style="color: red;">
                                                        ***  If you are not happy with this agreement</a> please do not buy this item  ***
                                                    </h5>
                                                    <p>
                                                        <input type="checkbox" checked="checked"> <a href="{{route('terms-condition')}}">I agree with terms and condition </a>
                                                    </p>



                                                    <div class="col-md-12" style="padding: 10% 30%; text-align: center">

                                                        <script src="https://secure.ewaypayments.com/scripts/eCrypt.js"
                                                                class="eway-paynow-button"
                                                                data-publicapikey="epk-4AABBD0F-8893-4863-8776-ABF469799708"

                                                                data-amount="{{$payable_amount*100}}"
                                                                data-currency="AUD"
                                                                data-buttoncolor="#ffc947"
                                                                data-buttonsize="100"
                                                                data-buttonerrorcolor="#f2dede"
                                                                data-buttonprocessedcolor="#dff0d8"
                                                                data-buttondisabledcolor="#f5f5f5"
                                                                data-buttontextcolor="#000000"

                                                                data-invoiceref='{{$order_data->invoice_no}}'
                                                                data-invoicedescription="Asims Toys Payment "
                                                                data-email= '{{@$customer_data->email}}'
                                                                data-phone='{{@$customer_data->telephone}}'
                                                                data-allowedit="true"
                                                                data-resulturl="{{route('partial_lay_by_redirect_eway', [$order_data->invoice_no, $payable_amount, $customer_data->id])}}"}}
                                                        >
                                                        </script>

                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                </div>

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