   //Second upload
        // @if(isset($editRoomType) && $editRoomType->hasMedia())
            
        //     var importedBaseImage = "{{ isset($editRoomType)? $editRoomType->featureMultipleImage()->getUrl() : ''}}"
        //     var firstUpload = new FileUploadWithPreview('mySecondImage', {
        //         images: 
        //             {
        //                 baseImage: importedBaseImage,
        //             },
        //         presetFiles:[
        //             @if(isset($editRoomType) && $editRoomType->hasMedia())
        //             @foreach($editRoomType->getMedia() as $media) 
        //             "{{ isset($editRoomType)? $media->getUrl() : ''}}",
        //             @endforeach
        //             @endif
        //         ],
             
        //     });
        //     test = ['http://127.0.0.1:8000/media/70/Screenshot-from-2021-02-13-21-32-21.png'];
        //     firstUpload.addImagesFromPath(test);
        // @else
        //     var secondUpload = new FileUploadWithPreview('mySecondImage');
        // @endif
        // window.addEventListener('fileUploadWithPreview:imageDeleted', function(e) {
        // var test =  e.detail.cachedFileArray;
        // var room_type = {{$editRoomType->id}};
        // console.log(test);
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //        type:'POST', 
        //        url:'{{route("admin.roomType.edit",$editRoomType->slug)}}',
        //        data:test,
        //        success:function(data) {
                 
        //        }
        //     });
        // // e.detail.cachedFileArray
        // // e.detail.addedFilesCount
        // // Use e.detail.uploadId to match up to your specific input
        // })