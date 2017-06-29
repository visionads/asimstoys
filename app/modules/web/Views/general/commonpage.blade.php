@extends('web::layout.web_master')

@section('content')

	<div class="general-container">
		<h1 class="box-tb-border">
			{{$data->title}}
		</h1>

		<div class="faq-container">
			
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