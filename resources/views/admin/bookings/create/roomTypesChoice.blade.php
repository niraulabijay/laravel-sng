@if($roomTypes->count() > 0)

    <div class="alert alert-primary">
        <div class="row">
            <div class="col-4">
                <strong>Check-in :</strong>{{ $checkIn ?? '' }}
                <input type="hidden" name="selectedCheckIn" value="{{$checkIn}}">
            </div>
            <div class="col-4">
                <strong>Check-out :</strong>{{ $checkOut ?? ''}}
                <input type="hidden" name="selectedCheckOut" value="{{$checkOut}}">
            </div>
            <div class="col-4">
                <strong>No. of persons :</strong>{{$persons ?? ''}}
                <input type="hidden" name="selectedPersons" value="{{$persons}}">
            </div>
        </div>
    </div>
    @foreach($roomTypes as $roomType)
        <div class="card component-card_1 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ $roomType->featureImage()->getUrl('thumbnail') }}" alt="">
                    </div>
                    <div class="col-3">
                        <div class="card-title">
                            {{ $roomType->title }}
                        </div>
                        <div class="mr-1">
                            <span>(Max No. Of Persons : {{$roomType->no_of_adult}})</span>
                        </div>
                        <div>
                            <strong>${{$roomType->base_price_format()}}</strong>/per night.
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-text text-right">

                            <div class="form-group">
                                <label for="">No.of rooms</label>
                                <select name="room_quantity[{{$roomType->id}}]" class="roomTypeSelector" data-roomTypeId="{{$roomType->id}}" onchange="roomQuantityChanged(this)">
                                    <option value="0" selected>0</option>
                                    @foreach($roomType->available_rooms as $room)
                                        <option value="{{$loop->iteration}}">{{$loop->iteration}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div class="roomSelector">
                                <span class="roomSelectorTitle">Specify no of guests</span>
                                @foreach($roomType->available_rooms as $room)
                                    <div class="roomSelectorInner" data-roomTypeId="{{$roomType->id}}">
                                        <div class="form-group">
                                            <label for="">room({{$loop->iteration}})</label>
                                            <select name="guests[{{$roomType->id}}][{{$room->id}}]" disabled="disabled" required>
                                                @for($i=1; $i<=$persons; $i++)
                                                    @if($i<= $roomType->no_of_adult)
                                                        <option value="{{$i}}">{{$i}} guest</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Unit </label>
                                            <select name="unit[{{$roomType->id}}][{{$room->id}}]" style="width: 40%" disabled="disabled" required>
                                                <option value="">Choose a unit</option>
                                                @foreach($roomType->available_rooms as $roomAg)
                                                    <option value="{{$roomAg->id}}">
                                                        {{$roomAg->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-2 text-right">

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="text-right">
        <button class="btn btn-success" type="button" onclick="proceedBooking(this)">Proceed</button>
    </div>

@else
    <div class="alert alert-outline-warning text-dark">
        <strong>No Rooms Available !!</strong>
    </div>
@endif

