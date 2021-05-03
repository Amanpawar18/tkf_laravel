<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Name
            </label>
            <input type="text" class="form-control" name="name" value="{{old('name', $page->name)}}" placeholder="Name"
                required>
        </div>
    </div>
    <div class="col-md-12 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">
                Url
            </label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        {{route('frontend.page.view')}}/
                    </span>
                </div>
                <input type="text" class="form-control" name="slug" value="{{old('slug', $page->slug)}}"
                    placeholder="url" required>
            </div>
            @if($errors->has('slug'))
            <div class="error text-danger">{{ $errors->first('slug') }}</div>
            @endif
        </div>
    </div>
    <div class="col-md-12 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">
                Banner image
            </label>
            <div class="custom-file">
            <input type="file" class="custom-file-input" name="banner_image" value="{{old('banner_image', $page->banner_image)}}" placeholder="Name"
                required>
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Content</label>
            <textarea name="content" class="form-control textarea" name="content" required id="" cols="30" placeholder="Content"
                rows="5">{{old('content', $page->content)}}</textarea>
        </div>
    </div>
    <div class="col-md-12 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Meta title
            </label>
            <input type="text" class="form-control" name="meta_title" value="{{old('meta_title', $page->meta_title)}}" placeholder="Name"
                required>
        </div>
    </div>
    <div class="col-md-12 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Meta description
            </label>
            <input type="text" class="form-control" name="meta_description" value="{{old('meta_description', $page->meta_description)}}" placeholder="Name"
                required>
        </div>
    </div>
    <div class="col-md-12 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Meta keywords
            </label>
            <input type="text" class="form-control" name="meta_keywords" value="{{old('meta_keywords', $page->meta_keywords)}}" placeholder="Name"
                required>
        </div>
    </div>
</div>
