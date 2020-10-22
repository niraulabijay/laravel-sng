
<div class="col-3 delete_add_more_item" id="delete_add_more_item">
    <div class="col-12 my_border">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="service_title[{{$service->id}}]" value="{{$service->value}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Description (Optional)</label>
            <textarea class="form-control" name="service_description[{{$service->id}}]">{{$service->description}}</textarea>
        </div>
        <div class="custom-file-container" data-upload-id="image-{{ $service->id }}">
            <label>Upload Image <a href="javascript:void(0)" class="custom-file-container__image-clear float-right" title="Clear Image"><span class="badge badge-danger">Discard</span></a></label>
            <label class="custom-file-container__custom-file" >
            <input type="file" name="service_image[{{$service->id}}]" @if($service->image()) value="{{ $service->image()->getUrl() }}" @endif class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
            </label>
            <div class="custom-file-container__image-preview"></div>
        </div>
        <input type="hidden" name="service_old[{{$service->id}}]" value="1">
        <i class="removeaddmore" style="cursor:pointer;color:red;">Remove</i>
    </div>
</div>
@if($service->image())
    <script>
        var importedBaseImage = "{{ $service->image()->getUrl('thumbnail') }}"
        var firstUpload = new FileUploadWithPreview('image-{{ $service->id }}', {
            images: {
                    baseImage: importedBaseImage,
                },
        })
    </script>
@else
    <script>
        var firstUpload = new FileUploadWithPreview('image-{{ $service->id }}')
    </script>
@endif
