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
                                <div role="tabpanel" class="tab-pane article-page-tab active" id="profile">
                                    @include('web::accounts.profile')
                                </div>

                            </div>

                        </div>
                        
                    </div>

                

            

        </div>
    </div>
@stop