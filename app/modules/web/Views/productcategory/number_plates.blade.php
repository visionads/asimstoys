@extends('web::layout.web_master')

@section('content')

<div class="products mb-30">
	<h5 class="box-tb-border">
		{{$productdata->title}}
	</h5>

	<div class="products-box box-tb-border-b ">

		<div class="col-md-6 col-xs-12">

			<div class="product_gallery_section">
				
				<img class="img-responsive" src="{{URL::to('')}}/{{$productdata->image}}" />
				
			</div>

		</div>

		<div class="col-md-6 col-xs-12">

			<div class="number-plates">

				<div class="product-cart-card">
					<div class="total-price mb-10">
						Price: $<?php echo $productdata->sell_rate; ?>
					</div>
				</div>

				<div class="description">
					<?php echo $productdata->short_description; ?>	
				</div>
				
				<form method="post" action="{{URL::to('/')}}/order/add_to_cart" class="<?php if(!empty($product_variation_r)){echo 'product_details_buynow_form';}else{echo 'product_details_buynow_form product_details_buynow_form_up';} ?>">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="price_asim" value="{{@$productdata->sell_rate}}" id="price-amount">
					<div class="form-group">
						<input type="hidden" name="product_id" value="{{$productdata->id}}">
						@if(!empty($product_variation_r))
							<div class="col-xs-12">
								@if($product_subgroup->slug =='number-plates')
									<label>Color</label>
                                    <select name="color" >
                                        @foreach($product_variation_r as $product_variation)
                                            <option value="{{$product_variation->slug}}">{{$product_variation->title}}</option>
                                        @endforeach

                                    </select>
								@else
									<label>Price</label>
                                    <select name="color" onchange="getval(this);">
                                        @foreach($product_variation_r as $product_variation)
                                            <option value="{{$product_variation->slug}}">{{$product_variation->title}}</option>
                                        @endforeach

                                    </select>
								@endif
								

							</div>
						@endif

						@if($product_subgroup->slug =='number-plates')
						<div class="col-xs-12">
							<label>Background</label>
							<select name="background">
								<option value="Black">Black</option>
								<option value="White">White</option>
								<option value="Red">Red</option>
								<option value="Blue">Blue</option>
								<option value="Pink">Pink</option>			
								<option value="Yellow">Yellow</option>
								<option value="Magento">Magento</option>
								<option value="Purple">Purple</option>
							</select>
						</div>

						<div class="col-xs-12">
							<label>State</label>
							<select name="state">
								<option value="NSW">NSW</option>
								<option value="VIC">VIC</option>
								<option value="QLD">QLD</option>
								<option value="SA">SA</option>
								<option value="WA">WA</option>			
								<option value="TAS">TAS</option>
								<option value="NT">NT</option>
							</select>
						</div>

                        <div class="col-xs-12">
                            <label>Text for Plate</label>
                            <input type="text" name="text_of_number_plate" required="required" placeholder="Type your text">

                        </div>
						@endif

						@if($product_subgroup->slug =='kids-mini-driver-licence')

							<div class="col-xs-12">
	                            <label>Name</label>
	                            <input type="text" name="text_of_number_plate" required="required" placeholder="Type your name">

	                        </div>

	                        <div class="col-xs-12">
								<label>State</label>
								<select name="state">
									<option value="NSW">NSW</option>
									<option value="VIC">VIC</option>
									<option value="QLD">QLD</option>
									<option value="SA">SA</option>
									<option value="WA">WA</option>			
									<option value="TAS">TAS</option>
									<option value="NT">NT</option>
								</select>
							</div>

							<div class="col-xs-12">
	                            <label>Birthday</label>
	                            <input type="text" name="color" required="required" placeholder="Type your birthday">

	                        </div>

	                        <div class="col-xs-12">
	                            <label>Favourite Car</label>
	                            <input type="text" name="background" required="required" placeholder="Type your favourite car">

	                        </div>

	                         <div class="col-xs-12">
								<label>License Class</label>
								<select name="theme">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									
								</select>
							</div>

						@endif

						@if($product_subgroup->slug =='kids-mini-themed-licence')

							<div class="col-xs-12">
	                            <label>Name</label>
	                            <input type="text" name="text_of_number_plate" required="required" placeholder="Type your name">

	                        </div>

	                        <div class="col-xs-12">
								<label>State</label>
								<select name="state">
									<option value="NSW">NSW</option>
									<option value="VIC">VIC</option>
									<option value="QLD">QLD</option>
									<option value="SA">SA</option>
									<option value="WA">WA</option>			
									<option value="TAS">TAS</option>
									<option value="NT">NT</option>
								</select>
							</div>

							<div class="col-xs-12">
	                            <label>Birthday</label>
	                            <input type="text" name="color" required="required" placeholder="Type your birthday">

	                        </div>

	                        <div class="col-xs-12">
	                            <label>Favourite Car</label>
	                            <input type="text" name="background" required="required" placeholder="Type your favourite car">

	                        </div>

	                         <div class="col-xs-12">
								<label>Theme</label>
								<select name="theme">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									
								</select>
							</div>

						@endif

						<div class="col-xs-12">
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

					<div class="col-xs-12">
						<div class="product-cart-card">

							<input type="submit" name="submit" class="add-to-cart-btn" value="Add to Cart">

						</div>
					</div>
				</form>
			</div>

		</div>

	</div>
</div>


    <script>
        function getval(sel) {
            var value = sel.value;
            document.getElementById('current-price-change').innerHTML =value;
            document.getElementById('price-amount').value =value;
        }
    </script>

@stop