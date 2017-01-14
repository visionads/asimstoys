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
                <button type="button" class="btn btn-primary eway-button" data-toggle="modal" data-target=".bs-example-modal-lg">
                    <span>
                        Confirm to Pay ( {{number_format($eway_total_price_format/100, 2)}} )
                    </span>

                </button>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            </div>
                            <div class="modal-body">
                                <h2>Please note:</h2>
                                <p>1.	That most of Kids ride-on products creating with a process, the process involves blowing sheets and can caused dents or very small scratches. This does not affect the strength or durability of the body. They are just minor cosmetic flaws; Asim’s Toys will not accept any returns back due to this and this no reason to claim the item as faulty.</p>

                                <p>2- All Our Cars are tested , Asim’s Toys  Will not accept any returns back but if we agree to accept the item Returns please note :
                                .  Shipping costs are non-refundable.
                                .  Return postage fee will be at buyer’s expense.</p>
                                <h5 style="color: red;">
                                     ***  If you are not happy with this agreement</a> please do not buy this item  ***
                                </h5>
                                <p>
                                    <input type="checkbox" checked="checked"> <a href="{{route('terms-condition')}}">I agree with terms and condition </a>
                                </p>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12" style="padding: 10% 10%; text-align: center">
                                            <script src="https://secure.ewaypayments.com/scripts/eCrypt.js"
                                                    class="eway-paynow-button"
                                                    data-publicapikey="epk-4AABBD0F-8893-4863-8776-ABF469799708"

                                                    data-amount='{{$eway_total_price_format}}'
                                                    data-currency="AUD"
                                                    data-buttoncolor="#ffc947"
                                                    data-buttonsize="100"
                                                    data-buttonerrorcolor="#f2dede"
                                                    data-buttonprocessedcolor="#dff0d8"
                                                    data-buttondisabledcolor="#f5f5f5"
                                                    data-buttontextcolor="#000000"

                                                    data-invoiceref="{{$invoice_number}}"
                                                    data-invoicedescription="Asims Toys Payment "
                                                    data-email= '{{@$customer_data->email}}'
                                                    data-phone='{{@$customer_data->telephone}}'
                                                    data-allowedit="true"
                                                    data-resulturl="{{route('redirect_e_way_d', [$invoice_number, $total_price, $customer_data->id])}}"
                                            >
                                            </script>
                                        </div>

                                    </div>

                                </div>




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>


            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>





        </div>
    </div>

    </div>
@stop