<script id="document-template" type="text/x-handlebars-template">
    <div class="col-3 delete_add_more_item" id="delete_add_more_item">
        <div class="col-12 my_border">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="service_title[@{{ id }}]" value="@{{ task_name }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Description (Optional)</label>
                <textarea class="form-control" name="service_description[@{{ id }}]" value="@{{ cost }}"></textarea>
            </div>
            <div class="custom-file-container" data-upload-id="image-@{{ id }}">
                <label>Upload Image <a href="javascript:void(0)" class="custom-file-container__image-clear float-right" title="Clear Image"><span class="badge badge-danger">Discard</span></a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file" name="service_image[@{{ id }}]" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>
            <i class="removeaddmore" style="cursor:pointer;color:red;">Remove</i>
        </div>
    </div>
    <script>
        var firstUpload = new FileUploadWithPreview('image-@{{ id }}')
    </script>
</script>

  <script type="text/javascript">

   $(document).on('click','#addMore',function(){

       $('.addRow').show();

       var task_name = $("#task_name").val();
       var cost = $("#cost").val();
       var source = $("#document-template").html();
       var template = Handlebars.compile(source);
       var id = Math.floor(Math.random() * 90000) + 10000;;

       var data = {
          task_name: task_name,
          cost: cost,
          id: id,
       }

       var html = template(data);
       $("#addRow").append(html)

    });

    $(document).on('click','.removeaddmore',function(event){
      $(this).closest('.delete_add_more_item').remove();
    });

  </script>
