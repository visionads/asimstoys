@extends('web::layout.web_master')

@section('content')

	<div class="general-container">
		<div class="myaccount">

			<div class="my-header">
				@include('web::accounts._account_menu')
			</div>

			<div class="body">

				@if(!empty($get_pre_order_history))
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
									@foreach($get_pre_order_history as $get_order)

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
													$paid_amount = \App\OrderPaymentTransaction::where('order_head_id', $get_order->id)->select(DB::raw('SUM(amount) as paid_amount'))->where('status', '!=', 'cancel')
													->where('status', '!=', 'pending')->groupBy('order_head_id')->first();
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
                            <p style="text-align: center; padding-bottom: 40px;">No order yet</p>
                        @endif

			</div>

		</div>
	</div>

@stop
