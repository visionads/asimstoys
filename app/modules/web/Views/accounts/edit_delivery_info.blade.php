<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-md-6">
	<div class="login_container">
		<div class="form-group">
			<label>Email Address <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
			{!! Form::email('email', $delivery_details->email, ['id'=>'email', 'class' => 'form-control','required']) !!}
			<input type="hidden" name="user_id" value="{{$delivery_details->user_id}}">
			
		</div>
		
		<div class="form-group">
			<label>First Name <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
			{!! Form::text('first_name', $delivery_details->first_name, ['id'=>'first_name', 'class' => 'form-control','required']) !!}
		</div>

		<div class="form-group">
			<label>Last Name <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
			{!! Form::text('last_name', $delivery_details->last_name, ['id'=>'last_name', 'class' => 'form-control','required']) !!}
		</div>

		<div class="form-group">
			<label>Please select state <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
			<select id="state_id_d" class="form-control " required="required" name="state">
				@if(empty($get_customer_data))
					<option value="" selected="selected">Please select state</option>
				@endif
				
				
					@if(!empty($state_data))
						@foreach($state_data as $state)												
							<option <?php if($delivery_details->state == $state->state){echo 'selected';} ?> value="{{$state->state}}">{{$state->state}}</option>
						@endforeach
					@endif
				
				
			</select>
			
		</div>

		<div class="form-group">
			<label>Post code 
			<span style="color:rgba(255,0,0,.7);;">(required)</span></label><br/>
			<!-- <small style="color:rgb(255,99,71);">Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small> -->
			
			<select id="post_code_d" class="form-control " required="required" name="postcode">

					@if(empty($get_customer_data))
						<option value="" selected="selected">Please select post code</option>
					@endif
																	
					@if(!empty($postcode_delivery_data))
						@foreach($postcode_delivery_data as $postcode_delivery)												
							<option <?php if($delivery_details->postcode == $postcode_delivery->postcode){echo 'selected';} ?> value="{{$postcode_delivery->postcode}}">{{$postcode_delivery->postcode}}</option>
						@endforeach
					@endif											
					
			</select>
		</div>

		
		

	</div>
	
</div>

<div class="col-md-6">
	
	<div class="login_container">

		<div class="form-group">
			<label>Address <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
			 {!! Form::textarea('address', $delivery_details->address, ['id'=>'address', 'class' => 'form-control', 'cols'=>'15' , 'rows'=>'5','required']) !!}
		</div>
		
		<div class="form-group">
			<label>Suburb 
			<!-- <span style="color:rgba(255,0,0,.7);;">(required)</span> </label><br/>
			<small style="color:rgb(255,99,71);">Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small> -->
			
			<select id="suburb_d" class="form-control " required="required" name="suburb">
					@if(empty($get_customer_data))
						<option value="" selected="selected">Please select suburb</option>
					@endif
																	
					@if(!empty($suburb_delivery_data))
						@foreach($suburb_delivery_data as $suburb_delivery)												
							<option <?php if($delivery_details->suburb == $suburb_delivery->suburb){echo 'selected';} ?> value="{{$suburb_delivery->suburb}}">{{$suburb_delivery->suburb}}</option>
						@endforeach
					@endif											
					
			</select>
		</div>
		
		<div class="form-group">
			<label>Telephone <span style="color:rgba(255,0,0,.7);;">(required)</span></label>
			{!! Form::text('telephone', $delivery_details->telephone, ['id'=>'telephone', 'class' => 'form-control','required']) !!}
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

<a href="{{URL::to('')}}" id="site_url_d">&nbsp;</a>
	<script>
	    

	        $("#state_id_d").on('change',function(e){

	            var state = $("#state_id_d").val();
	            var site_url = $('#site_url').attr("href");
	            $.ajax({
	                url: site_url_d+'/www/state_ajax',
	                type: 'POST',
	                dataType: 'json',
	                data: {_token: '{!! csrf_token() !!}',state:state,},
	                success: function(response)
	                {
	                    $("#post_code_d").html(response.message);
	                    $("#suburb_d").html('');
	                }
	            });


	            return false;
	        });

	         $("#post_code_d").on('change',function(e){

	            var postcode = $("#post_code_d").val();
	            var state = $("#state_id_d").val();
	            
	            var site_url = $('#site_url_d').attr("href");
	            $.ajax({
	                url: site_url+'/www/suburb_ajax',
	                type: 'POST',
	                dataType: 'json',
	                data: {_token: '{!! csrf_token() !!}',postcode:postcode,state:state},
	                success: function(response)
	                {
	                    $("#suburb_d").html(response.message);
	                }
	            });


	            return false;
	        });


	    
	</script>