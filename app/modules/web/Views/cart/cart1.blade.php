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
						<div class="step-text active">
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
						<div class="step-text">
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
						<div class="table-responsive">
						<table class="table table-striped cart-table">
						<thead>
							<tr>
								<td>Item</td>
								<td>Qty</td>
								<td>Unit Price</td>
								<td class="text-align-right">Line Total</td>
								<td></td>
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
									<form method="post" action="{{URL::to('/')}}/order/update_cart">
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
										<input class="input-class" type="number" min="1" name="quantity" value="{{$product_cart['quantity']}}" readonly>
									</td>
									<td>
										<div class="unit-price">
											$ {{number_format($product_cart['product_price'], 2)}}
										</div>
									</td>
									<td class="text-align-right">
										<div class="linetotal">
											
											<span class="line_total">
												${{number_format($product_cart['quantity']*$product_cart['product_price'],2)}}
												<?php
													$total_value+=$product_cart['quantity']*$product_cart['product_price'];
												?>
											</span>
										</div>
									</td>	
									<td>
										<div class="delete_product">
											<input type="hidden" name="product_id" value="{{$product_id}}">
											<input type="hidden" name="color" value="{{$product_cart['color']}}">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="product_index" value="{{$count}}">
                                    </form>
											<form method="post" action="{{URL::to('/')}}/order/remove_cart">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="product_index" value="{{$count}}">
												<input type="submit" name="remove_product" class="product_remove_cross" value="">
											</form>
											
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
									<td>Total:</td>
									<td class="text-align-right">${{number_format($total_value, 2)}}</td>
									<td></td>
								</tr>
						</tbody>
					</table>
					</div>


					@else
						<div class="empty_cart">Your Cart is empty</div>
					@endif
					
				</div>


				@if(Session::has('product_cart') && count(Session::get('product_cart')) > 0)
		            {!! Form::open(['route' => 'order-checkout']) !!}
								<div class="col-md-12 col-xs-12 col-sm-12">
								  <div class="row">
								    <div class="col-md-7 col-xs-12 col-sm-6">
										<div class="row">
			                                <span class="pull-right">
			                                    <b style="color: #ce2491;"> Enter Your Coupon Code </b>
			                                    <br>
			                                    <small>A coupon code which you received from Asim's Toys</small>
			                                </span>
										</div>
									</div>

									<div class="col-md-5 col-xs-12 col-sm-6">
										<div class="row">
			                                <span class="pull-right">
			                                    <input type="text" name="coupon_code" class="input-class coupon_code" placeholder="Enter your coupon code here">
			                                </span>
										</div>
									</div>

		                            
								  </div>
		                        </div>

		                        <div class="col-md-12 col-xs-12 col-sm-12 cart-by-appoinment">
									<div class="row">

										<div class="col-md-10 col-md-offset-2 col-xs-12 col-sm-5">

			                                <span class="localpickup">

			                                    <input type="radio" name="localpickup" checked id="localpickup_no" value="no">
												<label for="localpickup_no">Delivered (By TNT Road Express)</label>
												<br>
												    
												<input type="radio" name="localpickup" id="localpickup_yes" value="yes">	
												<label class="last" for="localpickup_yes">Local Pick up ( By appoinment Only from Greenacre, NSW)</label>
												<br>

			                                </span>

										</div>


									</div>
								</div>

								<div class="col-md-12 col-xs-12 col-sm-12 margin-top-30 mb-20">
									<a href="{{Url::to('')}}" class="pull-left cart-continue-shopping">Continue Shopping</a>
									<input type="submit" class="cart-checkout pull-right" value="Checkout">
								</div>

		                       
							

		            {!! Form::close() !!}
		            @else

		                        <div class="col-md-12">
		                            <a style="padding: 12px;" href="{{Url::to('')}}" class="cart-continue-shopping">Continue Shopping</a>
		                        </div>

		            @endif

			</div>

		</div>
	</div>
@stop