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
		</div>
	</div>
@stop