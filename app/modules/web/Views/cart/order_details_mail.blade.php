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
<table style="width:100%;float:left;font-family: 'arial';" cellspacing="0">
	<thead style="background:#ffc947;color:#fff;">
		<tr>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Item</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Qty</td>
			<td style="padding: 10px;text-align:right;border:1px solid rgba(200,200,200,.4);">Unit Price</td>
			<td style="padding: 10px;text-align:rightborder:1px solid rgba(200,200,200,.4);;">Line Total</td>
		</tr>
	</thead>
	<tbody>
		
		<?php
			$total_value = 0;
			$count = 0;
			$total_freight_charge = 0;
		?>
		
		@foreach($product_cart_r as $product_cart)
			<?php			
				$product_id = $product_cart->product_id;
				$product = DB::table('product')->where('id',$product_id)->first();
				
				$total_value += $product_cart->price * $product_cart->qty;
			?>
			<tr>
				<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);font-size: 13px;">{{$product->title}}</td>
				<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);font-size: 13px;">{{$product_cart->qty}}</td>
				<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;font-size: 13px;">{{$product_cart->price}}</td>
				<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;font-size: 13px;">{{$product_cart->price * $product_cart->qty}}</td>
			</tr>
		
		@endforeach
		
			<tr>
				<td colspan="3" style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;font-size: 13px;">Sub Total</td>
				<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;font-size: 13px;">{{$total_value}}</td>
			</tr>
			
			<tr>
				<td colspan="3" style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;font-size: 13px;">Freight Charge</td>
				<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;font-size: 13px;">{{$order_head->freight_amount}}</td>
			</tr>
			
			<tr>
				<td colspan="3" style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;font-size: 13px;">Total Amount</td>
				<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);text-align:right;font-size: 13px;">{{$total_value + $order_head->freight_amount}}</td>
			</tr>
									
	</tbody>
</table>

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