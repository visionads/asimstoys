<table style="width:100%;float:left;margin-top: 30px;margin-bottom:30px;font-family: 'arial';" cellspacing="0">
	<tr>
		<td style="text-align:center;font-size:20px;">
			Invoice Number is: {{$invoice_no}}
		</td>
	</tr>
</table>

<table style="width:100%;float:left;font-family: 'arial';" cellspacing="0">
	<thead style="background:#ffc947;color:#fff;">
		<tr>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Invoice No</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Customer Name</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Date</td>
			<td style="padding: 10px;text-align:right;border:1px solid rgba(200,200,200,.4);">Amount</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">Status</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{$invoice_no}}</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{$customer->first_name}} {{$customer->last_name}}</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{$order_trn->date}}</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{$order_trn->amount}}</td>
			<td style="padding: 10px;border:1px solid rgba(200,200,200,.4);">{{$order_trn->status}}</td>
		</tr>
	</tbody>
</tbody>