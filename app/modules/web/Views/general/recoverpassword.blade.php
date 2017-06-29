@extends('web::layout.web_master')

@section('content')

<div class="general-container">
	<h1 class="box-tb-border">RECOVER PASSWORD ?</h1>

	<div class="contact-form">
		<div class="row">
			<div class="col-xs-12 col-md-7">
				<p>Please put your password..</p>

				{!! Form::open(['route' => 'recoverpassword-submit', 'class' => 'form form-2']) !!}
					<div class="login_form">
						{!! Form::password('password', null, ['id'=>'password', 'class' => 'form-control','required','placeholder' => 'Password']) !!}
						<input type="hidden" name="email_address" value="{{$token_exits->email}}">
						<input type="submit" name="submit" value="submit" class="loginsubmit">
					</div>
					
					@if(Session::has('flash_message_error'))
		                <div class="alert alert-error">
		                    <p>{{Session::get('flash_message_error')}}</p>
		                </div>
		            @endif
				{!! Form::close() !!}

			</div>
		</div>
	</div>	
</div>
	
@stop