@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-text-container">
		<h4>{{$data->title}}</h4>
		<div class="description">
			<?php
				if(!empty($data->desc)){
					echo $data->desc;
				}else{
					echo 'No content yet.';
				}
			?>

			<div class="contact_form_container">
			
				{!! Form::open(['route' => 'contactsubmit']) !!}
					<div class="form-group">
						<label>Name</label>
						{!! Form::text('name', null, ['id'=>'name', 'class' => '','required']) !!}
					</div>
					<div class="form-group">
						<label>Email</label>
						{!! Form::email('email', null, ['id'=>'email', 'class' => '','required']) !!}
					</div>
					<div class="form-group">
						<label>Subject</label>
						{!! Form::text('subject', null, ['id'=>'subject', 'class' => '','required']) !!}
					</div>
					<div class="form-group">
						<label>Message</label>
						{!! Form::text('message', null, ['id'=>'message', 'class' => '','required']) !!}
					</div>
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
	</div>
@stop