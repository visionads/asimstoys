@extends('layout.master')
@section('sidebar')
@parent
@include('layout.sidebar')
@stop

@section('content')

        <!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <strong>Customer List</strong>
                
            </header>


            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
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

            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="data-table-example">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> Email</th>  
							<th>Phone</th>
							<th>Address</th>
                            <th> Action </th>                            
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($user_data))
                            @foreach($user_data as $values)
                                <tr class="gradeX">
                                    <td>{{isset($values->first_name)?$values->first_name:''}} {{isset($values->last_name)?$values->last_name:''}}</td>
                                    <td>{{isset($values->email)?$values->email:''}}</td>
                                    <td>{{$values->telephone}}</td>
									<td>{{$values->address}}</td>
                                    <td>
                                        <a href="{{ route('user.show.data', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal"><i class="icon-eye-open"></i></a>
                                        
                                    </td>
                                   
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    <span class="pull-right">{!! str_replace('/?', '?', $user_data->render()) !!} </span>
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
                <h4 class="modal-title">Add User</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'create.new-user']) !!}
                    @include('user.user_info.update_view')
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

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">

</div>

{{--<script type="text/javascript">
    $('#etsbModal').click(function(e) {
        e.preventDefault();
        $('#etsbModal')
                .removeData()
    });
 </script>--}}


@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif
    @stop