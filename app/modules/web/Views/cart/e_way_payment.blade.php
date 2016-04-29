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

                <div class="col-md-12" style="padding: 10% 30%; text-align: center">
                    <style>
                        .eway-button span{
                            padding: 10%;
                            width: 200px;
                            text-align: center;
                            height: 70px;
                            color: lightyellow;
                        }
                    </style>

                    <script src="https://secure.ewaypayments.com/scripts/eCrypt.js"
                            class="eway-paynow-button"
                            data-publicapikey="epk-4AABBD0F-8893-4863-8776-ABF469799708"

                            data-amount='{{$total_price}}'
                            data-currency="AUD"
                            data-buttoncolor="#ffc947"
                            data-buttonsize="100"
                            data-buttonerrorcolor="#f2dede"
                            data-buttonprocessedcolor="#dff0d8"
                            data-buttondisabledcolor="#f5f5f5"
                            data-buttontextcolor="#000000"

                            data-invoiceref='{{$invoice_number}}'
                            data-invoicedescription="Asims Toys Payment "
                            data-email= '{{@$customer_data->email}}'
                            data-phone='{{@$customer_data->telephone}}'
                            data-allowedit="true"
                            data-resulturl="http://localhost/~selimreza/asimstoys/public/myaccount"
                    >
                    </script>

                </div>





        </div>
    </div>
@stop