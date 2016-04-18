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
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email">
				</div>
				<div class="form-group">
					<label>Subject</label>
					<input type="text" name="subject">
				</div>
				<div class="form-group">
					<label>Message</label>
					<textarea></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Send" class="submitbtn">
				</div>
			</div>
		</div>
	</div>
@stop