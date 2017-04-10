@extends('web::layout.web_master')

@section('content')

        
		<div class="home-banner-container">
			<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">

				@if(!empty($slider_data)):
					@foreach($slider_data as $slider)
						<div data-src="{{URL::to('/')}}/{{@$slider->image}}"></div>
					@endforeach
				@endif;

	            
	        </div><!-- #camera_wrap_1 -->
		</div>

		<div class="pos-new-product home-text-container">
			<h4>{{@$data->title}}</h4>
			<div class="description">
				<?php echo isset($data->desc)?$data->desc:null; ?>
			</div>
		</div>


		<div class="pos-new-product home-new-product-container">
			<div class="pos-new-product-title title_block">
				<h4>New Products</h4>
			</div>

			<ul>
			
				@if(!empty($featured_product_data)):
					@foreach($featured_product_data as $featured_product)

						<li class="newproductslider-item ajax_block_product first_item last_item_of_line ">
							<div class="item-inner">
								@if($featured_product->sticker !='none')
									<div class="sticker">
										@if($featured_product->sticker == 'Sale')
											<div class="sale">
												&nbsp;&nbsp;{{@$featured_product->sticker}}&nbsp;&nbsp;
											</div>
										@elseif($featured_product->sticker == 'Clearance')
											<div class="clearance">
												{{@$featured_product->sticker}}
											</div>
										@elseif($featured_product->sticker == 'In-stock')
											<div class="in-stock">
												{{@$featured_product->sticker}}
											</div>
										@elseif($featured_product->sticker == 'Preorder')
											<div class="pre-order">
												{{@$featured_product->sticker}}
											</div>
										@else
											{{@$featured_product->sticker}}
										@endif
										
									</div>
								@endif
								<a href="{{URL::to('/')}}/{{@$featured_product->slug}}" title="{{@$featured_product->title}}" class="bigpic_15_newproduct123 product_image">
									<amp-img src="{{URL::to('/')}}/{{@$featured_product->image}}"  alt="{{@$featured_product->title}}" width="250" height="230" layout="responsive"> </amp-img>

									@if($featured_product->sold_out =='yes')
										<span class="sold_out">Sold out</span>
									@endif
								</a>
				
								<h5 class="s_title_block">


									<a href="{{URL::to('/')}}/{{@$featured_product->slug}}" title="{{@$featured_product->title}}">{{@$featured_product->title}}</a>
								</h5>
			                                            
			                    <p class="price_container"><span class="price">
			                    	@if(!empty($featured_product->old_price))
			                    		<span class="old_price">${{number_format(@$featured_product->old_price, 2)}}</span>
			                    	@endif
			                    	${{number_format(@$featured_product->sell_rate, 2)}}</span></p>
								<div class="action">						
									<a class="exclusive ajax_add_to_cart_button" href="#" title="Add to Cart">&nbsp;</a>
									<a class="lnk_more" href="{{URL::to('/')}}/{{$featured_product->slug}}" title="View">&nbsp;</a>
			                     </div>
							</div> 
						</li>


					@endforeach
				@endif

				



			</ul>
		</div>

		<div class="pos-new-product home-text-container">
		
			@if(!empty($youtube_link))
				@foreach($youtube_link as $youtube)
					
					<div class="col-md-4 col-xs-4 col-sm-4">
						<div class="home-youtube">
							<a class="fancybox-media" href="{{@$youtube->link}}">
								@if(!empty($youtube->image))
									<amp-img src="{{URL::to('/')}}/{{$youtube->image}}" 
width="261" height="261" layout="responsive"> </amp-img>
								@else
									<amp-img src="{{URL::to('/')}}/web/images/youtube.jpg" 
width="261" height="261" layout="responsive"> </amp-img>
								@endif
								
							</a>
						</div>
					</div>
			
				@endforeach
			@endif
			
		</div>

	
@stop




							
							

							

							


