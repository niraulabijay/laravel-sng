@extends('admin.layouts.master')

@push('styles')

    <!-- Table css -->
    <link href="{{ asset('cork/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />

    <!-- DateRange Picker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Block UI -->
    <link href="{{asset('cork/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/animate/animate.css')}}">
  
    <style>
        .data_container{
            min-height: 500px;
        }
    </style>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/dt-global_style.css')}}">
    
    <link href="{{asset('cork/assets/css/apps/invoice.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('cork/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('header')

    <div class="page-header">
        <div class="page-title">
            <h3>Bookings</h3>
        </div>
        {{-- Breadcrumbs section --}}
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                {{-- <li class="breadcrumb-item"><a href="{{ route('admin.roomType') }}">RoomType</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Bookings</li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')

    <div class="col-12 layout-spacing data_container">
        <div class="row mb-2 mt-1">
            <div class="col-3">
                <form id="filterForm" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h5>Filter:</h5>
                            <hr>
                            <div class="form-group">
                                <label for="searchStartEnd">Select Dates:</label>
                                <input type="text" class="range-date form-control" id="searchStartEnd">
                                <input type="hidden" name="searchStart">
                                <input type="hidden" name="searchEnd">
                            </div>
                            <div class="form-group">
                                <label>Booking Status:</label>
                                @foreach(\App\Model\Booking::listStatus() as $key=>$status)
                                    <div>
                                        <input type="checkbox" class="statusCheckbox" name="status[]" value="{{$key}}">&nbsp;{{ $status }}
                                    </div>
                                @endforeach
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label>Room Types:</label>--}}
                                {{--@foreach($roomTypes as $roomType)--}}
                                    {{--<div>--}}
                                        {{--<input name="roomTypes[{{$loop->iteration}}]" type="checkbox" class="roomTypeCheckbox" value="{{$roomType->id}}"> {{$roomType->title}}--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </form>
            </div>
           
            <div class="col-9 text-right">
                <div class="card">
                    <div class="card-body">
                        <div class="booking-container">
                            
                        </div>
                    </div>
                </div>
            </div>
            
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
    <script src="{{asset('cork/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{asset('cork/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{asset('cork/plugins/blockui/custom-blockui.js')}}"></script>
    
 
    <!-- DatePicker JS -->
    <script>
        $('input[name="searchStart"]').val(moment().subtract(10, "days").format('YYYY-MM-DD'));
        $('input[name="searchEnd"]').val(moment().add(10, 'days').format('YYYY-MM-DD'));
        $('.range-date').daterangepicker({
            autoApply: true,
            startDate: moment().subtract(10, "days"),
            endDate: moment().add(10, 'days'),
            // maxSpan: {
            //     "days": 16
            // },
        });
        $('#searchStartEnd').on('change',function(){
            var startDate = $(this).data('daterangepicker').startDate.format('YYYY-MM-DD');
            var endDate = $(this).data('daterangepicker').endDate.format('YYYY-MM-DD');
            console.log(startDate);
            console.log(endDate);
            $('input[name="searchStart"]').val(startDate);
            $('input[name="searchEnd"]').val(endDate);
            loadCalendar();
        })
        
    </script>

    <script>
        $('.statusCheckbox').on('click',function(){
            loadCalendar();
        })
    </script>

    <!-- Load Calendar JS -->
    <script>

        $(document).ready(function () {
            loadCalendar();
        });

        function loadCalendar(){
            var today = moment.now();
            var url = "{{ route('admin.booking.search')}}";
            var formData = new FormData($('#filterForm')[0]);
            var el = $('.data_container');
            $.ajax({
                type: "POST",
                data: formData,
                url: url,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    blockElement(el);
                    $('.booking-container').hide();
                },
                success: function (data) {
                    $('.booking-container').html(data);
                },
                error: function (data) {
                    toastr.error(data.responseText, "Server Error");
                    console.log(data);
                },
                complete: function(){
                    $('.booking-container').show();
                    $(el).unblock();
                }
            });
        }

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
    </script>

    <script>
        function viewBooking(el) {
            var id = $(el).attr('data-id');
            var url = "{{ route('admin.booking.view',":id") }}";
            url = url.replace(":id",id);
            $.ajax({
                type: "GET",
                url: url,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    blockElement(el);
                },
                success: function (data) {
                    $('.booking-container').html(data);
                },
                error: function (data) {
                    toastr.error(data.responseText, "Server Error");
                    console.log(data);
                },
                complete: function(){
                    $('.booking-container').show();
                    $('#BookingModal').modal('show');
                    $('invoice-00001').show();
                    $(el).unblock();
                }
            });
        }
    </script>

@endpush
