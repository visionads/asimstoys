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
                    Order Paid </br>
                    <i> all paid order history</i>
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

                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="data-table-example">
                            <thead>
                            <tr>
                                <th> Invoice No# </th>
                                <th> User Name </th>
                                <th> Total Amount</th>
                                <th> Date</th>
                                <th> Status</th>
                                <th> Action </th>
								<th> Approved</th>
								<th>Delivered</th>
								<th>Archive</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data))
                                @foreach($data as $values)
                                    <tr class="gradeX">
                                        <td>
                                            <a href="{{ route('order-paid-show', $values->id) }}" data-toggle="modal" data-target="#etsbModal" class="btn" title="{{$values->invoice_no}} Invoice Details">
                                                {{$values->invoice_no}}
                                            </a>

                                        </td>
                                        <td>{{$values->relCustomer->last_name}} {{$values->relCustomer->first_name}}</td>
                                        <td>{{$values->net_amount}}</td>
                                        <td>{{$values->created_at}}</td>
                                        <td>{{ucfirst($values->status=='done'?"Closed": $values->status=='approved'?"Approved Payement": $values->status)}}</td>
                                        <td>
                                            <a href="{{ route('lay-by-order-show', $values->id) }}" data-toggle="modal" data-target="#etsbModal" class="btn btn-info btn-xs" title="Details"><i class="icon-eye-open"></i></a>
                                            <a href="{{ route('order-paid-approve', $values->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to Approve?')" title="Approved"><i class="icon-check"></i></a>
                                            <a href="{{ route('order-paid-cancel', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Cancel?')" title="Cancel"><i class="icon-trash"></i></a>
                                        </td>
										<td>
                                            @if($values->status == 'open')
											    <a href="{{ route('order-complete', $values->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to Close as Complete ?')" title="Close the Order as Completed">Approved</a>
                                            @endif
										</td>
										<td>
											<a href="{{ route('order-shipped', $values->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to Delivered as Complete ?')" title="Delivered the Order as Completed">Delivered</i></a>
										</td>
										<td>
											<a href="{{ route('order-archive', $values->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to Archive this order ?')" title="Archive this Order">Archive</i></a>
										</td>
                                    </tr>
                            @endforeach
                            @endif
                        </table>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>


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

@stop