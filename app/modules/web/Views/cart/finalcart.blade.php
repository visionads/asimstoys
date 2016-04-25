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
											<td class="text-align-right">${{$total_value}}</td>
											
										</tr>
								</tbody>
							</table>


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
@stop