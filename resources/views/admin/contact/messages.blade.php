@extends('admin.layouts.master')

@push('styles')

    <!-- Table css -->
    <link href="{{ asset('cork/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/dt-global_style.css')}}">

@endpush

@section('header')

    <div class="page-header">
        <div class="page-title">
            <h3>Contact Messages</h3>
        </div>
        {{-- Breadcrumbs section --}}
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                {{-- <li class="breadcrumb-item"><a href="{{ route('admin.roomType') }}">RoomType</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')

    <div class="col-12 layout-spacing data_container">
        <div class="card">
            <div class="card-body">
                <div class="enquiry-container">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($contacts))
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="#" title="View" class="badge badge-success viewEnquiry" data-id="{{$contact->id}}"> <i data-feather="eye"></i></a>
                                            <a href="{{route('admin.contact.delete',$contact->id)}}"  class="badge badge-danger " data-id="{{$contact->id}}"> <i data-feather="trash"></i></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Package Details Modal -->
    <div class="modal fade" id="viewPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog view-package-modal-content" role="document">
            <!-- Ajax Data (Edit Room Form) Loaded Here -->
        </div>
    </div>

@endsection

@push('scripts')

    <script src="{{ asset('cork/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset('cork/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('cork/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('cork/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('cork/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>

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
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>

    <script>
        $('.viewEnquiry').on('click',function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{route("admin.contactDetail")}}',
                type: 'get',
                data: {contact_id: id},
                beforeSend: function(){
                    $('.view-package-modal-content').html('Loading.....');
                },
                success: function(response){
                    // Add response in Modal body
                    $('.view-package-modal-content').html(response);
                    // Display Modal
                    $('#viewPackageModal').modal('show');
                },
                error: function(data){
                    toastr.error(data.responseText,'Server Error');
                }
            });
        })
    </script>

@endpush
