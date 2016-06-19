@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-text-container">
		<div class="description">

			<div class="cart_container">
						<div class="step-container">
							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step1.png">
								</div>
								<div class="step-text">
									<div class="header">Step 1</div>
									<div class="your-basket">my basket</div>
								</div>
							</div>

							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step2.png">
								</div>
								<div class="step-text">
									<div class="header">Step 2</div>
									<div class="your-basket">billing details</div>
								</div>
							</div>

							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step3.png">
								</div>
								<div class="step-text">
									<div class="header">Step 3</div>
									<div class="your-basket">delivery details</div>
								</div>
							</div>

							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step4.png">
								</div>
								<div class="step-text active">
									<div class="header">Step 4</div>
									<div class="your-basket">check order</div>
								</div>
							</div>

							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step5.png">
								</div>
								<div class="step-text">
									<div class="header">Step 5</div>
									<div class="your-basket">secure payment</div>
								</div>
							</div>

						</div>

						<div class="cart-item-container">

							@if(!empty($product_cart_r))

								<table class="table table-striped cart-table">
								<thead>
									<tr>
										<td>Item</td>
										<td>Qty</td>
										<td>Unit Price</td>
										<td class="text-align-right">Line Total</td>
									</tr>
								</thead>

								<tbody>
									<?php
										$total_value = 0;

										$count = 0;
									?>
									@foreach($product_cart_r as $product_cart)
										<?php
											$product_id = $product_cart['product_id'];
											$product = DB::table('product')->where('id',$product_id)->first();
										?>
										<tr>
											
											<td>
												<div class="added-images">
													<img src="{{Url::to('')}}/{{$product->thumb}}">
												</div>
												<div class="added-item-container">
													<a class="product-name" href="#">
														{{$product->title}}
													</a>
												</div>
											</td>
											<td>
												<input class="cart-quantity" type="number" min="1" name="product_quantity" value="{{$product_cart['quantity']}}">
											</td>
											<td>
												<div class="unit-price">
													${{$product->sell_rate}}
												</div>
											</td>
											<td class="text-align-right">
												<div class="linetotal">
													
													<span class="line_total">
														${{$product_cart['quantity']*$product->sell_rate}}				
														<?php
															$total_value+=$product_cart['quantity']*$product->sell_rate;
														?>
													</span>
												</div>
											</td>	
											
										</tr>
										<?php $count++;?>

									@endforeach
										<tr class="sub-total-tr">
											<td>
												&nbsp;</td>
											<td>
											</td>
											<td>Total: <input type="hidden" name="total_value" value="{{$total_value}}"></td>
											<td class="text-align-right" >${{$total_value }}</td>
                                            <input type="hidden" id="total-amount-cart-in" value="{{$total_value }}">
										</tr>
								</tbody>
							</table>

                            <h5><b style="color: orangered;">Tnt Express delivery cost</b></h5>
                            <div id="freight-cal">
                                <?php $init_amount = isset($freight_calculation)?$freight_calculation[0]['price'][0]: 0.00; ?>
                                @if(isset($freight_calculation))

                                    @foreach($freight_calculation as $fc)

                                       <input type="radio" name="fc" id="{{$fc['code'][0]}}" value="{{$fc['price'][0]}}" {{$fc['code'][0]==76 ? 'checked': null}} /><label for="{{$fc['code'][0]}}"> {{$fc['description'][0]}} || Cost is <b>{{$fc['price'][0]}}</b></label><br>

                                    @endforeach
                                @endif
                            </div>
                            <p>&nbsp;</p>
							<h4><span class="pull-right" style="color: orangered;">Total Cost : <b>$ <span id="final-amount-cart">{{ round($init_amount.".00" + $total_value, 2) }} </span> &nbsp;</b></span></h4>

							@else
								<div class="empty_cart">Your Cart is empty</div>
							@endif
							
						</div>
						
						<div class="col-md-12 margin-top-30 margin-bottom-30">
							<div class="col-md-6">
								<div class="row">
									<div class="billing_address">
										<div class="header">BILLING ADDRESS</div>
										<div class="details">
											<p style="margin:0;">
												{{$user_data->first_name}} {{$user_data->last_name}}
											</p>
											<p style="margin:0;">
												{{$user_data->address}}
											</p>
											<p style="margin:0;">
												{{$user_data->suburb}} {{$user_data->state}} {{$user_data->postcode}}
											</p>
											<p style="margin:0;">
												{{$user_data->country}}
											</p>
											<p style="margin:0;">
												{{$user_data->telephone}}
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

						<div class="col-md-12 margin-top-30 margin-bottom-30">
							
								<a href="{{Url::to('')}}/mycart" class="cart-continue-shopping">Edit Cart</a>
								<!-- <input type="submit" value="Checkout" class="cart-checkout">					 -->
							<a href="{{ route('pay-now') }}" class="cart-checkout">Proceed to Payment Method</a>
							
						</div>

					</div>	

		</div>
	</div>


    <script>
        $('#freight-cal input').on('change', function() {
            total_amt_cart = $('#total-amount-cart-in').val();
            total_amt_cart_in = Math.round(total_amt_cart * 100) / 100;
            fc_amt = $('input[name=fc]:checked', '#freight-cal').val();
            sum1 = Math.round((parseFloat(total_amt_cart_in) + parseFloat(fc_amt) ) * 100) / 100;
            $('#final-amount-cart').html(sum1);
        });
    </script>
@stop