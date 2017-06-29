@extends('web::layout.web_master')

@section('content')

	<div class="general-container">
		<h1 class="box-tb-border">Registration</h1>
		<div class="contact-form">
			<h3>
				Please filled up all necessary fields.
			</h3>

			@if(Session::has('flash_message_error'))
                
                <h3>Email already presents</h3>
                
            @endif

			@if (count($errors) > 0)
			
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
				
			@endif

			{!! Form::open(['route' => 'customer-registration', 'class' => 'form']) !!}

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				{!! Form::email('email', null, ['id'=>'email', 'class' => '','required','placeholder' => 'Email Address']) !!}

				{!! Form::text('first_name', null, ['id'=>'first_name', 'class' => 'input-left','required','placeholder' => "First Name"]) !!}

				{!! Form::Select('state',
					$state_data,Input::old('state'),['id' => 'state_id','class'=>'input-right','required']) !!}

				{!! Form::text('last_name', null, ['id'=>'last_name', 'class' => 'input-left','required','placeholder' => 'Last Name']) !!}

				<select class='input-right' required="required" id="post_code" name="post_code">
					<option value="">Please Select Post Code</option>
				</select>

				{!! Form::text('telephone', null, ['id'=>'telephone', 'class' => 'input-left','required', 'placeholder' => 'Telephone']) !!}

				<select class='input-right' required="required" id="suburb" name="suburb">
					<option value="">Please Select Suburb</option>
				</select>

				<input class="input-left" id="password" type="password" name="password" placeholder="Password">

				{!! Form::Select('country',array('Australia'=>'Australia'),Input::old('country'),['class'=>'input-right','required']) !!}

				{!! Form::textarea('address', null, ['id'=>'address', 'class' => '', 'cols'=>'15' , 
				'rows'=>'5', 'placeholder' => 'Street Address']) !!}

				<input type="submit" class="" name="submit" value="Register">
				

			{!! Form::close() !!}

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