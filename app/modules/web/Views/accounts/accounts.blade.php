@extends('web::layout.web_master')

@section('content')
    <div class="pos-new-product home-text-container">
        <div class="description">

            <div class="cart_container">

                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="nav nav-pills bs-tabdrop-example">
                                <li class="active"><a href="#bs-tabdrop-tab1" data-toggle="tab">Section 1</a></li>
                                <li><a href="#bs-tabdrop-tab2" data-toggle="tab">Section 2</a></li>
                                <li><a href="#bs-tabdrop-tab3" data-toggle="tab">Section 3</a></li>
                            </ul>
                        </div>
                    </div>

                <div class="col-md-12 margin-top-30 margin-bottom-30">

                    <!-- <a href="/site/index" class="cart-continue-shopping">Continue Shopping</a> -->
                    <!-- <input type="submit" value="Checkout" class="cart-checkout">					 -->
                    {{--<a href="{{URL::to('/')}}/order-checkout" class="cart-checkout">Checkout</a>--}}

                </div>

            </div>

        </div>
    </div>
@stop