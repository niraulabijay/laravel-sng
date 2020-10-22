@extends('admin.layouts.master')

@push('styles')

<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('cork/custom/css/infobox.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('cork/assets/css/forms/switches.css') }}">
<script src="{{ asset('cork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
<!--  END CUSTOM STYLE FILE  -->
<style>
    .my_border{
        border: 1px solid #ccc!important;
        border-radius: 16px;
    }
    /* .custom-file-container__image-preview{
        height: 150px;
        width: auto;
    } */
</style>
@endpush

@section('header')

    <div class="page-header">
        <div class="page-title">
            <h3>Brand Page Details - {{$brand->title}}</h3>
        </div>
        {{-- Breadcrumbs section --}}
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.brands')}}">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$brand->title}}</li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <form method="post" action="{{ route('admin.brand.setting.update',$brand->slug) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="brand_id" value="{{$brand->id}}">
                <div class="card component-card_1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5>Banner<span class="text-danger"></span></h5>
                                <div class="row mt-4">
                                    <div class="col-8">
                                        <div class="custom-file-container" data-upload-id="banner-image">
                                            <label>Upload Image <a href="javascript:void(0)" class="custom-file-container__image-clear float-right" title="Clear Image"><span class="badge badge-danger">Discard</span></a></label>
                                            <label class="custom-file-container__custom-file" >
                                            <input type="file" name="banner_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exp_description">Banner Text (*Leave blank if not applicable)</label>
                                            <textarea name="banner_text" id="exp_description" rows="5" class="form-control">@if($brand->settingMeta('banner')){{ $brand->settingMeta('banner')->value }}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h5>The Experience <span class="text-danger">(*Leave blank if not applicable)</span></h5>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="custom-file-container" data-upload-id="experience-image">
                                            <label>Upload Image <a href="javascript:void(0)" class="custom-file-container__image-clear float-right" title="Clear Image"><span class="badge badge-danger">Discard</span></a></label>
                                            <label class="custom-file-container__custom-file" >
                                            <input type="file" name="experience_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exp_description">Description</label>
                                        <textarea name="experience_description" id="exp_description" rows="10" class="form-control">@if($brand->experience()){{ $brand->experience()->value }}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h5>Brand Services  <button type="button" id="addMore" class="btn btn-success btn-sm">Add More </button>
                                </h5>
                                <div class="row addRow mt-3 mb-3" id="addRow" style="{{ $brand->services()->count() == 0 ? 'display: none;' : '' }}">
                                    @if($brand->services()->count() > 0)
                                        @foreach($brand->services() as $service)
                                            @include('admin.brand.setting.presetServices')
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary ">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endsection

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
    @include('admin.brand.setting.multipleService')


    @if($brand->experience()->image)
        <script>
            var importedBaseImage = "{{ $brand->experience()->image->getUrl('thumbnail') }}"
            var experienceUpload = new FileUploadWithPreview('experience-image', {
                images: {
                        baseImage: importedBaseImage,
                    },
            })
        </script>
    @else
        <script>
            var experienceUpload = new FileUploadWithPreview('experience-image')
        </script>
    @endif

    @if($brand->settingMeta('banner'))
        <script>
            var importedBaseImage = "{{ $brand->settingMeta('banner')->image()->getUrl('thumbnail') }}"
            var experienceUpload = new FileUploadWithPreview('banner-image', {
                images: {
                        baseImage: importedBaseImage,
                    },
            })
        </script>
    @else
        <script>
            var bannerUpload  =new FileUploadWithPreview('banner-image');
        </script>
    @endif

@endpush
