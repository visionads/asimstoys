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
                    Lay-By Order History </br>
                    <i> all layby order history</i>
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
                                <th> Due Amount</th>
                                <th> Date</th>
                                <th> Status</th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data))
                                @foreach($data as $values)
                                    <tr class="gradeX">
                                        <td>
                                            <a href="{{ route('lay-by-order-show', $values->id) }}" data-toggle="modal" data-target="#etsbModal" class="btn" title="Details">{{$values->invoice_no}}</a>
                                            </td>
                                        <td>{{$values->relCustomer->first_name}} {{$values->relCustomer->last_name}}</td>
                                        <td>{{$values->net_amount}}</td>
                                        <td>
                                            {{$values->net_amount - $values->relOrderPaymentTransaction->sum('amount')}}
                                        </td>
                                        <td>{{$values->created_at}}</td>
                                        <td>{{$values->status}}</td>
                                        <td>
                                            <a href="{{ route('lay-by-order-show', $values->id) }}" data-toggle="modal" data-target="#etsbModal" class="btn btn-info btn-xs" title="Details"><i class="icon-eye-open"></i></a>
                                            <a href="{{ route('order-paid-approve', $values->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to Approve?')" title="Approved"><i class="icon-check"></i></a>
                                            <a href="{{ route('order-paid-cancel', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Cancel?')" title="Cancel"><i class="icon-trash"></i></a>
                                            <a href="{{ route('order-complete', $values->id) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure to Close as Complete ?')" title="Close the Order as Completed"><i class="icon-check-square"></i></a>
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