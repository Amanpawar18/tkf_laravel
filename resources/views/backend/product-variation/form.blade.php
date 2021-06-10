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
    <div class="col-md-6">
        <div class="form-group">
            <label for="is_sale" class="text-capitalize">
                Is On Sale
            </label>
            <select name="is_sale" id="is_sale" class="form-control">
                <option value="1" {{$productVariation->is_sale == 1 ? 'selected' : ''}}>Yes</option>
                <option value="0" {{$productVariation->is_sale == 0 ? 'selected' : ''}}>No</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Sale Price
            </label>
            <input type="number" min="0" class="form-control" name="sale_price"
                value="{{old('sale_price', $productVariation->sale_price)}}" placeholder="Sale Price" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="quantity" class="text-capitalize">Quantity
            </label>
            <input type="number" min="0" class="form-control" name="quantity"
                value="{{old('quantity', $productVariation->quantity)}}" placeholder="Quantity" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="batch_no" class="text-capitalize">Batch No.
            </label>
            <input type="number" min="0" class="form-control" name="batch_no"
                value="{{old('batch_no', $productVariation->batch_no)}}" placeholder="Batch No." required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="mfg_date" class="text-capitalize">MFG. Date
            </label>
            <input type="date" class="form-control" name="mfg_date" value="{{old('mfg_date', $productVariation->mfg_date)}}"
                placeholder="Mfg. Date" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exp_date" class="text-capitalize">Exp. Date
            </label>
            <input type="date" class="form-control" name="exp_date" value="{{old('exp_date', $productVariation->exp_date)}}"
                placeholder="Exp. Date" required>
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
