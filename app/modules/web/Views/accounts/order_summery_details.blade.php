@extends('web::layout.web_master')

@section('content')
    <div class="pos-new-product home-text-container">
        <div class="description">


            <div class="row">
                <div class="col-sm-12">

                    <ul class="nav nav-tabs" role="tablist">
                        @include('web::accounts._account_menu')
                    </ul>
                </div>

            </div>

            @foreach($order as $order)

                <div class="invoice-header">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h3>
                            <div>
                                <small><strong>Asims</strong>Toys</small><br>
                                {{$order->invoice_no}}
                            </div>
                        </h3>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <address>
                            Asims Toys.<br>
                            Australia <br>
                            AU
                        </address>
                    </div>

                    <div class="col-md-6 col-3 col-xs-12 pull-right">
                        <div class="invoice-date">
                            <small><strong>Date</strong></small><br>
                            {{$order->created_at}}
                        </div>

                    </div>

                </div> <!-- / .invoice-header -->

                <p> &nbsp; </p>

                <h3 style="color: green;">Invoice History </h3>
				<div class="table-responsive">
                <table class="table table-striped cart-table">
                    <thead>
                    <tr>
                        <td>Order Invoice </td>
                        <td>Product Name (ID)</td>
                        <td>Variation </td>
                        <td>Quantity</td>
                        <td>Color</td>
                        <td>Background Color</td>
                        <td>Plate Text</td>
                        <td>Price</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->relOrderDetail as $order_dt)
                        <tr>
                            <td>{{ \App\OrderHead::findOrFail($order_dt->order_head_id)->invoice_no}}</td>
                            <td>{{\App\Product::findOrFail($order_dt->product_id)->title}}</td>
                            <td>{{ $order_dt->product_variation_id}}</td>
                            <td>{{$order_dt->qty}}</td>
                            <td>{{@$order_dt->product_variation_id}}</td>
                            <td>{{@$order_dt->background_color}}</td>
                            <td>{{@$order_dt->plate_text}}</td>
                            <td>{{number_format($order_dt->price,2 )}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
				</div>

            @endforeach
                <p>
            <div class="col-md-4 pull-right">
                <table class="table table-striped cart-table" style="text-align: right; background: none; font-weight: bold">
                    <tr>
                        <td> Discount Amount </td>
                        <td> {{number_format($order->total_discount_price?$order->total_discount_price:0, 2)}}  </td>
                    </tr>
					<tr>
                        <td> Freight Charge </td>
                        <td> {{number_format($order->freight_amount?$order->freight_amount:0, 2)}}  </td>
                        
                    </tr>
                    <tr>
                        <td> Total Cost </td>
                        <td> {{number_format($order->net_amount,2)}}</td>
                    </tr>
                </table>

            </div>
                </p>




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
                                    {{$get_customer_data->address}}
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
                                    {{$delivery_data->address}}
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