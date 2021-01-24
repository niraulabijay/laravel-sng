<div class="alert alert-outline-success">
    @if($success)
        <h3>Booking Registered Successfully</h3>
    @endif
    <div class="row">
        <div class="col-12">
            <h5>Booking Details:</h5>
        </div>
        <div class="col-12">
            <table>
                <tr>
                    <td>Name:</td>
                    <td>{{$booking->full_name()}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$booking->user->email}}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>{{$booking->phone}}</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        {{ $booking->address ? $booking->address . ' | ' : ''}}
                        {{ $booking->postCode ? $booking->postCode . ' | ' : ''}}
                        {{ $booking->city ? $booking->city . ' | ' : ''}}
                        {{ $booking->country ? $booking->country . ' | ' : ''}}
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12">
            <h5>Room Details</h5>
        </div>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <th>RoomType</th>
                    <th>Room</th>
                    <th>Guests</th>
                    <th>Price</th>
                </thead>
                @foreach($booking->bookingDetails as $detail)
                    <tbody>
                        <td>{{$detail->room->roomType->title}}</td>
                        <td>{{$detail->room->title}}</td>
                        <td>{{$detail->guests}}</td>
                        <td>
                            {{$detail->allocated_price}}/night
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="col-12 text-right">
            <h3>Grand Total:</h3>
            <h4>{{$booking->booking_room_price}}</h4>
        </div>
    </div>
</div>
