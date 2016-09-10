 @if(Session::has('flash_message'))
	<div class="alert alert-success">
		<p>{{ Session::get('flash_message') }}</p>
	</div>
@endif
@if(Session::has('flash_message_error'))
	<div class="alert alert-danger">
		<p>{{ Session::get('flash_message_error') }}</p>
	</div>
@endif

<div class="accounts-billing-info">
	<h2>Billing Information</h2>
	<a class="btn-sm btn-info pull-right" data-toggle="modal" href="#addData" title="Add">
                    <strong>Edit</strong>
                </a>
	<table class="table">
		<tr>
			<td>Name</td>
			<td> {{$get_customer_data->first_name}}  {{$get_customer_data->last_name}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td> {{$get_customer_data->email}}</td>
		</tr>
		<tr>
			<td>Telephone</td>
			<td> {{$get_customer_data->telephone}}</td>
		</tr>
		<tr>
			<td>Suburb</td>
			<td> {{$get_customer_data->suburb}}</td>
		</tr>
		<tr>
			<td>Postcode</td>
			<td> {{$get_customer_data->postcode}}</td>
		</tr>
		<tr>
			<td>State</td>
			<td> {{$get_customer_data->state}}</td>
		</tr>
		<tr>
			<td>Address</td>
			<td> {{$get_customer_data->address}}</td>
		</tr>
		<tr>
			<td>Country</td>
			<td> {{$get_customer_data->country}}</td>
		</tr>
	</table>
</div>

<div class="accounts-billing-info">
	<h2>Delivery Information</h2>
	<a class="btn-sm btn-info pull-right" data-toggle="modal" href="#updateData" title="Add">
		<strong>
			@if(!empty($delivery_details))
				Edit
			@else
				Add
			@endif
		</strong>
	</a>
				
	@if(!empty($delivery_details))
		<table class="table">
			<tr>
				<td>Name</td>
				<td> {{@$delivery_details->first_name}}  {{@$delivery_details->last_name}}</td>
			</tr>
			<tr>
				<td>Email</td>
				<td> {{@$delivery_details->email}}</td>
			</tr>
			<tr>
				<td>Telephone</td>
				<td> {{@$delivery_details->telephone}}</td>
			</tr>
			<tr>
				<td>Suburb</td>
				<td> {{@$delivery_details->suburb}}</td>
			</tr>
			<tr>
				<td>Postcode</td>
				<td> {{@$delivery_details->postcode}}</td>
			</tr>
			<tr>
				<td>State</td>
				<td> {{@$delivery_details->state}}</td>
			</tr>
			<tr>
				<td>Address</td>
				<td> {{@$delivery_details->address}}</td>
			</tr>
			<tr>
				<td>Country</td>
				<td> {{@$delivery_details->country}}</td>
			</tr>
		</table>
	@endif
</div>



<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 60%;">
        <div class="modal-content" style="width:100%;float:left;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Edit Billing Information
            </div>
            <div class="modal-body">
                
				{!! Form::open(['route' => 'edit-billing-info']) !!}
                   @include('web::accounts.edit_billing_info')
                {!! Form::close() !!}
				
            </div>

        </div>
    </div>
</div>
<!-- modal -->

<div class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 60%;">
        <div class="modal-content" style="width:100%;float:left;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                Edit Delivery Information
            </div>
            <div class="modal-body">
                
				{!! Form::open(['route' => 'edit-delivery-info']) !!}
					@if(!empty($delivery_details))
						@include('web::accounts.edit_delivery_info')
					@else
						@include('web::accounts.add_delivery_info')
					@endif
                   
                {!! Form::close() !!}
				
            </div>

        </div>
    </div>
</div>
<!-- update modal -->

