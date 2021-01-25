<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-12">
                <div class="card card-component-1">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label class="control-label">Room Name:</label>
                            <input type="text" name="title" value="{{ old('title') ?? $editRoomType->title ?? '' }}" class="form-control"  placeholder="Room Name">
                            @error('title')
                            <div class="text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Quick Description:</label>
                            <textarea class="form-control" rows="3" name="description" aria-label="With textarea" placeholder="Short Description About the Room">{{ old('description') ?? $editRoomType->description ?? '' }}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card card-component-1">
                    <div class="card-body">
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="guests">Maximum No. of Guests</label>
                                <input type="number" name="max_occupancy" value="{{ old('max_occupancy') ?? $editRoomType->max_occupancy ?? 1 }}" class="form-control" id="guests" placeholder="Maximum Occupancy">
                                @error('max_occupancy')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Base Price (Rs.)</label>
                                <input type="text" name="base_price" value="{{ old('base_price') ?? $editRoomType->base_price ?? 0 }}"  class="form-control number-only" id="price" placeholder="Starting price of room">
                                @error('base_price')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="n-adults">No. of Adults</label>
                                <input type="number" name="no_of_adult" value="{{ old('no_of_adult') ?? $editRoomType->no_of_adult ?? 1 }}" class="form-control" id="n-adult" placeholder="No. of Adults">
                                @error('no_of_adult')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="n-children">No. of Child</label>
                                <input type="number" name="no_of_child" value="{{ old('no_of_child') ?? $editRoomType->no_of_child ?? 0 }}" class="form-control" id="n-children" placeholder="No. of Children">
                                @error('no_of_child')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card card-component-1">
                    <div class="card-body">
                        <div class="form-row mb-4">
                            <div class="form-group">
                                <label for="amenities">Room Amenities</label>
                                <select name="amenities[]" class="form-control basic" multiple>
                                    @foreach($amenities as $amenity)
                                        <option value="{{$amenity->id}}"
                                        @if(isset($editRoomType) && $editRoomType->amenities)
                                            @foreach($editRoomType->amenities as $sel_am)
                                                {{ $sel_am->id == $amenity->id ? "selected" : "" }}
                                                    @endforeach
                                                @endif
                                        >
                                            {{$amenity->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-component-1">
            <div class="card-body">
                <div class="form-group mb-4 ">
                    <div class="row p-2" style="background-color: #f5f5f5">
                        <div class="col-6">
                            <label class="control-label" style="color:#">Status:</label>
                        </div>
                        <div class="col-6">
                            <label class="float-right switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                                <input type="checkbox" name="status" {{ isset($editRoomType)? ($editRoomType->status == "Active" ? "checked" : '') : "checked" }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="custom-file-container" data-upload-id="mySecondImage">
                    <label>Feature Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" name="feature_image" class="custom-file-container__custom-file__custom-file-input">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    @error('feature_image')
                        <div class="text-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="custom-file-container__image-preview"></div>
                </div>
            </div>
        </div>
    </div>
</div>
