
<div class="modal-dialog" id="print_page" style="width: 75%;">
	<div class="modal-content" style="float: left;width: 100%;" >
           
            <a href="" class="btn" type="button" style="float:right;position:relative;z-index:99;cursor:pointerl"> X </a>
	    <div class="modal-body">
	      
	        <div class="row">
		      	<div class="col-xs-8">
					<a href="#" id="header_logo">
	                    {!! HTML::image('web/images/logo.png', 'Asims Toys', ['width'=>150]) !!}
					</a>
				</div>
				<div class="col-xs-4 text-right" style="margin-bottom:20px;">
					<!-- <h1 class="text-light text-default-light">Invoice</h1> -->
					<a style="font-size:20px;" class="print_the_pages" href="#">
						Print Invoice
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-3">
					<h4 class="text-light">Prepared by</h4>
					<address>
						<strong>Asim's Toys</strong><br>
						Sydney<br>
						Australia<br>
						
					</address>
				</div><!--end .col -->
				<div class="col-xs-3">
					<h4 class="text-light">Prepared for</h4>
					<address>
						<strong>Billing Address</strong><br><br/>
						<strong>{{@$customer_data->first_name}} {{@$customer_data->last_name}}</strong><br>
						{{@$customer_data->email}}<br/><br/>
						{{@$customer_data->address}}<br/>
						{{@$customer_data->suburb}}<br/>
						{{@$customer_data->postcode}}<br>
						<abbr title="Phone">P: </abbr> {{@$customer_data->telephone}}<br/>
						{{@$customer_data->state}}<br/>
						{{@$customer_data->country}}<br>
					</address>
				</div><!--end .col -->
				
				<div class="col-xs-3">
					<h4 class="text-light">&nbsp;</h4>
					<address>
						<strong>Delivery Address</strong><br><br/>
						<strong>{{@$delivery_data->first_name}} {{@$delivery_data->last_name}}</strong><br>
						{{@$delivery_data->address}}<br/>
						{{@$delivery_data->suburb}}<br/>
						{{@$delivery_data->postcode}}<br>
						<abbr title="Phone">P: </abbr> {{@$delivery_data->telephone}}<br/>
						{{@$delivery_data->state}}<br/>
						{{@$delivery_data->country}}<br>
					</address>
				</div><!--end .col -->
				
				<div class="col-xs-3">
					<div class="well">
						<div class="clearfix">
							<div class="pull-left"> INVOICE NO #  </div>
							<div class="pull-right"> {{$order_data[0]->invoice_no}} </div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> ORDER DATE #  </div>
							<div class="pull-right"> 
								<?php
									$originalDate = $order_data[0]->created_at;
									echo $newDate = date("dS M y", strtotime($originalDate));
								?>
							</div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> SUB Amount : </div>
                            <div class="pull-right"> <b>{{@$order_data[0]->sub_total}} </b></div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> Discount Amount : </div>
                            <div class="pull-right"> <b>{{@$order_data[0]->total_discount_price}} </b></div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> FREIGHT Amount : </div>
                            <div class="pull-right"> <b>{{@$order_data[0]->freight_amount}} </b></div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> Left Amount : </div>
                            <div class="pull-right" style="color: red"> <b>{{@$due_amount}} </b></div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> TOTAL Amount : </div>
                            <div class="pull-right"> <b>{{@$order_data[0]->net_amount}} </b></div>
						</div>
						
						<div class="clearfix">
							<div class="pull-left"> PAID Amount : </div>
                            <div class="pull-right" style="color: green;"> <b>{{@$paid_amount->paid_amount}}</b> </div>
						</div>
					</div>
				</div><!--end .col -->
			</div>

			<div class="row">
				<div class="col-md-12">
                    <h5 style="background: orange; padding: 5px; color: black">PRODUCT HISTORY </h5>
                    <table  class="table" style="background: #efefef">
						<thead>
							<tr>
								<th>Invoice # </th>
								<th>Product Name</th>
								<th>Name / Plate Text</th>
								<th>State</th>
								<th>Birthday / Color</th>
								<th>Favourite Car / Background Color</th>
								<th>License Class / Theme</th>
								
								<th>Qty</th>
								<th class="text-right">Price</th>
								<th class="text-right">Total</th>

							</tr>
						</thead>
						<tbody>

							@if(!empty($order_data[0]->relOrderDetail))
								<?php $total = 0; ?>
								@foreach($order_data[0]->relOrderDetail as $orderdetails)
								<?php
									$product_id = $orderdetails->product_id;
									$product = DB::table('product')->where('id',$product_id)->first();

									$color_id = $orderdetails->color;
									$product_variation = DB::table('product_variation')->where('id',$color_id)->first();
								?>
									<tr>
										<td>
                                            {{$order_data[0]->invoice_no}}
                                        </td>
										<td>
											@if(count($orderdetails->licence_image))

	                                            <a style="width: 100%;    display: inline-block;" target="_blank" href="{{ URL::asset($orderdetails->licence_image) }}">
	                                                <img width="50" src="{{ URL::asset($orderdetails->licence_image) }}">
	                                            </a>
                                            
											@endif

											{{@$product->title}}
										</td>
										<td>
											{{@$orderdetails->plate_text}}
										</td>
										<td>
											{{@$orderdetails->state}}
										</td>
										<td>
											{{@$orderdetails->color}}
										</td>
										<td>
											{{@$orderdetails->background_color}}
										</td>
										<td>
											{{@$orderdetails->theme}}
										</td>
										
										<td>
											{{@$orderdetails->qty}}
										</td>
										<td class="text-right">
											{{number_format(@$orderdetails->price,2)}}
										</td>
										<td class="text-right">
											<?php
												$total+= $orderdetails->qty * $orderdetails->price;
											?>
											{{number_format( ($orderdetails->price*$orderdetails->qty), 2) }}
										</td>
									</tr>
								@endforeach
								
								<tr>
									<td colspan="7" class="text-right">
										Sub Amount
									</td>
									<td colspan="3" class="text-right">
										{{number_format(@$order_data[0]->sub_total,2)}}
									</td>
								</tr>
								<tr>
									<td colspan="7" class="text-right">
										Discount Amount
									</td>
									<td colspan="3" class="text-right">
										{{number_format(@$order_data[0]->total_discount_price,2 )}}
									</td>
								</tr>
								<tr>
									<td colspan="7" class="text-right">
										Freight Amount
									</td>
									<td colspan="3" class="text-right">
										{{number_format(@$order_data[0]->freight_amount,2 )}}
									</td>
								</tr>
								<tr>
									<td colspan="7" class="text-right">
										Total Amount
									</td>
									<td colspan="3" class="text-right">
										{{number_format(@$order_data[0]->net_amount, 2)}}
									</td>
								</tr>
							@endif
                        </tbody>
                    </table>

                    <h5 style="background: orange; padding: 5px; color: black">PAYMENT HISTORY </h5>
                    <table  class="table" style="background: #efefef">
                        <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <th>Transaction NO#</th>
                            <th>Payment Method Name</th>
                            <th>Payment Method Address</th>
                            <th>Payment Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($order_data[0]->relOrderPaymentTransaction))
                            <?php $total = 0; ?>
                            @foreach($order_data[0]->relOrderPaymentTransaction as $order_trn)

                                <tr>
                                    <td>
                                        {{$order_data[0]->invoice_no}}
                                    </td>
                                    <td>
                                        {{@$order_trn->payment_type}}
                                    </td>
                                    <td>
                                        {{number_format(@$order_trn->amount, 2)}}
                                    </td>
                                    <td>
                                        {{@$order_trn->transaction_no}}
                                    </td>
                                    <td>
                                        {{@$order_trn->gateway_name}}
                                    </td>
                                    <td>
                                        {{@$order_trn->gateway_address}}
                                    </td>
                                    <td>
                                        {{@$order_trn->created_at}}
                                    </td>
                                    <td>
                                        <b>{{@$order_trn->status}}</b>
                                    </td>

                                    <td>
                                    	@if(@$order_trn->status != "cancel")
                                    	@if(@$order_trn->status != "approved")
                                        <a href="{{ route('approve-lay-by-transaction', @$order_trn->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to Approve?')" title="Approved"><i class="icon-check"></i></a>
                                        <a href="{{ route('cancel-lay-by-payment', @$order_trn->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Cancel?')" title="Cancel"><i class="icon-trash"></i></a>
                                        @endif
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

				</div><!--end .col -->
			</div>
	    </div>

	</div>
