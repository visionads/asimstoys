<!DOCTYPE html>
<html  amp lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{$title?$title:''}}</title>
        <link rel="canonical" href="http://example.ampproject.org/article-metadata.html" />
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

        <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('')}}/web/images/favicon.png">

        <link href="{{ URL::asset('web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>

        <link href="{{ URL::asset('web/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all"/>

        <link href="{{ URL::asset('web/vendor/normalize/css/normalize.css') }}" rel="stylesheet" type="text/css" media="all"/>

        <link href="{{ URL::asset('web/css/prettyPhoto.css') }}" rel="stylesheet" type="text/css" media="all"/>

        <link href="{{ URL::asset('web/css/main.css') }}" rel="stylesheet" type="text/css" media="all"/>

        <link href="{{ URL::asset('web/vendor/layerslider/css/layerslider.css') }}" rel="stylesheet" type="text/css" media="all"/>

        <link href="{{ URL::asset('web/css/responsive.css') }}" rel="stylesheet" type="text/css" media="all"/>
        
        <script type="text/javascript" src="{{ URL::asset('web/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/js/jquery-2.1.4.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/js/super-simple-jquery-parallax-background.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/js/jquery.prettyPhoto.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/js/jquery.elevatezoom.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/vendor/layerslider/js/greensock.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/vendor/layerslider/js/layerslider.transitions.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/vendor/layerslider/js/layerslider.kreaturamedia.jquery.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('web/js/main.js') }}"></script>
        
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
            border: none;
          }
    </style>

        
    </head>

    <body>

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
              return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=363042937208025";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
        
        
                @include('web::layout.web_header')

                <section id="slider" >
                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8 col-md-9 col-sm-push-4 col-md-push-3">

                                @yield('content')

                            </div>

                            @include('web::layout.web_sidemenu')

                        </div>

                    </div>
                </section>

            

        @include('web::layout.web_footer')