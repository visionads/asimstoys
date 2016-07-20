<div id="header">
    <div class="container">
        <div class="row">
            <div class="header-content">
                <a id="header_logo" href="{{URL::to('/')}}">
                    <img class="logo" src="{{URL::to('/')}}/web/images/logo.png" width="130px" height="70px">
                    <span style="font-size: 20px; font-weight: bold; ">
                        &nbsp;
                        <span style="color: red"> Asim's </span>
                        <span style="color: blue"> Toys </span> -
                        <span style="color: deeppink"> Kids </span>
                        <span style="color: yellow"> Ride </span> On
                        <span style="color: green"> Toys </span>
                    </span>
                </a>
                <div class="hot_line" >
                    Hot Line: 1300 566 662
                </div>
                <div id="header_right">
                    <ul id="header_links">
                        <li id="header_link_contact"><a class="link-contact" href="{{URL::to('/')}}/myaccount" title="Contact">My account</a></li>
                        <li><a class="link-mycart" href="{{URL::to('/')}}/mycart" title="My cart">My cart 
                            (@if(Session::has('product_cart'))
                                {{count(Session::get('product_cart'))}}
                            @else
                                0
                            @endif)
                        </a></li>
                        @if(Session::has('user_id'))
                            <li class="last"><a class="link-login" href="{{Url::to('/')}}/customerlogout" title="Login" class="login" rel="nofollow">Logout</a></li>
                        @else
                            <li class="last"><a class="link-login" href="{{Url::to('/')}}/customerlogin" title="Login" class="login" rel="nofollow">Login</a></li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nav-container visible-desktop">
    <div class="container">
        <div class="row">
            <div class="pt_custommenu" id="pt_custommenu">
                <div id="pt_menu_home" class="pt_menu act">
                    <div class="parentMenu">
                        <a href="{{Url::to('/')}}"><span>Home</span></a>
                    </div>
                </div>

                {{--<div id="pt_menu3" class="pt_menu nav-1 act2">
                    <div class="parentMenu">
                        <a href="{{Url::to('/')}}/special"><span>Special</span></a>
                    </div>
                </div>--}}

                <div id="pt_menu3" class="pt_menu nav-1 act3">
                    <div class="parentMenu">
                        <a href="{{Url::to('/')}}/terms-condition"><span>Terms & Condition</span></a>
                    </div>
                </div>

                <div id="pt_menu3" class="pt_menu nav-1 act4">
                    <div class="parentMenu">
                        <a href="{{Url::to('/')}}/warranty"><span>Warranty</span></a>
                    </div>
                </div>

                <div id="pt_menu3" class="pt_menu nav-1 act5">
                    <div class="parentMenu">
                        <a href="{{Url::to('/')}}/faq"><span>FAQ</span></a>
                    </div>
                </div>

                <div id="pt_menu3" class="pt_menu nav-1 act6">
                    <div class="parentMenu">
                        <a href="{{Url::to('/')}}/contact"><span>Contact</span></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>