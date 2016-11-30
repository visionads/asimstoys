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

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <div style="width: 100%; text-align: center; ">
                    <style>
                        .eway-button span{
                            padding: 10%;
                            width: 200px;
                            text-align: center;
                            height: 70px;
                            color: lightyellow;
                        }
                    </style>

                    <!-- Large modal -->

                    <div class="eway-paynow-button">

                        <a href="{{route('zip_pay_process', [$invoice_number])}}" class="btn btn-success" style="padding: 13px 60px; box-shadow: 1px 1px 3px #0a2b1e; font-weight: bold; color: black;">

                            Buy Now or Pay Later   <br>
                            <img src="{{asset('images/zip_money.png')}}" width="120" > <br>
                            ( ${{number_format($eway_total_price_format/100, 2)}} )
                        </a>
                    </div>
                    <p>
                        Learn about how you can buy now and pay later with
                        <a href="http://www.zippay.com.au" title="Buy Now, and Pay Later with zipPay" target="_blank" style="text-decoration: underline;">zipPay</a>
                    </p>



                </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>





            </div>
        </div>

    </div>
@stop