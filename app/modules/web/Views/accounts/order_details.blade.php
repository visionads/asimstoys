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
                                {{isset($order->invoice_no)?$order->invoice_no:null}}
                            </div>
                        </h3>
                        <div>
                            <small><strong>Date</strong></small><br>
							<?php
								$originalDate = $order->created_at;
								echo $newDate = date("dS M y", strtotime($originalDate));
							?>
                           
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <address>
                            Asims Toys.<br>
                            Australia <br>
                            AU
                        </address>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 pull-right">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="pull-right" style="font-size: 15px">
                                <h2 style="color: darkblue;padding-bottom: 0px;text-align: right;">Sub Amount : {{number_format(@$total_amount->total_amount, 2)}}</h2>
								<h2 style="color: darkblue;padding-bottom: 0px;text-align: right;">Discount Amount : {{number_format(@$freight_data->total_discount_price, 2)}}</h2>								
                                <h2 style="color: darkblue;padding-bottom: 0px;text-align: right;">Freight Amount : {{number_format(@$freight_data->freight_amount, 2)}}</h2>                               
								<h2 style="color: darkblue;padding-bottom: 0px;text-align: right;">Total Amount : {{number_format(@$total_amount->total_amount -@$freight_data->total_discount_price + @$freight_data->freight_amount, 2)}}</h2>
								<h2 style="color: red;padding-bottom: 0px;text-align: right;">Left Amount : {{number_format(@$due_amount - @$freight_data->total_discount_price,2)}}</h2>
                                <h2 style="color: green;padding-bottom: 0px;text-align: right;">Paid Amount : {{number_format(@$paid_amount->paid_amount, 2) }}</h2>
                                
                            </div>
                        </div>
                        @if(@number_format(@$total_amount->total_amount + @$freight_data->freight_amount, 2) != number_format(@$paid_amount->paid_amount,2) )
                            <div class="col-md-12 col-sm-12 col-xs-12 pull-right" style="padding: 20px">
                                <a href="{{ route('lay_by_pay_option', ['order_head_id'=>$order_head_id]) }}" class="cart-checkout" style="width: 55%; text-align: center; box-shadow: 3px 3px 3px #888888">Want to Pay Now ? </a>

                            </div>
                        @endif

                    </div>
                </div> <!-- / .invoice-header -->

                <p> &nbsp; </p>
                <p> &nbsp; </p>
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
							<td>Total Price</td>
						</tr>
						</thead>
						<tbody>
						@foreach($order->relOrderDetail as $order_dt)
							<tr>
								<td>
									{{ isset(\App\OrderHead::findOrFail($order_dt->order_head_id)->invoice_no)? \App\OrderHead::findOrFail($order_dt->order_head_id)->invoice_no : $order_dt->order_head_id}}</td>
								<td>
								{{ isset(\App\Product::findOrFail($order_dt->product_id)->title)?\App\Product::findOrFail($order_dt->product_id)->title :  $order_dt->product_id }}
								</td>
								<td>{{ isset($order_dt->product_variation_id)?$order_dt->product_variation_id:null}}</td>
								<td>{{isset($order_dt->qty)?$order_dt->qty:null}}</td>
								<td>{{isset($order_dt->product_variation_id)?$order_dt->product_variation_id:null}}</td>
								<td>{{isset($order_dt->background_color)?$order_dt->background_color:null}}</td>
								<td>{{isset($order_dt->plate_text)?$order_dt->plate_text:null}}</td>
								<td>{{isset($order_dt->price)?$order_dt->price:null}}</td>
								<td>{{$order_dt->price*$order_dt->qty}}</td>
							</tr>
						@endforeach
						
							<tr>
								<td colspan="7" align="right">Sub Amount</td>
								<td colspan="2" align="right">{{number_format(@$total_amount->total_amount, 2)}}</td>
							</tr>
							
							<tr>
								<td colspan="7" align="right">Discount Amount</td>
								<td colspan="2" align="right">{{number_format(@$freight_data->total_discount_price, 2)}}</td>
							</tr>
							
							<tr>
                               <td colspan="7" align="right">Freight Amount</td>
                                    <td colspan="2" align="right">{{number_format(@$freight_data->freight_amount, 2)}}</td>
								
							</tr>
							
							<tr>
								<td colspan="7" align="right">Total Amount</td>
								<td colspan="2" align="right">{{number_format(@$total_amount->total_amount -@$freight_data->total_discount_price + @$freight_data->freight_amount, 2)}}</td>
							</tr>

						</tbody>
					</table>
				</div>
                
            @endforeach


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
                        <td>Transaction No# </td>
                        <td>Gateway Name </td>
                        <td>Status </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_pay_trn as $values)
                        <tr>
                            <td>{{ isset(\App\OrderHead::findOrFail($values->order_head_id)->invoice_no)?\App\OrderHead::findOrFail($values->order_head_id)->invoice_no:null}}</td>
                            <td>{{isset(\App\Customer::findOrFail($values->customer_id)->first_name)?\App\Customer::findOrFail($values->customer_id)->first_name:null}}</td>
                            <td>{{ isset($values->payment_type)?$values->payment_type:null }}</td>
                            <td>{{ isset($values->amount)? number_format($values->amount, 2) : null  }}</td>
                            <td>{{ isset($values->date)?$values->date: null }}</td>
                            <td>{{ isset($values->transaction_no)?$values->transaction_no:null }}</td>
                            <td>{{ isset($values->gateway_name)?$values->gateway_name:null }}</td>
                            <td><b>{{ isset($values->status)?$values->status:null }}</b></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <p class="pull-right" style="font-weight: bold;">Paid Amount {{isset($paid_amount->paid_amount)?number_format($paid_amount->paid_amount,2):null}} &nbsp;</p>
            @endif

            <div class="col-md-12 margin-top-30 margin-bottom-30">
                <div class="col-md-6">
                    <div class="row">
                        <div class="billing_address">
                            <div class="header">BILLING ADDRESS</div>
                            <div class="details">
                                <p style="margin:0;">
                                    {{isset($get_customer_data->first_name)?$get_customer_data->first_name:null}}
                                    {{isset($get_customer_data->last_name)?$get_customer_data->last_name:null}}
                                </p>
                                <p style="margin:0;">
                                    Address: <br> {{isset($get_customer_data->address)?$get_customer_data->address:null}}
                                </p>
                                <p style="margin:0;">
                                    {{isset($get_customer_data->suburb)?$get_customer_data->suburb:null}}
                                    {{isset($get_customer_data->state)?$get_customer_data->state:null}}
                                    {{isset($get_customer_data->postcode)?$get_customer_data->postcode:null}}
                                </p>
                                <p style="margin:0;">
                                    {{isset($get_customer_data->country)?$get_customer_data->country:null}}
                                </p>
                                <p style="margin:0;">
                                    {{isset($get_customer_data->telephone)?$get_customer_data->telephone:null}}
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
                                    {{isset($delivery_data->first_name)?$delivery_data->first_name:null}}
                                    {{isset($delivery_data->last_name)?$delivery_data->last_name:null}}
                                </p>
                                <p style="margin:0;">
                                    Address: <br>
                                    {{isset($delivery_data->address)?$delivery_data->address:null}}
                                </p>
                                <p style="margin:0;">
                                    {{isset($delivery_data->suburb)?$delivery_data->suburb:null}}
                                    {{isset($delivery_data->state)?$delivery_data->state:null}}
                                    {{isset($delivery_data->postcode)?$delivery_data->postcode:null}}
                                </p>
                                <p style="margin:0;">
                                    {{isset($delivery_data->country)?$delivery_data->country:null}}
                                </p>
                                <p style="margin:0;">
                                    {{isset($delivery_data->telephone)?$delivery_data->telephone:null}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
@stop