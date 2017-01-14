@extends('web::layout.web_master')

@section('content')
	<div class="pos-new-product home-text-container">
		<div class="description">

			<div class="cart_container">
						<div class="step-container">
							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step1.png">
								</div>
								<div class="step-text ">
									<div class="header">Step 1</div>
									<div class="your-basket">my basket</div>
								</div>
							</div>

							<div class="step ">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step2.png">
								</div>
								<div class="step-text ">
									<div class="header">Step 2</div>
									<div class="your-basket">billing details</div>
								</div>
							</div>

							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step3.png">
								</div>
								<div class="step-text active">
									<div class="header">Step 3</div>
									<div class="your-basket">delivery details</div>
								</div>
							</div>

							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step4.png">
								</div>
								<div class="step-text">
									<div class="header">Step 4</div>
									<div class="your-basket">check order</div>
								</div>
							</div>

							<div class="step">
								<div class="step_images">
									<img src="{{URL::to('/')}}/web/images/step5.png">
								</div>
								<div class="step-text">
									<div class="header">Step 5</div>
									<div class="your-basket">secure payment</div>
								</div>
							</div>

						</div>

							
						<div class="col-md-12">
				@if(Session::has('flash_message_error'))
	                <div class="alert alert-success">
	                    <p>Email already presents</p>
	                </div>
	            @endif

	            		<div class="delivery_text">
	            			<p>Automatically filled up delivery details with billing address. You can modify this below information.</p>
							<small style="color: rgb(255,0,0);font-size: 14px;">Note:: Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small><br/><br/>
	            		</div>

						{!! Form::open(['route' => 'customer-delivery-detail']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="login_container">
									<div class="form-group">
										<label>Email Address <span style="color:rgba(255,0,0,.7);">(required)</span></label>
										{!! Form::email('email', $data->email, ['id'=>'email', 'class' => 'form-control','required']) !!}
										
									</div>
									
									<div class="form-group">
										<label>First Name <span style="color:rgba(255,0,0,.7);">(required)</span></label>
										{!! Form::text('first_name', $data->first_name, ['id'=>'first_name', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Last Name <span style="color:rgba(255,0,0,.7);">(required)</span></label>
										{!! Form::text('last_name', $data->last_name, ['id'=>'last_name', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Please select state <span style="color:rgba(255,0,0,.7);">(required)</span></label>
										<select class="form-control " required="required" name="state">
											<option value="{{$data->state}}">{{$data->state}}</option>
										</select>
										
									</div>

									<div class="form-group">
										<label>Post code <span style="color:rgba(255,0,0,.7);">(required)</span></label><br/>
										<small style="color:rgb(255,99,71);">Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small>
										{!! Form::text('postcode', $data->postcode, ['id'=>'post_code', 'class' => 'form-control','required']) !!}
									</div>

									
									

								</div>
								
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">
								
								<div class="login_container">

									<div class="form-group">
										<label>Address <span style="color:rgba(255,0,0,.7);">(required)</span></label>
										 {!! Form::textarea('address', $data->address, ['id'=>'address', 'class' => 'form-control', 'cols'=>'15' , 'rows'=>'5', 'required']) !!}
									</div>
									
									<div class="form-group">
										<label>Suburb <span style="color:rgba(255,0,0,.7);">(required)</span></label><br/>
										<small style="color:rgb(255,99,71);">Put your post code and suburb properly. If you put wrong suburb or post code this will make error page. If occurs error page then go back to previous page and try with proper information</small>
										{!! Form::text('suburb', $data->suburb, ['id'=>'suburb', 'class' => 'form-control','required']) !!}
									</div>
									
									<div class="form-group">
										<label>Telephone <span style="color:rgba(255,0,0,.7);">(required)</span></label>
										{!! Form::text('telephone', $data->telephone, ['id'=>'telephone', 'class' => 'form-control','required']) !!}
									</div>

									<div class="form-group">
										<label>Country </label>
										{!! Form::Select('country',array('Australia'=>'Australia'),Input::old('country'),['class'=>'form-control ','required']) !!}
										
									</div>
									
									<div class="form-group">
										<input type="submit" class="form-control register_btn" name="submit" value="Submit" id="myFormSubmit">
									</div>
									
								</div>
							</div>
						{!! Form::close() !!}
						
						@if($errors->any())
							<ul class="alert alert-danger" style="width: 100%;float: left;padding-left: 30px;">
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						@endif

					</div>
						
							


					</div>	

		</div>
	</div>


    <script>
        $('#myFormSubmit').click(function(e)
        {
            $('#loadingModal').modal('show');
            return true;
        });

    </script>

    {{--modal--}}
    <div id="loadingModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p>
                        Freight Charge Calculating  ...
                    </p>
                </div>
                <div class="modal-body">
                    <p>
                        Please wait .... Freight Charge Calculating...
                    </p>
                </div>
                <div class="modal-footer">
                    <p>&nbsp;</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop