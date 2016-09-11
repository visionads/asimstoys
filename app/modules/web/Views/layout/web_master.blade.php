<!DOCTYPE html>
<html  amp lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{$title?$title:''}}</title>
        <link rel="canonical" href="http://example.ampproject.org/article-metadata.html" />
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

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
		
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83417852-1', 'auto');
  ga('send', 'pageview');

</script>


    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "Open-source framework for publishing content",
        "datePublished": "2015-10-07T12:02:41Z",
        "image": [
          "logo.jpg"
        ]
      }
    </script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

    <script type='text/javascript' src="{{ URL::asset('web/js/v0.js') }}"></script> 
    <style type="text/css" media="screen">
        amp-img {
            background-color: none;
            border: 1px solid black;
          }
    </style>

        
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

				<!--
                <div style="background: white; padding: 20px; text-align: center">
                    <p>&nbsp; </p>
                    <h1 style="color: red;">Site is under maintenance !</h1>
                </div>
				-->


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