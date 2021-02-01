<div class="modal fade" id="exampleModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{$booking->id}}">Booking Edit</h5>
                </div>
                <div class="modal-body">
                   
                        <div class="form-row">
                            <label class="col-sm-2 col-form-label"  for="name">Name</label>
                            <input type="text" class="form-control col-sm-10" name="name" value="{{$booking->full_name()}}" disabled/>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary booking_update">Save</button>
                </div>
            </div>
    </div>
</div>