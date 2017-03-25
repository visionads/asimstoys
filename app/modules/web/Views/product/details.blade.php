@extends('web::layout.web_master')

@section('content')


<?php
	
	function search($array, $key, $value)
	{
		$results = array();

		if (is_array($array)) {
			if (isset($array[$key]) && $array[$key] == $value) {
				$results[] = $array;
			}

			foreach ($array as $subarray) {
				$results = array_merge($results, search($subarray, $key, $value));
			}
		}

		return $results;
	}

?>
	<div class="pos-new-product home-text-container">
		<h4>{{$product->title}}</h4>



		<div class="col-md-12">
			<div class="row">

				<div class="col-md-12">


					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="product_gallery_section">

							<div class="main_open_image">
								@if(!empty($product_single_gallery))
									<img id="zoom_01" src="{{URL::to('')}}/{{$product_single_gallery->image}}" data-zoom-image="{{URL::to('')}}/{{$product_single_gallery->image}}" width="100%" height="350px" />
								@else
									<p class="no_gallery_yet">No gallery yet.</p>
								@endif
								
							</div>
                            <div id="gallery_01">

                                @if(!empty($product_gallery_all))
                                    @foreach($product_gallery_all as $product_gallery)
                                        <a href="#" data-image="{{URL::to('')}}/{{$product_gallery->image}}" data-zoom-image="{{URL::to('')}}/{{$product_gallery->image}}"> <img id="zoom_01" src="{{URL::to('')}}/{{$product_gallery->image}}" /> </a>
                                    @endforeach
                                @endif

                            </div>



                            {{--Social Share Start--}}

                            <script>
                                var popupSize = {
                                    width: 600,
                                    height: 500
                                };

                                $(document).on('click', '.social-buttons > a', function(e){

                                    var
                                            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                                            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

                                    var popup = window.open($(this).prop('href'), 'social',
                                            'width='+popupSize.width+',height='+popupSize.height+
                                            ',left='+verticalPos+',top='+horisontalPos+
                                            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

                                    if (popup) {
                                        popup.focus();
                                        e.preventDefault();
                                    }

                                });
                            </script>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

                            <div class="social-buttons">
                                Share :
                                <a href="https://www.facebook.com/sharer/sharer.php?url={{ urlencode(Request::fullUrl()) }}"
                                   target="_blank">
                                    <i class="fa fa-facebook-official"> Facebook</i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}"
                                   target="_blank">
                                    <i class="fa fa-twitter-square"> Twitter</i>
                                </a>
                                <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}"
                                   target="_blank">
                                    <i class="fa fa-google-plus-square"> Google Plus</i>
                                </a>
                            </div>


                            {{--Social Share END--}}

						</div>
					</div>


					<div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="col-md-12" style="padding: 0px; margin: 0px;">
                            <div class="product_details_tab" style="background: none; ">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist" >
                                    <li role="presentation" class="{{\Session::has('active_fc')?'':'active'}}">
                                        <a href="#product-details-of" aria-controls="messages" role="tab" data-toggle="tab" style="color: black; border-bottom: 0px;">Product Details</a>
                                    </li>
                                    <li role="presentation" class="{{\Session::get('active_fc')}}">
                                        <a href="#freight-panel" aria-controls="settings" role="tab" data-toggle="tab" style="color: white; border-bottom: 0px; background-color: #D42E98; ">Freight Calculation </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane {{\Session::has('active_fc')?'':'active'}}" id="product-details-of" style="padding: 0px;">
                                        {{--
                                            Product area
                                        --}}


                                        <form method="post" action="{{URL::to('/')}}/order/add_to_cart" class="<?php if(!empty($product_variation_r)){echo 'product_details_buynow_form';}else{echo 'product_details_buynow_form product_details_buynow_form_up';} ?>">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <div class="product_details">
                                            <div class="availability_container">
                                                <p>
                                                    <span class="avaliablity">Availability:</span><span class="in_stock">
                                                        <?php
                                                            if($product->stock_unit_quantity <= 0){
                                                                echo 'Out of Stock';
                                                            }else{
                                                                echo 'In Stock (only '. $product->stock_unit_quantity .' left)';
                                                            }
                                                        ?>

                                                    </span>
                                                </p>
                                                <div>
                                                    <div class="col-md-12">
														
														@if($product->product_group_id != '9')
															<span class="previous_price">
																Price: 
                                                                @if(!empty($product->old_price))
                                                                    <span class="old_price">${{number_format(@$product->old_price, 2)}}</span>
                                                                @endif
                                                                $ <?php echo $product->sell_rate;?>
															</span>
														@endif
														
														@if($product->preorder == '1')
                                                                <label>
                                                                    <input type="radio" checked name="price_asim" value="{{$product->sell_rate}}" required="required">
                                                                    Pre order &nbsp;<br>
                                                                    <small style="font-weight: normal; line-height: 0;">" $50 minimum Pre order. Chose partial payment option at the checkout "</small>
                                                           
                                                                </label>
														@endif

                                                        <div class="col-md-6">
														
															
																		
                                                            @if(!empty($product->cost_price))
                                                                @if($product->preorder != '1' || $product->preorder == '0' )

                                                                    <label>
                                                                        <input type="radio" name="price_asim" value="{{$product->sell_rate}}" required="required" checked="checked">
                                                                        Buy now &nbsp;
                                                                        @if($product->product_group_id == '9')
																		<span class="previous_price text-align-left">
																			$ <?php echo $product->sell_rate;?>
																		</span>
																	@endif
                                                                    </label>

                                                                {{--@else
                                                                    Was &nbsp;--}}
                                                                {{--@endif--}}

                                                                @endif
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                           

                                                            @if($product->product_group_id == '9')
                                                                <label>
                                                                    <input type="radio" name="price_asim" value="{{$product->cost_price}}" required="required">
                                                                    Special Rate &nbsp;
																	<span class="previous_price text-align-left">
																		$ <?php echo $product->cost_price;?>
																	</span>
                                                                </label>
															@else
																
																@if($product->preorder != '1')
																	<label>
																		<input type="radio" name="price_asim" value="{{$product->cost_price}}" required="required">
																		Layby &nbsp; <br>
																		<small style="font-weight: normal; line-height: 0;">" $50 minimum layby. Chose partial payment option at the checkout "</small>
																	</label>
																@endif
                                                            @endif
                                                        </div>
                                                        <p>

                                                            <div style="text-align: center;">
                                                                <img src="{{asset('images/zip_money.png')}}" width="120" >
                                                                Learn about how you can buy now and pay later with
                                                                <a href="http://www.zippay.com.au" title="Buy Now, and Pay Later with zipPay" target="_blank" style="text-decoration: underline;">zipPay</a>
                                                            </div>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div style="width: 100%; border-bottom: 1px solid #efefef; padding-bottom: 10px">
                                                <?php echo $product->short_description; ?>

                                            </div>


                                            <input type="hidden" name="weight" value="{{$product->weight}}">
                                            <input type="hidden" name="volume" value="{{$product->volume}}">
                                            <div class="form-group">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="price_amount" value="{{@$product->sell_rate}}" id="price-amount">
                                                @if(!empty($product_variation_r))
                                                    <div class="width50">
                                                        <label>color</label>
                                                        <select name="color">
                                                            @foreach($product_variation_r as $product_variation)
                                                                <option value="{{$product_variation->title}}">{{$product_variation->title}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                @endif

                                                <div class="width50">
                                                    <label>Quantity</label>
                                                    <select name="quantity">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>

                                                <div style="text-align: center; ">
                                                    <p>&nbsp; </p>
													<?php
													
													
														if($product->stock_unit_quantity > 0){
															
														
																$show_add_to_cart = 'no';
																
																if(Session::has('product_cart')){
																	$product_cart_exists = Session::get('product_cart');
																
																	$check_value = search($product_cart_exists, 'product_id', $product->id);

																	if(!empty($check_value)){
																		$show_add_to_cart = 'yes';
																	}else{
																		$show_add_to_cart = 'no';
																	}
																}
																
																if($show_add_to_cart == 'yes'){
													?>
																	<span class="register_btn no_add_cart">Add to Cart</span>
													<?php
																}else{
																	
													?>
																	<input type="submit" name="submit" class="register_btn" value="Add to Cart" style="padding: 10px; text-align: center; ">
													<?php
																}

														}
													?>
                                                </div>


{{--
                                                <!-- Button trigger modal -->
                                                <a class="email_us" href="#" data-toggle="modal" data-target="#myModal" >
                                                    <img src="{{URL::to('')}}/web/images/ask.png">
                                                    <br/>
                                                    EMAIL
                                                </a>--}}


                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="email_us_container">
                                                                    <div class="form-group">
                                                                        <label>Product Name</label>
                                                                        {{$product->title}}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" name="name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input type="text" name="email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Message</label>
                                                                        <textarea name="message" ></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input class="submit" type="submit" name="name" value="Send">
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </form>
                                        {{--
                                        End Product Area.
                                        --}}

                                    </div>

                                    @if($product->product_group_id !=7)

                                    <div role="tabpanel" class="tab-pane {{\Session::get('active_fc')}}" id="freight-panel">
                                        {{--Freight Panel--}}

                                        <small> Shipping Cost and method (TNT Express) for this product <b>{{$product->title}}</b> </small>
                                        @if(\Session::has('cal'))
                                            <div id="freight-result" style="font-size: 13px; color: blue; font-weight: bold;">
                                                <br>
                                                {{\Session::get('cal')}}
                                                <p>&nbsp;</p>
                                            </div>
                                        @endif

                                        <div>
                                            {!! Form::open(array('url' => 'freight-cal-by-product', 'id'=>'fc-base-search')) !!}

                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <div class="form-group">
                                                    <input type="text" name="suburb" required="required" placeholder="type your suburb" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="postcode" required="required" placeholder="type your post code" class="form-control">
                                                </div>
                                                <div class="form-group" style="text-align: center">
                                                    <button class="btn btn-info btn-flat" type="submit" style="width: 90%">
                                                        Freight Calculation
                                                    </button>
                                                </div>

                                            {!! Form::close() !!}
                                        </div>



                                        {{--END Freight --}}
                                    </div>


                                    @endif
                                </div>
                            </div>
                        </div>


					</div>




				</div>


			</div>
		</div>
	</div>






	<div class="pos-new-product home-text-container">
		<div class="col-md-12">
			<div class="rowd">
				<div class="product_details_tab">
					<!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#specification" aria-controls="home" role="tab" data-toggle="tab">Specification</a></li>
					    <li role="presentation"><a href="#features" aria-controls="profile" role="tab" data-toggle="tab">Features</a></li>
					    <li role="presentation"><a href="#videos" aria-controls="settings" role="tab" data-toggle="tab">Videos</a></li>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="specification">

					    	<div class="product_specifications">
								<?php
									if(!empty($product->long_description)){
										echo $product->long_description;
									}else{
										echo 'No Specification yet.';
									}
								?>
							</div>

					    </div>
					    <div role="tabpanel" class="tab-pane" id="features">
					    	<?php
								if(!empty($product->features)){
									echo $product->features;
								}else{
									echo 'No Feature yet.';
								}
							?>
					    </div>
					    
					    <div role="tabpanel" class="tab-pane" id="videos">
					    	<div class="col-md-4">
								<div class="home-youtube">
									<?php
										if(!empty($product->videos)){
									?>

                                        <iframe width="420" height="345"
                                                src="{{ $product->videos }}">
                                        </iframe>
									<?php
										}else{
											echo 'No Video yet.';
										}
									?>
									
								</div>
							</div>
					    </div>
					  </div>
				</div>
			</div>
		</div>
	</div>

	<div class="pos-new-product home-new-product-container">
		<div class="pos-new-product-title title_block">
			<h4>Related Products</h4>
			<ul class="productlisting">
				@if(!empty($related_product_r))
					@foreach($related_product_r as $related_product)

						<li class="newproductslider-item ajax_block_product first_item last_item_of_line ">
							<div class="item-inner related-inner">
								
								<a href="{{URL::to('/')}}/{{@$related_product->slug}}" title="{{@$related_product->title}}" class="bigpic_15_newproduct123 product_image">
									<amp-img src="{{URL::to('/')}}/{{@$related_product->image}}"  alt="{{@$related_product->title}}" width="250" height="230" layout="responsive"> </amp-img>
								</a>
				
								<h5 class="s_title_block">
									<a href="{{URL::to('/')}}/{{$related_product->slug}}" title="Malesuada mi">{{$related_product->title}}</a>
								</h5>
			                                            
			                    <p class="price_container"><span class="price">${{$related_product->sell_rate}}</span></p>                                            						
								<div class="action">						
									<a class="exclusive ajax_add_to_cart_button" href="{{URL::to('/')}}/{{$related_product->slug}}" title="Add to Cart">&nbsp;</a>
									<a class="lnk_more" href="{{URL::to('/')}}/{{$related_product->slug}}" title="View">&nbsp;</a>
			                     </div>
							</div>
						</li>


					@endforeach
				@else
					<p class="no_gallery_yet">No related product yet.</p>
				@endif
			</ul>
		</div>
	</div>

	<script>

	$("#zoom_01").elevateZoom({
		gallery:'gallery_01',
		cursor: 'crosshair',
		galleryActiveClass: 'active',
		imageCrossfade: true,
		loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif',
		responsive:'True',
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 750,
		zoomWindowWidth:450,
		zoomWindowHeight:350
	});

	$("#zoom_01").bind("click", function(e) { var ez = $('#zoom_01').data('elevateZoom');	$.fancybox(ez.getGalleryList()); return false; });
  //    $('#zoom_01').elevateZoom({
		// cursor: "crosshair",
		// responsive:'True',
		// zoomWindowFadeIn: 500,
		// zoomWindowFadeOut: 750,
		// zoomWindowWidth:410,
		// zoomWindowHeight:378
  //  });
</script>

 {{--<script>
    //$(function(){
        $( '#fc-base-search').on('submit', function(e) {
            e.preventDefault();
            var suburb = $('#suburb-val').val();
            var postcode = $('#postcode-val').val();

            $.ajax({
                url: 'freight-cal-by-product',
                type: 'POST',
                dataType: 'json',
                data: { suburb:suburb, postcode:postcode, _token:'{{csrf_token()}}' },
                success: function(data)
                {
                    //$("#freight-result").html(response.code);
                    alert('OK');

                }
            });
        });
    //});
 </script>--}}
 
 <script>
        $('.no_add_cart').click(function(e)
        {
            $('#loadingModal').modal('show');
            return true;
        });

    </script>
 
   <div id="loadingModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                        Add to Cart
                    
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>
                        Dear Customer,<br/> You already add this product into cart.<br/><br/> Please add another one.
                    </p>
                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@stop