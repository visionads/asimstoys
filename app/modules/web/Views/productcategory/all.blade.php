@extends('web::layout.web_master')

@section('content')

	<div class="products mb-30">
		<h5 class="box-tb-border">
			{{$product_subgroup->title}}
		</h5>

		<div class="products-box box-tb-border-b ">
			@if(count($productdata))
				@foreach($productdata as $product)

					<div class="single-prodect custom-col-xs-6 col-sm-6 col-md-4">
						<div class="each-p-details">
							<a href="{{URL::to('/')}}/{{$product->slug}}">
								
								@if($product->sticker !='none')
									
									@if($product->sticker == 'Sale')
										<div class="product-label sale">
											&nbsp;&nbsp;{{@$product->sticker}}&nbsp;&nbsp;
										</div>
									@elseif($product->sticker == 'Clearance')
										<div class="product-label clearance">
											{{@$product->sticker}}
										</div>
									@elseif($product->sticker == 'In-stock')
										<div class="product-label in-stock">
											{{@$product->sticker}}
										</div>
									@elseif($product->sticker == 'Preorder')
										<div class="product-label pre-order">
											{{@$product->sticker}}
										</div>
									@else
										{{@$product->sticker}}
									@endif
										
									
								@endif

								<amp-img src="{{URL::to('/')}}/{{@$product->image}}"  alt="{{@$product->title}}" width="300" height="220" layout="responsive"> </amp-img>

								@if(!empty($product->old_price))
									<div class="price old-price">
		                    		<span class="old_price">${{number_format(@$product->old_price, 2)}}</span>
		                    	@else
		                    		<div class="price">
		                    	@endif
		                    		${{number_format(@$product->sell_rate, 2)}}
								</div>

								<h5>{{@$product->title}}</h5>
								
								@if(!empty($product->caption))

									<p>{{$product->caption}}</p>

								@endif

							</a>
							<div class="each-p-details-optn">
								<a href="{{URL::to('/')}}/{{$product->slug}}"><i class="fa fa-cart-arrow-down"></i></a>
								<a href="{{URL::to('/')}}/{{$product->slug}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>

				@endforeach
			@else
				<p style="color: #00a4e1;text-align: center;min-height: 200px;
    line-height: 100px;">Product not avaliable</p>
			@endif


		</div>

	</div>
	

@stop