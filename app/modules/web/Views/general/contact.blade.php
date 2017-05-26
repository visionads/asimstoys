@extends('web::layout.web_master')

@section('content')
	<div class="general-container">
		<h1 class="box-tb-border">{{$data->title}}</h1>

		<div class="contact-form">
			<h3>
				If you have any enquiry about our products, please contact with us. OR you can call to <a href="tel:1300 566 662">1300 566 662</a>
			</h3>

			{!! Form::open(['route' => 'contactsubmit', 'class'=>'form']) !!}
					
						
						{!! Form::text('name', null, ['id'=>'name', 'class' => '','required', 'placeholder' => 'Your Name']) !!}
					
					
						{!! Form::email('email', null, ['id'=>'email', 'class' => '','required', 'placeholder' => 'Email Address']) !!}
					
						{!! Form::text('phone', null, ['id'=>'phone', 'class' => '','required', 'placeholder' => 'Phone Number']) !!}
										
						{!! Form::text('subject', null, ['id'=>'subject', 'class' => '','required', 'placeholder' => 'Subject']) !!}
					
						{!! Form::textarea('message', null, ['id'=>'message', 'class' => '','required','placeholder' => 'Your Message']) !!}
					
					
					<div class="form-group">
						<input type="submit" name="submit" value="Send" class="submitbtn">
					</div>
					
					<div class="form-group">
						@if(Session::has('flash_message_success'))
							<div class="btn btn-success pull-right">
								<p>{{Session::get('flash_message_success')}}</p>
							</div>
						@endif
						
						@if(Session::has('flash_message_error'))
							<div class="btn btn-danger pull-right">
								<p>{{Session::get('flash_message_error')}}</p>
							</div>
						@endif
					</div>
						
				{!! Form::close() !!}

		</div>

	</div>
	
@stop