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
			{!! Form::Select('state',
				array(
				
				$delivery_details->state => $delivery_details->state,
				
				'New South Wales'=>'New South Wales',
					  'Australian Capital Territory'=>'Australian Capital Territory',
					  'Victoria' => 'Victoria',
					  'Queensland' => 'Queensland',
					  'South Australia' => 'South Australia',
					  'Western Australia' => 'Western Australia',
					  'Tasmania' => 'Tasmania',
					  'Northern Territory' => 'Northern Territory'),Input::old('state'),['class'=>'form-control ','required']) !!}
			
		</div>

		<div class="form-group">
			<label>Post code <span style="color:rgba(255,0,0,.7);;">(required)</span></label><br/>
			<small style="color:rgb(255,99,71);">Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small>
			{!! Form::text('postcode', $delivery_details->postcode, ['id'=>'post_code', 'class' => 'form-control','required']) !!}
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
			<label>Suburb <span style="color:rgba(255,0,0,.7);;">(required)</span> </label><br/>
			<small style="color:rgb(255,99,71);">Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small>
			{!! Form::text('suburb', $delivery_details->suburb, ['id'=>'suburb', 'class' => 'form-control','required']) !!}
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