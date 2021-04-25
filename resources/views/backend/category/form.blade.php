<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                @if(Route::currentRouteName() == 'admin.subcategory.add')
                <input type="hidden" name="category_id" value="{{$category->id}}">
                <label for="categoryTitleInput" class="text-capitalize">Category</label>
                <input type="text" name="name" class="form-control" id="categoryTitleInput"
                    placeholder="Enter category title" value="{{old('category')}}" required>
                @else
                <input type="text" name="name" class="form-control" id="categoryTitleInput"
                    placeholder="Enter category title" value="{{$category->name ?? old('category')}}" required>
                @endif
            </div>
        </div>
    </div>
    @if(!in_array(Route::currentRouteName(), ['admin.subcategory.add', 'admin.subcategory.edit']))
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="categoryPageVideoUrlInput" class="text-capitalize">{{$category->name}} page video
                    url</label>
                <input type="text" name="frontend_video_url" class="form-control" id="categoryPageVideoUrlInput"
                    placeholder="Enter category title"
                    value="{{$category->frontend_video_url ?? old('frontend_video_url')}}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="categoryPageVideoUrlInput" class="text-capitalize">{{$category->name}} page image
                    one</label>
                <div class="custom-file">
                    <input type="file" name="frontend_image_one" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="categoryPageVideoUrlInput" class="text-capitalize">{{$category->name}} page image
                    two</label>
                <div class="custom-file">
                    <input type="file" name="frontend_image_two" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