</div>


<!-- print the product -->
<div class="print_wrap" style="display:none;width:100%;float:left;">
	<div id="print_verification_letter">
		<table border="0" cellspacing="0" cellpadding="0" style="font-size:14px;width:100%;font-family:'arial';color:#000;line-height:20px;">
			<tr>
				<td colspan="4">
					{!! HTML::image('web/images/logo.png', 'Asims Toys', ['width'=>150]) !!}
				</td>
			</tr>
			<tr>
				<td valign="top" style="width:15%;">
					<h4 style="font-size:18px;margin-bottom:20px;margin-top:20px;">Prepared by</h4>
						<strong style="font-size:13px;margin-bottom:5px;">Asim's Toys</strong>
						<div style="font-size:13px;">Sydney<br>
						Australia<br></div>						
				</td>

				<td valign="top" style="width:20%;">
					<h4 style="font-size:18px;margin-bottom:20px;margin-top:20px;">Prepared for</h4>
					
						<strong>Billing Address</strong><br><br/>
						<strong>{{@$customer_data->first_name}} {{@$customer_data->last_name}}</strong><br>
						{{@$customer_data->email}}<br/><br/>
						{{@$customer_data->address}}<br/>
						{{@$customer_data->suburb}}<br/>
						{{@$customer_data->postcode}}<br>
						<abbr title="Phone">P: </abbr> {{@$customer_data->telephone}}<br/>
						{{@$customer_data->state}}<br/>
						{{@$customer_data->country}}<br>
					
				</td>

				<td valign="top" style="width:20%;">
					<h4 style="font-size:18px;margin-bottom:20px;margin-top:20px;">&nbsp;</h4>
					
						<strong>Delivery Address</strong><br><br/>
						<strong>{{@$delivery_data->first_name}} {{@$delivery_data->last_name}}</strong><br>
						{{@$delivery_data->address}}<br/>
						{{@$delivery_data->suburb}}<br/>
						{{@$delivery_data->postcode}}<br>
						<abbr title="Phone">P: </abbr> {{@$delivery_data->telephone}}<br/>
						{{@$delivery_data->state}}<br/>
						{{@$delivery_data->country}}<br>
					
				</td>

				<td valign="top" style="width:25%;">

					<div style="margin-top:20px;">
						<div style="width:100%;float:left;border-bottom:1px solid #e3e3e3;padding-bottom:5px;margin-bottom:5px;">
							<div style="width:50%;float:left;"> INVOICE NO #  </div>
							<div style="width:50%;float:left;text-align:right;"> {{$order_data[0]->invoice_no}} </div>
						</div>
						<div style="width:100%;float:left;border-bottom:1px solid #e3e3e3;padding-bottom:5px;margin-bottom:5px;">
							<div style="width:50%;float:left;"> ORDER DATE #  </div>
							<div style="width:50%;float:left;text-align:right;"> 
								<?php
									$originalDate = $order_data[0]->created_at;
									echo $newDate = date("dS M y", strtotime($originalDate));
								?>
							</div>
						</div>
						<div style="width:100%;float:left;border-bottom:1px solid #e3e3e3;padding-bottom:5px;margin-bottom:5px;">
							<div style="width:50%;float:left;"> SUB Amount : </div>
                            <div style="width:50%;float:left;text-align:right;"> <b>{{@$order_data[0]->sub_total}} </b></div>
						</div>
						<div style="width:100%;float:left;border-bottom:1px solid #e3e3e3;padding-bottom:5px;margin-bottom:5px;">
							<div style="width:50%;float:left;"> Discount Amount : </div>
                            <div style="width:50%;float:left;text-align:right;"> <b>{{@$order_data[0]->total_discount_price}} </b></div>
						</div>
						<div style="width:100%;float:left;border-bottom:1px solid #e3e3e3;padding-bottom:5px;margin-bottom:5px;">
							<div style="width:50%;float:left;"> FREIGHT Amount : </div>
                            <div style="width:50%;float:left;text-align:right;"> <b>{{@$order_data[0]->freight_amount}} </b></div>
						</div>
						<div style="width:100%;float:left;border-bottom:1px solid #e3e3e3;padding-bottom:5px;margin-bottom:5px;">
							<div style="width:50%;float:left;"> Left Amount : </div>
                            <div style="width:50%;float:left;text-align:right;color: red"> <b>{{@$due_amount}} </b></div>
						</div>
						<div style="width:100%;float:left;border-bottom:1px solid #e3e3e3;padding-bottom:5px;margin-bottom:5px;">
							<div style="width:50%;float:left;"> TOTAL Amount : </div>
                            <div style="width:50%;float:left;text-align:right;"> <b>{{@$order_data[0]->net_amount}} </b></div>
						</div>
						
						<div style="width:100%;float:left;border-bottom:1px solid #e3e3e3;padding-bottom:5px;margin-bottom:5px;">
							<div style="width:50%;float:left;"> PAID Amount : </div>
                            <divstyle="width:50%;float:left;text-align:right;color: green;"> <b>{{@$paid_amount->paid_amount}}</b> </div>
						</div>
					</div>

				</td>

			</tr>

		</table>


		<h5 style="background: orange;font-family:'arial'; padding: 5px; color: black">PRODUCT HISTORY </h5>
        <table  class="table" cellpadding="10" style="font-size:14px;width:100%;font-family:'arial';color:#000;line-height:20px;background:#efefef;">
			<thead>
				<tr style="border-bottom:1px solid #e3e3e3;">
					<th style="border-bottom:1px solid #e3e3e3;">Invoice # </th>
					<th style="border-bottom:1px solid #e3e3e3;">Product Name</th>
					<th style="border-bottom:1px solid #e3e3e3;">Color</th>
					<th style="border-bottom:1px solid #e3e3e3;">Background Color</th>
					<th style="border-bottom:1px solid #e3e3e3;">Plate Text</th>
					<th style="border-bottom:1px solid #e3e3e3;">Qty</th>
					<th style="border-bottom:1px solid #e3e3e3;" class="text-right">Price</th>
					<th style="border-bottom:1px solid #e3e3e3;" class="text-right">Total</th>

				</tr>
			</thead>
			<tbody>

				@if(!empty($order_data[0]->relOrderDetail))
					<?php $total = 0; ?>
					@foreach($order_data[0]->relOrderDetail as $orderdetails)
					<?php
						$product_id = $orderdetails->product_id;
						$product = DB::table('product')->where('id',$product_id)->first();

						$color_id = $orderdetails->color;
						$product_variation = DB::table('product_variation')->where('id',$color_id)->first();
					?>
						<tr style="border-bottom:1px solid #e3e3e3;">
							<td style="border-bottom:1px solid #e3e3e3;">
                                {{$order_data[0]->invoice_no}}
                            </td>
							<td style="border-bottom:1px solid #e3e3e3;">
								{{@$product->title}}
							</td>
							<td style="border-bottom:1px solid #e3e3e3;">
								{{@$orderdetails->color}}
							</td>
							<td style="border-bottom:1px solid #e3e3e3;">
								{{@$orderdetails->background_color}}
							</td>
							<td style="border-bottom:1px solid #e3e3e3;">
								{{@$orderdetails->plate_text}}
							</td>
							<td style="border-bottom:1px solid #e3e3e3;">
								{{@$orderdetails->qty}}
							</td>
							<td style="border-bottom:1px solid #e3e3e3;" class="text-right">
								{{number_format(@$orderdetails->price,2)}}
							</td>
							<td style="border-bottom:1px solid #e3e3e3;" class="text-right">
								<?php
									$total+= $orderdetails->qty * $orderdetails->price;
								?>
								{{number_format( ($orderdetails->price*$orderdetails->qty), 2) }}
							</td>
						</tr>
					@endforeach
					
					<tr >
						<td colspan="6" style="border-bottom:1px solid #e3e3e3;text-align:right;">
							Sub Amount
						</td>
						<td colspan="2" style="border-bottom:1px solid #e3e3e3;text-align:right;">
							{{number_format(@$order_data[0]->sub_total,2)}}
						</td>
					</tr>
					<tr style="border-bottom:1px solid #e3e3e3;">
						<td style="border-bottom:1px solid #e3e3e3;text-align:right;" colspan="6" class="text-right">
							Discount Amount
						</td>
						<td style="border-bottom:1px solid #e3e3e3;text-align:right;" colspan="2" class="text-right">
							{{number_format(@$order_data[0]->total_discount_price,2 )}}
						</td>
					</tr>
					<tr style="border-bottom:1px solid #e3e3e3;">
						<td style="border-bottom:1px solid #e3e3e3;text-align:right;" colspan="6" class="text-right">
							Freight Amount
						</td>
						<td style="border-bottom:1px solid #e3e3e3;text-align:right;" colspan="2" class="text-right">
							{{number_format(@$order_data[0]->freight_amount,2 )}}
						</td>
					</tr>
					<tr style="border-bottom:1px solid #e3e3e3;">
						<td style="border-bottom:1px solid #e3e3e3;text-align:right;" colspan="6" class="text-right">
							Total Amount
						</td>
						<td style="border-bottom:1px solid #e3e3e3;text-align:right;" colspan="2" class="text-right">
							{{number_format(@$order_data[0]->net_amount, 2)}}
						</td>
					</tr>
				@endif
            </tbody>
        </table>

        <h5 style="background: orange; padding: 5px; color: black;font-family:'arial';">PAYMENT HISTORY </h5>
         <table  class="table" cellpadding="10" style="font-size:14px;width:100%;font-family:'arial';color:#000;line-height:20px;background:#efefef;">
            <thead>
            <tr>
                <th style="border-bottom:1px solid #e3e3e3;">Invoice #</th>
                <th style="border-bottom:1px solid #e3e3e3;">Payment Type</th>
                <th style="border-bottom:1px solid #e3e3e3;">Amount</th>
                <th style="border-bottom:1px solid #e3e3e3;">Transaction NO#</th>
                <th style="border-bottom:1px solid #e3e3e3;">Payment Method Name</th>
                <th style="border-bottom:1px solid #e3e3e3;">Payment Method Address</th>
                <th style="border-bottom:1px solid #e3e3e3;">Payment Date</th>
                <th style="border-bottom:1px solid #e3e3e3;">Status</th>
                <th style="border-bottom:1px solid #e3e3e3;">Action</th>
            </tr>
            </thead>
            <tbody>

            @if(!empty($order_data[0]->relOrderPaymentTransaction))
                <?php $total = 0; ?>
                @foreach($order_data[0]->relOrderPaymentTransaction as $order_trn)

                    <tr>
                        <td style="border-bottom:1px solid #e3e3e3;">
                            {{$order_data[0]->invoice_no}}
                        </td>
                        <td style="border-bottom:1px solid #e3e3e3;">
                            {{@$order_trn->payment_type}}
                        </td>
                        <td style="border-bottom:1px solid #e3e3e3;">
                            {{number_format(@$order_trn->amount, 2)}}
                        </td>
                        <td style="border-bottom:1px solid #e3e3e3;">
                            {{@$order_trn->transaction_no}}
                        </td>
                        <td style="border-bottom:1px solid #e3e3e3;">
                            {{@$order_trn->gateway_name}}
                        </td>
                        <td style="border-bottom:1px solid #e3e3e3;">
                            {{@$order_trn->gateway_address}}
                        </td>
                        <td style="border-bottom:1px solid #e3e3e3;">
                            {{@$order_trn->created_at}}
                        </td>
                        <td style="border-bottom:1px solid #e3e3e3;">
                            <b>{{@$order_trn->status}}</b>
                        </td>

                        <td style="border-bottom:1px solid #e3e3e3;">
                        	@if(@$order_trn->status != "cancel")
                        	@if(@$order_trn->status != "approved")
                            <a href="{{ route('approve-lay-by-transaction', @$order_trn->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to Approve?')" title="Approved"><i class="icon-check"></i></a>
                            <a href="{{ route('cancel-lay-by-payment', @$order_trn->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Cancel?')" title="Cancel"><i class="icon-trash"></i></a>
                            @endif
                            @endif
                        </td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

	</div>
</div>

<script>
	
	 $('.print_the_pages').on('click',function(){
            PrintDiv();
            return false;
        });

	 function PrintDiv() {    
           var divToPrint = $('#print_verification_letter');
           //console.log(divToPrint.html());
           var popupWin = window.open('', 'width=900,height=500');
           popupWin.document.open();
           popupWin.document.write('<html><body onload=\"window.focus(); window.print(); window.close()\">' + divToPrint.html() + '</html>');
           popupWin.document.close();
        }

</script>