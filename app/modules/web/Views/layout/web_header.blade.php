<!-- Top Header -->
<div class="top-header">
    <div class="container">
        <div class="col-xs-2 col-sm-4">
            <a href="mailto:info@asimstoys.com.au">
                <i class="fa fa-envelope"></i> <span class="hidden-xs">info@asimstoys.com.au</span>
            </a>
        </div>
        <div class="col-xs-10 col-sm-8">
            <ul class="top-nav pull-right">
                <li>
                    <a href="{{URL::to('/')}}/myaccount"><i class="fa fa-user"></i><span class="hidden-xs">My account</span></a>
                </li>
                <li>
                    <a href="{{URL::to('/')}}/mycart"><i class="fa fa-shopping-cart"></i><span class="hidden-xs">My cart (@if(Session::has('product_cart'))
                                {{count(Session::get('product_cart'))}}
                            @else
                                0
                            @endif)</span></a>
                </li>

                @if(Session::has('user_id'))
                    <li><a href="{{Url::to('/')}}/customerlogout" title="Login" rel="nofollow"><i class="fa fa-sign-in"></i> Logout</a></li>
                @else
                    <li><a href="{{Url::to('/')}}/customerlogin" title="Login" rel="nofollow"><i class="fa fa-sign-in"></i> Login</a></li>
                @endif

            </ul>
        </div>
    </div>
</div><!-- END / Top Header -->

<!-- Logo & Main Header -->
<div class="container-fluid">
    <div class="row">
        <div class="desktop-logo-header hidden-xs">
            <a href="{{URL::to('/')}}">
                <img src="{{URL::to('/')}}/web/img/h-logo-desktop.png" class="img-responsive" alt="Logo
            ">
            </a>
        </div>
        <div class="visible-xs-block">
            <div class="m-logo">
                <a href="{{URL::to('/')}}">
                    <img src="{{URL::to('/')}}/web/img/mobile-logo.jpg" class="img-responsive" alt="Logo">
                </a>
            </div>
            <div class="m-after-logo">
                <img src="{{URL::to('/')}}/web/img/Asim's-Toys---Kids-Ride-On-Toys.png" class="img-responsive" alt="Asim's-Toys Kids Ride On Toys">
                <h5>Australia's largest Range of Children's Electric Ride On Toys</h5>
            </div>
        </div>
    </div>
</div><!-- END / Logo & Main Header -->

<!-- Menu -->
<section class="menu-area">
    <div class="category mb-30 visible-xs">
        <div class="category-btn">
            <button type="button" class="navbar-toggle collapsed visible-xs" data-toggle="collapse" data-target="#left-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span>Catergories</span>
        </div>
        <div class="category-dropdown-wrapper" id="left-menu" class="collapse navbar-collapse">
           <ul class="category-list clearfix">
                <li class="catagory-li">
                    <a class="orange" href="{{URL::to('')}}/product">All Products</a></li>

                @if(!empty($productgroup_data))
                    @foreach($productgroup_data as $productgroup)
                        <li class="catagory-li">

                            @if($productgroup->id == '4')
                                <a class="sidemenu-{{$productgroup->id}}" href="{{URL::to('')}}/pre-order">{{$productgroup->title}}</a>
                            @elseif($productgroup->id == '5')
                                <a class="sidemenu-{{$productgroup->id}}" href="{{URL::to('')}}/lay-by-instruction">{{$productgroup->title}}</a>
                            @elseif($productgroup->id == '3')
                                <a class="sidemenu-{{$productgroup->id}}" href="{{URL::to('')}}/{{$productgroup->slug}}">{{$productgroup->title}}</a>
                            @else
                                <a class="sidemenu-{{$productgroup->id}}" href="#">{{$productgroup->title}}
                                </a>
                            @endif
                            
                        </li>
                    @endforeach
                @endif

                
            </ul>
        </div>
    </div>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-menu">
        <span class="sr-only">Toggle navigation</span>
        <!--Menu-->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <nav id="main-nav-menu" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a class="red" href="{{Url::to('/')}}">HOME</a></li>
            <li><a class="pink" href="{{Url::to('/')}}/terms-condition">TERMS &<br/> CONDITIONS</a></li>
            <li><a class="orange" href="{{Url::to('/')}}/warranty">WARRANTY</a></li>
            <li><a class="blue" href="{{Url::to('/')}}/faq">FAQ</a></li>
            <li><a class="green" href="{{Url::to('/')}}/contact">CONTACT</a></li>
        </ul>
    </nav>
</section><!-- END / Menu -->



