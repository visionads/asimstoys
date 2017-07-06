
<div class="modal-dialog" id="print_page" style="width: 75%;">
	<div class="modal-content" style="float: left;width: 100%;" >
            <button style="padding: 10px;position: relative;z-index: 99;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <div class="modal-body">
	      
	      	<div class="col-xs-8">
				<a href="#" id="header_logo">
                    {!! HTML::image('web/images/logo.png', 'Asims Toys', array( 'width' => 150)) !!}
				</a>
			</div>
			<div class="col-xs-4 text-right" style="margin-bottom:20px;">
				<h1 class="text-light text-default-light">Invoice</h1>
			</div>

			<div class="row">
				<div class="col-xs-4">
					<h4 class="text-light">Prepared by</h4>
					<address>
						<strong>Asim's Toys</strong><br>
						Sydney<br>
						Australia<br>
						
					</address>
				</div><!--end .col -->
				<div class="col-xs-4">
					<h4 class="text-light">Prepared for</h4>
					<address>
						<strong>{{@$customer_data->first_name}} {{@$customer_data->last_name}}</strong><br>
						{{@$customer_data->email}}<br/>
						{{@$customer_data->address}}<br/>
						{{@$customer_data->suburb}}<br/>
						{{@$customer_data->postcode}}<br>
						<abbr title="Phone">P: </abbr> {{@$customer_data->telephone}}<br/>
						{{@$customer_data->state}}<br/>
						{{@$customer_data->country}}<br>
						
						
					</address>
				</div><!--end .col -->
				<div class="col-xs-4">
					<div class="well">
						<div class="clearfix">
							<div class="pull-left"> INVOICE NO #  </div>
							<div class="pull-right"> {{@$order_data[0]->invoice_no}} </div>
						</div>
						<div class="clearfix">
							<div class="pull-left"> INVOICE DATE : </div>
                            <div class="pull-right"> {{@$order_data[0]->created_at}} </div>
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
								<th>Product Name</th>
								<th>Color</th>
								<th>Plate Text</th>
								<th>Qty</th>
								<th class="text-right">price</th>
								<th class="text-right">Total</th>
								
							</tr>
						</thead>
						<tbody>

							@if(!empty(@$order_data[0]->relOrderDetail))
								<?php $total = 0; ?>
								@foreach(@$order_data[0]->relOrderDetail as $orderdetails)
								<?php
									$product_id = $orderdetails->product_id;
									$product = DB::table('product')->where('id',$product_id)->first();

									$color_id = $orderdetails->color;
									$product_variation = DB::table('product_variation')->where('id',$color_id)->first();
								?>
									<tr>
										<td>
											@if(count($orderdetails->licence_image))

	                                            <a style="width: 100%;    display: inline-block;" target="_blank" href="{{ URL::asset($orderdetails->licence_image) }}">
	                                                <img width="50" src="{{ URL::asset($orderdetails->licence_image) }}">
	                                            </a>
                                            
											@endif
											{{@$product->title}}
										</td>
										<td>
											{{@$product_variation->title}}
										</td>

										<td>
											{{@$orderdetails->plate_text}}
										</td>
										<td>
											{{@$orderdetails->qty}}
										</td>
										<td class="text-right">
											{{number_format($orderdetails->price,2)}}
										</td>
										<td class="text-right">
											<?php
												$total+= $orderdetails->qty * $orderdetails->price;
											?>
											{{number_format($orderdetails->price*$orderdetails->qty,2)}}
										</td>
									</tr>
								@endforeach
							@endif

                            <tr><td colspan="5" style="border-top: 0px"></td></tr>
                            <tr><td colspan="5" style="border-top: 0px"></td></tr>
							<tr>
								<td colspan="4" >
									&nbsp;
								</td>
								<td class="text-right"><strong>Subtotal</strong></td>
								<td class="text-right">$ {{number_format(@$total,2)}}</td>
							</tr>
							<tr>
								<td colspan="2" >
									&nbsp;
								</td>
								<td class="text-right" colspan="2" style="text-align: right"><strong>Freight Charge</strong></td>
								<td class="text-right" colspan="2">$ {{number_format(@$order_data[0]->freight_amount,2)}}</td>
							</tr>
							<tr>
								<td colspan="4" >
									&nbsp;
								</td>
								<td class="text-right"><strong>GST</strong></td>
								<td class="text-right">$ {{number_format(@$order_data[0]->vat,2)}}</td>
							</tr>
							<tr>
								<td colspan="4" >
									&nbsp;
								</td>
								<td class="text-right"><strong>Total</strong></td>
								<td class="text-right">$ {{number_format(@$order_data[0]->net_amount,2)}}</td>
							</tr>
							
						</tbody>
					</table>
				</div><!--end .col -->
			</div>
	    </div>

	</div>
</div>