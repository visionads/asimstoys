<!DOCTYPE html>
<html>
    <head>
        <title>{{$title?$title:''}}</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('')}}/web/images/favicon.png">

        <link href="{{ URL::asset('web/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ URL::asset('web/css/bootstrap-responsive.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('web/css/custommenu.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('web/css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('web/css/camera.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ URL::asset('web/css/global_red.css') }}" rel="stylesheet" type="text/css" media="all" />

        <script type="text/javascript" src="{{ URL::asset('web/js/jquery.min.js') }}"></script>
        <script type='text/javascript' src="{{ URL::asset('js/jquery.mobile.customized.min.js') }}"></script>
        <script type='text/javascript' src="{{ URL::asset('web/js/jquery.easing.1.3.js') }}"></script> 
        <script type='text/javascript' src="{{ URL::asset('web/js/camera.js') }}"></script> 

        <script type='text/javascript' src="{{ URL::asset('web/js/jquery.fancybox.js') }}"></script> 
        <script type='text/javascript' src="{{ URL::asset('web/js/jquery.fancybox-media.js') }}"></script> 

        <script type='text/javascript' src="{{ URL::asset('web/js/bootstrap.min.js') }}"></script> 

        <script type='text/javascript' src="{{ URL::asset('web/js/jquery.elevatezoom.js') }}"></script> 
         <script>
            jQuery(function(){
                
                jQuery('#camera_wrap_1').camera({
                    thumbnails: false,
                    pagination:false,
                    playPause: false,
                    fx:'scrollLeft',
                });

                $('.fancybox-media')
                    .attr('rel', 'media-gallery')
                    .fancybox({
                        openEffect : 'none',
                        closeEffect : 'none',
                        prevEffect : 'none',
                        nextEffect : 'none',

                        arrows : false,
                        helpers : {
                            media : {},
                            buttons : {}
                        }
                    });

                    

            });

            window.onscroll = function () { 
                    var scrollAmount = $(window).scrollTop();

                        if(scrollAmount > 400 ){
                            $('.scroll-menu-open').show();
                            $('.scroll-menu-close').hide();
                        }else{
                           $('.scroll-menu-open').hide();
                            $('.scroll-menu-close').show();
                        }
                     };
        </script>
        
    </head>

    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=363042937208025";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div id="page" class="pos_page">
            <div class="page-inner">
                @include('web::layout.web_header')


                <div style="background: white; padding: 20px; text-align: center">
                    <h1 style="color: red;">Site is under maintenance !</h1>
                </div>


                <div id="toppage">
                    <div class="container">
                        <div class="row">
                            @include('web::layout.web_sidemenu')
                            <div class="col-md-9 padding-right-0">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('web::layout.web_footer')