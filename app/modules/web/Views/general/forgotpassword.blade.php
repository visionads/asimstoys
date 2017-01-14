@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-text-container">
		<h4>login</h4>
		<div class="description">
			
			<div class="col-md-8">


				<div class="login_container">
				
				@if(Session::has('flash_success'))
					
					<div class="alert alert-error">
						<p>{{Session::get('flash_success')}}</p>
					</div>
				
				@else
					
					<h2>FORGOT PASSWORD ?</h2>
					<p>Don’t worry. You just need to put your registered email address in the box below. We will send you an email with a link for re-setting your password. That's it!</p>
					
					{!! Form::open(['route' => 'forgotpassword-mail-send']) !!}
						<div class="login_form">
							{!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control','required','placeholder' => 'Email Address']) !!}
							
							<input type="submit" name="submit" value="submit" class="loginsubmit">
						</div>
						
						@if(Session::has('flash_message_error'))
			                <div class="alert alert-error">
			                    <p>{{Session::get('flash_message_error')}}</p>
			                </div>
			            @endif
					{!! Form::close() !!}
					
					
				@endif
					
				</div>

			</div>



		</div>
	</div>
@stop