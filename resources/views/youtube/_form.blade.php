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
		
		<div class="col-md-12" style="float:left;margin-bottom:50px;">
			<a href="{{ route('youtube/index') }}" class="btn btn-default" type="button"> Close </a>
			{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
		</div>
	
	</div>
</div>