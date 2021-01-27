<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enquiry Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        x
        </button>
    </div>
    <div class="modal-body">
        <h5 class="modal-title">
            Enquiry for package - <strong id="editRoomUnitTitle">{{$enquiry->package->title}}</strong>
        </h5>
        <p><strong>Name</strong> : {{$enquiry->name}}</p>
        <p><strong>Email</strong> : {{$enquiry->email}}</p>
        <p><strong>Contact</strong> : {{$enquiry->phone}}</p>
        <p><strong>Date</strong> : {{$enquiry->tour_date}}</p>
        <p><strong>No of persons</strong> : {{$enquiry->no_of_persons}}</p>
        <p><strong>Message</strong> : {{$enquiry->message}}</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
    </div>
</div>
