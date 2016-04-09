@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-text-container">
		<h4>login</h4>
		<div class="description">
			
			<div class="col-md-6">

				<!-- <div class="login_container">
					<h2>Checkout as Guest</h2>
					<p>Don't have an account and you don't want to register? Checkout as a guest instead!</p>
					<a href="#" class="read_more">Checkout as guest</a>
				</div> -->

				<div class="login_container">
					<h2>Want to Register?</h2>
					<p>Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website. You'll also be able to track your orders with ease!</p>
					<a href="{{URL::to('/')}}/register" class="read_more">Register Now</a>
				</div>

			</div>

			<div class="col-md-5 pull-right">
				<div class="login_container">
					<h2>Customer Login</h2>
					<p>Please login using your existing account</p>
					{!! Form::open(['route' => 'customer-login']) !!}
						<div class="login_form">
							{!! Form::email('email', null, ['id'=>'email', 'class' => 'form-control','required']) !!}
							{!! Form::password('password', null, ['id'=>'password', 'class' => 'form-control','required']) !!}
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