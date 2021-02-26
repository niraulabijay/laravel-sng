
@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}
    <style>
        .preview_image img{
            object-fit: contain;
            max-width: 100%;
            height: auto;
        }
        .preview_image .card-body{
            padding: 0px;
        }
    </style>

@endpush

@section('header')

    <div class="page-header">
        <div class="page-title">
            <h3>Album Title : {{ $album->title }}</h3>
        </div>
        {{-- Breadcrumbs section --}}
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.album.all') }}">Gallery</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.album.gallery',$album->slug) }}">{{ $album->title }}</a></li>
            </ol>
        </nav>
    </div>

@endsection

@section('content')

    {{--Page Specific Content--}}

    <div class="col-xl-9 col-lg-9 col-sm-12  layout-spacing block-content-ajax">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center" id="title">Image Upload For Album:
                            <br>
                            <span style="color: red;">
                             !! Image delete action cannot be revered !!
                            </span>
                        </h5>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="jumbotron">
                                    <h3 class="text-center" id="no_image" style="display: none;">
                                        No images in this album. Upload Below.
                                    </h3>
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                    <div class="row preview_image">
                                    </div>
                                    <br>
                                    <hr>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-3 col-sm-12  layout-spacing">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Select Image</h5>
                            <input id="image_submit" type="file" name="album_image" class="form-control">
                            <span style="color: red">* Maximum File Size : 1 MB *</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

@push('scripts')

{{--Page specific scripts--}}

<script>
    function blockElement(block){
        $(block).block({
            message: 'Fetching',
            overlayCSS: {
                backgroundColor: '#f5f5f5f5',
                opacity: 0.9,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                color: '#00000',
                backgroundColor: 'transparent'
            }
        });
    }

    $(document).ready(function(){
        get_images();
    });

    function get_images(){

        $.ajax({
            url: '{{ route('admin.album.get_images',$album->id) }}',
            contentType : false,
            processData : false,
            method: 'get',
            // data: formData,
            success: function(result)
            {
                $('.preview_image').empty();
                var images = result;
                if(images.length < 1){
//                    console.log('No Images');
                    $('#no_image').show();
                }
                else {
                    $('#no_image').hide();
                    $.each(images, function (key, value) {
                        var url = '{{asset(':url')}}';
                        url = url.replace(":url", value.image);
                        var preview = jQuery("<div class='col-md-4'>" +
                            "<div class='card'>" +
                            "<div class='card-body text-center'>" +
                            "<a href='" + url + "' >" +
                            "<img src='" + url + "' alt='Click To View File' />" +
                            "</a>" +
                            "</div>" +
                            "<div class='card-footer text-center'>" +
                            "<button class='btn btn-danger text-center delete_document' value='" + value.id + "'>Delete</button>" +
                            "<br>" +
                            "</div>" +
                            "</div>" +
                            "</div>");

                        $('.preview_image').append(preview);
                    })
                }
                // location.reload();


            },
            error: function(data)
            {
                console.log(data);
            }
        });


    }
</script>

<script>
    $('#image_submit').on('change',function(){
        console.log('adasa');
        var formData = new FormData();
        var myFile = $('#image_submit').prop('files')[0];
        console.log(myFile);
        formData.append('album_image',myFile);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $.ajax({
            url: '{{ route("admin.album.upload_
            ",$album->id)}}',
            contentType: false,
            processData: false,
            method: 'POST',
            data : formData,

            success: function(result)
            {
                toastr.success('Image Uploaded','Operation Success');
                get_images();
                $("#image_submit").val(null);

            },
            error: function(data)
            {
                toastr.error(data.responseJSON.error,'Operation Failed');
                $("#image_submit").val(null);
                document.getElementById('title').scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
            }

        })
    });
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
</script>

<script>
    jQuery(document).on('click', '.delete_document', function (e) {
        e.preventDefault();
        var imageId = $(this).val();
        var url = '{{ route("admin.album.delete_gallery",":imageId") }}';
        url = url.replace(':imageId',imageId);
        $.ajax({
            url: url,
            contentType : false,
            processData : false,
            method: 'get',
            // data: formData,
            success: function(result)
            {
                toastr.success('Image Deleted','Operation Complete');
                get_images();
                // location.reload();
            },
            error: function(data)
            {
                console.log(data);
            }
        });
    });
</script>

@endpush