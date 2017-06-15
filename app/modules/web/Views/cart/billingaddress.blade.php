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
						<div class="step-text ">
							<div class="header">Step 1</div>
							<div class="your-basket">my basket</div>
						</div>
					</div>

					<div class="step ">
						<div class="step_images">
							<img src="{{URL::to('/')}}/web/images/step2.png">
						</div>
						<div class="step-text active">
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

							
				<div class="col-md-12">

					@if(Session::has('flash_message_error'))
		                <div class="alert alert-success">
		                    <p>Email already presents</p>
		                </div>
		            @endif


					{!! Form::open(['route' => 'customer-billing-detail', 'class' => 'form']) !!}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

						{!! Form::email('email', $data->email, ['id'=>'email', 'class' => '','required', 'placeholder' => 'Email Address']) !!}
						{!! Form::text('first_name', $data->first_name, ['id'=>'first_name', 'class' => 'input-left','required' ,'placeholder' => 'First Name']) !!}

						<select id="state_id" class="input-right " required="required" name="state">
							@if(empty($data))
								<option value="" selected="selected">Please select state</option>
							@endif							
							
							@if(!empty($state_data))
								@foreach($state_data as $state)												
									<option <?php if($data->state == $state->state){echo 'selected';} ?> value="{{$state->state}}">{{$state->state}}</option>
								@endforeach
							@endif
						</select>

						{!! Form::text('last_name', $data->last_name, ['id'=>'last_name', 'class' => 'input-left','required', 'placeholder' => 'Last Name']) !!}

						<select id="post_code" class="input-right" required="required" name="postcode">

							@if(empty($data))
								<option value="" selected="selected">Please select post code</option>
							@endif
																			
							@if(!empty($postcode_data))
								@foreach($postcode_data as $postcode)												
									<option <?php if($data->postcode == $postcode->postcode){echo 'selected';} ?> value="{{$postcode->postcode}}">{{$postcode->postcode}}</option>
								@endforeach
							@endif											
							
						</select>

						{!! Form::text('telephone', $data->telephone, ['id'=>'telephone', 'class' => 'input-left','required', 'placeholder' => 'Telephone']) !!}

						<select id="suburb" class="input-right " required="required" name="suburb">
								@if(empty($data))
									<option value="" selected="selected">Please select suburb</option>
								@endif
																				
								@if(!empty($suburb_data))
									@foreach($suburb_data as $suburb)												
										<option <?php if($data->suburb == $suburb->suburb){echo 'selected';} ?> value="{{$suburb->suburb}}">{{$suburb->suburb}}</option>
									@endforeach
								@endif											
								
						</select>

						{!! Form::Select('country',array('Australia'=>'Australia'),Input::old('country'),['class'=>'input-left ','required']) !!}

						{!! Form::textarea('address', $data->address, ['id'=>'address', 'class' => 'form-control', 'cols'=>'15' , 'rows'=>'5','required']) !!}

						<input type="submit" class="form-control register_btn" name="submit" value="Submit">

					
					{!! Form::close() !!}
						
					@if($errors->any())
						<ul class="alert alert-danger" style="width: 100%;float: left;padding-left: 30px;">
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					@endif

	</div>
						
							


					</div>	

		</div>
	</div>


	<a href="{{URL::to('')}}" id="site_url">&nbsp;</a>
	<script>
	    

	        $("#state_id").on('change',function(e){

	            var state = $("#state_id").val();
	            var site_url = $('#site_url').attr("href");
	            $.ajax({
	                url: site_url+'/www/state_ajax',
	                type: 'POST',
	                dataType: 'json',
	                data: {_token: '{!! csrf_token() !!}',state:state,},
	                success: function(response)
	                {
	                    $("#post_code").html(response.message);
	                    $("#suburb").html('');
	                }
	            });


	            return false;
	        });

	         $("#post_code").on('change',function(e){

	            var postcode = $("#post_code").val();
	            var state = $("#state_id").val();
	            
	            var site_url = $('#site_url').attr("href");
	            $.ajax({
	                url: site_url+'/www/suburb_ajax',
	                type: 'POST',
	                dataType: 'json',
	                data: {_token: '{!! csrf_token() !!}',postcode:postcode,state:state},
	                success: function(response)
	                {
	                    $("#suburb").html(response.message);
	                }
	            });


	            return false;
	        });


	    
	</script>


@stop