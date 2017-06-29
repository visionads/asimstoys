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

<div class=" mb-30">
    <div class="slider-wrapper ">

        <h5 class="box-tb-border">{{$product->title}}</h5>

        <div class="products-box product-details-box-wrapper box-tb-border-b ">
            <div class="clearfix mb-30">
                <div class="col-lg-7 product-zoom-wrapper ">
                    <div class="mb-30">
                        <div class="product-zoom-image-wrapper">
                            
                           @if(!empty($product_single_gallery))
                                    <img id="zoom_01" src="{{URL::to('')}}/{{$product_single_gallery->image}}" data-zoom-image="{{URL::to('')}}/{{$product_single_gallery->image}}" width="100%" height="350px" />
                                @else
                                    <p class="no_gallery_yet">No gallery yet.</p>
                                @endif

                        </div>
                        <div id="gallery_01" class="product-zoom-thumb-wrapper row">

                             @if(!empty($product_gallery_all))
                                @foreach($product_gallery_all as $product_gallery)
                                    <a href="#" data-image="{{URL::to('')}}/{{$product_gallery->image}}" data-zoom-image="{{URL::to('')}}/{{$product_gallery->image}}"> <img style="width: 120px;float: left;height: 80px;margin-right: 10px;margin-bottom: 10px;" id="zoom_01" src="{{URL::to('')}}/{{$product_gallery->image}}" /> </a>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ">
                    <div class="product-price-calculation-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="{{\Session::has('active_fc')?'':'active'}}">
                                <a href="#tab-product-details" aria-controls="profile" role="tab" data-toggle="tab">
                                    Product Details
                                </a>
                            </li>
                            <li role="presentation" class="{{\Session::get('active_fc')}}">
                                <a href="#tab-product-freight-calculation" aria-controls="profile" role="tab" data-toggle="tab">
                                    Freight Calculation
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane {{\Session::has('active_fc')?'':'active'}}" id="tab-product-details">
                                <div class="product-cart-card">

                                    <form method="post" action="{{URL::to('/')}}/order/add_to_cart" class="<?php if(!empty($product_variation_r)){echo 'product_details_buynow_form';}else{echo 'product_details_buynow_form product_details_buynow_form_up';} ?>">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="product-cart-card__header">
                                            <div class="product-cart-title">Availability: <?php
                                                    if($product->stock_unit_quantity <= 0){
                                                        echo 'Out of Stock';
                                                    }else{
                                                        //echo 'In Stock (only '. $product->stock_unit_quantity .' left)';
                                                        echo 'In Stock';
                                                    }
                                                ?></div>
                                        </div>
                                        <div class="product-cart-card__body">

                                        @if($product->product_group_id != '9')
                                            <div class="total-price mb-10">Price: @if(!empty($product->old_price))
                                                <span class="old_price">${{number_format(@$product->old_price, 2)}}</span>
                                            @endif
                                            $ <?php echo $product->sell_rate;?>
                                            </div>
                                        @endif

                                            <div class="row mb-10">

                                                @if($product->preorder == '1')
                                                    <div class="col-md-12">
                                                        <label>
                                                            <input type="radio" checked name="price_asim" value="{{$product->sell_rate}}" required="required">
                                                            PRE ORDER &nbsp;<br>
                                                            <small style="font-weight: normal;font-size: 9px;text-transform: uppercase;">" $50 minimum Pre order. Chose partial payment option at the checkout "</small>
                                                   
                                                        </label>
                                                    </div>
                                                @endif

                                                <div class="col-md-6 text-center text-uppercase">
                                                
                                                    
                                                                
                                                    @if(!empty($product->cost_price))
                                                        @if($product->preorder != '1' || $product->preorder == '0' )

                                                            <label>
                                                                <input type="radio" name="price_asim" value="{{$product->sell_rate}}" required="required" checked="checked">
                                                                BUY NOW&nbsp;
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
                                                            SPECIAL RATE &nbsp;
                                                            <div class="small-text">
                                                                $ <?php echo $product->cost_price;?>
                                                            </div>
                                                        </label>
                                                    @else
                                                        
                                                        @if($product->preorder != '1')
                                                            <label>
                                                                <input type="radio" name="price_asim" value="{{$product->cost_price}}" required="required">
                                                                LAY BY &nbsp; <br>
                                                                <div class="small-text"> $50 minimum layby. Chose partial payment option at the checkout "</div>
                                                            </label>
                                                        @endif
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="payment-way">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <img src="{{URL::to('')}}/web/images/zip-pay.png" alt="" class="img-responsive">
                                                    </div>
                                                    <div class="col-xs-8">
                                                        Learn about how you can buy now and pay later with zipPay
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-20">
                                      
                                                <input type="hidden" name="weight" value="{{$product->weight}}">
                                                <input type="hidden" name="volume" value="{{$product->volume}}">

                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="price_amount" value="{{@$product->sell_rate}}" id="price-amount">

                                                @if(!empty($product_variation_r))
                                                    <div class="col-xs-4 mb-10">
                                                    <div class="text-uppercase lebels">Color:</div>
                                                    </div>

                                                    <div class="col-xs-8 mb-10">
                                                        <select name="color" id="">
                                                            @foreach($product_variation_r as $product_variation)
                                                                <option value="{{$product_variation->title}}">{{$product_variation->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>                                                   

                                                @endif

                                                <div class="col-xs-4">
                                                    <div class="text-uppercase lebels">Quantity:</div>
                                                </div>
                                                <div class="col-xs-8">
                                                    <select name="quantity" id="">
                                                        @if($product->stock_unit_quantity > 0)
                                                            @for($i=1;$i<=$product->stock_unit_quantity;$i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-cart-card__footer">

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
                                                            <span class="add-to-cart-btn">Add to Cart</span>
                                            <?php
                                                        }else{
                                                            
                                            ?>
                                                        <input type="submit" name="submit" class="add-to-cart-btn" value="Add to Cart">
                                            <?php
                                                    }

                                                }
                                            ?>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @if($product->product_group_id !=7)
                                <div role="tabpanel" class="tab-pane {{\Session::get('active_fc')}} " id="tab-product-freight-calculation">
                                    <div class="product-cart-card">
                                        {!! Form::open(array('url' => 'freight-cal-by-product', 'id'=>'fc-base-search')) !!}
                                            
                                            <input type="hidden" name="product_id" value="{{$product->id}}">

                                            <div class="small-text mb-20">Shipping Cost and method (TNT Express) for this product SPRAY PAINT-PINK 24 VOLT BMW X7 STYLE TWO SEATS ,RUBBER WHEELS, LEATHER SEATS & REMOTE</div>
                                            <div class="form-group">
                                                <input type="text" name="suburb" id="" class="form-control" placeholder="Type your suburb">
                                            </div>
                                            <div class="form-group mb-20">
                                                <input type="text" name="postcode" id="" class="form-control" placeholder="Type your post code">
                                            </div>
                                            <button class="add-to-cart-btn" type="submit">Freight Calculation</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix mb-30">
                <div class="col-sm-12">
                    <div class="product-details-description-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab-product-description" aria-controls="profile" role="tab" data-toggle="tab">
                                    Description
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#tab-product-specification" aria-controls="profile" role="tab" data-toggle="tab">
                                    Specification
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#tab-product-features" aria-controls="profile" role="tab" data-toggle="tab">
                                    Features
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#tab-product-videos" aria-controls="home" role="tab" data-toggle="tab">
                                    Videos
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab-product-description">
                                <?php echo $product->short_description; ?>
                            </div>
                            <div role="tabpanel" class="tab-pane " id="tab-product-specification">
                                <?php
                                    if(!empty($product->long_description)){
                                        echo $product->long_description;
                                    }else{
                                        echo 'No Specification yet.';
                                    }
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab-product-features">
                                
                                <?php
                                    if(!empty($product->features)){
                                        echo $product->features;
                                    }else{
                                        echo 'No Feature yet.';
                                    }
                                ?>

                            </div>
                            <div role="tabpanel" class="tab-pane active" id="tab-product-videos">
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

<div class="products mb-30">
    <h5 class="box-tb-border">RELATED PRODUCTS</h5>
    <div class="products-box box-tb-border-b ">

        @if(count($related_product_r))
                @foreach($related_product_r as $product)

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

            {!! $related_product_r->render() !!}

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