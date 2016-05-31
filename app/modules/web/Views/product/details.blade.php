@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-text-container">
		<h4>{{$product->title}}</h4>

		<div class="col-md-12">
			<div class="row">

				<div class="col-md-12">

					<div class="col-md-6">
						<div class="product_gallery_section">

							<div class="main_open_image">
								@if(!empty($product_single_gallery))
									<img id="zoom_01" src="{{URL::to('')}}/{{$product_single_gallery->image}}" data-zoom-image="{{URL::to('')}}/{{$product_single_gallery->image}}"/>
								@else
									<p class="no_gallery_yet">No gallery yet.</p>
								@endif
								
							</div>

							

						</div>
					</div>


					<div class="col-md-6">
						<div class="product_details">
							<div class="availability_container">
								<p><span class="avaliablity">Availability:</span><span class="in_stock">
									<?php
										if($product->stock_unit_quantity == 0){
											echo 'Out of Stock';
										}else{
											echo 'In Stock (only '. $product->stock_unit_quantity .'left)';
										}
									?>
									</span></p>
								<p>
									@if(!empty($product->cost_price))
										@if($product->preorder == '1')
											Buy now &nbsp;
										@else
											Was &nbsp;
										@endif
									 <span class="previous_price">$<?php echo $product->cost_price;?></span>
									@endif

										@if($product->preorder == '1')
											Pre order &nbsp;
										@else
											Buy now &nbsp;
										@endif
									 	<span class="current_price"> $<?php echo $product->sell_rate; ?></span></p>
							</div>
							<?php echo $product->short_description; ?>



							<form method="post" action="{{URL::to('/')}}/order/add_to_cart" class="<?php if(!empty($product_variation_r)){echo 'product_details_buynow_form';}else{echo 'product_details_buynow_form product_details_buynow_form_up';} ?>">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
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


									<input type="submit" name="submit" value="Buy Now">

									
							<!-- Button trigger modal -->
							<a class="email_us" href="#" data-toggle="modal" data-target="#myModal" >
								<img src="{{URL::to('')}}/web/images/ask.png">
									<br/>
										EMAIL
							</a>
							  	
							
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
							</form>
						</div>
					</div>


					<div id="gallery_01">

								@if(!empty($product_gallery_all))
									@foreach($product_gallery_all as $product_gallery)
										<a href="#" data-image="{{URL::to('')}}/{{$product_gallery->image}}" data-zoom-image="{{URL::to('')}}/{{$product_gallery->image}}"> <img id="zoom_01" src="{{URL::to('')}}/{{$product_gallery->image}}" /> </a>
									@endforeach
								@endif
								
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
					    <li role="presentation"><a href="#shippingcost" aria-controls="messages" role="tab" data-toggle="tab">Shipping Cost</a></li>
					    <li role="presentation"><a href="#warranty" aria-controls="settings" role="tab" data-toggle="tab">Warranty</a></li>
					    <li role="presentation"><a href="#returns" aria-controls="settings" role="tab" data-toggle="tab">Returns</a></li>
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
					    <div role="tabpanel" class="tab-pane" id="shippingcost">
					    	No shipping content yet.
					    </div>
					    <div role="tabpanel" class="tab-pane" id="warranty">
					    	No warranty content yet.
					    </div>
					    <div role="tabpanel" class="tab-pane" id="returns">
					    	No returns content yet.
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
							<div class="item-inner">
								<a href="{{URL::to('/')}}/{{$related_product->slug}}" title="Malesuada mi" class="bigpic_15_newproduct123 product_image">
									<img src="{{URL::to('/')}}/{{$related_product->image}}"  alt="" />
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
		zoomWindowHeight:200
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
@stop