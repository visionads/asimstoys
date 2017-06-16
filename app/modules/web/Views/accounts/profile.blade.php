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

<div class="my-body">

    <div class="col-md-6 col-xs-12">

        <div class="billing_address">
            <div class="header">BILLING ADDRESS</div>

            <div class="details">
            	<p>
            		{{$get_customer_data->first_name}}  {{$get_customer_data->last_name}}
            	</p>
            	<p>
            		{{$get_customer_data->email}}
            	</p>
            	<p>
            		Phone :: {{$get_customer_data->telephone}}
            	</p>
            	<p>
            		Suburb :: {{$get_customer_data->suburb}}
            	</p>
            	<p>
            		Postcode :: {{$get_customer_data->postcode}}
            	</p>
            	<p>
            		State :: {{$get_customer_data->state}}
            	</p>
            	<p>
            		Address :: {{$get_customer_data->address}}
            	</p>
            	<p>
            		{{$get_customer_data->country}}
            	</p>
            </div>

        </div>

        <!-- Billing Info modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".billing_info-modal">Edit</button>

    </div>


    <div class="col-md-6 col-xs-12">

    	<div class="billing_address">

    		<div class="header">DELIVERY ADDRESS</div>

    		@if(!empty($delivery_details))

    			<div class="details">
    				<p>
    					{{@$delivery_details->first_name}}  {{@$delivery_details->last_name}}
    				</p>
    				<p>
    					{{@$delivery_details->email}}
    				</p>
    				<p>
    					Phone :: {{@$delivery_details->telephone}}
    				</p>
    				<p>
    					Suburb :: {{@$delivery_details->suburb}}
    				</p>
    				<p>
    					PostCode :: {{@$delivery_details->postcode}}
    				</p>
    				<p>
    					State :: {{@$delivery_details->state}}
    				</p>
    				<p>
    					Address :: {{@$delivery_details->address}}
    				</p>
    				<p>
    					{{@$delivery_details->country}}
    				</p>
    			</div>

    		@endif

    		

    	</div>

    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".delivery-info-modal">
			@if(!empty($delivery_details))
				Edit
			@else
				Add
			@endif
		</button>

    </div>

</div>



<!-- Billing Info Modal -->

<div class="modal fade billing_info-modal" tabindex="-1" role="dialog" aria-labelledby="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">

				<h1>Billing Info</h1>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>

			{!! Form::open(['route' => 'edit-billing-info', 'class' => 'form']) !!}
               @include('web::accounts.edit_billing_info')
            {!! Form::close() !!}

		</div>
	</div>
</div>

<div class="modal fade delivery-info-modal" tabindex="-1" role="dialog" aria-labelledby="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">

				<h1>Delivery Info</h1>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>

			{!! Form::open(['route' => 'edit-delivery-info' ,'class' => 'form']) !!}
				@if(!empty($delivery_details))
					@include('web::accounts.edit_delivery_info')					
				@else
					@include('web::accounts.add_delivery_info')
				@endif
               
            {!! Form::close() !!}

		</div>
	</div>
</div>

<!-- update modal -->