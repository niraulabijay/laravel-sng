@extends('admin.layouts.master')

@push('styles')

    <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/assets/css/forms/switches.css') }}">
    <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/select2/select2.min.css') }}">
     <!-- DateRange Picker -->
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('cork/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('cork/plugins/select2/custom-select2.js') }}"></script>
     <!-- DatePicker JS -->
     <script>
     
        $('.range-date').daterangepicker({
            autoApply: true,
            startDate: moment().subtract(0, "days"),
            endDate: moment().add(1, 'days'),
            // maxSpan: {
            //     "days": 16
            // },
        });
        @if(isset($editRoomType) &&  $editRoomType->start_date && $editRoomType->end_date)
        $('document').ready(function(){
         
            $('.range-date').data('daterangepicker').setStartDate({{$editRoomType->start_date}});
            $('.range-date').data('daterangepicker').setEndDate({{$editRoomType->end_date}});
            var start_date = $('input[name="start_date"]').val();
            var end_date = $('input[name="end_date"]').val();
           
            var startDate_string = moment(start_date, "YYYY-MM-DD").format("MM/DD/YYYY");
            var endDate_string = moment(end_date, "YYYY-MM-DD").format("MM/DD/YYYY");
            console.log(startDate_string);
            console.log(endDate_string);
            $('.range-date').data('daterangepicker').setStartDate(startDate_string);
            $('.range-date').data('daterangepicker').setEndDate(endDate_string);
            $('input[name="start_date"]').val(start_date);
            $('input[name="end_date"]').val(end_date);

        });
        @else
        $('input[name="start_date"]').val(moment().subtract(0, "days").format('YYYY-MM-DD'));
        $('input[name="start_date"]').val(moment().add(1, 'days').format('YYYY-MM-DD'));
        @endif
        
        $('#searchStartEnd').on('change',function(){
            var startDate = $(this).data('daterangepicker').startDate.format('YYYY-MM-DD');
            var endDate = $(this).data('daterangepicker').endDate.format('YYYY-MM-DD');
            $('input[name="start_date"]').val(startDate);
            $('input[name="end_date"]').val(endDate);
         
        })
        $('#searchStartEnd').on('change',function(){
            var startDate = $(this).data('daterangepicker').startDate.format('YYYY-MM-DD');
            var endDate = $(this).data('daterangepicker').endDate.format('YYYY-MM-DD');
            console.log(startDate); 
            console.log(endDate);
            $('input[name="start_date"]').val(startDate);
            $('input[name="end_date"]').val(endDate);
         
        });
        
    </script>
    <script>
            function generateRandomInteger() {
                return Math.floor(Math.random() * 90000) + 10000;
            }

        jQuery(document).on('click', '.btn-delete-specifications', function (e) {
            e.preventDefault();
            var $this = $(this);
            $this.closest("tr").remove();
        });

        jQuery(document).on('click', '.btn-add-specifications', function (e) {
            e.preventDefault();
            // console.log('tgd');
            var lastRow = $('table.table-specifications > tbody > tr').last().attr('data-row');
            var counter = lastRow ? parseInt(lastRow) + 1 : 1;
            var randomInteger = generateRandomInteger();
            var newRow = jQuery('<tr data-row="' + counter + '">' +
                '<td>' + counter + '</td>' +
                '<td><textarea name="inclusion[' + counter + ']" class="form-control" required></textarea></td>' +
                // '<td><input type="text" name="features[feature][' + randomInteger + ']" class="form-control" required/></td>' +
                //'<td>' + '<textarea name="spec[' + randomInteger + ']" class="form-control" required></textarea>' +
                '</td>' +
                '<td><button type="button" class="btn btn-danger btn-sm btn-delete-specifications" data-feature=""><i class="fa fa-minus-circle"></i></button></td>' +
                '</tr>');
            jQuery('table.table-specifications').append(newRow);
        });

    </script>
    <script>
        var ss = $(".basic").select2({
            tags: true,
        });
        $('document').ready(function(){
            if($('#discount_amount').val() != '')
                {
                    $('#searchStartEnd').prop('disabled', false);
                }
        })
        $('#discount_amount').on('input', function() {

                if( $('#discount_amount').filter(function() { return !! this.value; }).length > 0 ) {
                    $('#searchStartEnd').prop('disabled', false);
                   
                } 
          
                else {
                    $('#searchStartEnd').prop('disabled', true);
                }
            });
    </script>
    <script>
        // First upload .
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

     
    </script>
    <script>
        $('.number-only').keypress(function(evt){
            return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
        }); 
    </script>

@endpush
