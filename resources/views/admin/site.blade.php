@extends('admin.layouts.master')

@push('styles')

    <link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <style>
        #toggleAccordion .card-header {
            cursor: pointer;
        }
    </style>
@endpush

@section('content')

    <div id="breadcrumbArrowed" class="col-xl-12 col-lg-12 layout-top-spacing mb-3">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area text-center">

                <div class="row">
                    <div class="col-sm-12">
                        <nav class="breadcrumb-two" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('admin.site.setting') }}">Site
                                        Setting</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        {!!  Form::open(['url'=>route('admin.site.update'), 'enctype'=>'multipart/form-data']) !!}

        <div id="toggleAccordion">
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="collapsed accord_heading" data-toggle="collapse"
                             data-target="#defaultAccordionOne" aria-expanded="true"
                             aria-controls="defaultAccordionOne">
                            Basic Info
                        </div>
                    </section>
                </div>

                <div id="defaultAccordionOne" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">

                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Basic Info</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area br-6">
                            <div class="form-group">
                                <p>Site Title<span class="text-danger">*</span></p>
                                <label for="title" class="sr-only">Site Title</label>
                                {{ Form::text('site_title',old('site_title')??getSiteSetting('site_title')??'',['class' => 'form-control','placeholder'=> 'Site Title...', 'required']) }}
                                <small class="text-danger alert-message">{{ $errors->first('site_title') }}</small>
                            </div>

                            <div class="form-group">
                                <p>Site Description<span class="text-danger">*</span></p>
                                <label for="title" class="sr-only">Site Description</label>
                                {{ Form::text('site_Description',old('site_Description')??getSiteSetting('site_Description')??'',['class' => 'form-control','placeholder'=> 'Site Description...', 'required']) }}
                                <small
                                    class="text-danger alert-message">{{ $errors->first('site_Description') }}</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Site Logo</p>
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="logo">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Site Favicon</p>
                                        <div class="custom-file-container" data-upload-id="mySecondImage">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="favicon">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Primary Phone<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Primary Phone</label>
                                        {{ Form::text('primary_phone',old('primary_phone')??getSiteSetting('primary_phone')??'',['class' => 'form-control','placeholder'=> 'Primary Phone...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('primary_phone') }}</small>
                                    </div>

                                    <div class="form-group">
                                        <p>Secondary Phone</p>
                                        <label for="title" class="sr-only">Secondary Phone</label>
                                        {{ Form::text('secondary_phone',old('secondary_phone')??getSiteSetting('secondary_phone')??'',['class' => 'form-control','placeholder'=> 'Secondary Phone...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('secondary_phone') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Primary Email<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Primary Email</label>
                                        {{ Form::email('primary_email',old('primary_email')??getSiteSetting('primary_email')??'',['class' => 'form-control','placeholder'=> 'Primary Email...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('primary_email') }}</small>
                                    </div>

                                    <div class="form-group">
                                        <p>Secondary Email</p>
                                        <label for="title" class="sr-only">Secondary Email</label>
                                        {{ Form::email('secondary_email',old('secondary_email')??getSiteSetting('secondary_email')??'',['class' => 'form-control','placeholder'=> 'Secondary Email...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('secondary_email') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Address<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Address</label>
                                        {{ Form::text('address',old('address')??getSiteSetting('address')??'',['class' => 'form-control','placeholder'=> 'Address...']) }}
                                        <small class="text-danger alert-message">{{ $errors->first('address') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Registration Number<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Registration Number</label>
                                        {{ Form::text('registration-number',old('registration-number')??getSiteSetting('registration-number')??'',['class' => 'form-control','placeholder'=> 'enter registration number...']) }}
                                        <small class="text-danger alert-message">{{ $errors->first('registration-number') }}</small>
                                    </div>
                                </div>
                            </div>
 
                            <div class="form-group">
                                <p>Map Location<span class="text-danger">*</span></p>
                                <label for="title" class="sr-only">Map Location</label>
                                {{ Form::text('map_location',old('map_location')??getSiteSetting('map_location')??'',['class' => 'form-control','placeholder'=> 'Map Location...']) }}
                                <small class="text-danger alert-message">{{ $errors->first('map_location') }}</small>
                            </div>

                            <div class="form-group">
                                <p>About us<span class="text-danger">*</span></p>
                                <label for="title" class="sr-only">About Us</label>
                                {{ Form::textarea('about', old('about')??getSiteSetting('about')??'', ['class' => 'form-control summernote']) }}
                                <small class="text-danger alert-message">{{ $errors->first('about') }}</small>
                            </div>
                        </div>

                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Social Setting</h4>
                                </div>

                            </div>
                        </div>
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Facebook<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Facebook URL</label>
                                        {{ Form::text('facebook-url',old('facebook-url')??getSiteSetting('facebook-url')??'',['class' => 'form-control','placeholder'=> 'Facebook Url...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('facebook-url') }}</small>

                                    </div>

                                    <div class="form-group">
                                        <p>Linkedin URL<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Linkedin URL</label>
                                        {{ Form::text('linkedin-url',old('linkedin-url')??getSiteSetting('linkedin-url')??'',['class' => 'form-control','placeholder'=> 'Linkedin Url...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('linkedin-url') }}</small>

                                    </div>


                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Twitter<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Twitter URL</label>
                                        {{ Form::text('twitter-url',old('twitter-url')??getSiteSetting('twitter-url')??'',['class' => 'form-control','placeholder'=> 'Twitter Url...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('twitter-url') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <p>Youtube<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Youtube URL</label>
                                        {{ Form::text('youtube-url',old('youtube-url')??getSiteSetting('youtube-url')??'',['class' => 'form-control','placeholder'=> 'Youtube Url...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('youtube-url') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Instagram<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Instagram URL</label>
                                        {{ Form::text('instagram-url',old('instagram-url')??getSiteSetting('instagram-url')??'',['class' => 'form-control','placeholder'=> 'Instagram Url...', 'required']) }}
                                        <small>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>

            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="accord_heading collapsed" data-toggle="collapse"
                             data-target="#defaultAccordionTwo" aria-expanded="false"
                             aria-controls="defaultAccordionTwo">
                            Home Page
                        </div>
                    </section>
                </div>
                <div id="defaultAccordionTwo" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Homepage</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area br-6">
                            <div class="form-group">
                                <p>Banner Text<span class="text-danger">*</span></p>
                                <label for="title" class="sr-only">Banner Text</label>
                                {{ Form::text('banner_text',old('banner_text')??getSiteSetting('banner_text')??'',['class' => 'form-control','placeholder'=> 'Homepage Banner Text...']) }}
                                <small class="text-danger alert-message">{{ $errors->first('banner_text') }}</small>
                            </div>
                            
                            <div class="form-group">
                                <p>Banner Text 2<span class="text-danger">*</span></p>
                                <label for="title" class="sr-only">Banner Text</label>
                                {{ Form::text('banner_text_2',old('banner_text_1')??getSiteSetting('banner_text_2')??'',['class' => 'form-control','placeholder'=> 'Homepage Banner Text 2...']) }}
                                <small class="text-danger alert-message">{{ $errors->first('banner_text_2') }}</small>
                            </div>
                            <div class="form-group">
                                <p>Banner Text 3<span class="text-danger">*</span></p>
                                <label for="title" class="sr-only">Banner Text</label>
                                {{ Form::text('banner_text_3',old('banner_text_3')??getSiteSetting('banner_text_3')??'',['class' => 'form-control','placeholder'=> 'Homepage Banner Text 3...']) }}
                                <small class="text-danger alert-message">{{ $errors->first('banner_text_3') }}</small>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Banner Image</p>
                                        <div class="custom-file-container" data-upload-id="bannerImage">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="banner_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Banner Image 2</p>
                                        <div class="custom-file-container" data-upload-id="bannerImage2">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="banner_image_2">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <p>Discount Section Image</p>
                                        <div class="custom-file-container" data-upload-id="discountImage">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="discount_section_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Banner Image 3</p>
                                        <div class="custom-file-container" data-upload-id="bannerImage3">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="banner_image_3">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Head Person<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Head Person</label>
                                        {{ Form::text('head_person',old('head_person')??getSiteSetting('head_person')??'',['class' => 'form-control','placeholder'=> 'Head Person...', 'required']) }}
                                        <small class="text-danger alert-message">{{ $errors->first('head_person') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Head Person Designation<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Head Person Designation</label>
                                        {{ Form::text('head_person_designation',old('head_person_designation')??getSiteSetting('head_person_designation')??'',['class' => 'form-control','placeholder'=> 'Head Person Designation...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('head_person_designation') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <p>Head Person Signature</p>
                                    <div class="custom-file-container" data-upload-id="headPersonSignature">
                                        <label>Clear <a href="javascript:void(0)"
                                                        class="custom-file-container__image-clear"
                                                        title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file"
                                                   class="custom-file-container__custom-file__custom-file-input"
                                                   accept="image/*" name="head_person_signature">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                            <span
                                                class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Welcome Message (From Head Person)<span class="text-danger">*</span></p>
                                <label for="title" class="sr-only">Welcome Message (From Head Person)</label>
                                {{ Form::text('welcome_message',old('welcome_message')??getSiteSetting('welcome_message')??'',['class' => 'form-control','placeholder'=> 'Welcome Message...', 'required']) }}
                                <small class="text-danger alert-message">{{ $errors->first('welcome_message') }}</small>
                            </div>

                        </div>
                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Deals Section</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Deals Image</p>
                                        <div class="custom-file-container" data-upload-id="deals_image">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="deals_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Deals Description<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Deals Description</label>
                                        {{ Form::text('deals_description',old('deals_description')??getSiteSetting('deals_description')??'',['class' => 'form-control','placeholder'=> 'Deals Description...', 'required']) }}
                                        <small class="text-danger alert-message">{{ $errors->first('deals_description') }}</small>
                                    </div>
                                </div>
                            </div>
                          </div>

                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Room</h4>
                                </div>
                            </div>
                        </div>
                          <div class="widget-content widget-content-area br-6">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="form-group">
                                        <p>Room Text<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Room Text</label>
                                        {{ Form::text('room_text',old('room_text')??getSiteSetting('room_text')??'',['class' => 'form-control','placeholder'=> 'Room Text...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('room_text') }}</small>
                                    </div>
                                </div>
                            </div>
                          </div>
                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Special Offer</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area br-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Special Offer Title</label>
                                        {{ Form::text('special_offer_title',old('special_offer_title')??getSiteSetting('special_offer_title')??'',['class' => 'form-control','placeholder'=> 'Special Offer...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('special_offer_title') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <p>Description<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Special Offer Description</label>
                                        {{ Form::text('special_offer_description',old('special_offer_description')??getSiteSetting('special_offer_description')??'',['class' => 'form-control','placeholder'=> 'Special Offer Description...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('special_offer_description') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <p>Title 1<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Special Offer Title 1</label>
                                        {{ Form::text('special_offer_title_1',old('special_offer_title_1')??getSiteSetting('special_offer_title_1')??'',['class' => 'form-control','placeholder'=> 'Special Offer Title 1...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('special_offer_title_1') }}</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <p>Title 2<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Special Offer Title 2</label>
                                        {{ Form::text('special_offer_title_2',old('special_offer_title_2')??getSiteSetting('special_offer_title_2')??'',['class' => 'form-control','placeholder'=> 'Special Offer Title 2...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('special_offer_title_2') }}</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <p>Title 3<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Special Offer Title 3</label>
                                        {{ Form::text('special_offer_title_3',old('special_offer_title_3')??getSiteSetting('special_offer_title_3')??'',['class' => 'form-control','placeholder'=> 'Special Offer Title 3...', 'required']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('special_offer_title_3') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <p>Image 1<span class="text-danger">*</span></p>
                                        <div class="custom-file-container" data-upload-id="special_offer_image_1">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="special_offer_image_1">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <p>Image 2<span class="text-danger">*</span></p>
                                        <div class="custom-file-container" data-upload-id="special_offer_image_2">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="special_offer_image_2">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <p>Image 3<span class="text-danger">*</span></p>
                                        <div class="custom-file-container" data-upload-id="special_offer_image_3">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="special_offer_image_3">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="accord_heading collapsed" data-toggle="collapse"
                             data-target="#defaultAccordionThree" aria-expanded="false"
                             aria-controls="defaultAccordionThree">
                            About Page
                        </div>
                    </section>
                </div>
                <div id="defaultAccordionThree" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">

                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>About Page</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area br-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Overview<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Overview</label>
                                        {{ Form::textarea('overview',old('overview')??getSiteSetting('overview')??'',['class' => 'form-control summernote']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('overview') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Why Choose US<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Why Choose Us</label>
                                        {{ Form::textarea('why_choose',old('why_choose')??getSiteSetting('why_choose')??'',['class' => 'form-control summernote']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('why_choose') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>About Page Image</p>
                                        <div class="custom-file-container" data-upload-id="aboutImage">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="about_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center">Mission</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Mission 1 title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Mission 1 title</label>
                                        {{ Form::text('mission_1_title',old('mission_1_title')??getSiteSetting('mission_1_title')??'',['class' => 'form-control','placeholder'=> 'Mission Title...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('mission_1_title') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <p>Mission 1 Image</p>
                                        <div class="custom-file-container" data-upload-id="mission1Image">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="mission_1_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Mission 2 title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Mission 2 title</label>
                                        {{ Form::text('mission_2_title',old('mission_2_title')??getSiteSetting('mission_2_title')??'',['class' => 'form-control','placeholder'=> 'Mission Title...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('mission_2_title') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <p>Mission 2 Image</p>
                                        <div class="custom-file-container" data-upload-id="mission2Image">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="mission_2_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Mission 3 title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Mission 1 title</label>
                                        {{ Form::text('mission_3_title',old('mission_3_title')??getSiteSetting('mission_3_title')??'',['class' => 'form-control','placeholder'=> 'Mission Title...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('mission_1_title') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <p>Mission 3 Image</p>
                                        <div class="custom-file-container" data-upload-id="mission3Image">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="mission_3_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="accord_heading collapsed" data-toggle="collapse"
                             data-target="#defaultAccordionFour" aria-expanded="false"
                             aria-controls="defaultAccordionThree">
                            Discover Section
                        </div>
                    </section>
                </div>
                <div id="defaultAccordionFour" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">

                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Discover Section</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area br-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Title</label>
                                        {{ Form::text('discover_title',old('discover_title') ?? getSiteSetting('discover_title')??'',['class' => 'form-control','placeholder'=> 'Discover Title...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('discover-title') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Description<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Description</label>
                                        {{ Form::textarea('discover-description',old('discover-description')??getSiteSetting('discover-description')??'',['class' => 'form-control summernote']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('discover-description') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Discover Image</p>
                                        <div class="custom-file-container" data-upload-id="discoverImage">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="discover_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center">Discover Types</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Discover 1 title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Discover 1 title</label>
                                        {{ Form::text('discover_1_title',old('discover_1_title')??getSiteSetting('discover_1_title')??'',['class' => 'form-control','placeholder'=> 'Discover Type Title...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('discover_1_title') }}</small>
                                        <br>
                                        <p>Discover 1 Description<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Discover 1 title</label>
                                        {{ Form::text('discover_1_description',old('discover_1_description')??getSiteSetting('discover_1_description')??'',['class' => 'form-control','placeholder'=> 'Discover Type description...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('discover_1_description') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <p>Discover 1 Image</p>
                                        <div class="custom-file-container" data-upload-id="discover1Image">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="discover_1_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Discover 2 title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Discover 2 title</label>
                                        {{ Form::text('discover_2_title',old('discover_2_title')??getSiteSetting('discover_2_title')??'',['class' => 'form-control','placeholder'=> 'Discover Title...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('discover_2_title') }}</small>
                                        <br>
                                        <p>Discover 2 Description<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Discover 2 title</label>
                                        {{ Form::text('discover_2_description',old('discover_2_description')??getSiteSetting('discover_2_description')??'',['class' => 'form-control','placeholder'=> 'Discover Type description...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('discover_2_description') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <p>Discover 2 Image</p>
                                        <div class="custom-file-container" data-upload-id="discover2Image">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="discover_2_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Discover 3 title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Discover 3 title</label>
                                        {{ Form::text('discover_3_title',old('discover_3_title')??getSiteSetting('discover_3_title')??'',['class' => 'form-control','placeholder'=> 'discover Title...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('discover_3_title') }}</small>
                                        <br>
                                        <p>Discover 3 Description<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Discover 3 title</label>
                                        {{ Form::text('discover_3_description',old('discover_3_description')??getSiteSetting('discover_3_description')??'',['class' => 'form-control','placeholder'=> 'Discover Type description...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('discover_3_description') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <p>Discover 3 Image</p>
                                        <div class="custom-file-container" data-upload-id="discover3Image">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="discover_3_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="accord_heading collapsed" data-toggle="collapse"
                             data-target="#defaultAccordionSix" aria-expanded="false"
                             aria-controls="defaultAccordionSix">
                            Resturant Section
                        </div>
                    </section>
                </div>
                <div id="defaultAccordionSix" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">

                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Resturant Section</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area br-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Resturant Banner Image</p>
                                        <div class="custom-file-container" data-upload-id="resturant_banner">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="resturant_banner">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Resturant Title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Resturant title</label>
                                        {{ Form::textarea('resturant_title',old('resturant_title')??getSiteSetting('resturant_title')??'',['class' => 'form-control summernote']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('resturant_title') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                              
                                </div>
                            </div>
                            <h3 class="text-center">Sliders</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p>Slider 1 Image</p>
                                        <div class="custom-file-container" data-upload-id="resturant_slider_1">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="resturant_slider_1">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                 
                                    <div class="form-group">
                                        <p>Slider 2 Image</p>
                                        <div class="custom-file-container" data-upload-id="resturant_slider_2">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="resturant_slider_2">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                
                                    <div class="form-group">
                                        <p>Slider 3 Image</p>
                                        <div class="custom-file-container" data-upload-id="resturant_slider_3">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="resturant_slider_3">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="accord_heading collapsed" data-toggle="collapse"
                             data-target="#defaultAccordionFive" aria-expanded="false"
                             aria-controls="defaultAccordionThree">
                            Contact Section
                        </div>
                    </section>
                </div>
                <div id="defaultAccordionFive" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">

                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Contact Section</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area br-6">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Contact title<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Contact title</label>
                                        {{ Form::text('contact_title',old('contact_title')??getSiteSetting('contact_title')??'',['class' => 'form-control','placeholder'=> 'Contact Title...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('contact_title') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Contact Description<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Contact Description</label>
                                        {{ Form::textarea('contact_description',old('contact_description')??getSiteSetting('contact_description')??'',['class' => 'form-control summernote']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('contact_description') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Contact Image</p>
                                        <div class="custom-file-container" data-upload-id="contactImage">
                                            <label>Clear <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       accept="image/*" name="contact_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>How To Reach</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area br-6">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p>How to Reach<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">How to reach</label>
                                        {{ Form::textarea('how_to_reach',old('how_to_reach')??getSiteSetting('how_to_reach')??'',['class' => 'form-control summernote']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('how_to_reach') }}</small>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="accord_heading collapsed" data-toggle="collapse"
                             data-target="#defaultAccordionSeven" aria-expanded="false"
                             aria-controls="defaultAccordionSeven">
                            Our Team
                        </div>
                    </section>
                </div>
                <div id="defaultAccordionSeven" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">

                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Our Team</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area br-6">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p>Team Description<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Contact Description</label>
                                        {{ Form::textarea('team_description',old('team_description')??getSiteSetting('team_description')??'',['class' => 'form-control summernote','rows' => 5, 'cols' => 70]) }}

                                        <small class="text-danger alert-message">{{ $errors->first('team_description') }}</small>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="...">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="accord_heading collapsed" data-toggle="collapse"
                             data-target="#defaultAccordionEight" aria-expanded="false"
                             aria-controls="defaultAccordionEight">
                           Tax System
                        </div>
                    </section>
                </div>
                <div id="defaultAccordionEight" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="widget-header  mt-3">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Tax System</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area br-6">
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <div class="alert alert-warning">
                                        <h6>The Value Added here will be work on the entire room type, after enabling!! </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Tax Value<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Tax Value</label>
                                        {{ Form::text('tax_value',old('tax_value') ?? getSiteSetting('tax_value') ?? '',['class' => 'form-control','placeholder'=> 'Tax Value...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('tax_value') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Additional Charge</h4>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Additional Charge<span class="text-danger">*</span></p>
                                        <label for="title" class="sr-only">Additional Charge</label>
                                        {{ Form::text('additional_charge',old('additional_charge') ?? getSiteSetting('additional_charge') ?? '',['class' => 'form-control','placeholder'=> 'Additional Charge...']) }}
                                        <small
                                            class="text-danger alert-message">{{ $errors->first('additional_charge') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        {{Form::submit('Update',['class'=>'mt-4 btn btn-primary text-right'])}}
        {!! Form::close() !!}

    </div>

    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">

    </div>
@endsection

@push('scripts')

    <script src="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        //Logo upload .
        @if(getSiteSetting('logo'))
        var importedBaseImage = "{{ asset(getSiteSetting('logo')) }}"
        var firstUpload = new FileUploadWithPreview('myFirstImage', {
            images: {
                baseImage: importedBaseImage,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        @endif

        //Deals upload .
         @if(getSiteSetting('deals_image'))
            var importedBaseImage = "{{ asset(getSiteSetting('deals_image')) }}"
            var firstUpload = new FileUploadWithPreview('deals_image', {
                images: {
                    baseImage: importedBaseImage,
                },
            })
            @else
            var firstUpload = new FileUploadWithPreview('deals_image')
        @endif
        //Favicon upload .
        @if(getSiteSetting('favicon'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('favicon')) }}"
        var mySecondImage = new FileUploadWithPreview('mySecondImage', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('mySecondImage')
        @endif

        // Banner Image
        @if(getSiteSetting('banner_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('banner_image')) }}"
        var mySecondImage = new FileUploadWithPreview('bannerImage', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('bannerImage')
        @endif
         // Banner Image 2
         @if(getSiteSetting('banner_image_2'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('banner_image_2')) }}"
        var mySecondImage = new FileUploadWithPreview('bannerImage2', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('bannerImage2')
        @endif
         // Banner Image 3
         @if(getSiteSetting('banner_image_3'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('banner_image_3')) }}"
        var mySecondImage = new FileUploadWithPreview('bannerImage3', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('bannerImage3')
        @endif
        
        // Contact Image

        @if(getSiteSetting('contact_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('contact_image')) }}"
        var mySecondImage = new FileUploadWithPreview('contactImage', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('contactImage')
        @endif

        // Discont section Image
        // @if(getSiteSetting('discount_section_image'))
        // var importedBaseImage2 = "{{ asset(getSiteSetting('discount_section_image')) }}"
        // var mySecondImage = new FileUploadWithPreview('discountImage', {
        //     images: {
        //         baseImage: importedBaseImage2,
        //     },
        // })
        // @else
        // var firstUpload = new FileUploadWithPreview('discountImage')
        // @endif
        //head_person_signature

        @if(getSiteSetting('head_person_signature'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('head_person_signature')) }}"
        var mySecondImage = new FileUploadWithPreview('headPersonSignature', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('headPersonSignature')
        @endif
        // About Page Image
        @if(getSiteSetting('about_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('about_image')) }}"
        var mySecondImage = new FileUploadWithPreview('aboutImage', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('aboutImage')
        @endif
           // Resturant Banner
           @if(getSiteSetting('resturant_banner'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('resturant_banner')) }}"
        var mySecondImage = new FileUploadWithPreview('resturant_banner', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('resturant_banner')
        @endif
           // Resturant Slider 1
           @if(getSiteSetting('resturant_slider_1'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('resturant_slider_1')) }}"
        var mySecondImage = new FileUploadWithPreview('resturant_slider_1', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('resturant_slider_1')
        @endif
           // Resturant Slider 2
        @if(getSiteSetting('resturant_slider_2'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('resturant_slider_2')) }}"
        var mySecondImage = new FileUploadWithPreview('resturant_slider_2', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('resturant_slider_2')
        @endif

     // Resturant Slider 3
     @if(getSiteSetting('resturant_slider_3'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('resturant_slider_3')) }}"
        var mySecondImage = new FileUploadWithPreview('resturant_slider_3', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('resturant_slider_3')
        @endif

        // Special Page Image 1
        @if(getSiteSetting('special_offer_image_1'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('special_offer_image_1')) }}"
        var mySecondImage = new FileUploadWithPreview('special_offer_image_1', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('special_offer_image_1')
        @endif

          // Special Page Image 2
        @if(getSiteSetting('special_offer_image_2'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('special_offer_image_2')) }}"
        var mySecondImage = new FileUploadWithPreview('special_offer_image_2', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('special_offer_image_2')
        @endif

          // Special Page Image 3
          @if(getSiteSetting('special_offer_image_3'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('special_offer_image_3')) }}"
        var mySecondImage = new FileUploadWithPreview('special_offer_image_3', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('special_offer_image_3')
        @endif

        // Mission 1 Image
        @if(getSiteSetting('mission_1_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('mission_1_image')) }}"
        var mySecondImage = new FileUploadWithPreview('mission1Image', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('mission1Image')
        @endif

        // Mission 2 Image
        @if(getSiteSetting('mission_2_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('mission_2_image')) }}"
        var mySecondImage = new FileUploadWithPreview('mission2Image', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('mission2Image')
        @endif

        // Mission 1 Image
        @if(getSiteSetting('mission_3_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('mission_3_image')) }}"
        var mySecondImage = new FileUploadWithPreview('mission3Image', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('mission3Image')
        @endif

        @if(getSiteSetting('discover_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('discover_image')) }}"
        var mySecondImage = new FileUploadWithPreview('discoverImage', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('discoverImage')
        @endif
        @if(getSiteSetting('discover_1_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('discover_1_image')) }}"
        var mySecondImage = new FileUploadWithPreview('discover1Image', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('discover1Image')
        @endif
        @if(getSiteSetting('discover_2_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('discover_2_image')) }}"
        var mySecondImage = new FileUploadWithPreview('discover2Image', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('discover2Image')
        @endif
        @if(getSiteSetting('discover_3_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('discover_3_image')) }}"
        var mySecondImage = new FileUploadWithPreview('discover3Image', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
        @else
        var firstUpload = new FileUploadWithPreview('discover3Image')
        @endif


    </script>

@endpush
