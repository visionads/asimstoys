@extends('web::layout.web_master')

@section('content')

<div class="pos-new-product home-text-container">
	<h4>{{$productdata->title}}</h4>

	<div class="col-md-12">
		<div class="row">

			<div class="col-md-6">
				<div class="product_gallery_section">
					<div class="main_open_image">
						<img class="img-responsive" id="zoom_01" src="{{URL::to('')}}/{{$productdata->image}}" data-zoom-image="{{URL::to('')}}/{{$productdata->image}}"/>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="product_details">
					<div class="availability_container">
						<p>
                            <span class="current_price">
                                Price $
                                <span id="current-price-change">
                                    <?php echo $productdata->sell_rate; ?>
                                </span>
                            </span>
                        </p>
					</div>
					<?php echo $productdata->short_description; ?>
					<a class="email_us" href="#" data-toggle="modal" data-target="#myModal" >
						<img src="{{URL::to('')}}/web/images/ask.png">
							<br/>
								EMAIL
					</a>

					<form method="post" action="{{URL::to('/')}}/order/add_to_cart" class="<?php if(!empty($product_variation_r)){echo 'product_details_buynow_form';}else{echo 'product_details_buynow_form product_details_buynow_form_up';} ?>">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<input type="hidden" name="product_id" value="{{$productdata->id}}">
							@if(!empty($product_variation_r))
								<div class="width50">
									@if($product_subgroup->slug =='number-plates')
										<label>color</label>
									@else
										<label>Price</label>
									@endif
									
									<select name="color" onchange="getval(this);">
										@foreach($product_variation_r as $product_variation)
											<option value="{{$product_variation->slug}}">{{$product_variation->title}}</option>
										@endforeach
										
									</select>
								</div>
							@endif

							@if($product_subgroup->slug =='number-plates')
							<div class="width50">
								<label>Background</label>
								<select name="background">
									<option value="Black">Black</option>
									<option value="White">White</option>
									<option value="Red">Red</option>
									<option value="Blue">Blue</option>
									<option value="Pink">Pink</option>			
								</select>
							</div>

                            <div class="width100">
                                <label>Text for Plate</label>
                                <input type="text" name="text_of_number_plate" required="required" style="padding: 10px; margin-left: -0px; margin-top: -0px; background: #efefef; border: 1px solid #efefef; width: 93%; color: black;" placeholder="type your text">

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


						</div>

						<input type="submit" name="submit" value="Buy Now">
					</form>
				</div>
			</div>

		</div>
	</div>

</div>


    <script>
        function getval(sel) {
            var value = sel.value;
            document.getElementById('current-price-change').innerHTML =value;
        }
    </script>

@stop