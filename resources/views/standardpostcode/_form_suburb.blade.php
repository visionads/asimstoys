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
    
        {!! Form::select('state_id', $state_id,Input::old('state_id'),['class' => 'form-control','id'=>'state_id_add','required']) !!}
    @else
        {!! Form::text('state_id', 'No State ID available',['id'=>'state_id','class' => 'form-control','required','disabled']) !!}
    @endif
</div>

 <div class="form-group">
    <label for="postcode_id" class="control-label">PostCode:</label>
    <small class="required">(Required)</small>
    <select class='form-control' required="required" id="postcode_id_add" name="postcode_id">
       
        
    </select>
</div>

<div class="form-group">
    {!! Form::label('title', 'Suburb:', ['class' => 'control-label']) !!}
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

<a href="{{ route('standardpostcode-suburb') }}" class="btn btn-default" type="button"> Close </a>
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

<a href="{{URL::to('')}}" id="site_url">&nbsp;</a>

<script>
    $(function(){
        $("#state_id_add").on('change',function(e){

            var state_id = $("#state_id_add").val();
            var site_url = $('#site_url').attr("href");
            $.ajax({
                url: site_url+'/standardpostcode/suburb_postcode_ajax',
                type: 'POST',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}',state_id:state_id,},
                success: function(response)
                {
                    $("#postcode_id_add").html(response.message);
                }
            });


            return false;
        });


    });
</script>