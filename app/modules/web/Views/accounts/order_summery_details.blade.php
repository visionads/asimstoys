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

                <div class="table-responsive">
                    <table class="table table-striped cart-table">
                        <thead>
                        <tr>
                            
                            <td>Item</td>
                            <td>Qty</td>
                            <td>Name /<br/> Plate Text</td>
                            <td>State</td>
                            <td>Birthday / <br/>Color</td>
                            <td>Favourite Car / <br/>Background Color</td>
                            <td>License Class / <br/>Theme</td>
                            <td>Price</td>
                            <td>Price</td>
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

                                        <a class="product-name" href="#">
                                            
                                             {{\App\Product::findOrFail($order_dt->product_id)->title}}
                                        </a>
                                    </div>
                                </td>
                                
                                <td>{{$order_dt->qty}}</td>
                                <td>{{@$order_dt->plate_text}}</td>
                                <td>{{@$order_dt->state}}</td>
                                <td>{{@$order_dt->product_variation_id}}</td>
                                <td>{{@$order_dt->background_color}}</td>
                                <td>{{@$order_dt->theme}}</td>
                                
                                <td>${{number_format($order_dt->price,2 )}}</td>
                                <td>${{number_format($order_dt->price * $order_dt->qty,2 )}}</td>

                                
                            </tr>
                        @endforeach

                            <tr class="sub-total-tr">
                                <td colspan="6">
                                    &nbsp;</td>

                                <td colspan="2">Total</td>
                                <td class="text-align-right">${{number_format($order->sub_total?$order->sub_total:0, 2)}}</td>
                            </tr>
                            <tr class="sub-total-tr">
                                <td colspan="6">
                                    &nbsp;</td>

                                <td colspan="2"> Discount</td>
                                <td class="text-align-right">${{number_format($order->total_discount_price?$order->total_discount_price:0, 2)}}</td>
                            </tr>
                            <tr class="sub-total-tr">
                                <td colspan="6">
                                    &nbsp;</td>

                                <td colspan="2">Freight Charge</td>
                                <td class="text-align-right">${{number_format($order->freight_amount?$order->freight_amount:0, 2)}}  </td>
                            </tr>
                            <tr class="sub-total-tr">
                                <td colspan="6">
                                    &nbsp;</td>

                                <td colspan="2">Total Cost</td>
                                <td class="text-align-right">${{number_format($order->net_amount,2)}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

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

            </div>

        @endforeach

    </div>
    
@stop