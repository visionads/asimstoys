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
	               
	                <a class="btn-sm btn-info pull-right" data-toggle="modal" href="#addData" title="Add">Add State</a>
	            </header>
        	</section>
        </div>
    </div>


	<!-- addData -->
	<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog"  style="width: 75%;">
	        <div class="modal-content" style="width:100%;float:left;">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Add State</h4>
	            </div>
	            <div class="modal-body">
	                {!! Form::open(['route' => 'state-store']) !!}
	                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                   @include('state.add')
	                {!! Form::close() !!}

	            </div>

	        </div>
	    </div>
	</div>
	<!-- modal -->


	<!-- Modal  -->
	<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	</div>
	<!-- modal -->

	<!-- View image for media in Modal  -->
	<div class="modal fade" id="imageView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #1a1a1a; margin: 0 auto; opacity: 0.9">
	</div>
	<!-- modal -->
@stop