<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
        </div>

        <div class="modal-body">
            <div style="padding: 30px;">
                <table id="" class="table table-bordered table-hover table-striped">
                    <tr>
                        <th class="col-lg-4">ID</th>
                        <td>{{ isset($data->id)?$data->id:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Code</th>
                        <td>{{ isset($data->code)?$data->code:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Title</th>
                        <td>{{ isset($data->title)?$data->title:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Value</th>
                        <td>{{ isset($data->value)?$data->value:'' }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Expiry Date</th>
                        <td>{{ isset($data->expiry_date)?$data->expiry_date:''}}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-4">Status</th>
                        <td>{{ isset($data->status)?$data->status:''}}</td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" class="btn btn-default" type="button"> Close </a>
        </div>

    </div>
</div>