<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">
                Benefit heading
            </label>
            <input type="text" class="form-control" name="heading"
                value="{{old('heading', $productBenefit->heading)}}" placeholder="Name" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Benefit description</label>
            <textarea name="description" class="form-control textarea" id="" cols="30"
                rows="10">{{old('description', $productBenefit->description)}}</textarea>
        </div>
    </div>
</div>
