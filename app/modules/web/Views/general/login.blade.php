@extends('web::layout.web_master')

@section('content')

	<div class="general-container">
		<h1 class="box-tb-border">Login</h1>	
		<div class="contact-form">
			<div class="row">

				<div class="col-xs-12 col-md-7">
					{!! Form::open(['route' => 'customer-login','class' => 'form form-2']) !!}

						<h2>Customer Login</h2>
						<p>Please login using your existing account</p>

						{!! Form::email('email', null, ['id'=>'email', 'class' => '','required']) !!}

						{!! Form::password('password', null, ['id'=>'password', 'class' => '','required']) !!}

						<input type="submit" name="submit" value="submit" class="loginsubmit">
						
						<a href="{{URL::to('/')}}/forgotpassword">Forgot password?</a>
						@if(Session::has('flash_message_error'))
			                
			                <p style="color: #ce2491;font-size: 14px;
    margin-top: 5px;">
			                	{{Session::get('flash_message_error')}}
			                </p>
			                
			            @endif

					{!! Form::close() !!}
				</div>

				<div class="col-xs-12 col-md-5 mt-30">

					<h2>WANT TO REGISTER?</h2>
					<p>Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website. You'll also be able to track your orders with ease!</p>
					<a href="{{URL::to('/')}}/register" class="btn">Register Now</a>

				</div>

			</div>
		</div>
	</div>


@stop