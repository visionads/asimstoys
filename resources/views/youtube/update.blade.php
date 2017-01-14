@extends('layout.master')
@section('sidebar')
    @parent
    @include('layout.sidebar')
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
		
			<header class="panel-heading">
                {{ $pageTitle }}                
                
                <a class="btn-sm btn-info pull-right" data-toggle="modal" href="#addData" title="Add">
                    <strong>Update youtube link</strong>
                </a>
            </header>
			
			<div class="panel-body">
                <div class="adv-table">
				   {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['youtube-update', $data->id]]) !!}
					   @include('youtube._form')
					{!! Form::close() !!}
				</div>
			</div>
		
		</section>
	</div>
</div>
    
    

@stop