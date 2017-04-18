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


						{!! Form::open(['route' => 'customer-billing-detail']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-md-6 col-sm-6 col-xs-12">
							
								<div class="login_container">
									<div class="form-group">
										<label>Email Address <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
										{!! Form::email('email', $data->email, ['id'=>'email', 'class' => 'form-control','required']) !!}
										
									</div>
									
									<div class="form-group">
										<label>First Name <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
										{!! Form::text('first_name', $data->first_name, ['id'=>'first_name', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Last Name <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
										{!! Form::text('last_name', $data->last_name, ['id'=>'last_name', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Please select state <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
										<select id="state_id" class="form-control " required="required" name="state">
												@if(empty($data))
													<option value="" selected="selected">Please select state</option>
												@endif
												
												
													@if(!empty($state_data))
														@foreach($state_data as $state)												
															<option <?php if($data->state == $state->state){echo 'selected';} ?> value="{{$state->state}}">{{$state->state}}</option>
														@endforeach
													@endif
												
												
											</select>
										
										
									</div>

									<div class="form-group">
										<label>Post code

										<!-- <span style="color:rgba(255,0,0,.7);;">(required)</span></label><br/>
										<small style="color:rgb(255,99,71);">Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small> -->
										
										<select id="post_code" class="form-control " required="required" name="postcode">

												@if(empty($data))
													<option value="" selected="selected">Please select post code</option>
												@endif
																								
												@if(!empty($postcode_data))
													@foreach($postcode_data as $postcode)												
														<option <?php if($data->postcode == $postcode->postcode){echo 'selected';} ?> value="{{$postcode->postcode}}">{{$postcode->postcode}}</option>
													@endforeach
												@endif											
												
										</select>

									</div>

									
									

								</div>
								
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">
								
								<div class="login_container">

									<div class="form-group">
										<label>Address <span style="color:rgba(255,0,0,.7);;">(required)</span></label>


										 {!! Form::textarea('address', $data->address, ['id'=>'address', 'class' => 'form-control', 'cols'=>'15' , 'rows'=>'5','required']) !!}
									</div>
									
									<div class="form-group">
										<label>Suburb 
										<!-- <span style="color:rgba(255,0,0,.7);;">(required)</span> </label><br/>
										<small style="color:rgb(255,99,71);">Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small> -->
										<select id="suburb" class="form-control " required="required" name="suburb">
												@if(empty($data))
													<option value="" selected="selected">Please select suburb</option>
												@endif
																								
												@if(!empty($suburb_data))
													@foreach($suburb_data as $suburb)												
														<option <?php if($data->suburb == $suburb->suburb){echo 'selected';} ?> value="{{$suburb->suburb}}">{{$suburb->suburb}}</option>
													@endforeach
												@endif											
												
										</select>
										
									</div>
									
									<div class="form-group">
										<label>Telephone <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
										{!! Form::text('telephone', $data->telephone, ['id'=>'telephone', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Country</label>
										{!! Form::Select('country',array('Australia'=>'Australia'),Input::old('country'),['class'=>'form-control ','required']) !!}
										
									</div>
									
									<div class="form-group">
										<input type="submit" class="form-control register_btn" name="submit" value="Submit">
									</div>
									
								</div>
							</div>
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