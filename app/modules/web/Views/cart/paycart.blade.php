@extends('web::layout.web_master')

@section('content')
    <div class="pos-new-product home-text-container">
        <div class="description">

            <div class="cart_container">
                <div class="step-container">
                    <div class="step">
                        <div class="step_images">
                            <img src="{{URL::to('/')}}/web/images/step1.png">
                        </div>
                        <div class="step-text">
                            <div class="header">Step 1</div>
                            <div class="your-basket">my basket</div>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step_images">
                            <img src="{{URL::to('/')}}/web/images/step2.png">
                        </div>
                        <div class="step-text">
                            <div class="header">Step 2</div>
                            <div class="your-basket">billing details</div>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step_images">
                            <img src="{{URL::to('/')}}/web/images/step3.png">
                        </div>
                        <div class="step-text">
                            <div class="header">Step 3</div>
                            <div class="your-basket">delivery details</div>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step_images">
                            <img src="{{URL::to('/')}}/web/images/step4.png">
                        </div>
                        <div class="step-text">
                            <div class="header">Step 4</div>
                            <div class="your-basket">check order</div>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step_images">
                            <img src="{{URL::to('/')}}/web/images/step5.png">
                        </div>
                        <div class="step-text active">
                            <div class="header">Step 5</div>
                            <div class="your-basket">secure payment</div>
                        </div>
                    </div>

                </div>




                {!! Form::open(['route' => 'payment_method_complete']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="invoice_number" value="{{ $invoice_number }}">

                <div class="col-md-12 margin-top-30 margin-bottom-30">
                    <div class="col-md-3" style="border-right: 1px solid #aaaaaa; ">
                        <p>&nbsp;</p>
                        <p><b>Invoice Summery</b></p>
                            Invoice # : {{$invoice_number}}<br>
                            Bill Amount : {{number_format($total_price, 2)}}<br>
                            Coupon Discount : {{ number_format($discount_price, 2) }}<br>
                            Net Amount : {{number_format($net_amount, 2)}}<br>
                        <p>&nbsp;</p>
                    </div>
                    <div class="col-md-8">
                        <div><span class="panel-title">Choose Your Payment Method</span></div>
                        <br><br>
                        <div class="radio" style="margin-top: 0;">
                            <label>
                                <input type="radio" name="payment_method" id="r1" value="e_way" checked="checked" class="px">
                                <span class="lbl">Pay Now  </span> <br>
                                <i>Pay using your Credit Card. We accept VISA | MasterCard  | American Express </i> <br> <br>
                            </label>
                        </div> <!-- / .radio -->

                        <div class="radio" style="margin-inside: 0;">
                            <label>
                                <input type="radio" name="payment_method" id="r2" value="lay_by" class="px">
                                <span class="lbl">Partial Payment (Lay By)</span> <br>
                                <i>You may pay partially by Credit Card  </i> <br><br/>
                            </label>
                        </div>
						
						<div class="radio" style="margin-inside: 0;">
                            <label>
                                <input type="radio" name="payment_method" id="r2" value="pre_order" class="px">
                                <span class="lbl">Pre Order</span> <br>
                                <i>Pay using your Credit Card. We accept VISA | MasterCard  | American Express </i> <br><br>
                            </label>
                        </div>

                        <div class="radio" style="margin-inside: 0;">
                            <label>
                                <input type="radio" name="payment_method" id="r2" value="zip_pay" class="px">
                                <span class="lbl">Buy Now or Pay Later </span> <br>
                                    <img src="{{asset('images/zip_money.png')}}" width="120">
                                <i>
                                    <div style="text-align: center;">Learn about how you can buy now and pay later with
                                        <a href="http://www.zippay.com.au" title="Buy Now, and Pay Later with zipPay" target="_blank" style="text-decoration: underline;">zipPay</a>
                                    </div>
                                </i> <br>
                            </label>

                        </div>

                        {{--<div style="padding: 4%">
                            <input type="radio" value="1" id="i_agree" checked="checked">
                            <label for="i_agree">I agree with Terms and Condition. <a href="{{URL::to('terms-condition')}}"> Click Here for more details. </a></label>
                        </div>--}}

                    </div>
                </div>

                <div class="col-md-3 pull-right margin-top-30 margin-bottom-30">
                    <input type="submit" class="form-control register_btn" name="submit" value="Proceed to Pay">
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


    </div>
@stop