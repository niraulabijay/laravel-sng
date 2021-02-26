<div class="modal fade" id="exampleModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$booking->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
     
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$booking->id}}">Booking Edit</h5>
            </div>
            <div class="modal-body">
                    <form action="{{route('admin.booking.update',$booking->id)}}" id="booking-update{{$booking->id}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <label class="col-sm-2 col-form-label"  for="name">Name</label>
                            <input type="text" class="form-control col-sm-10" name="name" value="{{$booking->full_name()}}" disabled/>
                        </div>
                        <br>
                        <div class="form-row">
                            <label class="col-sm-2 col-form-label"  for="name">Status</label>
                            <select name="" class="form-control col-sm-10" id="booking_select{{$booking->id}}">
                            
                                <option value="1" @if($booking->status == 1) selected @endif>Active</option>
                                <option value="2" @if($booking->status == 2) selected @endif>Check In</option>
                                <option value="3" @if($booking->status == 3) selected @endif>Check Out</option>
                                <option value="4" @if($booking->status == 4) selected @endif>Cancelled</option>
                                <option value="5" @if($booking->status == 5) selected @endif>Abandoned</option>
                            </select>
                        </div>
                    
                    </form>
                
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" onclick="editBooking({{$booking->id}})" class="btn btn-primary booking_update">Save</button>
            </div>
        </div>
  

    </div>
</div>