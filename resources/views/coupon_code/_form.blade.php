@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="form-group">
    {!! Form::label('code', 'Coupon Code:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('code', Input::old('code'), ['class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('title', Input::old('title'), ['class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('value', 'Value (%):', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('value', Input::old('value'), ['class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('expiry_date', 'Expiry Date:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('expiry_date', Input::old('expiry_date'), ['class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('status', 'open', ['class' => 'form-control','required']) !!}
</div>



<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['id'=>'submit-form','class' => 'btn btn-success']) !!}

