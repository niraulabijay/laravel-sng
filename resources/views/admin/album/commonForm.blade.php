<div class="form-group mb-4">
    <label for="title">Category Title</label>
    <input type="text" name="title" value="{{$editAlbum->title ?? ''}}" id="title" class="form-control" required>
</div>
<div class="form-group mb-4 ">
    <div class="row">
        <div class="col-6">
            <label class="control-label">Satus:</label>
        </div>
        <div class="col-6">
            <label class="float-right switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                <input type="checkbox" name="status" {{ isset($editAlbum)? ($editAlbum->status == 1 ? "checked" : '') : "checked" }}>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
</div>
