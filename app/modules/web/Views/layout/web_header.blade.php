<div id="header">
    <div class="container">
        <div class="row">
            <div class="header-content">
                <a id="header_logo" href="{{URL::to('/')}}">
                    <img class="logo" src="{{URL::to('/')}}/web/images/logo.png" width="190px" height="95px">
                    <span style="font-size: 26px;font-weight: bold;text-align: center;width: 68%;float: left;margin-top: 33px; ">
                        &nbsp;
                        <span style="color: #CA2F95; text-shadow: 2px 2px #aaa;"> Asim's </span>
                        <span style="color: #EEC205; text-shadow: 2px 2px #aaa;"> Toys </span> -
                        <span style="color: #F01B20; text-shadow: 2px 2px #aaa;"> Kids </span>
                        <span style="color: #7ECE38; text-shadow: 2px 2px #aaa;"> Ride </span> On
                        <span style="color: #02ADEB; text-shadow: 2px 2px #aaa;"> Toys </span>
                    </span>
                </a>
                
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
				
				<div class="hot_line" >
                    <div class="hot_line_row">
						<img src="{{URL::to('')}}/web/images/phone-call.png"> <span>1300 566 662</span>
					</div>
					<div class="hot_line_row">
						<img src="{{URL::to('')}}/web/images/envelope.png"> <span class="email">
							<a href="mailto:asimstoys@gmail.com?Subject=Mail to Us" target="_top">info@asimstoys.com.au</a>
						</span>
					</div>
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