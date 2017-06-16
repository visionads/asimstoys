<style type="text/css">
	form.form{
		margin:0;
	}
</style>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

{!! Form::email('email', $get_customer_data->email, ['id'=>'email', 'class' => '','required', 'placeholder' => 'Email Address']) !!}

{!! Form::text('first_name', $get_customer_data->first_name, ['id'=>'first_name', 'class' => 'input-left','required', 'placeholder' => 'First Name']) !!}

<select id="state_id" class="input-right" required="required" name="state">
	@if(empty($get_customer_data))
		<option value="" selected="selected">Please select state</option>
	@endif
	
	
		@if(!empty($state_data))
			@foreach($state_data as $state)												
				<option <?php if($get_customer_data->state == $state->state){echo 'selected';} ?> value="{{$state->state}}">{{$state->state}}</option>
			@endforeach
		@endif
	
	
</select>

{!! Form::text('last_name', $get_customer_data->last_name, ['id'=>'last_name', 'class' => 'input-left','required','placeholder' => 'Last Name']) !!}

<select id="post_code" class="input-right" required="required" name="postcode">

		@if(empty($get_customer_data))
			<option value="" selected="selected">Please select post code</option>
		@endif
														
		@if(!empty($postcode_data))
			@foreach($postcode_data as $postcode)												
				<option <?php if($get_customer_data->postcode == $postcode->postcode){echo 'selected';} ?> value="{{$postcode->postcode}}">{{$postcode->postcode}}</option>
			@endforeach
		@endif											
		
</select>

{!! Form::text('telephone', $get_customer_data->telephone, ['id'=>'telephone', 'class' => 'input-left','required','placeholder' => 'Telephone']) !!}

<select id="suburb" class="input-right" required="required" name="suburb">
		@if(empty($get_customer_data))
			<option value="" selected="selected">Please select suburb</option>
		@endif
														
		@if(!empty($suburb_data))
			@foreach($suburb_data as $suburb)												
				<option <?php if($get_customer_data->suburb == $suburb->suburb){echo 'selected';} ?> value="{{$suburb->suburb}}">{{$suburb->suburb}}</option>
			@endforeach
		@endif											
		
</select>

{!! Form::Select('country',array('Australia'=>'Australia'),Input::old('country'),['class'=>' ','required']) !!}

{!! Form::textarea('address', $get_customer_data->address, ['id'=>'address', 'class' => '', 'cols'=>'15' , 'rows'=>'5','required', 'placeholder' => 'Address']) !!}

<input type="submit" class="form-control register_btn" name="submit" value="Submit">

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