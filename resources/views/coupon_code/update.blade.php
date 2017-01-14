<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Coupon</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['coupon-update',$data->id]]) !!}
               @include('coupon_code._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>