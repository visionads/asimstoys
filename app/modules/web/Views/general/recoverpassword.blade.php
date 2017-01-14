@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-text-container">
		<h4>login</h4>
		<div class="description">
			
			<div class="col-md-8">


				<div class="login_container">
					<h2>FORGOT PASSWORD ?</h2>
					<p>Please put your password..</p>
					
					{!! Form::open(['route' => 'recoverpassword-submit']) !!}
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