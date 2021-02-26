@extends('admin.layouts.master')

@push('styles')

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('cork/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('cork/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    
@endpush

@section('header')

    <div class="page-header">
        <div class="page-title">
            <h3>Dashboard</h3>
        </div>
        {{-- Breadcrumbs section --}}
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Components</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')


    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h5 class="">Room Booking</h5>
                <ul class="tabs tab-pills">
                    <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                </ul>
            </div>

            <div class="widget-content">
                <div class="tabs tab-content">
                    <div id="content_1" class="tabcontent">
                        <div id="revenueMonthly"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-two">
            <div class="widget-heading">
                <h5 class="">Total Booking</h5>
            </div>
            <div class="widget-content">
                <div id="chart-2" class=""></div>
            </div>
        </div>
    </div>

        {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">Daily sales</span>
                            <span class="w-numeric-title">Go to columns for details.</span>
                        </div>
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                    </div>
                    <div class="w-chart">
                        <div id="daily-sales"></div>
                    </div>
                </div>
            </div>
        </div> --}}

    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget-three">
            <div class="widget-heading">
                <h5 class="">Summary</h5>
            </div>
            <div class="widget-content">

                <div class="order-summary">

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Income</h6>
                                <p class="summary-count">$92,600</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Profit</h6>
                                <p class="summary-count">$37,515</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="summary-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                        </div>
                        <div class="w-summary-details">

                            <div class="w-summary-info">
                                <h6>Expenses</h6>
                                <p class="summary-count">$55,085</p>
                            </div>

                            <div class="w-summary-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div> --}}

    {{-- <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget-one">
            <div class="widget-content">
                <div class="w-numeric-value">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                    <div class="w-content">
                        <span class="w-value">3,192</span>
                        <span class="w-numeric-title">Total Orders</span>
                    </div>
                </div>
                <div class="w-chart">
                    <div id="total-orders"></div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-one">
            <div class="widget-heading">
                <h5 class="">Transactions</h5>
            </div>

            <div class="widget-content">
                <div class="transactions-list">
                    <div class="t-item">
                        <div class="t-company-name">
                            <div class="t-icon">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                </div>
                            </div>
                            <div class="t-name">
                                <h4>Electricity Bill</h4>
                                <p class="meta-date">4 Aug 1:00PM</p>
                            </div>

                        </div>
                        <div class="t-rate rate-dec">
                            <p><span>-$16.44</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg></p>
                        </div>
                    </div>
                </div>

                <div class="transactions-list">
                    <div class="t-item">
                        <div class="t-company-name">
                            <div class="t-icon">
                                <div class="avatar avatar-xl">
                                    <span class="avatar-title rounded-circle">SP</span>
                                </div>
                            </div>
                            <div class="t-name">
                                <h4>Shaun Park</h4>
                                <p class="meta-date">4 Aug 1:00PM</p>
                            </div>
                        </div>
                        <div class="t-rate rate-inc">
                            <p><span>+$66.44</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg></p>
                        </div>
                    </div>
                </div>

                <div class="transactions-list">
                    <div class="t-item">
                        <div class="t-company-name">
                            <div class="t-icon">
                                <div class="avatar avatar-xl">
                                    <span class="avatar-title rounded-circle">AD</span>
                                </div>
                            </div>
                            <div class="t-name">
                                <h4>Amy Diaz</h4>
                                <p class="meta-date">4 Aug 1:00PM</p>
                            </div>

                        </div>
                        <div class="t-rate rate-inc">
                            <p><span>+$66.44</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg></p>
                        </div>
                    </div>
                </div>

                <div class="transactions-list">
                    <div class="t-item">
                        <div class="t-company-name">
                            <div class="t-icon">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                </div>
                            </div>
                            <div class="t-name">
                                <h4>Netflix</h4>
                                <p class="meta-date">4 Aug 1:00PM</p>
                            </div>

                        </div>
                        <div class="t-rate rate-dec">
                            <p><span>-$32.00</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

        <div class="widget widget-activity-four">

            <div class="widget-heading">
                <h5 class="">Recent Activities</h5>
            </div>

            <div class="widget-content">

                <div class="mt-container mx-auto">
                    <div class="timeline-line">

                        <div class="item-timeline timeline-primary">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p><span>Updated</span> Server Logs</p>
                                <span class="badge badge-danger">Pending</span>
                                <p class="t-time">Just Now</p>
                            </div>
                        </div>

                        <div class="item-timeline timeline-success">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
                                <span class="badge badge-success">Completed</span>
                                <p class="t-time">2 min ago</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-danger">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Backup <span>Files EOD</span></p>
                                <span class="badge badge-danger">Pending</span>
                                <p class="t-time">14:00</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-dark">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Collect documents from <a href="javascript:void(0);">Sara</a></p>
                                <span class="badge badge-success">Completed</span>
                                <p class="t-time">16:00</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-warning">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Conference call with <a href="javascript:void(0);">Marketing Manager</a>.</p>
                                <span class="badge badge-primary">In progress</span>
                                <p class="t-time">17:00</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-secondary">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Rebooted Server</p>
                                <span class="badge badge-success">Completed</span>
                                <p class="t-time">17:00</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-warning">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Send contract details to Freelancer</p>
                                <span class="badge badge-danger">Pending</span>
                                <p class="t-time">18:00</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-dark">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Kelly want to increase the time of the project.</p>
                                <span class="badge badge-primary">In Progress</span>
                                <p class="t-time">19:00</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-success">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Server down for maintanence</p>
                                <span class="badge badge-success">Completed</span>
                                <p class="t-time">19:00</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-secondary">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Malicious link detected</p>
                                <span class="badge badge-warning">Block</span>
                                <p class="t-time">20:00</p>
                            </div>
                        </div>

                        <div class="item-timeline  timeline-warning">
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>Rebooted Server</p>
                                <span class="badge badge-success">Completed</span>
                                <p class="t-time">23:00</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tm-action-btn">
                    <button class="btn">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

        <div class="widget widget-account-invoice-one">

            <div class="widget-heading">
                <h5 class="">Account Info</h5>
            </div>

            <div class="widget-content">
                <div class="invoice-box">

                    <div class="acc-total-info">
                        <h5>Balance</h5>
                        <p class="acc-amount">$470</p>
                    </div>

                    <div class="inv-detail">
                        <div class="info-detail-1">
                            <p>Monthly Plan</p>
                            <p>$ 199.0</p>
                        </div>
                        <div class="info-detail-2">
                            <p>Taxes</p>
                            <p>$ 17.82</p>
                        </div>
                        <div class="info-detail-3 info-sub">
                            <div class="info-detail">
                                <p>Extras this month</p>
                                <p>$ -0.68</p>
                            </div>
                            <div class="info-detail-sub">
                                <p>Netflix Yearly Subscription</p>
                                <p>$ 0</p>
                            </div>
                            <div class="info-detail-sub">
                                <p>Others</p>
                                <p>$ -0.68</p>
                            </div>
                        </div>
                    </div>

                    <div class="inv-action">
                        <a href="" class="btn btn-dark">Summary</a>
                        <a href="" class="btn btn-danger">Transfer</a>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}

    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">

            <div class="widget-heading">
                <h5 class="">Recent Orders</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><div class="th-content">Customer</div></th>
                                <th><div class="th-content">Check-In</div></th>
                                <th><div class="th-content">Check-Out</div></th>
                                <th><div class="th-content th-heading">Price</div></th>
                                <th><div class="th-content">Status</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($recent_orders))
                            @foreach($recent_orders as $key => $value)
                            <tr>
                                <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">Andy King</div></td>
                                <td><div class="td-content product-brand">{{$value->check_in}}</div></td>
                                <td><div class="td-content">{{$value->check_out}}</div></td>
                                <td><div class="td-content pricing"><span class="">${{$value->booking_room_price ?? 0}}</span></div></td>
                                <td><div class="td-content"><span class="badge outline-badge-primary">@if($value->statusLabel()) {{$value->statusLabel()}} @endif</span></div></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-three">

            <div class="widget-heading">
                <h5 class="">Top Selling Rooms</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><div class="th-content">Rooms</div></th>
                                <th><div class="th-content th-heading">Price</div></th>
                                <th><div class="th-content th-heading">Discount</div></th>
                                <th><div class="th-content">Sold</div></th>
                                <th><div class="th-content">Source</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">101</div></td>
                                <td><div class="td-content"><span class="pricing">$84.00</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$10.00</span></div></td>
                                <td><div class="td-content">240</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="">Direct</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">102</div></td>
                                <td><div class="td-content"><span class="pricing">$56.07</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$5.07</span></div></td>
                                <td><div class="td-content">190</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="">Google</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">103</div></td>
                                <td><div class="td-content"><span class="pricing">$88.00</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$20.00</span></div></td>
                                <td><div class="td-content">66</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="">Ads</a></div></td>
                            </tr>
                            <tr>
                                <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">104</div></td>
                                <td><div class="td-content"><span class="pricing">$110.00</span></div></td>
                                <td><div class="td-content"><span class="discount-pricing">$33.00</span></div></td>
                                <td><div class="td-content">35</div></td>
                                <td><div class="td-content"><a href="javascript:void(0);" class="">Email</a></div></td>
                            </tr>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('cork/plugins/apex/apexcharts.min.js') }}"></script>
    {{-- <script src="{{ asset('cork/assets/js/dashboard/dash_1.js') }}"></script> --}}
    <script>
                var myData ={!!json_encode($data)!!};
                var total_booking = {{$total_booking}};
              
        /*
    ================================
        Revenue Monthly | Render
    ================================
*/
        var options1 = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
    events: {
      mounted: function(ctx, config) {
        const highest1 = ctx.getHighestValueInSeries(0);
        const highest2 = ctx.getHighestValueInSeries(1);


        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
          y: highest1,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
          y: highest2,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })
      },
    }
  },
  colors: ['#1b55e2', '#e7515a'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 5,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'Total Booking',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: total_booking,
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#0e1726'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Income',
      data: myData
  }, {
      name: 'Expenses',
      data: myData
  }],
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
            return value
        // return (value / 1000) + 'K'
      },
      offsetX: -22,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#e0e6ed',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}

