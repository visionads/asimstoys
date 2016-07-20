@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
     <small class="required">(Required)</small>
    {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required']) !!}
</div>

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>
{{--<a href="{{ URL::previous()}}"  class="btn btn-default" type="button"> Close </a>--}}

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}