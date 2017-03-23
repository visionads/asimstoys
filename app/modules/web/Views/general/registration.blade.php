@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-text-container">
		<h4>login</h4>
		<div class="description">
			
			<div class="col-md-12">
				@if(Session::has('flash_message_error'))
	                <div class="alert alert-success">
	                    <p>Email already presents</p>
	                </div>
	            @endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

						{!! Form::open(['route' => 'customer-registration']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-md-6">
								<div class="login_container">
									<div class="form-group">
										<label>Email Address</label>
										{!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control','required']) !!}
										
									</div>
									
									<div class="form-group">
										<label>First Name</label>
										{!! Form::text('first_name', null, ['id'=>'first_name', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Last Name</label>
										{!! Form::text('last_name', null, ['id'=>'last_name', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Please select state</label>
										{!! Form::Select('state',
											$state_data,Input::old('state'),['id' => 'state_id','class'=>'form-control ','required']) !!}
										
									</div>

									<div class="form-group">
										<label>Post code</label>

										<select class='form-control' required="required" id="post_code" name="post_code">

										</select>
										
									</div>

									
									<div class="form-group">
										<input type="submit" class="form-control register_btn" name="submit" value="Register">
									</div>

								</div>
								
							</div>

							<div class="col-md-6">
								
								<div class="login_container">
									<div class="form-group">
										<label>Password</label>
										{!! Form::password('password', null, ['id'=>'password', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Address</label>
										 {!! Form::textarea('address', null, ['id'=>'address', 'class' => 'form-control', 'cols'=>'15' , 'rows'=>'5']) !!}
									</div>
									
									<div class="form-group">
										<label>Suburb</label>
										
										<select class='form-control' required="required" id="suburb" name="suburb">

										</select>
									</div>

									<div class="form-group">
										<label>Telephone</label>
										{!! Form::text('telephone', null, ['id'=>'telephone', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Country</label>
										{!! Form::Select('country',array('Australia'=>'Australia'),Input::old('country'),['class'=>'form-control ','required']) !!}
										
									</div>
								</div>
							</div>
						{!! Form::close() !!}

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