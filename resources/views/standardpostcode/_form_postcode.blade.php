@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('state_id', 'State:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    @if(count($state_id)>0)
    
        {!! Form::select('state_id', $state_id,Input::old('state_id'),['class' => 'form-control','required']) !!}
    @else
        {!! Form::text('state_id', 'No State ID available',['id'=>'state_id','class' => 'form-control','required','disabled']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('title', 'Postcode:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required','onkeyup'=>"sel_url()"]) !!}
</div>

 <div class="form-group">
    {!! Form::label('Slug', 'Slug:', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ['id'=>'slug', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>

<a href="{{ route('standardpostcode-postcode') }}" class="btn btn-default" type="button"> Close </a>
{!! Form::submit('Save changes', ['class' => 'btn btn-success']) !!}

<script>
    function sel_url() {
        $('#title').on('keyup', function () {
            var string = $(this).val();
            string = string.split(" ");
            var myStr1 = string.join('-');
            var myStr = myStr1.toLowerCase();
            $('#slug').val(myStr);
        });
    }
</script>