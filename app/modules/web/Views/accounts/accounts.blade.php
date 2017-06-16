@extends('web::layout.web_master')

@section('content')

    <div class="general-container">

        <div class="myaccount">

            <div class="my-header">

                 @include('web::accounts._account_menu')

            </div>

            @include('web::accounts.profile')            

        </div>

    </div>

    
@stop