
        <section class="footer-container">
            <div class="container">
                <div class="footer-left-col">
                    <div class="footer-menu">
                        <ul>
                            <li>
                                <a href="{{Url::to('')}}/privacy-policy">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="{{Url::to('')}}/delivery-policy">Delivery Policy</a>
                            </li>
                            <li>
                                <a href="{{Url::to('')}}/about-us">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-right-col">
                    <a class="developer-company" target="_blank" href="http://visionads.com.au/">SEO & Website by VisionsAds</a>
                </div>
            </div>
        </section>

        <script type="text/javascript">

        $(document).ready(function () {
            $(".menu-one").click(function(){
                $('#main-nav-menu').hide();
                $('#left-menu .category-list').toggle();
            });

            $(".menu-two").click(function(){                
                $('#left-menu .category-list').hide();
                $('#main-nav-menu').toggle();
            });
        });
            
        </script>

    </body>
</html>