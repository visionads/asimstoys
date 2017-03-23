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
	                    <strong>Add Suburb</strong>
	                </a>
	            </header>

	            @if(Session::has('flash_message'))
	                <div class="alert alert-success">
	                    <p>{{ Session::get('flash_message') }}</p>
	                </div>
	            @endif
	            @if(Session::has('flash_message_error'))
	                <div class="alert alert-danger">
	                    <p>{{ Session::get('flash_message_error') }}</p>
	                </div>
	            @endif

	            <div class="col-md-12">
	                <div class="row">
	                    <div class="sort_by_container">
	                    	{!! Form::open(['route' => 'standardpostcode-suburb']) !!}

	                    		<div class="col-md-2">
	                                <br/>
	                                Search by
	                            </div>
	                            <div class="col-md-3">
	                            	<br/>
	                               State  {!! Form::select('state_id', $state_id, isset($id_state) ? $id_state : Input::old('state_id'),['class' => 'form-control','id'=>'state_id','required']) !!}
	                            </div>

	                            <div class="col-md-3">
	                            	<br/>
                                PostCode

                                @if(isset($id_product_subgroup))

                                    {!! Form::select('product_subgroup_id', $product_subgroup_lists, isset($id_product_subgroup) ? $id_product_subgroup : Input::old('product_group_id'),['class' => 'form-control','id'=>'product_subgroup_id','']) !!}

                                @else

                                    <select class='form-control' id="postcode_id" name="postcode_id">
                                    </select>

                                @endif

                               
                            </div>

	                            <div class="col-md-3">
	                                <br/> <br/>
	                                {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
	                            </div>

	                    	{!! Form::close() !!}
	                    </div>
	                </div>
	            </div>

	            <div class="panel-body">
                	<div class="adv-table">

                		<table  class="display table table-bordered table-striped" id="data-table-example">

                			<thead>
	                            <tr>
	                            	<th> Suburb </th>
	                                <th>State   </th>
	                                <th> PostCode</th>
	                                <th> Status</th>
	                                <th> Action </th>
	                            </tr>
	                         </thead>

	                         <tbody>
	                            @if(isset($data))
	                                @foreach($data as $values)
	                                     <tr class="gradeX">
	                                        <td>{{$values->title}}</td>
	                                        <td>{{@$values->relGetstate->title}}</td>
	                                        <td>{{@$values->relGetpostcode->title}}</td>
	                                        <td>{{$values->status}}</td>
	                                        <td>
	                                            <a href="{{ route('standardpostcode-suburb-show', $values->id) }}" data-toggle="modal" data-target="#etsbModal" class="btn btn-info btn-xs" title="View"><i class="icon-eye-open"></i></a>
	                                            <a href="{{ route('standardpostcode-suburb-edit', $values->id) }}" data-toggle="modal" data-target="#etsbModal" class="btn btn-primary btn-xs" title="Edit"><i class="icon-edit"></i></a>
	                                            <a href="{{ route('standardpostcode-suburb-delete', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="icon-trash"></i></a>
	                                        </td>
	                                     </tr>
	                                @endforeach
	                            @endif
	                        </tbody>

                		</table>

                	</div>
                </div>

	        </section>
	    </div>
	</div>



	<!-- addData -->
	<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog"  style="width: 75%;">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Add Suburb</h4>
	            </div>
	            <div class="modal-body">
	                {!! Form::open(['route' => 'standardpostcode-suburb-store','files'=>'true']) !!}
	                   @include('standardpostcode._form_suburb')
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

	<!--script for this page only-->
	@if($errors->any())
	    <script type="text/javascript">
	        $(function(){
	            $("#addData").modal('show');
	        });
	    </script>
	@endif


	<script>

    $(function(){
        $("#state_id").on('change',function(e){

            var state_id = $("#state_id").val();
            var site_url = $('#site_url').attr("href");
            $.ajax({
                url: site_url+'/standardpostcode/suburb_postcode_ajax',
                type: 'POST',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}',state_id:state_id,},
                success: function(response)
                {
                    $("#postcode_id").html(response.message);
                }
            });


            return false;
        });
    });

</script>

@stop