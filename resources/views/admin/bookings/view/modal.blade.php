<a href="{{route('admin.booking.preview')}}" class="btn btn-success mb-2">Go BACK</a>
<!--  BEGIN CONTENT AREA  -->
    <div class="row invoice layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="app-hamburger-container">
                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
            </div>
            <div class="doc-container"> 
                <div class="invoice-container">
                    <div class="invoice-inbox text-left">
                        <div id="ct"  style="display:block">
                            <div class="invoice-00001">
                                <div class="content-section  animated animatedFadeInUp fadeInUp">
                                    <div class="row inv--head-section">
                                        <div class="col-sm-6 col-12" >
                                            <h3 class="in-heading text-left">INVOICE</h3>
                                        </div>
                                        <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                            <div class="company-info">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg> --}}
                                                <img src="{{asset(getSiteSetting('logo'))}}" width="180px" height="120px" alt="">
                                                {{-- <h5 class="inv-brand-name">SNG</h5> --}}
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row inv--detail-section">
                                        <div class="col-sm-7 align-self-center">
                                            <p class="inv-to">Invoice To</p>
                                        </div>
                                        <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                            <p class="inv-detail-title">From : {{env('APP_NAME')}}</p>
                                        </div>
                                        
                                        <div class="col-sm-7 align-self-center">
                                            <p class="inv-customer-name">{{$booking->first_name}}</p>
                                            <p class="inv-street-addr">{{$booking->address ?? "No address"}}</p>
                                            <p class="inv-email-address">{{$booking->user->email ?? "No Email"}}</p>
                                        </div>
                                        <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                            <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[{{$booking->id}}]</span></p>
                                            <p class="inv-due-date"><span class="inv-title">Check In : </span> <span class="inv-date">{{$booking->check_in}}</span></p>
                                            <p class="inv-due-date"><span class="inv-title">Check Out : </span> <span class="inv-date">{{$booking->check_out}}</span></p>
                                            <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">{{$booking->updated_at}}</span></p>
                                            <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">{{$booking->created_at}}</span></p>
                                        </div>
                                    </div>

                                    <div class="row inv--product-table-section">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="">
                                                        <tr>
                                                            <th scope="col">S.No</th>
                                                            <th scope="col">Room No</th>
                                                            <th scope="col">Room Type</th>
                                                            <th class="text-right" scope="col">Guest</th>
                                                            <th class="text-right" scope="col">Unit Price</th>
                                                            <th class="text-right" scope="col">Discount Amount</th>
                                                            <th class="text-right" scope="col">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($booking->bookingDetails as $key => $value)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$value->room->title}}</td>
                                                            <td>{{$value->room->first()->roomType->title}}</td>
                                                            <td class="text-right">{{$value->guests ?? 0}}</td>
                                                            <td class="text-right">Rs. {{$value->allocated_price}}</td>
                                                            <td class="text-right">Rs. {{$value->allocated_price - $value->discount_amount}}</td>
                                                            <td class="text-right">Rs. @if($value->discount_amount != 0) {{$value->discount_amount}} @else{{$value->allocated_price}} @endif</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-5 col-12 order-sm-0 order-1">
                                            <div class="inv--payment-info">
                                                <div class="row">
                                                    <div class="col-sm-12 col-12">
                                                        <h6 class=" inv-title">Payment Info:</h6>
                                                    </div>
                                                    <div class="col-sm-4 col-12">
                                                        <p class=" inv-subtitle">Source: </p>
                                                    </div>
                                                    <div class="col-sm-8 col-12">
                                                        <p class="">{{$booking->source}}</p>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                            <div class="inv--total-amounts text-sm-right">
                                                <div class="row">
                                                   @php

                                                        if($booking->bookingDetails->sum('discount_amount') != 0)
                                                        {
                                                            $total_price = $booking->bookingDetails->sum('discount_amount');
                                                        }
                                                        else 
                                                        {
                                                            $total_price = $booking->bookingDetails->sum('allocated_price');
                                                        }
                                                       
                                                       $discount = $booking->bookingDetails->sum('allocated_price')-$booking->bookingDetails->sum('discount_amount');
                                                       $tax = $booking->bookingDetails->sum('discount_amount')*$booking->tax / 100;
                                                       $grand_total =  $total_price + $tax - $discount;
                                                   @endphp
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Sub Total: </p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">Rs .{{ $total_price}}</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class="">Tax Amount: </p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">Rs. {{$tax }}</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7">
                                                        <p class=" discount-rate">Discount : <span class="discount-percentage">{{($booking->bookingDetails->sum('allocated_price') - $booking->bookingDetails->sum('discount_amount') ) / $booking->bookingDetails->sum('allocated_price') * 100}} %</span> </p>
                                                    </div>
                                                    <div class="col-sm-4 col-5">
                                                        <p class="">Rs .{{ $discount}}</p>
                                                    </div>
                                                    <div class="col-sm-8 col-7 grand-total-title">
                                                        <h4 class="">Grand Total : </h4>
                                                    </div>
                                                    <div class="col-sm-4 col-5 grand-total-amount">
                                                        <h4 class="">Rs. {{$grand_total}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> 
                        </div>


                    </div>

                    <div class="inv--thankYou">
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <p class="">Thank you for doing Business with us.</p>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>
    </div>
    
<!--  END CONTENT AREA  -->

