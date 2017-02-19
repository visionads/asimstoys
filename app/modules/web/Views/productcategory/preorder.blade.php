@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-new-product-container">

		<div class="pos-new-product-title title_block">
			<h4>{{$header}}</h4>
            <small>Please note this is pre-sale listings, not in stock. Comming Soon ... </small>
			
		</div>


		
			@if(!empty($productdata))
				<ul>
					@foreach($productdata as $product)
						<li class="newproductslider-item ajax_block_product first_item last_item_of_line ">
							<div class="item-inner">
								@if($product->sticker !='none')
									<div class="sticker">
										@if($product->sticker == 'Sale')
											<div class="sale">
												&nbsp;&nbsp;{{@$product->sticker}}&nbsp;&nbsp;
											</div>
										@elseif($product->sticker == 'Clearance')
											<div class="clearance">
												{{@$product->sticker}}
											</div>
										@elseif($product->sticker == 'In-stock')
											<div class="in-stock">
												{{@$product->sticker}}
											</div>
										@elseif($product->sticker == 'Preorder')
											<div class="pre-order">
												{{@$product->sticker}}
											</div>
										@else
											{{@$featured_product->sticker}}
										@endif
										
									</div>
								@endif
								<a href="{{URL::to('/')}}/{{@$product->slug}}" title="{{@$product->title}}" class="bigpic_15_newproduct123 product_image">
									<amp-img src="{{URL::to('/')}}/{{@$product->image}}"  alt="{{@$product->title}}" width="250" height="230" layout="responsive"> </amp-img>
								</a>
								<h5 class="s_title_block">
									<a href="{{URL::to('/')}}/{{$product->slug}}" title="Malesuada mi">{{$product->title}}</a>
								</h5>
			                                            
			                    <p class="price_container"><span class="price">${{$product->sell_rate}}</span></p>                                            						
								<div class="action">						
									<a class="exclusive ajax_add_to_cart_button" href="{{URL::to('/')}}/{{$product->slug}}" title="Add to Cart">&nbsp;</a>
									<a class="lnk_more" href="{{URL::to('/')}}/{{$product->slug}}" title="View">&nbsp;</a>
			                     </div>
							</div>
						</li>
					@endforeach
				</ul>
			@endif
		

	</div>
@stop