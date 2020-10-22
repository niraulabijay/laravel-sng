<div class="alert alert-success text-light">
    <h3>Booking Registered Successfully</h3>
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
                        {{ $booking->address ? $booking->address.'<br>':''}}
                        {{ $booking->postCode ? $booking->postCode.'<br>':''}}
                        {{ $booking->city ? $booking->city.'<br>':''}}
                        {{ $booking->country ? $booking->country.'<br>':''}}
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
                        <td>
                            {{$detail->base_price_format()}}/night
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
