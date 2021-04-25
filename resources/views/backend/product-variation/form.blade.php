<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">
                Size
            </label>
            <input type="text" class="form-control" name="size" value="{{old('size', $productVariation->size)}}"
                placeholder="Size" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">
                Price
            </label>
            <input type="text" class="form-control" name="price" value="{{old('price', $productVariation->price)}}"
                placeholder="Price" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="categoryTitleInput" class="text-capitalize">
                Product Images
            </label>
            <input type="file" class="form-control" id="fileUploader"
                {{ isset($productVariation->images) && count($productVariation->images) ?  '' : 'required' }} multiple
                name="images[]">
        </div>
    </div>
</div>
