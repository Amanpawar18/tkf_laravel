<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Name
            </label>
            <input type="text" class="form-control" name="name" value="{{old('name', $product->name)}}"
                placeholder="Name" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Sub-description</label>
            <input type="text" class="form-control" name="sub_description"
                value="{{old('sub_description', $product->sub_description)}}" placeholder="Sub description" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Description</label>
            <textarea class="form-control" name="description" id="" cols="30" placeholder="Description"
                rows="5">{{old('description', $product->description)}}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="productTitleInput">Category</label>
            <select name="category_id" required id="categoryIdField"
                data-url="{{route('admin.product.getSubCategory')}}" class="form-control">
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="productTitleInput">Sub-Category</label>
            <select name="subcategory_id" required id="subCategoryIdField"
                {{ $product->subcategory_id ?  '' : 'disabled' }} class="form-control">
                @if($product->subCategory || ( $product->category && count($product->category->childrenCategories)
                ))
                @foreach ($product->category->childrenCategories as $subcategories)
                <option value="{{$subcategories->id}}"
                    {{ $subcategories->id == $product->subcategory_id ?  'selected' : '' }}>{{$subcategories->name}}
                </option>
                @endforeach
                @else
                <option value="" disabled>Select a Category</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Regular Price
            </label>
            <input type="text" class="form-control" name="regular_price"
                value="{{old('regular_price', $product->regular_price)}}" placeholder="Regular Price" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="categoryTitleInput" class="text-capitalize">
                Primary Image (Logo)
            </label>
            <div class="custom-file">
                <input type="file" id="customFile" class="form-control custom-file-input"
                    {{ $product->image ?  '' : 'required' }} name="image">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="categoryTitleInput" class="text-capitalize">
                Product Images
            </label>
            <input type="file" class="form-control" id="fileUploader"
                {{ isset($product->productImages) && count($product->productImages) ?  '' : 'required' }} multiple
                name="productImages[]">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Product detail description</label>
            <textarea name="product_detail" class="form-control" name="product_detail" id="" cols="30"
                placeholder="Product detail description"
                rows="5">{{old('product_detail', $product->product_detail)}}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Composition</label>
            <textarea name="composition" class="form-control" name="composition" id="" cols="30"
                placeholder="Composition" rows="5">{{old('composition', $product->composition)}}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Suggested for</label>
            <textarea name="suggested_for" class="form-control " name="suggested_for" id="" cols="30"
                placeholder="Suggested for" rows="5">{{old('suggested_for', $product->suggested_for)}}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Direction for use</label>
            <textarea name="direction_for_use" class="form-control" name="direction_for_use" id="" cols="30"
                placeholder="Direction for use"
                rows="5">{{old('direction_for_use', $product->direction_for_use)}}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Note</label>
            <input type="text" value="{{old('note', $product->note)}}" name="note" class="form-control">
        </div>
    </div>

</div>

{{-- <div class="col-md-12">
    <div class="form-group">
        <label for="categoryTitleInput" class="text-capitalize">
            Product Size
        </label>
        <div class="field_wrapper">
            @if(isset($product->size))
            @foreach($product->size as $key => $val)
            <div class="row my-2 size-row">
                <div class="col-md-4">
                    <input type="text" placeholder="Enter size" class="form-control" value="{{$key}}"
name="sizeField[]" value="" />
</div>
<div class="col-md-4">
    <select class="form-control" name="sizeAvailability[]">
        <option value="1" {{$val== 1? 'selected' : ''}}>Available</option>
        <option value="0" {{$val== 0? 'selected' : ''}}>Not Available</option>
    </select>
</div>
<div class="col-md-4">
    @if($loop->first)
    <button class="btn btn-primary add_button" type="button">Add More</button>
    @else
    <button class="btn btn-danger remove_button" type="button">Remove</button>
    @endif
</div>
</div>
@endforeach
@else
<div class="row my-2 size-row">
    <div class="col-md-4">
        <input type="text" placeholder="Enter size" class="form-control" name="sizeField[]" value="" />
    </div>
    <div class="col-md-4">
        <select class="form-control" name="sizeAvailability[]">
            <option value="1">Available</option>
            <option value="0">Not Available</option>
        </select>
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary add_button" type="button">Add More</button>
    </div>
</div>
@endif
</div>
</div>
</div> --}}



{{-- <div class="col-md-12">
    <div class="form-group">
        <label for="categoryTitleInput" class="text-capitalize">
            Product Images
        </label>
        <input type="file" class="form-control" id="fileUploader"
            {{ isset($product->productImages) && count($product->productImages) ?  '' : 'required' }} multiple
name="productImages[]">
</div>
</div> --}}
