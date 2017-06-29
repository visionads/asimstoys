@extends('web::layout.web_master')

@section('content')

<div class="general-container">
		<h1 class="box-tb-border">FORGOT PASSWORD ?</h1>	
		<div class="contact-form">
			<div class="row">

				<div class="col-xs-12 col-md-7">


					@if(Session::has('flash_success'))
					
						<p style="color: #ce2491;font-size: 14px;
    margin-top: 5px;">{{Session::get('flash_success')}}</p>
						
					@else
						
						
						<p>Don’t worry. You just need to put your registered email address in the box below. We will send you an email with a link for re-setting your password. That's it!</p>
						
						{!! Form::open(['route' => 'forgotpassword-mail-send', 'class' => 'form form-2']) !!}
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

				<div class="col-xs-12 col-md-5 mt-30">

					<h2>WANT TO REGISTER?</h2>
					<p>Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website. You'll also be able to track your orders with ease!</p>
					<a href="{{URL::to('/')}}/register" class="btn">Register Now</a>
					<a href="{{URL::to('/')}}/login" class="btn">Login</a>

				</div>

			</div>
		</div>
	</div>


@stop