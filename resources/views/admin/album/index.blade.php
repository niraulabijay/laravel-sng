@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}
<link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('cork/assets/css/forms/switches.css') }}">
<link href="{{ asset('cork/plugins/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('cork/plugins/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cork/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cork/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cork/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />


@endpush


@section('header')

    <div class="page-header">
        <div class="page-title">
            <h3>Gallery</h3>
        </div>
        {{-- Breadcrumbs section --}}
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')

    {{--Page Specific Content--}}
    <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Image Categories</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($albums))
                        @foreach($albums as $album)
                            <tr>
                                <td>{{ $album->id }}</td>
                                <td>{{$album->title}}</td>
                                <td>{{ $album->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($album->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.album.gallery',$album->slug) }}" title="View Images" class="badge badge-success"><i data-feather="eye"></i></a>
                                    <a href="{{ route('admin.album.edit',$album->id) }}" title="Edit" class="badge badge-primary"> <i data-feather="edit"></i></a>

                                    <a href="{{ route('admin.album.delete',[$album->id]) }}" title="Delete" class="badge badge-dark warning confirm"><i data-feather="archive"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-sm-12  layout-spacing">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    @if(isset($editAlbum))
                        <h4>
                            Edit Image Category
                            <a href="{{ route('admin.album.all')}}" class="float-right  btn btn-sm btn-primary">Add Category</a>
                        </h4>
                    @else
                        <h4>Add New Category</h4>
                    @endif
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area br-6">
            @if(isset($editAlbum))
                {!! Form::open(['url'=>route('admin.album.update',[$editAlbum->id]), 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="amenity_id" value="{{$editAlbum->id}}">
            @else
                {!! Form::open(['url'=>route('admin.album.store'), 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
            @endif

            @include('admin.album.commonForm')

            {{Form::submit('Submit',['class'=>'btn btn-primary ml-3 mt-3'])}}

            {!! Form::close() !!}

        </div>
    </div>


@endsection

@push('scripts')

<script src="{{ asset('cork/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('cork/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('cork/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
<script>
    $('#zero-config').DataTable({
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [10, 20, 30, 50],
        "pageLength": 10
    });
</script>

<script>


    $('.widget-content .warning.confirm').on('click', function (event ) {
        $this = $(this);
        event.preventDefault();
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em'
        }).then(function(result) {
            if (result.value) {
                window.location.href = $this.attr('href');
            }
        })
    })
</script>


@endpush