<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        x
        </button>
    </div>
    <div class="modal-body">
        <h5 class="modal-title">
            Details
        </h5>
        <hr>
        <p><strong>Name</strong> : {{$contact->name}}</p>
        <p><strong>Email</strong> : {{$contact->email}}</p>
        <p><strong>Subject</strong> : {{$contact->subject}}</p>
        <p><strong>Date</strong> : {{$contact->created_at->format('Y-m-d')}}</p>
        <hr>
        <p><strong>Message</strong> : {{$contact->message}}</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
    </div>
</div>
