<input type="hidden" name="_token" value="{{ csrf_token() }}">

{!! Form::email('email', null, ['id'=>'email', 'class' => '','required','placeholder' => 'Email Address']) !!}

<input type="hidden" name="user_id" value="{{$get_customer_data->id}}">

{!! Form::text('first_name', null, ['id'=>'first_name', 'class' => 'input-left','required', 'placeholder' => 'First Name']) !!}

<select id="state_id_d" class="input-right " required="required" name="state">
	@if(empty($get_customer_data))
		<option value="" selected="selected">Please select state</option>
	@endif
	
	
		@if(!empty($state_data))
			@foreach($state_data as $state)												
				<option <?php if($delivery_details->state == $state->state){echo 'selected';} ?> value="{{$state->state}}">{{$state->state}}</option>
			@endforeach
		@endif
	
	
</select>

{!! Form::text('last_name', null, ['id'=>'last_name', 'class' => 'input-left','required','placeholder' => 'Last Name']) !!}

<select id="post_code_d" class="input-right" required="required" name="postcode">

	@if(empty($get_customer_data))
		<option value="" selected="selected">Please select post code</option>
	@endif
													
	@if(!empty($postcode_delivery_data))
		@foreach($postcode_delivery_data as $postcode_delivery)												
			<option <?php if($delivery_details->postcode == $postcode_delivery->postcode){echo 'selected';} ?> value="{{$postcode_delivery->postcode}}">{{$postcode_delivery->postcode}}</option>
		@endforeach
	@endif											
		
</select>

{!! Form::text('telephone', null, ['id'=>'telephone', 'class' => 'input-left','required', 'placeholder' => 'Telephone']) !!}

<select id="suburb_d" class="input-right" required="required" name="suburb">

	@if(empty($get_customer_data))
		<option value="" selected="selected">Please select suburb</option>
	@endif
													
	@if(!empty($suburb_delivery_data))
		@foreach($suburb_delivery_data as $suburb_delivery)												
			<option <?php if($delivery_details->suburb == $suburb_delivery->suburb){echo 'selected';} ?> value="{{$suburb_delivery->suburb}}">{{$suburb_delivery->suburb}}</option>
		@endforeach
	@endif											
		
</select>

{!! Form::Select('country',array('Australia'=>'Australia'),Input::old('country'),['class'=>'','required']) !!}

{!! Form::textarea('address', null, ['id'=>'address', 'class' => '', 'cols'=>'15' , 'rows'=>'5','required']) !!}

<input type="submit" class="form-control register_btn" name="submit" value="Submit">


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