@extends('admin.layouts.master')

@push('styles')

<link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />

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
                                <li class="breadcrumb-item active"><a href="{{ route('admin.site.setting') }}">Site Setting</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        {!!  Form::open(['url'=>route('admin.site.update'), 'enctype'=>'multipart/form-data']) !!}
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
                <small class="text-danger alert-message">{{ $errors->first('site_Description') }}</small>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <p>Site Logo</p>
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="logo">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p>Site Favicon</p>
                        <div class="custom-file-container" data-upload-id="mySecondImage">
                            <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="favicon">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
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
                        {{ Form::number('primary_phone',old('primary_phone')??getSiteSetting('primary_phone')??'',['class' => 'form-control','placeholder'=> 'Primary Phone...', 'required']) }}
                        <small class="text-danger alert-message">{{ $errors->first('primary_phone') }}</small>
                    </div>

                    <div class="form-group">
                        <p>Secondary Phone</p>
                        <label for="title" class="sr-only">Secondary Phone</label>
                        {{ Form::number('secondary_phone',old('secondary_phone')??getSiteSetting('secondary_phone')??'',['class' => 'form-control','placeholder'=> 'Secondary Phone...']) }}
                        <small class="text-danger alert-message">{{ $errors->first('secondary_phone') }}</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <p>Primary Email<span class="text-danger">*</span></p>
                        <label for="title" class="sr-only">Primary Email</label>
                        {{ Form::email('primary_email',old('primary_email')??getSiteSetting('primary_email')??'',['class' => 'form-control','placeholder'=> 'Primary Email...', 'required']) }}
                        <small class="text-danger alert-message">{{ $errors->first('primary_email') }}</small>
                    </div>

                    <div class="form-group">
                        <p>Secondary Email</p>
                        <label for="title" class="sr-only">Secondary Email</label>
                        {{ Form::email('secondary_email',old('secondary_email')??getSiteSetting('secondary_email')??'',['class' => 'form-control','placeholder'=> 'Secondary Email...']) }}
                        <small class="text-danger alert-message">{{ $errors->first('secondary_email') }}</small>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <p>Address<span class="text-danger">*</span></p>
                <label for="title" class="sr-only">Address</label>
                {{ Form::text('address',old('address')??getSiteSetting('address')??'',['class' => 'form-control','placeholder'=> 'Address...']) }}
                <small class="text-danger alert-message">{{ $errors->first('address') }}</small>
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

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <p>Banner Image</p>
                        <div class="custom-file-container" data-upload-id="bannerImage">
                            <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="banner_image">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p>Discount Section Image</p>
                        <div class="custom-file-container" data-upload-id="discountImage">
                            <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="discount_section_image">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
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
                        <small class="text-danger alert-message">{{ $errors->first('head_person_designation') }}</small>
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
                        <small class="text-danger alert-message">{{ $errors->first('overview') }}</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p>Why Choose US<span class="text-danger">*</span></p>
                        <label for="title" class="sr-only">Overview</label>
                        {{ Form::textarea('overview',old('overview')??getSiteSetting('overview')??'',['class' => 'form-control summernote']) }}
                        <small class="text-danger alert-message">{{ $errors->first('overview') }}</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p>About Page Image</p>
                        <div class="custom-file-container" data-upload-id="aboutImage">
                            <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="about_image">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
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
                        <small class="text-danger alert-message">{{ $errors->first('mission_1_title') }}</small>
                    </div>
                    <div class="form-group">
                        <p>Mission 1 Image</p>
                        <div class="custom-file-container" data-upload-id="mission1Image">
                            <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="mission_1_image">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
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
                        <small class="text-danger alert-message">{{ $errors->first('mission_2_title') }}</small>
                    </div>
                    <div class="form-group">
                        <p>Mission 2 Image</p>
                        <div class="custom-file-container" data-upload-id="mission2Image">
                            <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="mission_2_image">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
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
                        <small class="text-danger alert-message">{{ $errors->first('mission_1_title') }}</small>
                    </div>
                    <div class="form-group">
                        <p>Mission 3 Image</p>
                        <div class="custom-file-container" data-upload-id="mission3Image">
                            <label>Clear <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="mission_3_image">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



            {{Form::submit('Update',['class'=>'mt-4 btn btn-primary text-right'])}}
        {!! Form::close() !!}
    </div>

    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

    // Discont section Image
    @if(getSiteSetting('discount_section_image'))
        var importedBaseImage2 = "{{ asset(getSiteSetting('discount_section_image')) }}"
        var mySecondImage = new FileUploadWithPreview('discountImage', {
            images: {
                baseImage: importedBaseImage2,
            },
        })
    @else
        var firstUpload = new FileUploadWithPreview('discountImage')
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




</script>

@endpush
