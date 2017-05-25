@extends('web::layout.web_master')

@section('content')

        <div class="slider mb-30">
			<div id="layerslider" class="slider-wrapper hidden-xs">

				@if(!empty($slider_data))
					@foreach($slider_data as $slider)

						<div class="ls-slide due-respect" data-ls="slidedelay:4500;transition2d:5;">
							<img src="{{URL::to('/')}}/{{@$slider->image}}" class="ls-bg img-responsive"/>
						</div>

					@endforeach
				@endif
								
			</div>
		</div>

		<div class="products mb-30">
			<h5 class="box-tb-border">NEW PRODUCTS</h5>
			<div class="products-box box-tb-border-b ">

				@if(!empty($featured_product_data))
					@foreach($featured_product_data as $featured_product)

						<div class="single-prodect custom-col-xs-6 col-sm-6 col-md-4">
							<div class="each-p-details">
								<a href="{{URL::to('/')}}/{{@$featured_product->slug}}">

									@if($featured_product->sticker !='none')
									
										@if($featured_product->sticker == 'Sale')
											<div class="product-label sale">
												&nbsp;&nbsp;{{@$featured_product->sticker}}&nbsp;&nbsp;
											</div>
										@elseif($featured_product->sticker == 'Clearance')
											<div class="product-label clearance">
												{{@$featured_product->sticker}}
											</div>
										@elseif($featured_product->sticker == 'In-stock')
											<div class="product-label in-stock">
												{{@$featured_product->sticker}}
											</div>
										@elseif($featured_product->sticker == 'Preorder')
											<div class="product-label pre-order">
												{{@$featured_product->sticker}}
											</div>
										@else
											{{@$featured_product->sticker}}
										@endif
										
									
								@endif
									

									<amp-img src="{{URL::to('/')}}/{{@$featured_product->image}}"  alt="{{@$featured_product->title}}" width="300" height="220" layout="responsive"> </amp-img>
																		
									@if(!empty($featured_product->old_price))
										<div class="price old-price">
			                    		<span class="old_price">${{number_format(@$featured_product->old_price, 2)}}</span>
			                    	@else
			                    		<div class="price">
			                    	@endif
			                    		${{number_format(@$featured_product->sell_rate, 2)}}
									</div>
									<h5>{{@$featured_product->title}}</h5>

									@if(!empty($featured_product->caption))

										<p>{{$featured_product->caption}}</p>

									@endif
								</a>
								<div class="each-p-details-optn">
									<a href="{{URL::to('/')}}/{{@$featured_product->slug}}"><i class="fa fa-cart-arrow-down"></i></a>
									<a href="{{URL::to('/')}}/{{@$featured_product->slug}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>

					@endforeach
				@endif

				{!! $featured_product_data->render() !!}
				

			</div>

			<div class="youtube-box">

				@if(!empty($youtube_link))
					@foreach($youtube_link as $youtube)

						<div class="each-youtube col-xs-4 col-sm-4">
							<div class="ytube-vdo">
								<a data-rel="prettyPhoto" href="{{@$youtube->link}}">

									@if(!empty($youtube->image))
										<img src="{{URL::to('/')}}/{{$youtube->image}}" alt="YouTube" class="img-responsive">
									@else
										<img src="{{URL::to('/')}}/web/images/youtube.jpg" alt="YouTube" class="img-responsive">
									@endif	

								</a>
							</div>
						</div>

					@endforeach
				@endif

			</div>


		</div>



	

<script type="text/javascript">
  // Running the code when the document is ready
  $(document).ready(function () {

	// Calling LayerSlider on the target element
	$('#layerslider').layerSlider({
	  firstLayer: 1,
	  responsive: true,
	  autoStart: true,
	  //navPrevNext: true,
	  pauseOnHover: false,
	  // skin: 'fullwidth',
	  //skin: 'borderlesslight3d',
	  hoverPrevNext: false,
	  skinsPath: 'web/vendor/layerslider/skins/'
	});
	// Preety Photo
	$(".ytube-vdo a").prettyPhoto();
  });
</script>

@stop