<form id="finalizeBookingForm" >
    @csrf
    <div class="row mb-4 mt-3">
        <div class="col-sm-12 col-12">
            {{-- @dd($context) --}}
            <div class="row alert alert-primary text-light m-2">
                <div class="col-4">
                    <div>
                        <strong>Check-in : </strong>{{ $context['selectedCheckIn'] ?? '' }}
                        <input type="hidden" name="selectedCheckIn" value="{{$context['selectedCheckIn']}}">
                    </div>
                    <div>
                        <strong>Check-out : </strong>{{ $context['selectedCheckOut'] ?? ''}}
                        <input type="hidden" name="selectedCheckOut" value="{{$context['selectedCheckOut']}}">
                    </div>
                </div>
                <div class="col-4">
                    <div>
                        <strong>No. of persons : </strong>{{$context['selectedPersons'] ?? ''}}
                        <input type="hidden" name="selectedPersons" value="{{$context['selectedPersons']}}">
                    </div>
                    <div>
                        <strong>Nights : </strong>{{$context['nights'] ?? ''}}
                        <input type="hidden" name="nights" value="{{$context['nights']}}">
                    </div>
                </div>
                <div class="col-4 text-right">
                    <button class="btn btn-outline-danger text-light" onclick="goBack(this)"><< Go Back</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 mt-3">
        <div class="col-sm-12 col-12">
            <div class="statbox widget box box-shadow p-3" >
                <div class="row">
                    <div class="col-4">
                        <h4>Room Details</h4>
                        <div class="card card-component-1">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Room</th>
                                            <th>Guests</th>
                                            <th>Price</th>
                                        </thead>
                                        @foreach($roomTypes as $roomType)
                                            <tbody>
                                                <td>{{$roomType->title}}</td>
                                                <td>
                                                    @foreach($roomType->selectedRooms as $room)
                                                        {{$room->guests}} (Room-{{$room->title}})<br>
                                                        <input type="hidden" name="guests[{{$room->id}}]" value="{{$room->guests}}">
                                                        <input type="hidden" name="room_price[{{$room->id}}]" value="{{$roomType->base_price_format()}}">
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{$roomType->base_price_format()}}/night
                                                </td>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <h4>Booking Details</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="firstName">FIRST NAME</label>
                                    <input type="text" name="first_name" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lastName">LAST NAME</label>
                                    <input type="text" name="last_name" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="firstName">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="firstName">City</label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="firstName">Post Code</label>
                                    <input type="text" name="post_code" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="firstName">Country</label>
                                    <input type="text" name="country" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="firstName">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="firstName">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Comment</label>
                                <textarea name="message" row="5" class="form-control" placeholder="Custom Message Regarding Booking"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-right">
                        <button type="button" onclick="finalBookingSubmit(this)" class="btn btn-lg btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
