@extends('web::layout.web_master')

@section('content')

    <div class="general-container">

        @foreach($order as $order)

            <h1 class="box-tb-border">
                <span>
                    Order Details ::  {{$order->invoice_no}}
                </span>
                <span style="color: #00a4e1;margin-left: 20px;">
                    Date :: {{$order->created_at}}
                </span>
            </h1>

            <div class="order-detail-container">

            
                 <div class="invoice-header">                   

                    <div class="" style="font-size: 15px">
                        <h2>Sub Amount : {{number_format(@$total_amount->total_amount, 2)}}</h2>
                        <h2>Discount Amount : {{number_format(@$freight_data->total_discount_price, 2)}}</h2>                                
                        <h2>Freight Amount : {{number_format(@$freight_data->freight_amount, 2)}}</h2>                               
                        <h2>Total Amount : {{number_format(@$total_amount->total_amount -@$freight_data->total_discount_price + @$freight_data->freight_amount, 2)}}</h2>
                        <h2 style="color: red;">Left Amount : {{number_format(@$due_amount - @$freight_data->total_discount_price,2)}}</h2>
                        <h2 style="color: green;">Paid Amount : {{number_format(@$paid_amount->paid_amount, 2) }}</h2>
                        
                    </div>
                
                    @if(@number_format(@$total_amount->total_amount + @$freight_data->freight_amount, 2) != number_format(@$paid_amount->paid_amount,2) )
                        <div class="col-md-12 col-sm-12 col-xs-12 pull-right" style="padding: 20px">
                            <a href="{{ route('lay_by_pay_option', ['order_head_id'=>$order_head_id]) }}" class="cart-checkout" style="width: 55%; text-align: center; box-shadow: 3px 3px 3px #888888;    background: #ff9f38;padding: 12px 25px;">Want to Pay Now ? </a>

                        </div>
                    @endif

                    
                </div> <!-- / .invoice-header -->

                <div class="table-responsive">
                    <table class="table table-striped cart-table">
                        <thead>
                        <tr>
                            
                            <td>Item</td>
                            <td>Quantity</td>
                            <td>Name /<br/> Plate Text</td>
                            <td>State</td>
                            <td>Birthday / <br/>Color</td>
                            <td>Favourite Car / <br/>Background Color</td>
                            <td>License Class / <br/>Theme</td>
                            <td>Price</td>
                            <td>Total Price</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->relOrderDetail as $order_dt)
                            <tr>
                               <td>
                                    <div class="added-item-container">

                                        @if(count($order_dt->licence_image))
                                            <a target="_blank" href="{{ URL::asset($order_dt->licence_image) }}">
                                                <img width="50" src="{{ URL::asset($order_dt->licence_image) }}">
                                            </a>
                                            

                                        @endif
                                        
                                        <a class="product-name" >
                                            {{ isset(\App\Product::findOrFail($order_dt->product_id)->title)?\App\Product::findOrFail($order_dt->product_id)->title :  $order_dt->product_id }}
                                        </a>
                                    </div>
                                </td>
                                
                                <td>{{isset($order_dt->qty)?$order_dt->qty:null}}</td>
                                <td>{{isset($order_dt->plate_text)?$order_dt->plate_text:null}}</td>
                                <td>{{isset($order_dt->state)?$order_dt->state:null}}</td>
                                <td>{{isset($order_dt->product_variation_id)?$order_dt->product_variation_id:null}}</td>
                                <td>{{isset($order_dt->background_color)?$order_dt->background_color:null}}</td>

                                <td>{{isset($order_dt->theme)?$order_dt->theme:null}}</td>
                                
                                
                                <td>${{isset($order_dt->price)?$order_dt->price:null}}</td>
                                <td>${{$order_dt->price*$order_dt->qty}}</td>
                            </tr>
                        @endforeach
                        
                            <tr>
                                <td colspan="7" align="right">Sub Amount</td>
                                <td colspan="2" align="right">${{number_format(@$total_amount->total_amount, 2)}}</td>
                            </tr>
                            
                            <tr>
                                <td colspan="7" align="right">Discount Amount</td>
                                <td colspan="2" align="right">${{number_format(@$freight_data->total_discount_price, 2)}}</td>
                            </tr>
                            
                            <tr>
                               <td colspan="7" align="right">Freight Amount</td>
                                    <td colspan="2" align="right">${{number_format(@$freight_data->freight_amount, 2)}}</td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="7" align="right">Total Amount</td>
                                <td colspan="2" align="right">${{number_format(@$total_amount->total_amount -@$freight_data->total_discount_price + @$freight_data->freight_amount, 2)}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>

        @endforeach

        @if($order_pay_trn)
            <h3 style="color: green;padding: 10px 26px;font-size: 20px;">Payment History </h3>
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

            <div class="col-md-12 col-sm-6 col-xs-12 margin-top-30 margin-bottom-30">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="billing_address">
                                <div class="header">BILLING ADDRESS</div>
                                <div class="details">
                                    <p>
                                       {{$get_customer_data->first_name}} {{$get_customer_data->last_name}}
                                    </p>
                                    <p>
                                        {{$get_customer_data->address}}
                                    </p>
                                    <p>
                                       {{$get_customer_data->suburb}} {{$get_customer_data->state}} {{$get_customer_data->postcode}}
                                    </p>
                                    <p>
                                        {{$get_customer_data->country}}
                                    </p>
                                    <p>
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
                                    <p>
                                       {{$delivery_data->first_name}} {{$delivery_data->last_name}}
                                    </p>
                                    <p>
                                        {{$delivery_data->address}}
                                    </p>
                                    <p>
                                        {{$delivery_data->suburb}} {{$delivery_data->state}} {{$delivery_data->postcode}}
                                    </p>
                                    <p>
                                        {{$delivery_data->country}}
                                    </p>
                                    <p>
                                       {{$delivery_data->telephone}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif

    </div>
   
@stop