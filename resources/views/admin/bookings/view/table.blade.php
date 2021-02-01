<div class="row">
    <div class="col-4">
        <h5>Booking List:</h5>
    </div>
    <div class="col-8">
         <h5>(From {{ $params['startDate'] ?? '' }} to {{ $params['endDate'] ?? '' }} )</h5>
    </div>
    <div class="col-12">
        <div class="table-responsive mb-4 mt-4">
            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Rooms</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($bookings))
                        @foreach($bookings as $booking)
                        @include('admin.bookings.view.modal-booking')
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$booking->user->name}}</td>
                            <td>{{$booking->check_in}}</td>
                            <td>{{$booking->check_out}}</td>
                            <td>{{$booking->bookingDetails ? $booking->bookingDetails->count() : ''}}</td>
                            <td>
                                <label class="switch s-outline s-outline-danger  mr-4">
                                    <input type="checkbox" onclick="activeBooking(this)" value="{{$booking->active}}" data-id="{{$booking->id}}" @if($booking->status) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                      
                            </td>
                            <td>
                                <a href="#" title="View" data-id="{{$booking->id}}" onclick="viewBooking(this)" class="badge badge-success confirm"><i class="fa fa-eye"></i></a>
                                <a href=""  data-toggle="modal" data-target="#exampleModal{{$booking->id}}" class="badge badge-info confirm"><i class="fa fa-pencil"></i></a>
                                {{--<a href="{{ route('admin.booking.view',[$booking->id]) }}" title="Edit" class="badge badge-success"> <i data-feather="edit"></i></a>--}}
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#html5-extension').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn' },
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    } );
</script>
<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