/*
    ==================================
        Sales By Category | Options
    ==================================
*/
var options = {
    chart: {
        type: 'donut',
        width: 380
    },
    colors: ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'],
    dataLabels: {
      enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
          width: 10,
          height: 10,
        },
        itemMargin: {
          horizontal: 0,
          vertical: 8
        }
    },
    plotOptions: {
      pie: {
        donut: {
          size: '65%',
          background: 'transparent',
          labels: {
            show: true,
            name: {
              show: true,
              fontSize: '29px',
              fontFamily: 'Nunito, sans-serif',
              color: undefined,
              offsetY: -10
            },
            value: {
              show: true,
              fontSize: '26px',
              fontFamily: 'Nunito, sans-serif',
              color: '20',
              offsetY: 16,
              formatter: function (val) {
           
                return val
              }
            },
            total: {
              show: true,
              showAlways: true,
              label: 'Total',
              color: '#888ea8',
              formatter: function (w) {
                  
                return w.globals.seriesTotals.reduce( function(a, b) {
                   
                  return a + b
                }, 0)
              }
            }
          }
        }
      }
    },
    stroke: {
      show: true,
      width: 25,
    },
    series: {!! json_encode($booking_status) !!},
    labels: ['Paid', 'Pending', 'Cancel'],
    responsive: [{
        breakpoint: 1599,
        options: {
            chart: {
                width: '350px',
                height: '400px'
            },
            legend: {
                position: 'bottom'
            }
        },

        breakpoint: 1439,
        options: {
            chart: {
                width: '250px',
                height: '390px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
              pie: {
                donut: {
                  size: '65%',
                }
              }
            }
        },
    }]
}
var chart1 = new ApexCharts(
    document.querySelector("#revenueMonthly"),
    options1
);

chart1.render();
/*
    =================================
        Sales By Category | Render
    =================================
*/
var chart = new ApexCharts(
    document.querySelector("#chart-2"),
    options
);

chart.render();
</script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->



@endpush

