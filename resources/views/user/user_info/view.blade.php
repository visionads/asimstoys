<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
            <h4 class="modal-title">{{ isset($data->first_name)?$data->first_name:''}} {{isset($data->last_name)?$data->last_name:''}}</h4>
			<a style="float: right;margin-top: -30px;" href="{{ URL::previous()  }}" class="btn btn-default" type="button"> X </a>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped" style="font-size: medium">
                    <tr>
                        <th class="col-lg-4">First Name</th>
                        <td>{{ isset($data->first_name)?$data->first_name:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Last Name</th>
                        <td>{{ isset($data->last_name)?$data->last_name:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Email</th>
                        <td>{{ isset($data->email)?$data->email:'' }}</td>
                    </tr>
					<tr>
                        <th class="col-lg-4">Phone Number</th>
                        <td>{{ isset($data->telephone)?$data->telephone:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Address</th>
                        <td>{{ isset($data->address)?$data->address:''}}</td>
                    </tr>
					<tr>
                        <th class="col-lg-4">Suburb</th>
                        <td>{{ isset($data->suburb)?$data->suburb:''}}</td>
                    </tr>
					<tr>
                        <th class="col-lg-4">Postcode</th>
                        <td>{{ isset($data->postcode)?$data->postcode:''}}</td>
                    </tr>
					<tr>
                        <th class="col-lg-4">State</th>
                        <td>{{ isset($data->state)?$data->state:''}}</td>
                    </tr>
					<tr>
                        <th class="col-lg-4">Country</th>
                        <td>{{ isset($data->country)?$data->country:''}}</td>
                    </tr>
                   
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ URL::previous()  }}" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>