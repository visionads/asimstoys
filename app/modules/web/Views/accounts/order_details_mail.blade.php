<table style="width:100%;float:left;margin-top: 30px;margin-bottom:30px;font-family: 'arial';" cellspacing="0">
	<tr>
		<td style="text-align:left;font-size:20px;">
			Invoice Number is: {{$invoice_no}}
		</td>
		<td style="text-align:right;font-size:20px;">
			Order Date:
			<?php
				$originalDate = $order_head->created_at;
				echo $newDate = date("dS F Y, h:s A", strtotime($originalDate));
			?>
		</td>
	</tr>
</table>

<table style="width:100%;float:left;margin-top: 10px;margin-bottom:20px;font-family: 'arial';" cellspacing="0">
	<tr>
		<td style="text-align: right;color: darkblue;text-transform: uppercase;padding-bottom: 5px;">Sub Amount:</td>
		<td style="color: darkblue;text-align: right;width: 100px;padding-right: 15px;padding-bottom: 5px;">{{number_format(@$total_amount->total_amount, 2)}}</td>
	</tr>
	<tr>
		<td style="text-align: right;color: darkblue;text-transform: uppercase;    padding-bottom: 5px;">Freight Amount:</td>
		<td style="color: darkblue;text-align: right;width: 100px;padding-right: 15px;    padding-bottom: 5px;">{{number_format(@$freight_data->freight_amount, 2)}}</td>
	</tr>
	<tr>
		<td style="text-align: right;color: darkblue;text-transform: uppercase;    padding-bottom: 5px;">Total Amount:</td>
		<td style="color: darkblue;text-align: right;width: 100px;padding-right: 15px;    padding-bottom: 5px;">{{number_format(@$total_amount->total_amount + @$freight_data->freight_amount, 2)}}</td>
	</tr>
	<tr>
		<td style="text-align: right;color: red;text-transform: uppercase;    padding-bottom: 5px;">Left Amount:</td>
		<td style="color: red;text-align: right;width: 100px;padding-right: 15px;    padding-bottom: 5px;">{{number_format(@$due_amount,2)}}</td>
	</tr>
	<tr>
		<td style="text-align: right;color: green;text-transform: uppercase;    padding-bottom: 5px;">Paid Amount:</td>
		<td style="color: green;text-align: right;width: 100px;padding-right: 15px;    padding-bottom: 5px;">{{number_format(@$paid_amount->paid_amount, 2) }}</td>
	</tr>
</table>

<div style="font-family: 'arial';color: green;text-transform: uppercase;width: 100%;float: left;margin-bottom: 20px;">Invoice History</div>

<table style="width:100%;float:left;font-family: 'arial';margin-bottom:30px;" cellspacing="0">
	<thead style="background:#ffc947;color:#fff;">
		<tr>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Order Invoice </td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Product Name</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Variation</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Quantity</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Color</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Background Color</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Plate Text</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;">Price</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;">Total Price</td>
		</tr>
	</thead>
	<tbody>
			
		@foreach($order as $order)
		
			@foreach($order->relOrderDetail as $order_dt)
			
				<tr>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">
						{{ isset(\App\OrderHead::findOrFail($order_dt->order_head_id)->invoice_no)? \App\OrderHead::findOrFail($order_dt->order_head_id)->invoice_no : $order_dt->order_head_id}}</td>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">
					{{ isset(\App\Product::findOrFail($order_dt->product_id)->title)?\App\Product::findOrFail($order_dt->product_id)->title :  $order_dt->product_id }}
					</td>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{ isset($order_dt->product_variation_id)?$order_dt->product_variation_id:null}}</td>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{isset($order_dt->qty)?$order_dt->qty:null}}</td>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{isset($order_dt->product_variation_id)?$order_dt->product_variation_id:null}}</td>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{isset($order_dt->background_color)?$order_dt->background_color:null}}</td>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{isset($order_dt->plate_text)?$order_dt->plate_text:null}}</td>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;">{{isset($order_dt->price)?$order_dt->price:null}}</td>
					<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;">{{$order_dt->price*$order_dt->qty}}</td>
				</tr>
			
			@endforeach
		
		@endforeach

	</tbody>
               
	
</table>

<div style="font-family: 'arial';color: green;text-transform: uppercase;width: 100%;float: left;margin-bottom: 20px;">Payment History</div>

<table style="width:100%;float:left;font-family: 'arial';" cellspacing="0">
	<thead style="background:#ffc947;color:#fff;">
		<tr>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Invoice No</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Date</td>
			<td style="padding: 10px;text-align:right;border:1px solid rgba(200,200,200,.4);">Amount</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Status</td>
		</tr>
	</thead>
	<tbody>
	@if($order_pay_trn)
		@foreach($order_pay_trn as $values)
		<tr>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{ isset(\App\OrderHead::findOrFail($values->order_head_id)->invoice_no)?\App\OrderHead::findOrFail($values->order_head_id)->invoice_no:null}}</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{ isset($values->date)?$values->date: null }}</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;">{{ isset($values->amount)? number_format($values->amount, 2) : null  }}</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{ isset($values->status)?$values->status:null }}</td>
		</tr>
		@endforeach
	@endif
	</tbody>
</tbody>

<table style="width:100%;float:left;margin-top: 30px;font-family: 'arial';" cellspacing="0">
	<thead style="background:#ffc947;color:#fff;">
		<tr>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Billing Address</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Delivery Address</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">
				<?php
					echo $customer->first_name . ' ' .$customer->last_name . '<br/><br/>';
					echo $customer->address . '<br/>';
					echo $customer->suburb. ' '.$customer->state . ' '.$customer->postcode.'<br/>';
					echo $customer->country. '<br/>';
					echo $customer->telephone;
;				?>
			</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">
				<?php
					echo $delivery_details->first_name . ' ' .$delivery_details->last_name . '<br/><br/>';
					echo $delivery_details->address . '<br/>';
					echo $delivery_details->suburb. ' '.$delivery_details->state . ' '.$delivery_details->postcode.'<br/>';
					echo $delivery_details->country. '<br/>';
					echo $delivery_details->telephone;
;				?>
			</td>
		</tr>
	</tbody>
</table>