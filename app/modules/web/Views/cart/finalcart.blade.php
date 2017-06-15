
@extends('web::layout.web_master')

@section('content')
    <style>
        #sf-resetcontent{display: none;}
    </style>
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

					<span style="color: black; font-size: 18px; text-shadow: 1px 1px yellow; font-weight: bold; text-align: center;padding: 0 15px;width: 100%;display: inline-block;margin-bottom: 15px;">
						Note : In this screen you will also see the old item if you parked earlier. You can remove any item from here before "Proceed". 
					</span>

					@if(!empty($product_cart_r))
					<div class="table-responsive">
						<table class="table table-striped cart-table">
						<thead>
							<tr>
								<td>Item</td>
								<td>Qty</td>
								<td>Unit Price</td>
								<td>Freight Charge </td>
								<td class="text-align-right">Line Total</td>
								<td class="pull-right"> Action </td>
							</tr>
						</thead>

						<tbody>
							<?php
								$total_value = 0;

								$count = 0;
								$total_pro_price =
                            	$total_freight_charge = 0;

                            	$localpickup = 'no';
                            	$localpickup_count = 1;

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
										<input class="cart-quantity input-class" type="number" min="1" name="product_quantity" value="{{$product_cart['quantity']}}" readonly>
									</td>
									<td>
                                        <div class="unit-price">
                                            ${{$product_cart['product_price']}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="unit-price">
                                            ${{number_format(isset($product_cart['freight_charge'])?$product_cart['freight_charge']:0, 2)}}
                                        </div>
                                    </td>
									<td class="text-align-right">
										<div class="linetotal">
											
											<span class="line_total">
                                                <?php

                                                    $pro_price = $product_cart['quantity']*$product_cart['product_price'];
                                                    $freight_charge= isset($product_cart['freight_charge'])?$product_cart['freight_charge']:0;
                                                    $line_amount = $pro_price + $freight_charge;
                                                    #$total_line_amount += $line_amount + $freight_charge;
                                                    $total_value+=$pro_price + $freight_charge;
                                                    $total_freight_charge+=$freight_charge;
													$total_pro_price+=$pro_price;

													if($localpickup_count == '1'){
														if($product_cart['localpickup'] == 'yes'){
															$localpickup = 'yes';
															$localpickup_count++;
														}
													}
													
                                                ?>

												${{ $line_amount }}

											</span>
										</div>
									</td>	
									<td> <a href="{{ route('delete_order_tmp', $product_cart['id']) }}" class="btn btn-danger btn-xs pull-right" onclick="return confirm('Are you sure to Remove this Item ?')" title="Delete" style="margin-top:10px">
									<i class="icon-trash">Remove</i></a> 
									</td>
									
								</tr>
								<?php $count++;?>

							@endforeach
								<tr class="sub-total-tr">
									<td>
										&nbsp;
                                    </td>
									<td>
                                        &nbsp;
									</td>
                                    <td>
                                        &nbsp;
									</td>
									<td>Total: <input type="hidden" name="total_value" value="{{@$total_value}}"></td>
									<td class="text-align-right" >${{@$total_value }}</td>
									<td> &nbsp; </td>

								</tr>
						</tbody>
					</table>
					</div>

                    <p>
                        <span class="pull-right">
                            {{ Session::has('coupon_status')? Session::get('coupon_status'):null }} <br>
                            @if(Session::has('coupon_code'))
                                Your Coupon Code is :
                            @endif
                            {{ Session::has('coupon_code')? Session::get('coupon_code'):null }}
                        </span>
                    </p>
                    
					@else
						<div class="empty_cart">Your Cart is empty</div>
					@endif
					
				</div>


                {!! Form::open(['route' => 'pay-now']) !!}

                <input type="hidden" name="total_amount" value="{{@$total_pro_price }}">
                <input type="hidden" name="total_freight_charge" value="{{@$total_freight_charge }}">
                <input type="hidden" name="localpickup" value="{{@$localpickup }}">

				<div class="col-md-12 col-sm-6 col-xs-12">
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

				<div class="col-md-12 agree-class">
					<input type="checkbox" value="1" id="i_agree" checked="checked" required="required">
                    <label for="i_agree">I agree with Terms and Condition. <a href="{{URL::to('terms-condition')}}"> Click Here for more details. </a></label>
				</div>
				<div class="col-md-12">
					@if(@$total_value>0)
						<input type="submit" value="Proceed to Payment Method" class="cart-checkout pull-right" id="myFormSubmit">
					@endif
				</div>
                           
							

			</div>
            {!! Form::close() !!}
		</div>
	</div>


    <script>
        $('#myFormSubmit').click(function(e)
        {
            $('#loadingModal').modal('show');
            return true;
        });
    </script>


    {{--modal--}}
    <div id="loadingModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p>
                        Order is processing  ...
                    </p>
                </div>
                <div class="modal-body">
                    <p>
                        Please wait ....
                    </p>
                </div>
                <div class="modal-footer">
                    <p>&nbsp;</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop