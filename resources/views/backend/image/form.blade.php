<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">Image</label>
                <div class="custom-file">
                    <input id="image" type="file" name="image" class="custom-file-input"
                        {{$image->image ? '' : 'required'}} value="{{$image->image ?? old('image')}}">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="image_name">Image Name</label>
                <input id="image_name" type="text" required name="image_name" class="form-control"
                    value="{{$image->image_name ?? old('image_name')}}">
            </div>
        </div>
    </div>
</div>
