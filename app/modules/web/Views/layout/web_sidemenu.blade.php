<?php
	use App\ProductSubgroups;
?>

<div class="col-xs-12 col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">

	<div class="category mb-30 hidden-xs">
		
		<div class="category-btn">
			<span>Asim’s Toys Categories</span>
			<button type="button" class="navbar-toggle collapsed visible-xs" data-toggle="collapse" data-target=".xxxxxx">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="category-dropdown-wrapper">
			<ul class="category-list clearfix">
				<li class="catagory-li">
					<a class="orange" href="{{URL::to('')}}/product">All Products</a></li>

				@if(!empty($productgroup_data))
					@foreach($productgroup_data as $productgroup)
						<li class="catagory-li">
							@if($productgroup->id == '4')
								<a class="sidemenu-{{$productgroup->id}}" href="{{URL::to('')}}/pre-order">{{$productgroup->title}}</a>
							@elseif($productgroup->id == '5')
								<a class="sidemenu-{{$productgroup->id}}" href="{{URL::to('')}}/finance-lay-by">{{$productgroup->title}}</a>
							@elseif($productgroup->id == '3')
								<a class="sidemenu-{{$productgroup->id}}" href="{{URL::to('')}}/{{$productgroup->slug}}">{{$productgroup->title}}<i class="fa fa-angle-right"></i></a>
							@else
								<a class="sidemenu-{{$productgroup->id}}" href="#">{{$productgroup->title}}
								<i class="fa fa-angle-right"></i></a>
							@endif
							

							<?php
								$product_subgroup_data =  DB::table('product_subgroup')->where('product_group_id', $productgroup->id)->orderBy('sort_order','asc')->get();
								if(!empty($product_subgroup_data)):
							?>
									<ul class="submenu">
										@foreach($product_subgroup_data as $product_subgroup)
											<li>
												<a href="{{URL::to('/')}}/{{$productgroup->slug}}/{{$product_subgroup->slug}}">{{$product_subgroup->title}}</a>
												<?php
													if($product_subgroup->id == 7):
												?>
													<ul class="submenu-2">
														<li>
															<a href="{{Url::to('/')}}/{{$productgroup->slug}}/{{$product_subgroup->slug}}/by-brand">By Brands</a>
														</li>
														<li>
															<a href="{{Url::to('/')}}/{{$productgroup->slug}}/{{$product_subgroup->slug}}/by-seats">By Seats</a>
														</li>
														<li>
															<a href="{{Url::to('/')}}/{{$productgroup->slug}}/{{$product_subgroup->slug}}/by-voltage">By Voltage</a>
														</li>
													</ul>
												<?php endif; ?>
											</li>
										@endforeach
									</ul>

							<?php endif; ?>
						</li>
					@endforeach
				@endif

				
			</ul>
		</div>

	</div>

	<div class="category ">

		<div class="fb-box box-tb-border-b hidden-xs">
			<h5 class="box-tb-border">Social Connect</h5>
			<div class="fb-content">
				<div class="fb-page" data-href="https://www.facebook.com/Asims-Toys-Kids-Ride-On-Toys-869410779777184/" data-tabs="timeline" data-height="380" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
			</div>
			<div class="other-social">
				<ul>
					<li><a href="https://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>
					<li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="new-letter box-tb-border-b hidden-xs">
			<h5 class="box-tb-border">Join Our Newsletter</h5>
			<form id="newsletter" >
				<input type="email" name="email_newsletter" placeholder="Email Address">
				<input type="submit">
			</form>
		</div>
		<div class="about-box box-tb-border-b">
			<?php
				$about_asimstoys = DB::table('article')->where('id','14')->where('status','active')->first();
			?>
			<h5 class="box-tb-border">{{@$about_asimstoys->title}}</h5>
			<div class="about-box-text">
				<?php echo isset($about_asimstoys->desc)?$about_asimstoys->desc:null; ?>
			</div>
		</div>
		<div class="about-box box-tb-border-b">
			<h5 class="box-tb-border">Secure Payment</h5>
			<img src="{{Url::to('/')}}/web/img/payment.jpg" class="img-responsive" alt="Payment">
			<div class="payment-info">
				All transactions are securely process and encrypted by the eWAY payment gateway platform. Credit Card information is never stored.
			</div>
		</div>

	</div>

</div>
