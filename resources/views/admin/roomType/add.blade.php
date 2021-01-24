@extends('admin.layouts.master')

@push('styles')

    <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/assets/css/forms/switches.css') }}">
    <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/select2/select2.min.css') }}">
@endpush

@section('header')

    <div class="page-header">
        <div class="page-title">
            <h3>{{ $hotel->title }} - Room Type</h3>
        </div>
        {{-- Breadcrumbs section --}}
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.roomType')}}">Room Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')

    <div class="col-12 layout-spacing">

        @if(!isset($editRoomType))
            <!-- Add Submit Form -->
            <form method="post" action="{{ route('admin.roomType.store',$hotel->slug) }}" enctype="multipart/form-data">
            <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
        @else
            <!-- Edit Form -->
            <form method="post" action="{{ route('admin.roomType.update',$editRoomType->slug) }}" enctype="multipart/form-data">
            <input type="hidden" name="room_type" value="{{$editRoomType->id}}">
        @endif
            @csrf
            @include('admin.roomType.commonForm')
            <div class="row mt-3">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
                </div>
            </div>
        </form>

    </div>

@endsection

@push('scripts')

    <script src="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script src="{{ asset('cork/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('cork/plugins/select2/custom-select2.js') }}"></script>

    <script>
        var ss = $(".basic").select2({
            tags: true,
        });
    </script>
    <script>
        //First upload .
        @if(isset($editRoomType) && $editRoomType->hasMedia('feature_image'))
            var importedBaseImage = "{{ isset($editRoomType)? $editRoomType->featureImage()->getUrl() : ''}}"
            var firstUpload = new FileUploadWithPreview('mySecondImage', {
                images: {
                        baseImage: importedBaseImage,
                    },
            })
        @else
            var secondUpload = new FileUploadWithPreview('mySecondImage');
        @endif
        //Second upload


    </script>
    <script>
        $('.number-only').keypress(function(evt){
            return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
        });
    </script>

@endpush
