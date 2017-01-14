
<div class="modal-dialog" id="print_page" style="width: 75%;">
	<div class="modal-content" style="float: left;width: 100%;" >
           
            <a href="" class="btn" type="button" style="float:right;position:relative;z-index:99;cursor:pointerl"> X </a>
	    <div class="modal-body">
	      
	      	<div class="col-xs-8">
				<a href="#" id="header_logo">
                    {!! HTML::image('web/images/logo.png', 'Asims Toys', ['width'=>150]) !!}
				</a>
			</div>
			<div class="col-xs-4 text-right" style="margin-bottom:20px;">
				<h1 class="text-light text-default-light">Invoice</h1>
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
							<div class="pull-left"> TOTAL Amount : </div>
                            <div class="pull-right"> <b>{{@$order_data[0]->net_amount}} </b></div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> Left Amount : </div>
                            <div class="pull-right" style="color: red"> <b>{{@$due_amount}} </b></div>
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
								<th>Color</th>
								<th>Background Color</th>
								<th>Plate Text</th>
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
											{{@$product->title}}
										</td>
										<td>
											{{@$orderdetails->color}}
										</td>
										<td>
											{{@$orderdetails->background_color}}
										</td>
										<td>
											{{@$orderdetails->plate_text}}
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
									<td colspan="6" class="text-right">
										Sub Amount
									</td>
									<td colspan="2" class="text-right">
										{{number_format(@$order_data[0]->sub_total,2)}}
									</td>
								</tr>
								<tr>
									<td colspan="6" class="text-right">
										Discount Amount
									</td>
									<td colspan="2" class="text-right">
										{{number_format(@$order_data[0]->total_discount_price,2 )}}
									</td>
								</tr>
								<tr>
									<td colspan="6" class="text-right">
										Freight Amount
									</td>
									<td colspan="2" class="text-right">
										{{number_format(@$order_data[0]->freight_amount,2 )}}
									</td>
								</tr>
								<tr>
									<td colspan="6" class="text-right">
										Total Amount
									</td>
									<td colspan="2" class="text-right">
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