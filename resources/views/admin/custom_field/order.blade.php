@extends('admin.layouts.master')

@push('styles')

<style>
    td{
        cursor: all-scroll;
    }
</style>
@endpush

@section('content')

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Post Type Ordering </h4>
                </div>
            </div>
        </div>
        @if(isset($customField->childrens))
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table class="table table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Position</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody class="row_position">
                    @foreach($customField->childrens as $children)
                        <tr id="{{ $children->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $children->title }}</td>
                            <td>{{ $children->slug }}</td>
                            <td>{{ $children->position }}</td>
                            <td>{!! $children->field_type !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                    <tr>
                        <th>Sn</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Position</th>
                        <th>Type</th>
                    </tr>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <a href="{{ Request::url() }}" class="btn btn-sm btn-danger" id="order-btn">Reload..</a>
        </div>
            @else
            Empty Fields
        @endif
    </div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">


    $( ".row_position" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });


    function updateOrder(data) {
        console.log(data);
        var myUrl = "{{ route('admin.custom_field.field.order.store') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: myUrl,
            data: {position:data},
            beforeSend: function (result) {
                $('#order-btn').hide();
            },
            success: function (result) {
                $('#order-btn').show();
            },
            error: function (result) {
                $('#order-btn').show();
            }
        });
    }





</script>
@endpush
