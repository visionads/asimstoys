@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-new-product-container">

		<div class="pos-new-product-title title_block">
			<h4>Pre order</h4>
			
		</div>


		
			@if(!empty($productdata))
				<ul>
					@foreach($productdata as $product)
						<li class="newproductslider-item ajax_block_product first_item last_item_of_line ">
							<div class="item-inner">
								<a href="{{URL::to('/')}}/{{$product->slug}}" title="Malesuada mi" class="bigpic_15_newproduct123 product_image">
									<img src="{{URL::to('/')}}/{{$product->image}}"  alt="" />
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