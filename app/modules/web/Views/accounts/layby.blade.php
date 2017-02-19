@extends('web::layout.web_master')

@section('content')

    <div class="pos-new-product home-text-container">
        <div class="description">


            <div class="row">
                <div class="col-sm-12">

                    <ul class="nav nav-tabs" role="tablist">
                        @include('web::accounts._account_menu')
                    </ul>

                    <div class="tab-content ">


                        @if(!empty($get_layby_history))
							<div class="table-responsive">
								<table class="table">
									<?php
									$count = 1;
									?>
									<tr>
										<td>#</td>
										<td>Invoice No#</td>
										<td>Bill Amount</td>
										<td>Paid Amount</td>
										<td>Amount Left</td>
										<td>Status</td>
										<td>Action</td>
									</tr>
									@foreach($get_layby_history as $get_order)

										<tr>
											<td>
												{{$count}}
											</td>
											<td>
												<a href="{{URL::to('details_of_lay_by', $get_order->id)}}" title="{{$get_order->invoice_no}}" >
													{{isset($get_order->invoice_no)?$get_order->invoice_no:null}}
												</a>
											</td>
											<td>
												<b>{{isset($get_order->net_amount)?number_format($get_order->net_amount, 2): 0}}</b>
											</td>
											<td>
												<?php
													$paid_amount = \App\OrderPaymentTransaction::where('order_head_id', $get_order->id)->select(DB::raw('SUM(amount) as paid_amount'))->groupBy('order_head_id')->where('status', '!=', 'cancel')->first();
													$due_amount = $get_order->net_amount-(isset($paid_amount->paid_amount)?$paid_amount->paid_amount:'0.00') ;
												?>
												<b>{{isset($paid_amount->paid_amount)?number_format($paid_amount->paid_amount,2):'0.00'}}</b>
											</td>

											<td>
												<b>{{isset($due_amount)? ( $due_amount>0?number_format($due_amount, 2):'0.00' ):0}}</b>
											</td>
											<td>
												{{isset($get_order->status)?$get_order->status:null}}
											</td>
											<td>
												<a href="{{URL::to('details_of_lay_by', $get_order->id)}}" title="{{$get_order->invoice_no}}" >
													<b>Details</b>
												</a>
												<?php
												$get_orderdetails_history = DB::table('order_detail')
														->where('order_head_id',$get_order->id)
														->get();
												?>
												<div class="modal fade" id="viewinvoice{{$get_order->invoice_no}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog"  style="width: 70%;">
														<div class="modal-content" style="width:100%;float:left;">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																{{$get_order->invoice_no}}
															</div>


														</div>
													</div>
												</div>
											</td>
										</tr>


										<?php $count++; ?>
									@endforeach

								</table>
							</div>
                        @else
                            <p>No order yet</p>
                        @endif


                    </div>

                </div>

            </div>





        </div>
    </div>


@stop
