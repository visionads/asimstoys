@extends('web::layout.web_master')

@section('content')
    <div class="pos-new-product home-text-container">
        <div class="description">

            
                    <div class="row">
                        <div class="col-sm-12">

                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="{{route('myaccount')}}" >Profile</a>
                                </li>
                                <li role="presentation">
                                    <a href="{{route('order_summery_lists')}}" >Order History</a>
                                </li>
                                <li role="presentation">
                                    <a href="{{route('lay_by_order_lists')}}">Lay by Order</a>
                                </li>
                            </ul>

                            <div class="tab-content ">
                                <div role="tabpanel" class="tab-pane article-page-tab active" id="profile">
                                    @include('web::accounts.profile')
                                </div>

                            </div>

                        </div>
                        
                    </div>

                

            

        </div>
    </div>
@stop