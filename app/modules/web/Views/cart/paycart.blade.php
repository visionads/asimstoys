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

                {!! Form::open(/*['route' => 'pay-now-detail']*/) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="col-md-12 margin-top-30 margin-bottom-30">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div><span class="panel-title">Select Payment Methods</span></div>
                        <br><br>
                        <div class="radio" style="margin-top: 0;">
                            <label>
                                <input type="radio" name="pp_or_layby_or_cc" id="r1" value="is_paypal" checked="" class="px">
                                <span class="lbl">Pay Pal</span>
                            </label>
                        </div> <!-- / .radio -->
                        <div class="radio" style="margin-inside: 0;">
                            <label>
                                <input type="radio" name="pp_or_layby_or_cc" id="r2" value="is_layby" class="px">
                                <span class="lbl">Lay By</span>
                            </label>
                        </div>
                        <div class="radio" style="margin-bottom: 0;">
                            <label>
                                <input type="radio" name="pp_or_layby_or_cc" id="r3" value="is_creditcard" class="px">
                                <span class="lbl">Credit Card</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
                <div class="col-md-3 margin-top-30 margin-bottom-30">
                    <input type="submit" class="form-control register_btn" name="submit" value="Proceed">
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop