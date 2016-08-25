@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="col-md-12" style="float:left;">
	<div class="row">
	
		<div class="form-group">
            {!! Form::label('link', 'Youtube Link:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('link', null, ['id'=>'link', 'class' => 'form-control','required']) !!}
        </div>
		
		<div class="form-group">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
        </div>
		
		<div class="form-group last">
			<label class="control-label col-md-2">Image</label>
			<div class="col-md-9">
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="fileupload-new thumbnail" style="width: 120px; height: 120px;">
						{{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
						@if($data['image'] != '')
							<a href="{{ route('article.image.show', $data['id']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data['thumbnail']) }}" alt="{{$data['thumbnail']}}" />
							</a>
						@else
							<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
						@endif
					</div>
					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 150px; line-height: 20px;"></div>
					<div>
									   <span class="btn btn-white btn-file">
									   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
									   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
									   <input type="file" name="image" id="image" class="default" />
									   </span>
						<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
					</div>
				</div>
				<span class="label label-danger">NOTE!</span>
								<span>
									Image width:260px & height: 260px
								</span><br/>
								 <span>
								 Attached image thumbnail is
								 supported in Latest Firefox, Chrome, Opera,
								 Safari and Internet Explorer 10 only
								 </span>
			</div>
		</div>
		
		<div class="col-md-12" style="float:left;margin-bottom:50px;">
			<a href="{{ route('youtube/index') }}" class="btn btn-default" type="button"> Close </a>
			{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
		</div>
	
	</div>
</div>