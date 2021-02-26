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
                                <label for="price">Discount Price (Rs.)</label>
                                
                                <input id="discount_amount" min="1" type="number" placeholder="Discount price of room"  value="{{ $editRoomType->offer_price ?? $editRoomType->discount_percent ?? '' }}"  name="discount_amount" class="form-control">
                                {{-- <input type="number" name="discount_amount" value="@if((isset($editRoomType)) && $editRoomType->offer_price != 0){{ old('offer_price') ?? $editRoomType->offer_price ?? 0 }} @elseif( isset($editRoomType) && $editRoomType->discount_percentage != 0){{ old('discount_percentage') ?? $editRoomType->discount_percentage ?? 0 }}  @endif" class="form-control " id="discount_amount" placeholder="Starting price of room" > --}}
                                @error('base_price')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="price">Discount Type</label>
                                <select name="discount_type" id="" class="form-control">
                                    <option value="discount_percent" @if(isset($editRoomType) && $editRoomType->discount_percent != 0) selected @endif>%</option>
                                    <option value="offer_price" @if(isset($editRoomType) && $editRoomType->offer_price != 0) selected @endif>Rs.</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4" >
                                <label for="searchStartEnd">Select Dates:</label>
                                <input type="text" class="range-date form-control" id="searchStartEnd" disabled>
                                <input type="hidden" value="{{old('start_date') ?? $editRoomType->start_date ?? ""}}" name="start_date">
                                <input type="hidden" value="{{old('end_date') ?? $editRoomType->end_date ?? ""}}" name="end_date">
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
            <div class="col-12 mt-3">
                <div class="card card-component-1">
                    <div class="card-body">
                        <div class="form-row mb-4">
                            <div class="form-group col-md-12">
                                <p>Inclusions</p>
                                <label for="t-text" class="sr-only"> Inclusions</label>
                                <div class="repeater">
                                    <input type="hidden" name="custom_field[repeater][inclusions][]" value="0">
                            
                                    <table class="table table-bordered table-specifications">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($editRoomType) && $editRoomType->inclusions)
                                            @foreach (json_decode($editRoomType->inclusions) as $key=>$item)
                                                <tr data-row="{{$key}}">
                                                    <td>{{$key}}</td>
                                                    <td>
                                                        <textarea name="inclusion[{{$key}}]" class="form-control" required="" spellcheck="false">{{$item}}</textarea>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete-specifications" data-feature="">
                                                            <i class="fa fa-minus-circle"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <tr data-row="1">
                                                <td>1</td>
                                                <td>
                                                    <textarea name="inclusion[1]" class="form-control" required="" spellcheck="false"></textarea>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete-specifications" data-feature="">
                                                        <i class="fa fa-minus-circle"></i></button>
                                                </td>
                                            </tr>
                                            @endif
                                          
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <button class="btn btn-primary btn-sm btn-add-specifications">
                                                    Add New
                                                </button>
                                            </th>
                                        </tr>
                                        </tfoot>
                                    </table>
                            
                                </div>
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
                <div class="form-group mb-4 ">
                    <div class="row p-2" style="background-color: #f5f5f5">
                        <div class="col-6">
                            <label class="control-label" style="color:#">Tax:</label>
                        </div>
                        <div class="col-6">
                            <label class="float-right switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                                <input type="checkbox" value="1" name="tax_status" {{ isset($editRoomType) ? ($editRoomType->tax_status == "1" ? "checked" : '') : "" }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-4 ">
                    <div class="row p-2" style="background-color: #f5f5f5">
                        <div class="col-6">
                            <label class="control-label" style="color:#">Additional Price:</label>
                        </div>
                        <div class="col-6">
                            <label class="float-right switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                                <input type="checkbox" value="1" name="additional_price" {{ isset($editRoomType) ? ($editRoomType->additional_price == "1" ? "checked" : '') : "" }}>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="custom-file-container" data-upload-id="mySecondImage">
                    <label>Feature Image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" name="feature_image[]" class="custom-file-container__custom-file__custom-file-input" >
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    @error('feature_image')
                        <div class="text-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="custom-file-container__image-preview">
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
