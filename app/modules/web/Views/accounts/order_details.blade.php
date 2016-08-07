@extends('web::layout.web_master')

@section('content')
    <div class="pos-new-product home-text-container">
        <div class="description">


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

            


            @if($order_pay_trn)
                <h3 style="color: green;">Payment History </h3>
                <table class="table table-striped cart-table">
                    <thead>
                    <tr>
                        <td>Invoice No # </td>
                        <td>Customer Name </td>
                        <td>Payment Type </td>
                        <td>Amount </td>
                        <td>Date </td>
                        <td>Transactio No# </td>
                        <td>Gateway Name </td>
                        <td>Status </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_pay_trn as $values)
                        <tr>
                            <td>{{ \App\OrderHead::findOrFail($values->order_head_id)->invoice_no}}</td>
                            <td>{{\App\Customer::findOrFail($values->customer_id)->first_name}}</td>
                            <td>{{ $values->payment_type }}</td>
                            <td>{{ $values->amount  }}</td>
                            <td>{{ $values->date }}</td>
                            <td>{{ $values->transaction_no }}</td>
                            <td>{{ $values->gateway_name }}</td>
                            <td>{{ $values->status }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <p class="pull-right">Paid Amount {{@$paid_amount->paid_amount}}</p>
            @endif

            <div class="col-md-12 margin-top-30 margin-bottom-30">
                <div class="col-md-6">
                    <div class="row">
                        <div class="billing_address">
                            <div class="header">BILLING ADDRESS</div>
                            <div class="details">
                                <p style="margin:0;">
                                    {{$get_customer_data->first_name}} {{$get_customer_data->last_name}}
                                </p>
                                <p style="margin:0;">
                                    Address: <br> {{$get_customer_data->address}}
                                </p>
                                <p style="margin:0;">
                                    {{$get_customer_data->suburb}} {{$get_customer_data->state}} {{$get_customer_data->postcode}}
                                </p>
                                <p style="margin:0;">
                                    {{$get_customer_data->country}}
                                </p>
                                <p style="margin:0;">
                                    {{$get_customer_data->telephone}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="billing_address">
                            <div class="header">DELIVERY ADDRESS</div>
                            <div class="details">
                                <p style="margin:0;">
                                    {{$delivery_data->first_name}} {{$delivery_data->last_name}}
                                </p>
                                <p style="margin:0;">
                                    Address: <br> {{$delivery_data->address}}
                                </p>
                                <p style="margin:0;">
                                    {{$delivery_data->suburb}} {{$delivery_data->state}} {{$delivery_data->postcode}}
                                </p>
                                <p style="margin:0;">
                                    {{$delivery_data->country}}
                                </p>
                                <p style="margin:0;">
                                    {{$delivery_data->telephone}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
@stop