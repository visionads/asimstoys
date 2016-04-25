@extends('web::layout.web_master')

@section('content')
    <div class="pos-new-product home-text-container">
        <div class="description">


            <div class="row">
                <div class="col-sm-12">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation">
                            <a href="{{route('myaccount')}}" >Profile</a>
                        </li>
                        <li role="presentation" class="active">
                            <a href="{{route('order_summery_lists')}}" >Order History</a>
                        </li>
                        <li role="presentation">
                            <a href="{{route('lay_by_order_lists')}}">Lay by Order</a>
                        </li>
                    </ul>

                    <div class="tab-content ">


                        @if(!empty($get_order_history))
                            <table class="table">
                                <?php
                                $count = 1;
                                ?>
                                <tr>
                                    <td>#</td>
                                    <td>Invoice No#</td>
                                    <td>Amount</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                                @foreach($get_order_history as $get_order)

                                    <tr>
                                        <td>
                                            {{$count}}
                                        </td>
                                        <td>
                                            {{$get_order->invoice_no}}
                                        </td>
                                        <td>
                                            {{$get_order->net_amount}}
                                        </td>
                                        <td>
                                            {{$get_order->status}}
                                        </td>
                                        <td>
                                            <a class="" data-toggle="modal" href="{{URL::to('details_of_order_summery', $get_order->id)}}" title="{{$get_order->invoice_no}}">
                                                <b>Details</b>
                                            </a>

                                        </td>
                                    </tr>


                                    <?php $count++; ?>
                                @endforeach

                            </table>
                        @else
                            <p>No order yet</p>
                        @endif



                    </div>

                </div>

            </div>





        </div>
    </div>




@stop